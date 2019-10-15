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
        <div class="d-flex justify-content-end"> <a href="{{URL::to('logout')}}"><button class="btn btn-danger" >Logout</button></a></div>
    

<header>
<h1>Welcome {{session('username')}}</h1>
</header>

<div id="form">

    <div class="fish" id="fish"></div>
    <div class="fish" id="fish2"></div>
   
    <div class="d-flex justify-content-center">
    </div>
    
</div>


</body>
<script src="{{asset('js/app.js')}}"></script>
</html>