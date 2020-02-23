<?php

namespace App\Repository\Candidate;


use App\Repository\Account\AccountDetailRepository;
use App\Repository\Account\AccountWishRepository;
use App\Repository\District\DistrictRepository;
use App\Repository\Employer\EmployerRepository;
use App\Repository\EmployerAccountView\EmployerAccountViewRepository;
use App\Repository\FieldWork\FieldWorkRepository;
use App\Repository\Job\JobRepository;
use App\Repository\JobApply\ApplyJobRepository;
use App\Repository\Province\ProvinceRepository;
use App\Repository\Tag\TagRepository;
use Illuminate\Support\Facades\DB;

class CandidateRepository
{
    const TABLE_NAME = 'accounts';
    const TABLE_DETAIL_ACCOUNT = 'account_detail';
    const TABLE_VIEW = 'employer_account_view';
    const TABLE_PROVINCE = 'provinces';
    const TABLE_DISTRICT = 'districts';
    const TABLE_FIELD_WORK = 'field_work';
    const TABLE_EMPLOYER_PACKAGE_CURRENT = 'employer_package_current';
    const TABLE_EDUCATION_ACCOUNT = 'account_education';
    const TABLE_EXPERIENCE_ACCOUNT = 'account_experience';
    const TABLE_WISH_ACCOUNT = 'account_wish';
    const TABLE_SKILL_ACCOUNT = 'account_skill';
    const TABLE_SKILL = 'skill';
    const TABLE_CHARACTER = 'character';
    const TABLE_CHARACTER_ACCOUNT = 'account_character';
    const ITEM_OF_PAGE = 10;

    public function getListCv($rawData)
    {
        $listJob = DB::table(AccountDetailRepository::TABLE_NAME)
            ->leftJoin(
                self::TABLE_NAME,
                AccountDetailRepository::TABLE_NAME . '.account_id',
                '=',
                self::TABLE_NAME . '.id'
            )->leftJoin(
                AccountWishRepository::TABLE_NAME,
                self::TABLE_NAME . '.id',
                '=',
                AccountWishRepository::TABLE_NAME . '.account_id'
            )->select(
                self::TABLE_NAME . '.name',
                self::TABLE_NAME . '.id',
                AccountDetailRepository::TABLE_NAME . '.province_id as province_id_current',
                AccountDetailRepository::TABLE_NAME . '.district_id as district_id_current',
                AccountDetailRepository::TABLE_NAME . '.gender',
                AccountDetailRepository::TABLE_NAME . '.date_of_birth',
                AccountDetailRepository::TABLE_NAME. '.job_search_status',
                AccountDetailRepository::TABLE_NAME . '.avatar',
                AccountWishRepository::TABLE_NAME . '.filed_work_wish',
                AccountWishRepository::TABLE_NAME . '.position_wish',
                AccountWishRepository::TABLE_NAME . '.salary_wish',
                AccountWishRepository::TABLE_NAME . '.province_id',
                AccountWishRepository::TABLE_NAME . '.district_id',
                AccountWishRepository::TABLE_NAME . '.current_priority',
                AccountWishRepository::TABLE_NAME . '.job_type_wish'
            );

        if (isset($rawData['city'])) {
            $listJob->where(AccountDetailRepository::TABLE_NAME . '.province_id', $rawData['city']);
        }
        if (isset($rawData['district'])) {
            $listJob->where(AccountDetailRepository::TABLE_NAME . '.district_id', $rawData['district']);
        }

        if (isset($rawData['field'])) {
            $listJob->where(AccountWishRepository::TABLE_NAME . '.filed_work_wish', $rawData['field']);
        }
        return $listJob
            ->orderBy(self::TABLE_NAME . '.updated_at', 'desc')
            ->paginate(self::ITEM_OF_PAGE);
    }

    public function caseSearchByFilterEmployerId($rawData)
    {
        $listJob = DB::table(self::TABLE_NAME)
            ->leftJoin(
                AccountDetailRepository::TABLE_NAME,
                self::TABLE_NAME . '.id',
                '=',
                AccountDetailRepository::TABLE_NAME . '.account_id'
            )->leftJoin(
                AccountWishRepository::TABLE_NAME,
                self::TABLE_NAME . '.id',
                '=',
                AccountWishRepository::TABLE_NAME . '.account_id'
            )->leftJoin(
                EmployerAccountViewRepository::TABLE_NAME,
                self::TABLE_NAME . '.id',
                '=',
                EmployerAccountViewRepository::TABLE_NAME . '.account_id'
            )->select(
                self::TABLE_NAME . '.name',
                self::TABLE_NAME . '.id',
                AccountDetailRepository::TABLE_NAME . '.province_id as province_id_current',
                AccountDetailRepository::TABLE_NAME . '.district_id as district_id_current',
                AccountDetailRepository::TABLE_NAME . '.gender',
                AccountDetailRepository::TABLE_NAME . '.date_of_birth',
                EmployerAccountViewRepository::TABLE_NAME . '.status_view',
                EmployerAccountViewRepository::TABLE_NAME. '.status_like',
                AccountDetailRepository::TABLE_NAME . '.job_search_status',
                AccountDetailRepository::TABLE_NAME . '.avatar',
                AccountWishRepository::TABLE_NAME . '.filed_work_wish',
                AccountWishRepository::TABLE_NAME . '.position_wish',
                AccountWishRepository::TABLE_NAME . '.salary_wish',
                AccountWishRepository::TABLE_NAME . '.province_id',
                AccountWishRepository::TABLE_NAME . '.district_id',
                AccountWishRepository::TABLE_NAME . '.current_priority',
                AccountWishRepository::TABLE_NAME . '.job_type_wish'
            );

        if (isset($rawData['city'])) {
            $listJob->where(AccountDetailRepository::TABLE_NAME . '.province_id', $rawData['city']);
        }

        if (isset($rawData['field'])) {
            $listJob->where(AccountWishRepository::TABLE_NAME . '.filed_work_wish', $rawData['field']);
        }

        if (isset($rawData['type_view'])) {
            $isLike = 1;
            $isView = 2;
            $isOpenContact = 3;
            $listJob->where(EmployerAccountViewRepository::TABLE_NAME . '.employer_id', $rawData['employer_id']);
            if ($rawData['type_view'] == $isLike) {
                $listJob->where(EmployerAccountViewRepository::TABLE_NAME . '.status_like', 1);
            }
            if ($rawData['type_view'] == $isView) {
                $listJob->where(EmployerAccountViewRepository::TABLE_NAME. '.status_view', 1);
            }
            if ($rawData['type_view'] == $isOpenContact) {
                $listJob->where(EmployerAccountViewRepository::TABLE_NAME. '.status_open', 1);
            }
        }

        return $listJob
            ->orderBy(self::TABLE_NAME . '.updated_at', 'desc')
            ->paginate(self::ITEM_OF_PAGE);
    }

    public function getListViewByListAccountIdAndEmployerId($listAccountId, $employerId)
    {
        return DB::table(self::TABLE_VIEW)
            ->whereIn('account_id', $listAccountId)
            ->where('employer_id', $employerId)
            ->get();
    }

    public function getListProvince()
    {
        return DB::table(self::TABLE_PROVINCE)
            ->pluck('name', 'id');
    }


    public function getListDistrict()
    {
        return DB::table(self::TABLE_DISTRICT)
            ->pluck('name', 'id');
    }

    public function getListSkill()
    {
        return DB::table(self::TABLE_SKILL)
            ->pluck('name', 'id')
            ;
    }

    public function getListExperienceByListAccountId($listAccountId)
    {
        return DB::table(self::TABLE_EXPERIENCE_ACCOUNT)
            ->whereIn('account_id', $listAccountId)
            ->get();
    }

    public function refactorDataProvinceGetListCv($provinceId)
    {
        return DB::table(self::TABLE_PROVINCE)
            ->where('id', $provinceId)
            ->first();
    }

    public function getAllFieldWorkPluck()
    {
        return DB::table(self::TABLE_FIELD_WORK)
            ->pluck('name', 'id');
    }

    public function refactorDataDistrictGetListCv($districtId)
    {
        return DB::table(self::TABLE_DISTRICT)
            ->where('id', $districtId)
            ->first();
    }

    public function countViewByAccountId($accountId)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('account_id', $accountId)
            ->where('status_view', 1)
            ->count();
    }

    public function refactorDataExperience($accountId)
    {
        return DB::table(self::TABLE_EXPERIENCE_ACCOUNT)
            ->where('account_id', $accountId)
            ->latest('updated_at')
            ->first();
    }

    public function getDetailCv($id)
    {
        return DB::table(self::TABLE_NAME)
            ->leftJoin(
                self::TABLE_DETAIL_ACCOUNT,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_DETAIL_ACCOUNT . '.account_id'
            )->leftJoin(
                self::TABLE_VIEW,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_VIEW . '.account_id'
            )->leftJoin(
                self::TABLE_EDUCATION_ACCOUNT,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_EDUCATION_ACCOUNT . '.account_id'
            )->leftJoin(
                self::TABLE_EXPERIENCE_ACCOUNT,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_EXPERIENCE_ACCOUNT . '.account_id'
            )->leftJoin(
                self::TABLE_WISH_ACCOUNT,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_WISH_ACCOUNT . '.account_id'
            )->leftJoin(
                self::TABLE_SKILL_ACCOUNT,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_SKILL_ACCOUNT . '.account_id'
            )->leftJoin(
                self::TABLE_CHARACTER_ACCOUNT,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_CHARACTER_ACCOUNT . '.account_id'
            )->select(
                self::TABLE_NAME . '.id',
                self::TABLE_NAME . '.updated_at',
                self::TABLE_NAME . '.name',
                self::TABLE_NAME . '.phone',
                self::TABLE_NAME . '.email',
                self::TABLE_DETAIL_ACCOUNT . '.date_of_birth',
                self::TABLE_DETAIL_ACCOUNT . '.gender',
                self::TABLE_DETAIL_ACCOUNT . '.avatar',
                self::TABLE_DETAIL_ACCOUNT . '.full_address',
                self::TABLE_DETAIL_ACCOUNT . '.marital_status',
                self::TABLE_DETAIL_ACCOUNT . '.job_search_status',
                self::TABLE_DETAIL_ACCOUNT . '.career_goals',
                self::TABLE_EDUCATION_ACCOUNT . '.degree as edu_degree',
                self::TABLE_EDUCATION_ACCOUNT . '.id as edu_id',
                self::TABLE_EDUCATION_ACCOUNT . '.school as edu_school',
                self::TABLE_EDUCATION_ACCOUNT . '.filed_study as edu_filed_study',
                self::TABLE_EDUCATION_ACCOUNT . '.description as edu_description',
                self::TABLE_EDUCATION_ACCOUNT . '.start_time as edu_start_time',
                self::TABLE_EDUCATION_ACCOUNT . '.end_time as edu_end_time',
                self::TABLE_EXPERIENCE_ACCOUNT . '.start_time as experience_start_time',
                self::TABLE_EXPERIENCE_ACCOUNT . '.id as experience_id',
                self::TABLE_EXPERIENCE_ACCOUNT . '.end_time as experience_end_time',
                self::TABLE_EXPERIENCE_ACCOUNT . '.company as experience_company',
                self::TABLE_EXPERIENCE_ACCOUNT . '.description as experience_description',
                self::TABLE_EXPERIENCE_ACCOUNT . '.position as experience_position',
                self::TABLE_EXPERIENCE_ACCOUNT . '.field_work as experience_field_work',
                self::TABLE_WISH_ACCOUNT . '.filed_work_wish',
                self::TABLE_WISH_ACCOUNT . '.position_wish',
                self::TABLE_WISH_ACCOUNT . '.salary_wish',
                self::TABLE_WISH_ACCOUNT . '.province_id',
                self::TABLE_WISH_ACCOUNT . '.district_id',
                self::TABLE_WISH_ACCOUNT . '.current_priority',
                self::TABLE_WISH_ACCOUNT . '.job_type_wish',
                self::TABLE_SKILL_ACCOUNT.'.id as account_skill_id',
                self::TABLE_SKILL_ACCOUNT.'.skill_id',
                self::TABLE_SKILL_ACCOUNT.'.point',
                self::TABLE_CHARACTER_ACCOUNT.'.id as char_id',
                self::TABLE_CHARACTER_ACCOUNT.'.character_id'
            )->where(self::TABLE_NAME . '.id', $id)
            ->get();
    }

    public function checkLikeByAccountIdAndEmployId($employerId, $accountId)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('employer_id', $employerId)
            ->where('account_id', $accountId)
            ->first();
    }

    public function insertLikeCv($rawData)
    {
        return DB::table(self::TABLE_VIEW)
            ->insert($rawData);
    }

    public function updateLikeCv($rawData)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('employer_id', $rawData['employer_id'])
            ->where('account_id', $rawData['account_id'])
            ->update($rawData);
    }

    public function countViewByEmployerIdAndAccountId($employerId, $accountId)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('employer_id', $employerId)
            ->where('account_id', $accountId)
            ->count();
    }

    public function insertViewCv($rawData)
    {
        return DB::table(self::TABLE_VIEW)
            ->insert($rawData);
    }

    public function updateViewCvView($rawData)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('employer_id', $rawData['employer_id'])
            ->where('account_id', $rawData['account_id'])
            ->update($rawData);
    }

    public function updateViewCvOpen($rawData)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('employer_id', $rawData['employer_id'])
            ->where('account_id', $rawData['account_id'])
            ->update($rawData);
    }

    public function insertViewContact($rawData)
    {
        return DB::table(self::TABLE_VIEW)
            ->insert($rawData);
    }

    public function showDetailContact($accountId)
    {
        return DB::table(self::TABLE_NAME)
            ->join(
                self::TABLE_DETAIL_ACCOUNT,
                self::TABLE_NAME . '.id',
                '=',
                self::TABLE_DETAIL_ACCOUNT . '.account_id'
            )->where('account_id', $accountId)
            ->select(
                self::TABLE_NAME . '.email',
                self::TABLE_NAME . '.phone',
                self::TABLE_DETAIL_ACCOUNT . '.full_address'
            )->first();
    }

    public function updateCuurentNumberContact($employerId, $rawData)
    {
        return DB::table(self::TABLE_EMPLOYER_PACKAGE_CURRENT)
            ->where('employer_id', $employerId)
            ->update($rawData);
    }


    public function listProvince()
    {
        return DB::table(self::TABLE_PROVINCE)
            ->get();
    }

    public function listDistrict($city = false)
    {
        $query = DB::table(self::TABLE_DISTRICT);
        if($city) {
            $query->where('province_id', $city);
        } else {
            return [];
        }

        return $query->get();
    }

    public function getPackageByEmployerId($employerId)
    {
        return DB::table(self::TABLE_EMPLOYER_PACKAGE_CURRENT)
            ->where('employer_id', $employerId)
            ->first();
    }


    public function checkStatusOpenContactCv($employerId, $accountId)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('employer_id', $employerId)
            ->where('account_id', $accountId)
            ->first();
    }


    public function countTotalLike($accountId, $type)
    {
        return DB::table(self::TABLE_VIEW)
            ->where('account_id', $accountId)
            ->where('status_like', $type)
            ->count();
    }

    public function getListCvApplyJob($rawData)
    {
        $account = DB::table(self::TABLE_NAME)
            ->join(
                AccountDetailRepository::TABLE_NAME,
                self::TABLE_NAME . '.id',
                '=',
                AccountDetailRepository::TABLE_NAME . '.account_id'
            )
            ->join(
                ApplyJobRepository::TABLE_NAME,
                self::TABLE_NAME . '.id',
                '=',
                ApplyJobRepository::TABLE_NAME . '.account_id'
            )
            ->join(
                JobRepository::TABLE_NAME,
                ApplyJobRepository::TABLE_NAME .'.job_id',
                '=',
                JobRepository::TABLE_NAME . '.id'
            )
            ->join(
                EmployerRepository::TABLE_NAME,
                EmployerRepository::TABLE_NAME . '.id',
                '=',
                JobRepository::TABLE_NAME . '.employer_id'
            )
            ->join(
                TagRepository::TABLE_NAME,
                TagRepository::TABLE_NAME . '.job_id',
                '=',
                JobRepository::TABLE_NAME . '.id'
            )
            ->join(
                FieldWorkRepository::TABLE_NAME,
                FieldWorkRepository::TABLE_NAME . '.id',
                '=',
                JobRepository::TABLE_NAME . '.field_work_id'
            )
            ->where(EmployerRepository::TABLE_NAME . '.id', request()->user->id);
        if (isset($rawData['job_id'])) {
            $account = $account->where(JobRepository::TABLE_NAME . '.id', $rawData['job_id']);
        }
        $account = $account->select(
            self::TABLE_NAME . '.id',
            self::TABLE_NAME . '.name',
            AccountDetailRepository::TABLE_NAME .'.avatar',
            JobRepository::TABLE_NAME . '.id as job_id',
            JobRepository::TABLE_NAME . '.title as job_name',
            JobRepository::TABLE_NAME . '.job_type',
            JobRepository::TABLE_NAME . '.level_id',
            JobRepository::TABLE_NAME . '.title as job_name',
            TagRepository::TABLE_NAME . '.tag_id',
            FieldWorkRepository::TABLE_NAME . '.name as name_field_work',
            ApplyJobRepository::TABLE_NAME . '.created_at'
        )->orderBy(ApplyJobRepository::TABLE_NAME . '.created_at', 'ASC')->paginate(10);
        return $account;
    }

    public function getDetailCvApply($id)
    {
        $account = DB::table(self::TABLE_NAME)
            ->leftJoin(
                AccountDetailRepository::TABLE_NAME,
                self::TABLE_NAME . '.id',
                '=',
                AccountDetailRepository::TABLE_NAME . '.account_id'
            )
            ->leftJoin(
                ProvinceRepository::TABLE_NAME,
                ProvinceRepository::TABLE_NAME . '.id',
                '=',
                AccountDetailRepository::TABLE_NAME . '.province_id'
            )
            ->leftJoin(
                DistrictRepository::TABLE_NAME,
                DistrictRepository::TABLE_NAME . '.id',
                '=',
                AccountDetailRepository::TABLE_NAME . '.district_id'
            )
            ->join(
                ApplyJobRepository::TABLE_NAME,
                ApplyJobRepository::TABLE_NAME . '.account_id',
                '=',
                self::TABLE_NAME . '.id'
            )
            ->join(
                JobRepository::TABLE_NAME,
                ApplyJobRepository::TABLE_NAME . '.job_id',
                '=',
                JobRepository::TABLE_NAME . '.id'
            )->where(ApplyJobRepository::TABLE_NAME.'.account_id', $id)
            ->where(JobRepository::TABLE_NAME.'.employer_id', request()->user->id)
            ->select(
                self::TABLE_NAME . '.id',
                self::TABLE_NAME . '.name',
                self::TABLE_NAME . '.email',
                self::TABLE_NAME . '.phone',
                AccountDetailRepository::TABLE_NAME . '.career_goals',
                AccountDetailRepository::TABLE_NAME . '.avatar',
                AccountDetailRepository::TABLE_NAME . '.gender',
                AccountDetailRepository::TABLE_NAME . '.date_of_birth',
                AccountDetailRepository::TABLE_NAME . '.full_address',
                AccountDetailRepository::TABLE_NAME . '.link_fb',
                AccountDetailRepository::TABLE_NAME . '.height',
                AccountDetailRepository::TABLE_NAME . '.job_search_status',
                AccountDetailRepository::TABLE_NAME . '.character',
                AccountDetailRepository::TABLE_NAME . '.strengths_weaknesses',
                AccountDetailRepository::TABLE_NAME . '.extracurricular_activities',
                AccountDetailRepository::TABLE_NAME . '.marital_status',
                ProvinceRepository::TABLE_NAME . '.name as province',
                DistrictRepository::TABLE_NAME . '.name as district'
            )
            ->first();
        return $account;
    }

    public function countTotalCv()
    {
        return DB::table(self::TABLE_NAME)
            ->count()
            ;
    }

    public function getAllCharacterPluck()
    {
    return DB::table(self::TABLE_CHARACTER)
        ->pluck('name', 'id')
        ;
    }

}
