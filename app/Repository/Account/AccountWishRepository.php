<?php


namespace App\Repository\Account;

use App\Repository\Candidate\CandidateRepository;
use App\Repository\District\DistrictRepository;
use App\Repository\FieldWork\FieldWorkRepository;
use App\Repository\Province\ProvinceRepository;
use Illuminate\Support\Facades\DB;

class AccountWishRepository
{
    const TABLE_NAME = 'account_wish';
    public function getAccountWish($id)
    {
        return DB::table(self::TABLE_NAME)
            ->join(
                CandidateRepository::TABLE_NAME,
                CandidateRepository::TABLE_NAME . '.id',
                '=',
                self::TABLE_NAME . '.account_id'
            )->leftJoin(
                DistrictRepository::TABLE_NAME,
                DistrictRepository::TABLE_NAME . '.id',
                '=',
                self::TABLE_NAME . '.district_id'
            )->leftJoin(
                ProvinceRepository::TABLE_NAME,
                ProvinceRepository::TABLE_NAME . '.id',
                '=',
                self::TABLE_NAME . '.district_id'
            )->leftJoin(
                FieldWorkRepository::TABLE_NAME,
                FieldWorkRepository::TABLE_NAME . '.id',
                '=',
                self::TABLE_NAME . '.filed_work_wish'
            )
            ->where(CandidateRepository::TABLE_NAME.'.id', $id)
            ->select(
                FieldWorkRepository::TABLE_NAME.'.name as field_work_wish',
                self::TABLE_NAME . '.job_type_wish',
                self::TABLE_NAME . '.position_wish',
                ProvinceRepository::TABLE_NAME . '.name as province',
                DistrictRepository::TABLE_NAME . '.name as district',
                self::TABLE_NAME . '.salary_wish',
                self::TABLE_NAME . '.job_type_wish',
                self::TABLE_NAME . '.updated_at'
            )
            ->first();
    }
}
