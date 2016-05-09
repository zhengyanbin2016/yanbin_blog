<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误！');
            }
//            $_SESSION['user']=null;
            $user = User::first();
            if($user->user_name == $input['user_name'] && $user->user_pass == md5($input['user_pass'])){
                
                $_SESSION['user']=$user;

                return redirect('admin/index');
            }else{
                return back()->with('msg','用户名或者密码错误！');
            }
        }else {

            return view('admin.login');
        }
    }

    public function quit()
    {
        $_SESSION['user']=null;
        return redirect('admin/login');
    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

}
