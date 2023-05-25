@if(Session::has('faild'))
    <div class="alert alert-danger  alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('faild')}}</strong>
    </div>
@endif

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->users_name}}</title>
    <link rel="icon " href="{{$data->users_img}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" rel="stylesheet" />
    {{-- bootstrap min css start form here --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/loader.css')}}">
  </head>
  <body>
    <section class="profile_Section">
      <div class="container">
        <div class="row mt-3">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="{{$data->users_img}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">{{$data->users_name}}</h5>
                <p class="text-muted mb-1">{{$data->users_work}}</p>
                <div class="d-flex justify-content-center mb-2">
                  <button type="button" data-edit="{{$data->id}}" id="UpdateShow" class="btn btn-primary">Update</button>
                  <a href="{{route('logout')}}" type="button" class="btn btn-outline-primary ms-1"><i class="fas fa-sign-out-alt"></i></a>
                </div>
              </div>
            </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$data->users_name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Father's Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$data->users_father}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Mother's Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$data->users_mother}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$data->users_email}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$data->users_phone}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Date</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$data->date}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>


  {{-- profile update modal html code start form here --}}
  <div class="modal fade" id="profileUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Users Profile Update Data Show..</h6>
        <div class="profileEditDiv">
          <h4></h4>
        </div>
      </div>
      <div class="UpdateShowImg">
         <div class="EditLoaderSpan m-auto"></div>
         <img src="{{asset('img/vector-users-icon.webp')}}" class="updatePreview">
      </div> 
      <form id="UpdateForm" class="" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <input type="hidden" id="updateId" name="updateId">
            <input type="hidden" name="preImg" id="preImg">
          <div class="form-row">
            <div class="col-lg-4">
              <label for="upimg">Image:</label>
              <input type="file" id="upimg" accept="image/*" name="upimg" class="form-control">
            </div>
            <div class="col-lg-4">
              <label for="upname">Name:</label>
              <input type="text" id="upname" name="upname" class="form-control">
            </div>
            <div class="col-4">
                <label for="upfname">Father's Name:</label>
                <input type="text" name="upfname" id="upfname" class="form-control">
            </div>
        </div>
        <br>
        <div class="form-row">
          <div class="col-lg-4">
            <label for="upmother">Mother:</label>
            <input type="text" id="upmother" name="upmother" class="form-control">
          </div>
          <div class="col-4">
              <label for="upphone">Phone:</label>
              <input type="number" name="upphone" id="upphone" class="form-control">
          </div>
          <div class="col-lg-4">
            <label for="upwork">Work:</label>
            <input type="text" id="upwork" name="upwork" class="form-control">
          </div>
      </div>
      <br>
        <div class="notfundImgDiv d-none">
          <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="updateusers" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
  {{-- profile update modal html code end form here --}}


    {{-- JQuery js start form here --}}
    <script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
    {{-- propper js start form here --}}
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    {{-- bootstrap min js start form here --}}
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    {{-- Jquery ui cdn start form here --}}
    {{-- axios.min.js start form here --}}
    <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
     <!-- MDB -->
     <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
     {{-- Sweet Alert cdn add start form here --}}
     <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });

        $("#UpdateShow").click(function() {
         var id =  $(this).data('edit');
         $('.profileEditDiv h4').html(id);
         $("#profileUpdateModal").modal('show');
         updateShow(id);
        });

        $(document).ready(()=>{
            $('#upimg').change(function(){
                const file = this.files[0];
                if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('.updatePreview').attr('src',event.target.result);
                }
                reader.readAsDataURL(file);
                }
            });
        });


        user_Update();
        
      });
      function updateShow(id) {
        var url = '/users/updateShow';
        var data = {id:id}
        axios.post(url, data)
          .then(function(response) {
            if (response.status == 200) {
              $('.EditLoaderSpan').addClass('d-none');
              var jsonShowData = response.data;

              $("#updateId").val(jsonShowData[0].id)
              $('#upname').val(jsonShowData[0].users_name);
              $("#upfname").val(jsonShowData[0].users_father)
              $('#upmother').val(jsonShowData[0].users_mother);
              $("#upemail").val(jsonShowData[0].users_email)
              $('#upphone').val(jsonShowData[0].users_phone);
              $("#upwork").val(jsonShowData[0].users_work)
              $('#preImg').val(jsonShowData[0].users_img);
              $('.updatePreview').attr('src',jsonShowData[0].users_img);


            } else {
              $('.notfundImgDiv').removeClass('d-none');
              $('.EditLoaderSpan').addClass('d-none');
            }

          })
          .catch(function(error) {
            $('.notfundImgDiv').removeClass('d-none');
            $('.EditLoaderSpan').addClass('d-none');
          })
      
      }

      function user_Update() {
        $('#UpdateForm').submit(function(e){
          e.preventDefault();
          var data = new FormData(this);

          var addloader = "<span class='sppener'></span>";
          $('#updateusers').html(addloader);

          $.ajax({
            url: '/users/update',
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              swal("Success!", "Your Profile Update Successfully", "success");
              location.reload();
              $("#profileUpdateModal").modal('hide');
            },
            error: function(error) {
              swal("Sorry!", "Your Profile Update Faild", "error");
              location.reload();
              $("#profileUpdateModal").modal('hide');
            }
          });
        });
      }
      
    </script>
  </body>
</html>