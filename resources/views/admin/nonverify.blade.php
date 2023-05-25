@extends('admin.layout.app')
@section('title', 'Admin | Non verifyed')
@section('content')
<div class="usersDiv"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Verifyed Users</h3>
                </div>
                <div class="card-body">
                    <table id="nonverifyDataTable" class="d-none nonverifyTable table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Father's</th>
                                <th>Mother's</th>
                                <th>Mobile</th>
                                <th>Work</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Actiom</th>
                            </tr>
                        </thead>
                        <tbody class="nonverifyTbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<span class="DisplayLoader"></span>
<div class="nothingData d-none">
  <img src="{{asset('img/404.avif')}}">
</div>

{{-- modal edit data html code start form here --}}
<div class="modal fade" id="nonuserUpdatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <form id="UpdateForm" class="" method="post"> 
            @csrf <div class="modal-header p-4 bg-light">
            <h6>Non Users Update Data Show..</h6>
            <div class="emailUpdateid">
              <h4></h4>
            </div>
          </div>
          <div class="UpdateShowImg d-none">
            <div class="EditLoaderSpan m-auto"></div>
          </div>
          <input type="hidden" id="updateId" name="updateId">
          <div class="form-row pb-3 pt-3">
            <div class="col-lg-4 m-auto">
              <label for="upemail">Eamil:</label>
              <input type="email" id="upemail" name="upemail" class="form-control">
            </div>
          </div>
          <div class="notfundImgDiv d-none">
            <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="submit" id="updatenonusers" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
{{-- modal edit data html code end form here --}}
@endsection
@section('script')
    <script type="text/javascript">
       $(document).ready(function() {
            nonVerify();
            nonUserUpdate()
        });

    function nonVerify() {
        var url = "{{ route('admin.getnonverifyed') }}";
        axios.get(url)
        .then(function(responce) {
            if (responce.status == 200) {
                $(".nonverifyTable").removeClass('d-none');
                $(".DisplayLoader").addClass('d-none');
                $('#nonverifyDataTable').DataTable().destroy();
                $('.nonverifyTbody').empty();
                var usersData = responce.data;
                $.each(usersData, function(i) {
                    var id = "<td>" + usersData[i].id + "</td>";
                    var name = "<td>" + usersData[i].users_name + "</td>";
                    var father = "<td>" + usersData[i].users_father + "</td>";
                    var mother = "<td>" + usersData[i].users_mother + "</td>";
                    var mobile = "<td>" + usersData[i].users_phone + "</td>";
                    var work = "<td>" + usersData[i].users_work + "</td>";
                    var email = "<td>" + usersData[i].users_email + "</td>";
                    var verify_Email = "<td><p class='nonverifyed'>Non Verifyed</p></td>";
                    var img = "<td><img src=" + usersData[i].users_img + "></td>";
                    var action = "<td><i class='fa fa-edit tdEditIcon' data-edit='" + usersData[i].id + "'></i><i class='fas fa-trash tdDeleteIcon' data-delete='" + usersData[i].id + "'></i></td>";
                    $("<tr>").html(id + name + father + mother + mobile + work + email + verify_Email + img + action).appendTo('.nonverifyTbody');
                });

                $('.tdEditIcon').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('edit');
                    $('#nonuserUpdatemodal').modal('show');
                    $('.emailUpdateid h4').html(id);
                    nonuserEdit(id);
                });

                $('.tdDeleteIcon').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('delete');
                    nonUserDelete(id);
                });

                $("#nonverifyDataTable").DataTable();
                $('.datatablees_length').addClass('bs-select');

            } else {
                $(".nothingData").removeClass('d-none');
                $(".DisplayLoader").addClass('d-none');
            }
        })
        .catch(function(error) {
            $(".nothingData").removeClass('d-none');
            $(".DisplayLoader").addClass('d-none');
        })
    }

function nonUserDelete(id) {
    var url = "{{ route('admin.nonveryfydel') }}";
    var data = {
        id: id
    }
    swal({
        title: "Are you sure?",
        text: "Are You Want To Five Student Data Deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            axios.post(url, data)
                .then(function(response) {
                    swal("Success", "Your Data Deleted Success!", "success");
                    nonVerify();
                })
                .catch(function(error) {
                    swal("Sorry...", "Your Data Not Deleted!", "error");
                    nonVerify();
                })
        }
    });
}

function nonuserEdit(id) {
    var url = "{{ route('admin.nonuserupshow') }}";
    axios.post(url, {
            id: id
        })
        .then(function(response) {
            if (response.status == 200) {
                $('.EditLoaderSpan').addClass('d-none');
                var jsonShowData = response.data;
                $("#updateId").val(jsonShowData[0].id);
                $("#upemail").val(jsonShowData[0].users_email);
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


function nonUserUpdate() {
    $('#UpdateForm').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);

        var addloader = "<span class='sppener'></span>";
        $('#updatenonusers').html(addloader);

        $.ajax({
            url: "{{ route('admin.nonUserUpdate') }}",
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 500) {
                    toastr.error('Your Eamil Already Exits');
                    setTimeout(function() {
                        $('#updatenonusers').html('Update');
                    }, 100);
                } else if (response == 1) {
                    swal("Success!", "Non User Email Update Success..Please Email Check..", "success");
                    $('#nonuserUpdatemodal').modal('hide');
                    nonVerify();
                    setTimeout(function() {
                        $('#updatenonusers').html('Update');
                    }, 100);
                } else {
                    swal("Sorry!", "Your Profile Update Faild", "error");
                    $('#nonuserUpdatemodal').modal('hide');
                    nonVerify();
                    setTimeout(function() {
                        $('#updatenonusers').html('Update');
                    }, 100);
                }

            },
            error: function(error) {
                swal("Sorry!", "Your Profile Update Faild", "error");
                $('#nonuserUpdatemodal').modal('hide');
                nonVerify();
                setTimeout(function() {
                    $('#updatenonusers').html('Update');
                }, 100);
            }
        });

    });
}
</script>
@endsection