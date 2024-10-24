<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    public function login (Request $request){
        $credentionals=$request->only('email','password');
        if (auth()->attempt($credentionals)){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->withErrors(
            ['login' => 'Giriş Bilgileri Hatalı']
        );
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login');
    }
    public function register(Request $request){
        $data=$request->only('name', 'surname', 'email', 'password', 'repassword');
        
    if($data['password']!==$data['repassword']){
        $message=['type'=>'danger', 'description'=>'Parolalar eşleşmedi'];
        return redirect()->back()->withInput()->with(['message'=>$message]);
    }

        User::create(
            [
                'name' => $data['name'] . '  ' . $data['surname'],
                'email' => $data['email'],
                'password' =>  bcrypt($data['password']),
            ]
        );
        $message=['type'=>'success', 'description'=>'Kayıt İşlemi Başarılı.Giriş Yapabilirsiniz.'];
        return redirect(route('admin.login'))->with(['message'=>$message]);
        
    }
    
}

/*Üyelik İşlemlerinin Yapıldığı Yer */