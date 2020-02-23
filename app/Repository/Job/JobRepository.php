<?php

namespace App\Repository\Job;

use App\Repository\JobApply\ApplyJobRepository;
use Illuminate\Support\Facades\DB;

class JobRepository
{
    const TABLE_NAME = 'jobs';

    public function getListJobApplyByAccount()
    {
        return DB::table(self::TABLE_NAME)
            ->join(ApplyJobRepository::TABLE_NAME, ApplyJobRepository::TABLE_NAME . '.job_id', '=', self::TABLE_NAME . '.id')
            ->where(self::TABLE_NAME . '.employer_id', request()->user->id)
            ->select(self::TABLE_NAME . '.id', self::TABLE_NAME . '.title')
            ->distinct()
            ->get();
    }
}
