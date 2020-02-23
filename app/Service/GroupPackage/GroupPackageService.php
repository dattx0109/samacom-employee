<?php

namespace App\Service\GroupPackage;

use App\Repository\GroupPackage\GroupPackageRepository;

class GroupPackageService
{
    private $groupPackageRepository;

    public function __construct(GroupPackageRepository $groupPackageRepository)
    {
        $this->groupPackageRepository = $groupPackageRepository;
    }

    public function getList()
    {
        return $this->groupPackageRepository->getList();
    }

    public function getGroupPackageById($id)
    {
        return $this->groupPackageRepository->getGroupPackageById($id);
    }
}
