<?php
namespace App\Service\ProductPackage;

use App\Repository\ProductPackage\ProductPackageRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class ProductPackageService
{
    private $productPackageRepository;
    public function __construct(ProductPackageRepository $productPackageRepository)
    {
        $this->productPackageRepository = $productPackageRepository;
    }

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    public function getPackageOfGroupPackage($id)
    {
       return $this->productPackageRepository->getPackageOfGroupPackage($id);
    }
    public function buyPackage($dataRaw)
    {
       return $this->productPackageRepository->buyPackage($dataRaw);
    }

    public function getListPackage()
    {
        return $this->productPackageRepository->listPackage();
    }
    public function checkRequestPackage($id)
    {
      return  $this->productPackageRepository->checkRequestPackage($id);
    }
    public function getDetailPackage($id)
    {
        return $this->productPackageRepository->getDetailPackage($id);
    }
}
