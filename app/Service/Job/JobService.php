<?php

namespace App\Service\Job;


use App\Repository\Job\JobRepository;

class JobService
{
    private $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }
    public function getListJobApplyByAccount()
    {
        return $this->jobRepository->getListJobApplyByAccount();
    }
}
