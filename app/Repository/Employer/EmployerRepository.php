<?php
/**
 * Created by PhpStorm.
 * User: thanhvuminh
 * Date: 9/19/19
 * Time: 10:40 AM
 */

namespace App\Repository\Employer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployerRepository
{
    const TABLE_NAME = 'employers';

    public function register($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->insertGetId($rawData)
            ;
    }
    public function getUserByPhone($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where(function ($query) use ($phone) {
                $query->where('phone', $phone);
                $query->orWhere('email', $phone);
            })
            ->first();
    }

    public function getUserById($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->first();
    }

    public function findEmailByPhone($phone)
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

    public function changPasswordEmployer($rawData,$rawDataUpdatePass)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id',$rawData['employer_id'])
            ->update( $rawDataUpdatePass)
            ;
    }

}
