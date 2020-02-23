<?php


namespace App\Repository\Account;

use App\Repository\Skill\SkillRepository;
use Illuminate\Support\Facades\DB;

class AccountSkillRepository
{
    const TABLE_NAME = 'account_skill';

    public function getSkillAccount($id)
    {
        return DB::table(self::TABLE_NAME)
            ->join(
                SkillRepository::TABLE_NAME,
                SkillRepository::TABLE_NAME . '.id',
                '=',
                self::TABLE_NAME . '.skill_id'
            )
            ->where(self::TABLE_NAME . '.account_id', $id)
            ->select(self::TABLE_NAME.'.*', SkillRepository::TABLE_NAME.'.name')
            ->get();
    }
}
