<?php
namespace App\Repository\GroupPackage;

use Illuminate\Support\Facades\DB;

class GroupPackageRepository
{
    const TABLE_NAME = 'group_package';

    public function getList()
    {
        return DB::table(self::TABLE_NAME)->get();
    }

    public function getGroupPackageById($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->first()
            ;
    }
}
