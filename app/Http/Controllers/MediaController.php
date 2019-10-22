<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserImage;

use Image;

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
    
}
