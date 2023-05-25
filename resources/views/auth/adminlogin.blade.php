<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
     <!-- MDB -->
     <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" rel="stylesheet"/>
     {{-- bootstrap min css start form here --}}
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/users.css')}}">
     <link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>
<body>
    <section class="login_section">
        <div class="row" id="login_row">
            <div class="col-5" id="login_collumn">
                <div class="wrapper">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{Session::get('error')}}</strong>
                        </div>
                    @elseif(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{Session::get('success')}}</strong>
                        </div>
                    @elseif(Session::has('faild'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{Session::get('faild')}}</strong>
                    </div>
                    @endif
                    <div class="text-center mt-4 name">
                        <h3>Admin Login...</h3>
                    </div>
                    <form action="{{route('admin.login')}}" method="post" class="p-3 mt-3" id="login_validation">
                        @csrf
                        <div class="form-field d-flex align-items-center">
                            <span class="far fa-user"></span>
                            <input type="number" value="{{old('admin_id')}}" name="admin_id" class="admin_id"  placeholder="{{ __('Admin Id') }}">
                        </div>
                        <font>{{($errors->has('admin_id'))?($errors->first('admin_id')):''}}</font>
                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-key"></span>
                            <input type="password" name="ad_log_pass" class="ad_log_pass" placeholder="{{ __('Admin Password') }}">
                        </div>
                        <font>{{($errors->has('ad_log_pass'))?($errors->first('ad_log_pass')):''}}</font>
                        <button class="btn mt-3">Admin Login</button>
                    </form>
                    <div class="text-center fs-6">
                        <a class="nav-link" href="{{ route('login') }}">User Login</a>
                        <a class="nav-link" href="{{ route('adminform.register') }}">Admin Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>




     {{-- JQuery js start form here --}}
     <script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
     {{-- propper js start form here --}}
     <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
     {{-- bootstrap min js start form here --}}
     <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
     {{-- Jquery ui cdn start form here --}}

     <script type="text/javascript">
        $(document).ready(function(){
            $(".alert").delay(4000).slideUp(200, function() {
                $(this).alert('close');
            });
        });
        
        </script>
</body>
</html>