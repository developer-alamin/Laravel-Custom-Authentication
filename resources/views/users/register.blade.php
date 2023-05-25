<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uaers Register Page...</title>
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" rel="stylesheet"/>
    {{-- bootstrap min css start form here --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/users.css')}}">
</head>
<body id="registerBody">
    <div class="userRegisterDiv">
        <div class="row registerRow">
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
                <div class="card" id="registerCard">
                    <div class="card-header" id="UserRegCardHeader">
                        <h3>Users Registration....</h3>
                        <img src="{{asset('img/vector-users-icon.webp')}}" id="RegpreViewImg" alt="">
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{Route('user.storeRegister')}}" id="users_form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body ">
                                <div class="form-row">
                                  <div class="col-4">
                                    <label for="users_img">Image:</label>
                                    <input type="file" id="users_img" name="image" class="form-control image">
                                    <font>{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                  </div>
                                  <div class="col-4">
                                    <label for="users_name">Name:</label>
                                    <input type="text" name="users_name" class="form-control" placeholder="Enter Your Name..">
                                  </div>
                                  <div class="col-4">
                                      <label for="user_father">Father's Name:</label>
                                      <input type="text" name="users_father" class="form-control users_father" placeholder="Enter Father Name..">
                                  </div>
                              </div><br>
                              <div class="form-row">
                                <div class="col-4">
                                    <label for="users_work">Work:</label>
                                      <input type="text" name="users_work" class="form-control users_work" placeholder="Enter Work..">
                                      
                                </div>
                                <div class="col-4">
                                    <label for="users_mother">Mother's Name:</label>
                                    <input type="text" name="users_mother" class="form-control users_mother" placeholder="Enter Mother Name..">
                                </div>
                                <div class="col-4">
                                    <label for="users_phone">Phone:</label>
                                      <input type="number" name="users_phone" class="form-control users_phone" placeholder="Enter Mobile Number..">
                                      <font>{{($errors->has('users_phone'))?($errors->first('users_phone')):''}}</font>
                                </div>
                              </div>
                              <br>
                              <div class="form-row">
                                <div class="col-4">
                                    <label for="users_email">Email:</label>
                                      <input type="email" name="users_email" class="form-control users_email" placeholder="Enter Email..">
                                      <font>{{($errors->has('users_email'))?($errors->first('users_email')):''}}</font>
                                </div>
                                <div class="col-4">
                                    <label for="users_pass">Password:</label>
                                    <input type="password" id="users_pass" name="users_pass" class="form-control users_pass" placeholder="Enter Password..">
                                </div>
                                <div class="col-4">
                                    <label for="con_pass">Confirm Password:</label>
                                    <input type="password" name="con_pass" class="form-control con_pass" placeholder="Enter Confirm Password..">
                                </div>
                              </div><br>
                              <div class="form-row">
                                <div class="col-12 registerCol" >
                                    <button type="submit" class="form-control btn">Submit</button>
                                   <a href="{{Route('login')}}">already have an account sign in</a>
                                </div>
                              </div>
                        </form>
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
    {{-- Jquery ui cdn start form here --}}
    <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
    {{-- jquery validation plugin cdn start form here --}}
    <script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
    <script type="text/javascript">
    const userinputImg = document.querySelector("#users_img");
    userinputImg.onchange = evt => {
        const [file] = userinputImg.files
        if (file) {
            const imgpreview = document.querySelector("#RegpreViewImg");
            imgpreview.src = URL.createObjectURL(file)
        }
    }

    $(document).ready(function(){
        user_validation();

        $( ".date" ).datepicker({
	      altField: ".date",
	      altFormat: "DD, d MM, yy",
          showAnim :'clip'
	    });

        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    })

    function user_validation() {
		$("#users_form").validate({
            rules: {
                image:{required:true},
                users_name:{required:true},
	            users_father:{required:true},
	            users_mother:{required:true},
                users_phone:{
                	required:true,
                	minlength: 11,
                	maxlength: 11
                	
                },
                users_work:{required:true},
                users_email:{required: true,email: true},
                users_pass: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                },
                con_pass: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                    equalTo: "#users_pass"
                }
            },
            messages: {
            	image:"Please Student Photo",
                users_name: "Please Users name",
                users_father: "Users Father Name",
                users_mother: "Users Mother Name",
                users_phone:{
                	 required: "Please Phone Number",
                	 minlength: "Please At Least 11 characters",
                	 maxlength:  "Please No More Then 11 characters"
                },
                users_work:"Please Your Work Name..",
                users_email: {
                    required: "Please enter a Email",
                    email: "This Email Not Valid"
                },
                users_pass: {
                    required: "Please Your password",
                    minlength: "Your password must be 5 characters",
                   maxlength: "Password No More Then 7 characters" 
                },
                con_pass: {
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