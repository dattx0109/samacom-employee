<?php


namespace App\Repository\Education;


use Illuminate\Support\Facades\DB;

class EducationRepository
{
    const TABLE_NAME = 'account_education';

    public function getEducationAccount($id)
    {
        return DB::table(self::TABLE_NAME)->where('account_id', $id)->get();
    }
}
