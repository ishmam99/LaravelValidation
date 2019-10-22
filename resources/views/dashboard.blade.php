<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-end"> <a href="{{URL::to('logout')}}"><button class="btn btn-danger" >Logout</button></a></div>
    

<header>
<h1>Welcome {{session('username')}}</h1>
</header>

<div id="form">

   
   
    <div class="d-flex justify-content-center">
        <div>
            <h2>Upload Image</h2>
            <div>
                @if(Session::has('msg'))
            <span style="color:green">{{Session::get('msg')}}</span>
            @endif
            </div>
        <form method="POST" action="{{URL::to('upload')}}" enctype="multipart/form-data">
            {{csrf_field()}}
                <input type="file" multiple required name="user_image[]">
                <input type="submit" name="submit"  value="Upload" style="background-color:darkcyan">
            </form>
        </div>
        
    </div>
    <div class="row">
            @foreach ($images as $image)
            <div class="col-4 pb-4">
        <img src="{{asset('uploads/original/'.$image->imagename)}}" class="w-100" >
    </div>
            @endforeach
        </div>
        
</div>
</div>


</body>
<script src="{{asset('js/app.js')}}"></script>
</html>