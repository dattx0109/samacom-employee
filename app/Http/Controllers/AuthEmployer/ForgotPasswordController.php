<?php


namespace App\Http\Controllers\AuthEmployer;


use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Mail\Mailer;
use App\Repository\CreatePassEmployer\CreatePassEmployerRepository;
use App\Service\AuthEmployer\CheckEmailService;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    private $CheckEmailService;
    private $createPassEmployerRepository;
    public function __construct(CreatePassEmployerRepository $createPassEmployerRepository,CheckEmailService $CheckEmail)
    {
        $this->createPassEmployerRepository = $createPassEmployerRepository;
        $this->CheckEmailService = $CheckEmail;
    }
    public function index()
    {
        return view('AuthEmployer.forgot-password');
    }

    public function checkEmailEmployer(ForgotPasswordRequest $request)
    {
        $rawData = $request->input();
        $checkEmail = $this->CheckEmailService->checkEmail($rawData);
        $time_expired = time() + config('main.EMPLOYER_CREATE_TIME_EXPIRE');
        if (isset($checkEmail)  ){
            $token        = MT_RAND();
            $rawDataInsertToken = [
                'employer_id'  => $checkEmail->id,
                'token'        => $token,
                'time_expired' => $time_expired,
                'status'       => config('main.EMPLOYER_CREATE_NEW'),
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s')
            ];
            $this->createPassEmployerRepository->createTokenAfterRegisterEmployer($rawDataInsertToken);
            $subject = '[Samacom] Thay đổi mật khẩu nhà tuyển dụng';
            $data  = [
                'subject' => $subject,
                'email'   => $checkEmail->email,
                'name'    => $checkEmail->name,
                'link'    => config('main.URL_SAMACOM_EMPLOYER_DOMAIN').'/change-password?token='.$token,
            ];
            $template_mail = 'mail.forgot-password';
            Mailer::sendMail($template_mail, $data);
//            return redirect('/forgot-password')->with('success','thanh cong');
            return response()->json($checkEmail,200);
        }
        else{
            return response()->json($checkEmail,200);

        }
//        return redirect('/forgot-password')->with('err','that bai cong');

    }
}
