<?php


namespace App\Http\Controllers\Employer;


use App\Http\Controllers\Controller;
use App\Http\Requests\changePasswordRequest;
use App\Service\Employer\CreatePassWordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class CreatePasswordController extends Controller
{
    private $createPassWordService;

    public function __construct(CreatePassWordService $createPassWordService)
    {
        $this->createPassWordService = $createPassWordService;
    }

    public function getChangePassword(Request $request)
    {
        $token = $request->get('token');
        $check_token = $this->createPassWordService->checkTokenExist($token);
        if(!$check_token) {
            return view('AuthEmployer.token');
        }

        $employer_id = $check_token->employer_id;

        return view('AuthEmployer.changePassword', compact('token', 'employer_id'));
    }

    public function postChangePassword(changePasswordRequest $request)
    {
        $rawData = $request->input();

        DB::beginTransaction();
        try{
            $this->createPassWordService->changPasswordEmployer($rawData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            $errors = new MessageBag(['error' => 'Thay đổi khẩu không thành công']);
            return back()->withErrors($errors);
        }

        $errors = new MessageBag(['success' => 'Thay đổi khẩu thành công']);
        return redirect('/')->withErrors($errors);
    }
}
