<?php

namespace App\Service\LikeCv;

use App\Repository\Candidate\CandidateRepository;

class LikeCvService
{
    private $candidateRepository;
    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function LikeCv($rawData)
    {
        $employerId =  $rawData['employer_id'];
        $accountId =  $rawData['account_id'];
        $rawData['created_at'] = date('Y-m-d H:i');
        $rawData['updated_at'] = date('Y-m-d H:i');
        $countLike = $this->checkLikeByAccountIdAndEmployId($employerId,$accountId);
//        dd($countLike);
        if (!$countLike){
            $rawDataInsert = [
                'employer_id' => $employerId,
                'account_id'  => $accountId,
                'status_like' => 1,
                'created_at'  => date('Y-m-d H:i'),
                'updated_at'  => date('Y-m-d H:i'),
            ];
            return $this->candidateRepository->insertLikeCv($rawDataInsert);
        }
        $status_like = $countLike->status_like;
        if ($status_like == 1){
            $rawDataUpdate = [
                'employer_id' => $employerId,
                'account_id'  => $accountId,
                'status_like' => 0,
                'created_at'  => date('Y-m-d H:i'),
                'updated_at'  => date('Y-m-d H:i'),
            ];
        } else {
            $rawDataUpdate = [
                'employer_id' => $employerId,
                'account_id'  => $accountId,
                'status_like' => 1,
                'created_at'  => date('Y-m-d H:i'),
                'updated_at'  => date('Y-m-d H:i'),
            ];
        }

        $this->candidateRepository->updateLikeCv($rawDataUpdate);
        return ($countLike->status_like);
    }

    public function checkLikeByAccountIdAndEmployId($employerId,$accountId)
    {
        return $this->candidateRepository->checkLikeByAccountIdAndEmployId($employerId,$accountId);
    }

    public function countTotalLike($accountId,$type)
    {
        return $this->candidateRepository->countTotalLike($accountId,$type);
    }

    public function likeCvDetail()
    {
        $employerId =  session('user')->id;
        $accountId =  (int)request()->input('cv_id');

        $countLike = $this->candidateRepository->checkLikeByAccountIdAndEmployId($employerId, $accountId);
        if (!$countLike) {
            $rawDataInsert = [
                'employer_id' => $employerId,
                'account_id' => $accountId,
                'status_like' => 1,
                'created_at' => date('Y-m-d H:i'),
                'updated_at' => date('Y-m-d H:i'),
            ];
            return $this->candidateRepository->insertLikeCv($rawDataInsert);
        }
        $status_like = $countLike->status_like;

        if ($status_like == 1){
            $rawDataUpdate = [
                'employer_id' => $employerId,
                'account_id'  => $accountId,
                'status_like' => 0,
                'created_at'  => date('Y-m-d H:i'),
                'updated_at'  => date('Y-m-d H:i'),
            ];
        } else {
            $rawDataUpdate = [
                'employer_id' => $employerId,
                'account_id'  => $accountId,
                'status_like' => 1,
                'created_at'  => date('Y-m-d H:i'),
                'updated_at'  => date('Y-m-d H:i'),
            ];
        }
        $this->candidateRepository->updateLikeCv($rawDataUpdate);
        return $status_like;
    }

}
