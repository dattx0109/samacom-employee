<?php


namespace App\Repository\Employer;


use Illuminate\Support\Facades\DB;

class CheckEmailRepository
{
    const TABLE_NAME = 'employers';

    public function checkEmail($email)
    {
        return DB::table(self::TABLE_NAME)
            ->where('email',$email)
            ->first()
            ;
    }
}
