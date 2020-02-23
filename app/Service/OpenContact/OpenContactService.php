<?php

namespace App\Service\OpenContact;

use App\Repository\Candidate\CandidateRepository;

class OpenContactService
{
    private $candidateRepository;

    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function insertViewContact($rawData)
    {
        $rawData['created_at'] = date('Y-m-d H:i');
        $rawData['updated_at'] = date('Y-m-d H:i');
        $this->candidateRepository->insertViewContact($rawData);
    }

    public function updateOpenContact($rawData)
    {
        return $this->candidateRepository->updateViewCvOpen($rawData);
    }

    public function showDetailContact($accountId)
    {
        return $this->candidateRepository->showDetailContact($accountId);

    }

    public function checkStatusOpenContactCv($employerId,$accountId)
    {
        return $this->candidateRepository->checkStatusOpenContactCv($employerId,$accountId);
    }

    public function updateCuurentNumberContact($employerId,$rawData)
    {
        $this->candidateRepository->updateCuurentNumberContact($employerId,$rawData);
    }

}
