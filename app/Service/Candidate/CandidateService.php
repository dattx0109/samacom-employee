<?php

namespace App\Service\Candidate;

use App\Repository\Account\AccountSkillRepository;
use App\Repository\Account\AccountWishRepository;
use App\Repository\Candidate\CandidateRepository;
use App\Repository\Education\EducationRepository;
use App\Repository\EmployerAccountView\EmployerAccountViewRepository;
use App\Repository\Experience\ExperienceRepository;
use App\Repository\FieldWork\FieldWorkRepository;
use App\Service\LikeCv\LikeCvService;
use App\Service\ViewCv\ViewCvService;

class CandidateService
{
    private $candidateRepository;
    private $likeCvService;
    private $viewCvService;
    private $educationRepository;
    private $experienceRepository;
    private $accountSkillRepository;
    private $accountWishRepository;
    private $employerAccountViewRepository;
    private $fieldWorkRepository;

    public function __construct(
        CandidateRepository $candidateRepository,
        LikeCvService $likeCvService,
        ViewCvService $viewCvService,
        EducationRepository $educationRepository,
        ExperienceRepository $experienceRepository,
        AccountSkillRepository $accountSkillRepository,
        AccountWishRepository $accountWishRepository,
        EmployerAccountViewRepository $employerAccountViewRepository,
        FieldWorkRepository $fieldWorkRepository
    ) {
        $this->candidateRepository = $candidateRepository;
        $this->likeCvService = $likeCvService;
        $this->viewCvService = $viewCvService;
        $this->educationRepository = $educationRepository;
        $this->experienceRepository = $experienceRepository;
        $this->accountSkillRepository = $accountSkillRepository;
        $this->accountWishRepository = $accountWishRepository;
        $this->employerAccountViewRepository = $employerAccountViewRepository;
        $this->fieldWorkRepository = $fieldWorkRepository;
    }

    public function getListCv($rawData)
    {
        $user = (object)session('user');
        $rawData['employer_id'] = $user->id;

        if (isset($rawData['type_view'])) {
            $listCv = $this->candidateRepository->caseSearchByFilterEmployerId($rawData);
        } else {
            $listCv = $this->candidateRepository->getListCv($rawData);
        }

        $listCvId = $this->getListAccountIdByListCV($listCv);

        $listViewEmployer = $this->candidateRepository->getListViewByListAccountIdAndEmployerId($listCvId, $user->id);
//        dd($listViewEmployer);
        $listViewEmployer = $this->refactorListCvView($listViewEmployer);

        $listExperience = $this->candidateRepository->getListExperienceByListAccountId($listCvId);
        $listExperience = $this->removeDuplicateRawDataExperience($listExperience);

        $listProvince = $this->candidateRepository->getListProvince();
        $listDistrict = $this->candidateRepository->getListDistrict();

        $listCvRefactor =
            $this->mergeRawDataToCV($listExperience, $listCv->items(), $listProvince, $listDistrict, $listViewEmployer);
        return [
            'data' => $listCvRefactor,
            'paging' => $listCv
        ];
    }

    public function getListAccountIdByListCV($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $item) {
            $rawDataNew[] = $item->id;
        }
        return $rawDataNew;
    }

    public function refactorListCvView($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $item) {
            $rawDataNew[$item->account_id]['status_view'] = $item->status_view;
            $rawDataNew[$item->account_id]['status_open'] = $item->status_open;
            $rawDataNew[$item->account_id]['status_like'] = $item->status_like;
        }
        return $rawDataNew;
    }

    public function removeDuplicateRawDataExperience($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $item) {
            $rawDataNew[$item->account_id] = $item;
        }
        return $rawDataNew;
    }

    public function mergeRawDataToCV(
        $rawDataExperience,
        $rawDataCv,
        $listProvince,
        $listDistrict,
        $listViewEmployer
    ) {
        foreach ($rawDataCv as &$item) {
            $item->avatar = isset($item->avatar)? env('RICH_FILE_URL_BASE').$item->avatar: '';
            $item->status_view = null;
            $item->status_open = null;
            $item->status_like = null;

            if (isset($listViewEmployer[$item->id])) {
                $item->status_view = $listViewEmployer[$item->id]['status_view'];
                $item->status_open = $listViewEmployer[$item->id]['status_open'];
                $item->status_like = $listViewEmployer[$item->id]['status_like'];
            }

            if (isset($rawDataExperience[$item->id])) {
                $item->experience = $rawDataExperience[$item->id];
            }

            if ($item->province_id) {
                $item->provinceName = isset($listProvince[$item->province_id]) ? $listProvince[$item->province_id] : '';
            }

            if ($item->district_id) {
                $item->districtName = isset($listDistrict[$item->district_id]) ? $listDistrict[$item->district_id] : '';
            }

            if ($item->province_id_current) {
                $item->provinceNameCurrent =
                    isset($listProvince[$item->province_id_current]) ? $listProvince[$item->province_id_current] : '';
            }

            if ($item->district_id_current) {
                $item->districtNameCurrent =
                    isset($listDistrict[$item->district_id_current]) ? $listDistrict[$item->district_id_current] : '';
            }

            if ($item->job_type_wish) {
                $item->job_type_wish =
                    isset(getJobType()[$item->job_type_wish]) ? getJobType()[$item->job_type_wish] : '';
            }

            if (isset($item->experience->position) && isset(getGroupSales()[$item->experience->position])
                && $item->experience->position) {
                $item->experience->position =
                isset(getGroupSales()[$item->experience->position]) ? getGroupSales()[$item->experience->position] : '';
            }
            if ($item->position_wish) {
                $item->position_wish =
                    isset(getGroupSales()[$item->position_wish])?getGroupSales()[$item->position_wish] : '';
            }

            $item->age = '';

            if ($item->date_of_birth) {
                $item->age = $this->convertAgeFromDate($item->date_of_birth);
            }
        }
        return $rawDataCv;
    }

    public function convertAgeFromDate($date)
    {
        if (!$date) {
            return null;
        }
        $year = explode('-', $date);
        $year = (int)$year[0];
        $yearNow = (int)date('Y');
        return $yearNow - $year;
    }


    public function refactorDataProvinceGetListCv($provinceId)
    {
        return $this->candidateRepository->refactorDataProvinceGetListCv($provinceId);
    }

    public function refactorDataDistrictGetListCv($districtId)
    {
        return $this->candidateRepository->refactorDataDistrictGetListCv($districtId);
    }

    public function countViewByAccountId($accountId)
    {
        return $this->candidateRepository->countViewByAccountId($accountId);
    }

    public function refactorDataExperience($accountId)
    {
        return $this->candidateRepository->refactorDataExperience($accountId);
    }

    public function getDetailCv($id)
    {
        $rawData = $this->candidateRepository->getDetailCv($id);
        dd($rawData);
        $listProvince = $this->candidateRepository->getListProvince();
        $listDistrict = $this->candidateRepository->getListDistrict();
        $listSkill = $this->candidateRepository->getListSkill();
        $listFieldWork = $this->candidateRepository->getAllFieldWorkPluck();
        $listCharacter = $this->candidateRepository->getAllCharacterPluck();
        $rawData = $this->refactorRawDataDetailCV($rawData, $listProvince, $listDistrict, $listFieldWork, $listSkill,$listCharacter);
        if (isset($rawData[$id]['edu'])) {
            $rawData[$id]['edu'] = array_values($rawData[$id]['edu']);
        }
        return $rawData;
    }

    public function refactorRawDataDetailCV($rawData, $listProvince, $listDistrict, $listFieldWork, $listSkill, $listCharacter)
    {
        $rawDataNew = [];
        foreach ($rawData as $item) {
            $rawDataNew[$item->id]['main'] = (array)$item;
            $rawDataNew[$item->id]['main']['avatar'] = env('RICH_FILE_URL_BASE').$item->avatar;
            $rawDataNew[$item->id]['main']['age'] = '';
            if ($this->convertAgeFromDate($item->date_of_birth)) {
                $rawDataNew[$item->id]['main']['age'] = $this->convertAgeFromDate($item->date_of_birth);
            }
            $rawDataNew[$item->id]['main']['filed_work_wish'] =
                isset($listFieldWork[$item->filed_work_wish]) ? $listFieldWork[$item->filed_work_wish] : '';
            $rawDataNew[$item->id]['main']['position_wish'] =
                isset(getGroupSales()[$item->position_wish]) ? getGroupSales()[$item->position_wish] : '';
            $rawDataNew[$item->id]['main']['salary_wish'] =
                isset(getSalary()[$item->salary_wish]) ? getSalary()[$item->salary_wish] : '';
            $rawDataNew[$item->id]['main']['district_id'] =
                isset($listDistrict[$item->district_id]) ? $listDistrict[$item->district_id] : '';
            $rawDataNew[$item->id]['main']['province_id'] =
                isset($listProvince[$item->province_id]) ? $listProvince[$item->province_id] : '';
            $rawDataNew[$item->id]['main']['current_priority'] =
                isset(getCurrentPriority()[$item->current_priority])?getCurrentPriority()[$item->current_priority] : '';
            $rawDataNew[$item->id]['main']['job_type_wish'] =
                isset(getJobType()[$item->job_type_wish]) ? getJobType()[$item->job_type_wish] : '';
            if (isset($item->edu_id)) {
                $item->edu_degree = isset($item->edu_degree) ? getDegree()[$item->edu_degree] : '';
                $rawDataNew[$item->id]['edu'][$item->edu_id] = [
                    'edu_degree' => isset($item->edu_degree) ? $item->edu_degree : '',
                    'edu_school' => isset($item->edu_school) ? $item->edu_school : '',
                    'edu_filed_study' => isset($item->edu_filed_study) ? $item->edu_filed_study : '',
                    'edu_description' => isset($item->edu_description) ? $item->edu_description : '',
                    'edu_start_time' => isset($item->edu_start_time) ? $item->edu_start_time : '',
                    'edu_end_time' => isset($item->edu_end_time) ? $item->edu_end_time : ''
                ];
            } else {
                $rawDataNew[$item->id]['edu'] = null;
            }

            if (isset($item->experience_id)) {
                $rawDataNew[$item->id]['experience'][$item->experience_id] = [
                    'experience_start_time' => isset($item->experience_start_time) ? $item->experience_start_time : '',
                    'experience_end_time' => isset($item->experience_end_time) ? $item->experience_end_time : '',
                    'experience_company' => isset($item->experience_company) ? $item->experience_company : '',
                    'experience_description' =>
                        isset($item->experience_description) ? $item->experience_description : '',
                    'experience_position' =>
                        isset(getRank()[$item->experience_position]) ? getRank()[$item->experience_position] : '',
                    'experience_field_work' =>
                        isset($item->experience_field_work) ? $item->experience_field_work : ''
                ];
            } else {
                $rawDataNew[$item->id]['experience'] = null;
            }

            if (isset($item->account_skill_id)) {
                $rawDataNew[$item->id]['skill'][$item->account_skill_id] = [
                    'skill_id' => isset($listSkill[$item->skill_id]) ? $listSkill[$item->skill_id] : '',
                    'point' => isset($item->point) ? $item->point : ''
                ];
            } else {
                $rawDataNew[$item->id]['skill'] = null;
            }
            if (isset($item->char_id)){
                $rawDataNew[$item->id]['character'][$item->char_id] = [
                    'character_name' => isset($listCharacter[$item->character_id])? $listCharacter[$item->character_id]: ''
                ];
            }
        }
        return $rawDataNew;
    }

    public function updateViewCVByEmployer($employerId, $cvId)
    {
        $isExistView = $this->candidateRepository->countViewByEmployerIdAndAccountId($employerId, $cvId);
        if (!$isExistView) {
            $rawDataInsert = [
                'employer_id' => $employerId,
                'account_id' => $cvId,
                'status_view' => 1,
                'created_at' => date('Y-m-d H:i'),
                'updated_at' => date('Y-m-d H:i'),
            ];
            return $this->candidateRepository->insertViewCv($rawDataInsert);
        };

        $rawDataUpdate = [
            'employer_id' => $employerId,
            'account_id' => $cvId,
            'status_view' => 1,
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        ];
        return $this->candidateRepository->updateViewCvView($rawDataUpdate);
    }

    public function listProvince()
    {
        return $this->candidateRepository->listProvince();
    }

    public function listDistrict($city = false)
    {
        return $this->candidateRepository->listDistrict($city);
    }

    public function countOpenContact($employerId)
    {
        $infoPackage = $this->getPackageByEmployerId($employerId);
        if (empty($infoPackage)) {
            return 0;
        }
        $countOpenContact = 0;
        $timeNow = date('Y-m-d');
        if ($timeNow <= $infoPackage->view_expired_at) {
            $countOpenContact = ($infoPackage->count_view_contact_profile) - ($infoPackage->count_use_view);
        }
        return $countOpenContact;
    }

    public function countTotalViewCvByEmployerId($employerId)
    {
        return $this->employerAccountViewRepository->countTotalViewCvByEmployerId($employerId);
    }

    public function countTotalOpenContactCvByEmployerId($employerId)
    {
        return $this->employerAccountViewRepository->countTotalOpenContactCvByEmployerId($employerId);
    }

    public function getPackageByEmployerId($employerId)
    {
        return $this->candidateRepository->getPackageByEmployerId($employerId);
    }

    public function countTimeExpiredOfPackage($employerId)
    {
        $infoPackage = $this->getPackageByEmployerId($employerId);
        if (empty($infoPackage)) {
            return null;
        }
        $dayTimeExpired = 0;
        $timeNow = date('Y-m-d');
//        dd($timeNow,$infoPackage->view_expired_at);
        if ($timeNow <= $infoPackage->view_expired_at) {
            $dayTimeExpired = strtotime($infoPackage->view_expired_at) - strtotime($timeNow);
        }
        return $dayTimeExpired;
    }

    public function checkTimeExpiredView($employerId)
    {
        $dataCurrent = $this->candidateRepository->getPackageByEmployerId($employerId);
        if (empty($dataCurrent)) {
            return false;
        }
        if (strtotime(date("Y-m-d")) > strtotime($dataCurrent->view_expired_at)) {
            return false;
        }
        return true;
    }
    public function getListCvApplyJob($rawData)
    {
        return $this->candidateRepository->getListCvApplyJob($rawData);
    }

    public function getDetailCvApply($id)
    {
        $dataAccountCv = [];
        $account = $this->candidateRepository->getDetailCvApply($id);
        $edu = $this->educationRepository->getEducationAccount($id);
        $experience = $this->experienceRepository->getExpAccount($id);
        $skill = $this->accountSkillRepository->getSkillAccount($id);
        $accountWish = $this->accountWishRepository->getAccountWish($id);
        $dataAccountCv['account'] = $account;
        $dataAccountCv['edu'] = $edu;
        $dataAccountCv['experience'] = $experience;
        $dataAccountCv['skill'] = $skill;
        $dataAccountCv['accountWish'] = $accountWish;
        return $dataAccountCv;
    }

    public function getListFieldWork()
    {
        return $this->fieldWorkRepository->getListFieldWork();
    }

    public function countTotalCv()
    {
        return $this->candidateRepository->countTotalCv();
    }
}
