<?php


namespace App\Repository\EmployerAccountView;


use Illuminate\Support\Facades\DB;

class EmployerAccountViewRepository
{
    const TABLE_NAME = 'employer_account_view';

    public function countTotalViewCvByEmployerId($employerId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('employer_id', $employerId)
            ->where('status_view',1)
            ->count()
            ;
    }

    public function countTotalOpenContactCvByEmployerId($employerId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('employer_id', $employerId)
            ->where('status_open',1)
            ->count()
            ;
    }
}
