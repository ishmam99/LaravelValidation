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
    <div id="form">

        <div class="fish" id="fish"></div>
        <div class="fish" id="fish2"></div>

    <form id="waterform" method="post" action="{{URL::to('loginstore')}}">

        {{ csrf_field() }}
        @if(Session::has('msg')
        )
         <div class="alert alert-danger" role="alert">
                {{ Session::get('msg') }}
            </div>
        @endif
            <div class="formgroup" id="email-form">
                <label for="email">Your e-mail</label>
                <input type="email" value="{{old('email')}}" id="email" name="email" />
                <span style="color:red">{{$errors->first('email')}}</span>
            </div>

            <div class="formgroup" id="message-form">
                <label for="password">Password</label>
                <input type="password"  id="password" name="password">
                <span style="color:red">{{$errors->first('password')}}</span>
            </div>

           

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Log In') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
<script src="{{asset('js/app.js')}}"></script>
</html>