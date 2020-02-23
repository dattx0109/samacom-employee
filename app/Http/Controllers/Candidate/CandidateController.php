<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Service\Candidate\CandidateService;
use App\Service\Job\JobService;
use App\Service\LikeCv\LikeCvService;
use App\Service\OpenContact\OpenContactService;
use App\Service\ViewCv\ViewCvService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    private $candidateService;
    private $likeCvService;
    private $viewCvService;
    private $openContactService;
    private $jobService;

    public function __construct(
        CandidateService $candidateService,
        LikeCvService $likeCvService,
        ViewCvService $viewCvService,
        OpenContactService $openContactService,
        JobService $jobService
    ) {
        $this->candidateService = $candidateService;
        $this->likeCvService = $likeCvService;
        $this->viewCvService = $viewCvService;
        $this->openContactService = $openContactService;
        $this->jobService = $jobService;
    }

    public function getListCv()
    {
        $rawData    = request()->input();
        $user       = (object)session('user');
        $employerId = $user->id;

        $infoPackage             = $this->candidateService->getPackageByEmployerId($employerId);

        $totalOpenContact = 0;
        if(isset($infoPackage->count_view_contact_profile)){
            $totalOpenContact = $infoPackage->count_view_contact_profile;
        }

//        $totalOpenContact = $infoPackage->count_view_contact_profile;
        $countCurrentOpenContact = $this->candidateService->countOpenContact($employerId);
        $countTotalViewCvByEmployerId = $this->candidateService->countTotalViewCvByEmployerId($employerId);
        $countTotalOpenContactCv = $this->candidateService->countTotalOpenContactCvByEmployerId($employerId);
//        $dayTimeExpired = $this->candidateService->countTimeExpiredOfPackage($employerId);
        $listCv = $this->candidateService->getListCv($rawData);
        dd($listCv);
        $listProvince = $this->listProvince();
        $cityId = \request()->city;
        $listDistrict = $this->listDistrict($cityId);
        $listFieldWork = $this->candidateService->getListFieldWork();
        return view('employee.list-employee', [
            'listCv' => $listCv['paging'],
            'rawDataCv' => $listCv['data'],
            'listProvince' => $listProvince,
            'currentPackageUser' => $infoPackage,
            'countCurrentOpenContact' => $countCurrentOpenContact,
            'totalOpenContact' => $totalOpenContact,
            'countTotalViewCvByEmployerId' => $countTotalViewCvByEmployerId,
            'countTotalOpenContactCv' => $countTotalOpenContactCv,
            'listDistrict' => $listDistrict,
            'listFieldWork' => $listFieldWork
        ]);
    }


    public function getDetailCv($id)
    {
        $user = (object)session('user');
        $employerId = $user->id;

        //todo handle logic update view CV
        $this->candidateService->updateViewCVByEmployer($employerId, $id);

        //todo count view by account id
        $countViewByAccountId = $this->candidateService->countViewByAccountId($id);
        $infoPackage             = $this->candidateService->getPackageByEmployerId($employerId);
        $totalOpenContact = 0;
        if(isset($infoPackage->count_view_contact_profile)){
            $totalOpenContact = $infoPackage->count_view_contact_profile;
        }
        $countTotalViewCvByEmployerId = $this->candidateService->countTotalViewCvByEmployerId($employerId);
        $countTotalOpenContactCv = $this->candidateService->countTotalOpenContactCvByEmployerId($employerId);

        $countCurrentOpenContact = $this->candidateService->countOpenContact($employerId);
        $checkTimeExpiredView = $this->candidateService->checkTimeExpiredView($employerId);

        $detailCv = $this->candidateService->getDetailCv($id);
        if (isset($detailCv[$id])) {
            $detailCv = $detailCv[$id];
        } else {
            $detailCv = [];
        }

        $isOpenContactItem = $this->openContactService->checkStatusOpenContactCv($employerId, $id);
        $isOpenContact = false;
        if ($isOpenContactItem->status_open == '1') {
            $isOpenContact = true;
        }

        $typeLike = 1;
        $countLike = $this->likeCvService->countTotalLike($id, $typeLike);
        $countTotalCv = $this->candidateService->countTotalCv();
        return view('employee.employee-detail', [
            'detailCv' => $detailCv,
            'countLike' => $countLike,
            'isOpenContact' => $isOpenContact,
            'countCurrentOpenContact' => $countCurrentOpenContact,
            'checkTimeExpiredView' => $checkTimeExpiredView,
            'totalOpenContact' => $totalOpenContact,
            'countViewByAccountId' => $countViewByAccountId,
            'countTotalViewCvByEmployerId' => $countTotalViewCvByEmployerId,
            'countTotalOpenContactCv' => $countTotalOpenContactCv,
            'countTotalCv' => $countTotalCv
        ]);
    }

    public function listProvince()
    {
        return $this->candidateService->listProvince();
    }

    public function listDistrict($city = false)
    {
        return $this->candidateService->listDistrict($city);
    }

    public function getListCvApplyJob()
    {
        $rawData = request()->input();
        $listJobApply = $this->jobService->getListJobApplyByAccount();
        $listCv = $this->candidateService->getListCvApplyJob($rawData);

        return view('employee.list-employee-apply-job', [
            'listCv' => $listCv,
            'listJobApply' => $listJobApply,
        ]);
    }

    public function getDetailCvApplyJob($id)
    {
        // count view by account id
        $countViewByAccountId = $this->candidateService->countViewByAccountId($id);
        $detailAccountCv = $this->candidateService->getDetailCvApply($id);
        if (empty($detailAccountCv['account'])) {
            return view('error.404');
        }

        $typeLike = 1;
        $countLike = $this->likeCvService->countTotalLike($id, $typeLike);

        return view('employee.detail-cv-apply', [
            'detailCv' => $detailAccountCv,
            'countLike' => $countLike,
            'countViewByAccountId' => $countViewByAccountId
        ]);
    }

    public function getListDistrictByCity(Request $request)
    {
        $district = $this->candidateService->listDistrict($request->get('city'));
        return response()->json($district, 200);
    }
}
