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

    <form id="waterform" method="post" action="{{URL::to('register')}}">

        {{ csrf_field() }}
            <div class="formgroup" id="name-form">
                <label for="name">Your name</label>
            <input type="text" value="{{old('name')}}" id="name" name="name" />
            <span style="color:red">{{$errors->first('name')}}</span>
            </div>

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

            <div class="formgroup" id="message-form">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <span style="color:red">{{$errors->first('confirm_password')}}</span>
            </div>

            <div class="formgroup" id="message-form">
                <label for="salary">Salary</label>
                <input type="number" value="{{old('salary')}}" id="salary" name="salary">
                <span style="color:red">{{$errors->first('salary')}}</span>
            </div>

            <div class="formgroup" id="message-form">
                <label for="birth_date">Date of Birth</label>
                <input type="date" value="{{old('birth_date')}}" id="birth_date" name="birth_date">
                <span style="color:red">{{$errors->first('birth_date')}}</span>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
<script src="{{asset('js/app.js')}}"></script>
</html>