<?php

namespace App\Http\Controllers\LikeCv;


use App\Http\Controllers\Controller;
use App\Service\LikeCv\LikeCvService;

class LikeCvController extends Controller
{
    private $likeCvService;
    public function __construct(LikeCvService $likeCvService)
    {
        $this->likeCvService = $likeCvService;
    }

    public function LikeCv()
    {
        $rawData = [];
        $user = (object)session('user');
        $employerId = $user->id;
        $rawData['employer_id'] = $employerId;
        $rawData['account_id'] = (int)request()->input('cv_id');
        $rawData['status_like'] = 1;
        $isLike = $this->likeCvService->LikeCv($rawData);
        return response()->json($isLike);
    }

    public function likeCvDetail()
    {
      $isLike =  $this->likeCvService->likeCvDetail();
      if($isLike == null){
          $isLike = 0;
          return response()->json($isLike);
      }
        return response()->json($isLike);
    }
}
