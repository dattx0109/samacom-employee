<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Service\Candidate\CandidateService;
use App\Service\OpenContact\OpenContactService;
use mysql_xdevapi\Exception;

class OpenContactController extends Controller
{
    private $openContactService;
    private $candidateService;
    public function __construct(
        OpenContactService $openContactService,
        CandidateService $candidateService)
    {
        $this->openContactService = $openContactService;
        $this->candidateService   = $candidateService;
    }

    public function insertViewContact()
    {
            $rawData = [];
            $user = (object)session('user');
            $employerId = $user->id;
            $rawData['employer_id'] = $employerId;
            $rawData['account_id'] = (int)(request()->input('cv_id'));
            $rawData['status_open'] = 1;

            $currentNumberOpenContact = $this->candidateService->countOpenContact($employerId);

            if( ! $currentNumberOpenContact){
                return response()->json(['code' => 2,'message' => 'Bạn đã hết lượt mở liên hệ',],200);
            }

            $statusOpenContact = $this->openContactService->checkStatusOpenContactCv(
                $rawData['employer_id'],$rawData['account_id']
            );
            if($statusOpenContact->status_open === 1){
                throw new \Exception('NOT Open contact');
            }
            if( ! $statusOpenContact){
                $this->openContactService->insertViewContact($rawData);
            }else{
                $this->openContactService->updateOpenContact($rawData);
            }

            $rawDataBeforeUpdate = $this->candidateService->getPackageByEmployerId($employerId);
            $rawDataBeforeUpdate->count_use_view = ($rawDataBeforeUpdate->count_use_view) +1;
            $rawDataBeforeUpdate = (array)$rawDataBeforeUpdate;
            $this->openContactService->updateCuurentNumberContact($employerId, $rawDataBeforeUpdate);

            return response()->json(['code' => 1,'message' => 'Mo lien he thanh cong']);

    }
}
