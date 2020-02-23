<?php
/**
 * Created by PhpStorm.
 * User: thanhvuminh
 * Date: 9/19/19
 * Time: 10:38 AM
 */

namespace App\Service\AuthEmployer;
use App\Repository\Employer\CreatePasswordRepository;
use App\Repository\Employer\EmployerRepository;
use Illuminate\Support\Facades\Hash;
class EmployerService
{
    private $employerRepository;
    private $employerCreatePasswordRepository;
    public function __construct(
        EmployerRepository $employerRepository,
        CreatePasswordRepository $createPasswordRepository
    )
    {
       $this->employerRepository               = $employerRepository;
       $this->employerCreatePasswordRepository = $createPasswordRepository;
    }

    public function getUserByPhone($phone)
    {
        return $this->employerRepository->getUserByPhone($phone);
    }

    public function findEmailByPhone($phone)
    {
        return $this->employerRepository->findEmailByPhone($phone);
    }
    public function findEmailAfterRegister($email)
    {
        return $this->employerRepository->findEmailAfterRegister($email);
    }

    public function findPhoneAfterRegister($phone)
    {
        return $this->employerRepository->findPhoneAfterRegister($phone);
    }
    public function register($rawData)
    {
        $rawDataInsert = [
            'name'    => $rawData['name'],
            'email'    => $rawData['email'],
            'phone' => $rawData['phone'],
            'password' => Hash::make($rawData['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        return $this->employerRepository->register($rawDataInsert);
    }
    public function storeSession($user)
    {
        session()->put('user', $user);
    }


}
