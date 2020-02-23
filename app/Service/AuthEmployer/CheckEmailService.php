<?php


namespace App\Service\AuthEmployer;


use App\Repository\Employer\CheckEmailRepository;

class CheckEmailService
{
    private $checkEmailRepository;

    public function __construct(CheckEmailRepository $checkEmailRepository)
    {
        $this->checkEmailRepository = $checkEmailRepository;
    }

    public function checkEmail($email)
    {
      return  $this->checkEmailRepository->checkEmail($email);
    }
}
