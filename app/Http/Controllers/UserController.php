<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
//use App\Rules\Alpha_Space;
use App\People;
use PDF;
use App\Exports\PeopleExport;

use App\UserImage;
use Maatwebsite\Excel\Facades\Excel;
// Validator::extend('alpha_spaces', function($attribute, $value)
//     {
//         return preg_match('/^[\pL\s]+$/u', $value);
//     });

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
                        'password' =>[ 'required','min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/'],
                        
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


       
        $validateData=$req->validate([

            'name' => ['required','alpha_spaces'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:people'],
            'password' =>[ 'required','min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/','confirmed'],
            //'confirm_password' => ['required','same:password'],
            'salary'=>['required','numeric'],
            'birth_date'=>['required','date']

        ]); 

        $obj =new People();
        $obj->birth_date=$birth_date;
        $obj->name=$name;
        $obj->password=md5($password);
        $obj->salary=$salary;
        $obj->email=$email;
        if($obj->save()){
            return redirect()->to('dashboard');
        }
    }
    public function dashboard(){
        $images=UserImage::all();
        

        return view('dashboard',compact('images'));
        
    }
    public function all(){
        $peoples=People::all();
        return view('users',['peoples'=>$peoples]);
    }

    public function delete($id)
    {
        $people = People::find($id);
        $people->delete();

        return redirect('/users')->with('delete', 'User deleted!');
    }

    public function update(Request $req ,$id){
        $name=$req->name;
        $email=$req->email;
       
        $salary=$req->salary;
        $birth_date=$req->birth_date;


       
        $validateData=$req->validate([

            'name' => ['required','alpha_spaces'],
            'email' => 'required|email|unique:people,email,'. $id ,
            
            'salary'=>['required','numeric'],
            'birth_date'=>['required','date']

        ]); 

        

        $update = \DB::table('people') ->where('id', $req['id']) ->limit(1) ->update( [ 'name' => $req['name'], 'email' => $req['email'], 'salary' => $req['salary'],'birth_date' => $req['birth_date'] ]);

        return redirect('/users')->with('success', 'User Updated!');
    }
    public function profile(){
        return view('profile');
    }
    public function export() 
    {
            return Excel::download(new PeopleExport, 'people.xlsx');
    }
    public function downloadPDF($id) {
        $show = People::find($id);
        $pdf = PDF::loadView('pdf', compact('show'));
        
        return $pdf->download('people.pdf');
   }
}
