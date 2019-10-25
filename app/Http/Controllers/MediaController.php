<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserImage;
use App\Customer;
use App\Profile;
use App\Imports\UsersImport;
use DB;
use Excel;
use PDF;
use Image;
//use Maatwebsite\Excel\Facades\Excel;

class MediaController extends Controller
{
    
    public function upload(Request $request)
    {
       // $originalImage= $request->file('user_image');
        foreach ($request->file('user_image') as $originalImage) {
            # code...
        
       
        $name=$originalImage->getClientOriginalName();
        $extension=$originalImage->getClientOriginalExtension();
       
        $name=time(); 
     
        $fullname=$name.'.'.$extension;
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/uploads/thumbnail/';
        $originalPath = public_path().'/uploads/original/';
        $thumbnailImage->save($originalPath.$fullname);
        $thumbnailImage->resize(600,400);
        $thumbnailImage->save($thumbnailPath.$fullname);
       
        $insert[]['imagename'] = "$fullname";
            
        }
       
        $check = UserImage::insert($insert);
      

        return redirect()->back()->with('msg','Image Successfully Uploaded');
    }
    
/////Excel data import
       public function customer()
        {
            $data = DB::table('customers')->get();
            return view('customer', compact('data'));
        }

        public function import(Request $request)
        {
            $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
            ]);
            Excel::import(new UsersImport,request()->file('select_file'));


            return back()->with('success', 'Excel Data Imported successfully.');
        }

        ///pdf
        public function create(Request $req)
        {
            $uname=$req->name;
            $email=$req->email;
            $salary=$req->salary;
            $profession=$req->profession;
            $birth_date=$req->birth_date;
            $originalImage=$req->file('profile_image');


            $name=$originalImage->getClientOriginalName();
            $extension=$originalImage->getClientOriginalExtension();
        
            $name=time(); 
        
            $fullname=$name.'.'.$extension;
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/uploads/thumbnail/';
            $originalPath = public_path().'/uploads/original/';
            $thumbnailImage->save($originalPath.$fullname);
            $thumbnailImage->resize(600,400);
            $thumbnailImage->save($thumbnailPath.$fullname);
            $profile=[
                'name'=>$req->name,
                'email'=>$req->email,
                'salary'=>$req->salary,
                'profession'=>$req->profession,
                'birth_date'=>$req->birth_date,
                'image'=>$req->file('profile_image')

            ];
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('profile', compact('profile'));
            
            //db:work
            $obj =new Profile();
            
            $obj->name=$uname; 
            $obj->email=$email;
            $obj->salary=$salary;
            $obj->profession=$profession;
            $obj->birth_date=$birth_date;
            $obj->image=$fullname;
            $obj->save();
            return $pdf->stream('people.pdf');
        }
    //     public function pdf()
    //     {
    //         $profile = DB::table('profiles')->where('name', session('username'))->first();
    //        // $profile=DB::table('profile')->latest();
    //         return view('pdf',compact('profile'));
    //     }

    //     public function download($id) {
    //         $profile = Profile::find($id);
    //         $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('profile', compact('profile'));
            
    //         return $pdf->stream('people.pdf');
    //    }


}
