<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Non User Email Update</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
     <!-- MDB -->
     <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" rel="stylesheet"/>
     {{-- bootstrap min css start form here --}}
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="bolder:2px solid red;">
                    <div class="card-body">
                        <h4 style="color: blue;">Welcome, {{ $nonUsersdata->users_name }}</h4>
                        Click <a href="{{ url('/users/verify/'.$nonUsersdata->verifyUser->user_token) }}">Here</a> Your Email Verify..
                    </div>
                </div>
            </div>
        </div>
    </div>

     {{-- JQuery js start form here --}}
     <script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
     {{-- propper js start form here --}}
     <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
     {{-- bootstrap min js start form here --}}
     <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>