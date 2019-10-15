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
    

<header>
    <h1>Welcome </h1>
</header>

<div id="form">

    <div class="fish" id="fish"></div>
    <div class="fish" id="fish2"></div>
    <div class="d-flex justify-content-center">
    <a href="{{URL::to('login')}}"><button class="btn peach-gradient" style="border: 2px solid #4CAF50;border-radius:12px;margin:10px;"><h2>Sign In </h2></button></a><a href="{{URL::to('signup')}}"><button class="btn aqua-gradient" style=" border: 2px solid #0066FF;margin:10px;border-radius:12px;"><h2>Sign Up </h2></button></a>
    </div>
    
</div>


</body>
<script src="{{asset('js/app.js')}}"></script>
</html>