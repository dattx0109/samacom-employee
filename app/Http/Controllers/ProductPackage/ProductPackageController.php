<?php

namespace App\Http\Controllers\ProductPackage;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendRequestBuyPackageRequest;
use App\Service\GroupPackage\GroupPackageService;
use App\Service\ProductPackage\ProductPackageService;
use Illuminate\Http\Request;

class ProductPackageController extends Controller
{
    private $productPackageService;
    private $groupPackageService;

    public function __construct(ProductPackageService $productPackageService,GroupPackageService $groupPackageService)
    {
        $this->productPackageService = $productPackageService;
        $this->groupPackageService = $groupPackageService;
    }
    public function listPackageOfGroupPackage($id)
    {
      $packageByGroupPackage =  $this->productPackageService->getPackageOfGroupPackage($id);
      $groupPackage = $this->groupPackageService->getGroupPackageById($id);
//      dd($packageByGroupPackage, $groupPackage);
      $checkRequestPackage =  $this->productPackageService->checkRequestPackage($id);
      if ($packageByGroupPackage->count()<1){
          return view('error.404');
      }

        return view('productPackage.detail',[
            'packageByGroupPackage'     =>$packageByGroupPackage,
            'checkRequestPackage'       =>$checkRequestPackage,
            'groupPackage'              =>$groupPackage
        ]);
    }

    public function sendRequestBuyPacket(SendRequestBuyPackageRequest $request)
    {
        $this->productPackageService->buyPackage($request->all());
        return ;
    }

    public function listGroupPackage()
    {
       $groupPackage = $this->groupPackageService->getList();
        return view('productPackage.list',['groupPackage'=>$groupPackage]);
    }
    public function getDetailPackage($id){
        return response()->json($this->productPackageService->getDetailPackage($id),200);
    }
}
