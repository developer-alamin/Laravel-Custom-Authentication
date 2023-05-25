<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Register</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
     <!-- MDB -->
     <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" rel="stylesheet"/>
     {{-- bootstrap min css start form here --}}
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
    <div class="register_section">
        <div class="container">
            <div class="row">
                <div class="col-8 m-auto">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{Session::get('success')}}</strong>
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{Session::get('error')}}</strong>
                        </div>
                    @elseif(Session::has('faild'))
                        <div class="alert alert-danger  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{Session::get('faild')}}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header" id="AdminRegCardHeader">
                            <h2>Admin Registration Form</h2>
                            <img src="{{ asset('img/vector-users-icon.webp') }}" class="onchange" alt="">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.storeRegister') }}" method="POST" enctype="multipart/form-data" id="adminFormId">
                                @csrf
                                <div class="form-row">
                                    <div class="col-4">
                                        <label for="admin_img">Image:</label>
                                        <input type="file" name="admin_img" id="admin_img" class="form-control" placeholder="Admin Name">
                                        <font>{{($errors->has('admin_img'))?($errors->first('admin_img')):''}}</font>
                                    </div>
                                    <div class="col-4">
                                        <label for="admin_name">Name:</label>
                                        <input type="text" name="admin_name" id="admin_name" class="form-control" placeholder="Admin Name">
                                    </div>
                                    <div class="col-4">
                                        <label for="admin_mobile">Mobile:</label>
                                        <input type="number" name="admin_mobile" id="admin_mobile" class="form-control" placeholder="Admin Mobile">
                                        <font>{{($errors->has('admin_mobile'))?($errors->first('admin_mobile')):''}}</font>
                                    </div>
                                </div><br>
                                <div class="form-row">
                                    <div class="col-4">
                                        <label for="admin_id">Admin Id:</label>
                                        <input type="number" name="admin_id" id="admin_id" class="form-control" placeholder="Admin Id">
                                        <font>{{($errors->has('admin_id'))?($errors->first('admin_id')):''}}</font>
                                    </div>
                                    <div class="col-4">
                                        <label for="admin_email">Email:</label>
                                        <input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Admin Eamil">
                                        <font>{{($errors->has('admin_email'))?($errors->first('admin_email')):''}}</font>
                                    </div>
                                    <div class="col-4">
                                        <label for="admin_password">Password:</label>
                                        <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Admin Password">
                                    </div>
                                </div><br>
                                <div class="form-row">
                                    <div class="col-4">
                                        <label for="con_password">Confirm Password:</label>
                                        <input type="password" name="con_password" id="con_password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div><br>
                                <div class="form-row">
                                    <div class="col-12">
                                        <button class="form-control btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
     {{-- jquery validation plugin cdn start form here --}}
    <script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        
        user_validation();

        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });

        $(document).ready(()=>{
            $('#admin_img').change(function(){
                const file = this.files[0];
                if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('.onchange').attr('src',event.target.result);
                }
                reader.readAsDataURL(file);
                }
            });
        });

    });

    function user_validation() {
		$("#adminFormId").validate({
            rules: {
                admin_img:{required:true},
                admin_name:{required:true},
                admin_mobile:{
                	required:true,
                	minlength: 11,
                	maxlength: 11
                },
                admin_id:{
                    required:true,
                    minlength: 8,
                	maxlength: 8
                },
                admin_email:{required: true,email: true},
                admin_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                },
                con_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                    equalTo: "#admin_password"
                }
            },
            messages: {
            	admin_img:"Please Admin Photo",
                admin_name: "Please Admin name",
                admin_mobile:{
                	 required: "Please Phone Number",
                	 minlength: "Please At Least 11 characters",
                	 maxlength:  "Please No More Then 11 characters"
                },
                admin_id:{
                    required:"Please Admin Id",
                    minlength:"Please At Least 8 characters",
                	maxlength:"Please No More Then 8 characters"
                },
                admin_email: {
                    required: "Please enter a Email",
                    email: "This Email Not Valid"
                },
                admin_password: {
                    required: "Please Your password",
                    minlength: "Your password must be 5 characters",
                   maxlength: "Password No More Then 7 characters" 
                },
                con_password: {
                    required: "Please Confirm Password",
                    minlength: "Your password must be 5 characters",
                    maxlength: "Password No More Then 7 characters",
                    equalTo: "Please enter the same password as above"
                }
            }
        });
	}
    
    </script>
</body>
</html>