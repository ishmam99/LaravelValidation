<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use App\People;
Validator::extend('alpha_spaces', function($attribute, $value)
    {
        return preg_match('/^[\pL\s]+$/u', $value);
    });

class UserController extends Controller
{
    

    public function signup(){
        return view('signup');
        
    }

    public function login(){
        if(Session::has('userid')){
            return redirect()->to('dashboard');
        }
        return view('login');
    }
    public function loginstore(Request $req){
        $email=$req->email;
        $password=$req->password;
        $obj=People::where('email','=',$email)
                    ->where('password','=',md5($password))
                    ->first();

                    $validateData=$req->validate([
                        'email' => ['required', 'string', 'email'],
                        'password' =>[ 'required','min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
                        
                    ]); 

        if($obj){
            Session::put('userid',$obj->id);
            Session::put('username',$obj->name);
            Session::put('userrole',$obj->role);
            return redirect()->to('dashboard');
        }
        else{
            return redirect()->back()->with('msg','Wrong Email or Password');
        }
    }
    public function logout(){
        Session::flush();
        return redirect()->to('/');
    }

    public function register(Request $req ){
        $name=$req->name;
        $email=$req->email;
        $password =$req->password;
        $salary=$req->salary;
        $birth_date=$req->birth_date;
        $obj =new People();
        $obj->birth_date=$birth_date;
        $obj->name=$name;
        $obj->password=md5($password);
        $obj->salary=$salary;
        $obj->email=$email;

       
        $validateData=$req->validate([

            'name' => ['required','alpha_spaces', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:people'],
            'password' =>[ 'required','min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'confirm_password' => ['required','same:password'],
            'salary'=>['required','numeric'],
            'birth_date'=>['required','date']

        ]); 
        if($obj->save()){
            return redirect()->to('dashboard');
        }
    }
    public function dashboard(){
        return view('dashboard');
        
    }
}
