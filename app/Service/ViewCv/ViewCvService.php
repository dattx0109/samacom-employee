<?php

namespace App\Service\ViewCv;

use App\Repository\Candidate\CandidateRepository;

class ViewCvService
{
    private $candidateRepository;
    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function insertViewCv($rawData)
    {
        $employerId =  $rawData['employer_id'];
        $accountId =  $rawData['account_id'];
        $type =  $rawData['status_view'];
        $rawData['created_at'] = date('Y-m-d H:i');
        $rawData['updated_at'] = date('Y-m-d H:i');
        $countView = $this->checkBeforeInsertView($employerId,$accountId,$type);
//        dd($countView);
        if ($countView === 0){
            $this->candidateRepository->insertViewCv($rawData);
        }
        $this->candidateRepository->updateViewCv($rawData);
    }

    public function checkBeforeInsertView($employerId,$accountId,$type)
    {
       return $this->candidateRepository->checkBeforeInsertView($employerId,$accountId,$type);
    }

}
