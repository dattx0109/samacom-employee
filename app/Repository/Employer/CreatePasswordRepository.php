<?php


namespace App\Repository\Employer;


use Illuminate\Support\Facades\DB;

class CreatePasswordRepository
{
    //const TABLE_NAME = 'create_pass_employer';
    const TABLE_NAME = 'employer_create_password';
    const
        EMPLOYER_CREATE_STATUS_NEW = 1,
        EMPLOYER_CREATE_STATUS_CHANGE_PASS = 2;

    public function checkStatusToken($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->where([
                ['token',$rawData], ['status', self::EMPLOYER_CREATE_STATUS_NEW]
            ])
            ->first()
            ;
    }

    public function updateStatusActiveToken($rawDataUpdateStatusToken)
    {
        return DB::table(self::TABLE_NAME)
            ->where('token',$rawDataUpdateStatusToken['token'])
            ->update($rawDataUpdateStatusToken)
            ;
    }

}
