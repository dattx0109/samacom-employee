<?php


namespace App\Repository\Experience;

use App\Repository\Company\CompanyRepository;
use Illuminate\Support\Facades\DB;

class ExperienceRepository
{
    const TABLE_NAME = 'account_experience';
    public function getExpAccount($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where(self::TABLE_NAME.'.account_id', $id)
            ->get();
    }
}
