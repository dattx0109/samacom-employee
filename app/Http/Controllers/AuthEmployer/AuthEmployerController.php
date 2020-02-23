<?php

namespace App\Http\Controllers\AuthEmployer;

use App\Http\Requests\changePasswordRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\loginEmployerRequest;
use App\Service\AuthEmployer\EmployerService;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthEmployerRequest;

class AuthEmployerController extends Controller
{
    private $AuthEmployerService;

    public function __construct(EmployerService $AuthEmployerService)
    {
        $this->AuthEmployerService = $AuthEmployerService;
    }
    public function getLogin()
    {
        if (request()->session()->has('user')) {
            return redirect()->route('danh-sach-ung-vien');
        }
        return view('AuthEmployer.login');
    }

    public function postRegister(AuthEmployerRequest $request)
    {
        $rawData = $request->input();
        $emailAfterRegister = $this->AuthEmployerService->findEmailAfterRegister($rawData['email']);
        $phoneAfterRegister = $this->AuthEmployerService->findPhoneAfterRegister($rawData['phone']);

        if ($emailAfterRegister) {
            return view('AuthEmployer.register', ['messageEmailExits' => 'Email đã tồn tại trong hệ thống']);
        }

        if ($phoneAfterRegister) {
            return view('AuthEmployer.register', ['messagePhoneExits' => 'Số điện thoại đã tồn tại trong hệ thống']);
        }

        $userId = $this->AuthEmployerService->register($rawData);
        $infoLogin = (object)[
            'email' => $rawData['email'],
            'name'  => $rawData['name'],
            'id'    => $userId
        ];
        $this->AuthEmployerService->storeSession($infoLogin);

        return redirect()->route('danh-sach-ung-vien');
    }
    public function postLogin(loginEmployerRequest $request)
    {
        $rawData      = $request->input();
        $rawDataCheck = array();

        $rawDataCheck['phone']    = $rawData['phone'];
        $rawDataCheck['password'] = $rawData['password'];
        $user = $this->AuthEmployerService->getUserByPhone($rawDataCheck['phone']);
        if (!$user) {
            $errors = new MessageBag(['errors2' => 'Email hoặc số điện thoại chưa được đăng ký']);
            return back()->withInput($rawData)->withErrors($errors);
        }

        //$user = $this->AuthEmployerService->getUserByPhone($rawDataCheck['phone']);
        $isLoginSuccess = \Hash::check($rawDataCheck['password'], $user->password);
        if (!$isLoginSuccess) {
            $errors = new MessageBag(['errors1' => 'Mật khẩu không đúng']);
            return back()->withInput($rawData)->withErrors($errors);
        }
        $this->storeUserToSessionSerVer($user);

        $errors = new MessageBag(['errors3' => 'Dang nhap thanh cong']);
        return redirect('/list-cv')->withErrors($errors);
    }
    public function storeUserToSessionSerVer($user)
    {
        session()->put('user', $user);
    }
    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }
}
