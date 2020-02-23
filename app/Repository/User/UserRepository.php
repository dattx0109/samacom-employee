<?php


namespace App\Repository\User;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    const TABLE_NAME = 'emp';
    const PASSWORD_DEFAULT ='samacom123456';
    /**
     * @param $email
     * @return Model|Builder|object|null
     */
    public function getUserByPhone($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone', $phone)
            ->first();
    }

    public function findPhoneByPhone($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone', $phone)
            ->count()
            ;
    }

    public function findEmailAfterRegister($email)
    {
        return DB::table(self::TABLE_NAME)
            ->where('email',$email)
            ->count()
            ;
    }

    public function findPhoneAfterRegister($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone',$phone)
            ->count()
            ;
    }

    public function inserUser($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->insertGetId($rawData)
            ;
    }

}
