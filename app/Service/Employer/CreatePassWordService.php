<?php


namespace App\Service\Employer;


use App\Repository\Employer\CreatePasswordRepository;
use App\Repository\Employer\EmployerRepository;
use Illuminate\Support\Facades\Hash;

class CreatePassWordService
{
    private $createPasswordRepository;
    private $employerRepository;

    const EMPLOYER_CREATE_STATUS_CHANGE_PASS = 2;

    public function __construct(CreatePasswordRepository $createPasswordRepository,
                                EmployerRepository $employerRepository)
    {
        $this->createPasswordRepository = $createPasswordRepository;
        $this->employerRepository = $employerRepository;
    }

    public function checkTokenExist($token)
    {
        $employerToken = $this->createPasswordRepository->checkStatusToken($token);
        if(empty($employerToken)) {
            return false;
        }

        $time_expired = $employerToken->time_expired;
        $check        = time() - $time_expired;
        if($check > 0) {
            return false;
        }

        return $employerToken;
    }

    public function changPasswordEmployer($rawData)
    {
        $password = Hash::make($rawData['password']);
        $rawDataUpdatePass = [
            'password' => $password
        ];
        $rawDataUpdateStatusToken = [
            'token'  => $rawData['token'],
            'status' => self::EMPLOYER_CREATE_STATUS_CHANGE_PASS
        ];
        $this->employerRepository->changPasswordEmployer($rawData,$rawDataUpdatePass);
        $this->createPasswordRepository->updateStatusActiveToken($rawDataUpdateStatusToken);

        $user = $this->employerRepository->getUserById($rawData['employer_id']);
        $this->storeUserToSessionSerVer($user);
    }

    public function storeUserToSessionSerVer($user)
    {
        session()->put('user', $user);
    }
}
