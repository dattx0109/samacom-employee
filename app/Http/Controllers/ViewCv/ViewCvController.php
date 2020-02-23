<?php

namespace App\Http\Controllers\ViewCv;

use App\Http\Controllers\Controller;
use App\Service\ViewCv\ViewCvService;

class ViewCvController extends Controller
{
    private $viewCvService;
    public function __construct(ViewCvService $viewCvService)
    {
        $this->viewCvService = $viewCvService;
    }

    public function viewCv()
    {
        $rawData = [];
        $user = (object)session('user');
        $employerId = $user->id;
        $rawData['employer_id'] = $employerId;
        $rawData['account_id'] = request()->input('cv_id');
        $rawData['status_view'] = 1;
        $this->viewCvService->insertViewCv($rawData);
    }
}
