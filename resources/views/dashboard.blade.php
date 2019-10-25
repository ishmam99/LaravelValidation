<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
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
            <h2>Generate PDF</h2>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mymodal">PDF</button>
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




<!--modal--->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="container">
            <form  method="post" action="{{URL::to('create')}}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                        <div class="formgroup">
                            <label for="name">Your name</label>
                        <input type="text" class="form-control" value="" id="name" name="name"  />
                        <span style="color:red">{{$errors->first('name')}}</span>
                        </div>
            
                        <div class="formgroup">
                            <label for="email">Your e-mail</label>
                            <input type="email" class="form-control" value="" id="email" name="email" />
                            <span style="color:red">{{$errors->first('email')}}</span>
                        </div>
            
                       
            
                        <div class="formgroup">
                            <label for="salary">Salary</label>
                            <input type="number" class="form-control" value="" id="salary" name="salary">
                            <span style="color:red">{{$errors->first('salary')}}</span>
                        </div>
                        <div class="formgroup">
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control" value="" id="profession" name="profession">
                            <span style="color:red">{{$errors->first('profession')}}</span>
                        </div>
            
                        <div class="formgroup" >
                            <label for="birth_date">Date of Birth</label>
                            <input type="date" class="form-control" value="" id="birth_date" name="birth_date">
                            <span style="color:red">{{$errors->first('birth_date')}}</span>
                        </div>
                        <div class="formgroup">
                            <label for="profile_image">Image</label>
                            <input type="file"   name="profile_image">
                            <span style="color:red">{{$errors->first('profile_image')}}</span>
                        </div>
            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Generate PDF') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
      
      

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
</html>