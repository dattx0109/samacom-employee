<?php

namespace App\Repository\ProductPackage;

use App\Repository\GroupPackage\GroupPackageRepository;
use App\Service\GroupPackage\GroupPackageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ProductPackageRepository
{
    const TABLE_NAME = 'package';
    const TABLE_EMPLOYER_PACKAGE_REQUEST_NAME = 'employer_package_request';
    const TYPE_REQUEST = 1;

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    public function getPackageOfGroupPackage($id)
    {
        return DB::table(self::TABLE_NAME)->where('group_package', $id)->get();
    }
    public function buyPackage($dataRaw)
    {
      $package =  DB::table(self::TABLE_NAME)->where('id', $dataRaw['id'])->first();
      if(empty($package))
      {
          return response()->json(['error'=>'loi roi'],422);
      }
      $dataRaw = [
          'package_id'=>$package->id,
          'employer_id'=>request()->user->id,
          'count'=>$dataRaw['count'],
          'status'=>self::TYPE_REQUEST,
          'created_at' => date("Y/m/d H:i:s"),
          'updated_at' => date("Y/m/d H:i:s")
      ];
        return DB::table(self::TABLE_EMPLOYER_PACKAGE_REQUEST_NAME)->insert($dataRaw);
    }
    public function listPackage()
    {
        return DB::table(self::TABLE_NAME)
            ->get()
        ;
    }

    /**
     * @param $id
     * @return array
     */
    public function checkRequestPackage($id)
    {
        if (request()->session()->has('user')) {
            $employerId = session('user')->id;
            $lisPackageId = DB::table(self::TABLE_NAME)->where('group_package',$id)->pluck('id');
            return DB::table(self::TABLE_EMPLOYER_PACKAGE_REQUEST_NAME)
                ->whereIn('package_id', $lisPackageId)
                ->where('status', self::TYPE_REQUEST)
                ->where('employer_id', $employerId)->get()->toArray();
        }
        return [];

    }
    public function getDetailPackage($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id',$id)
            ->first();
    }
}
