@extends('admin.layout.app')
@section('title', 'Admin | Verifyed')
@section('content')
<div class="usersDiv"><br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Verifyed Users</h3>
                </div>
                <div class="card-body">
                    <table id="verifyDataTable" class="d-none verifyTable table table-hover table-bordered table-striped">
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
                            </tr>
                        </thead>
                        <tbody class="verifyTbody">
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
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () { 
            getVerifyed();
         });

         function getVerifyed() { 
            var url = "{{ route('admin.getverifyed') }}"
            axios.get(url)
            .then(function(responce) {
                if (responce.status == 200) {
                $(".verifyTable").removeClass('d-none');
                $(".DisplayLoader").addClass('d-none');

                $('#verifyDataTable').DataTable().destroy();
                $('.verifyTbody').empty();

                var usersData = responce.data;

                $.each(usersData,function(i) {
                    if (!(usersData[i].users_email_verified_at == null)) {
                        var id = "<td>"+usersData[i].id+"</td>";
                        var name = "<td>"+usersData[i].users_name+"</td>";
                        var father = "<td>"+usersData[i].users_father+"</td>";
                        var mother = "<td>"+usersData[i].users_mother+"</td>";
                        var mobile = "<td>"+usersData[i].users_phone+"</td>";
                        var work = "<td>"+usersData[i].users_work+"</td>";
                        var email = "<td>"+usersData[i].users_email+"</td>";
                        var verify_Email = "<td><p class='verifyed'>Verifyed</p></td>";
                        var img = "<td><img src="+usersData[i].users_img+"></td>";
                        $("<tr>").html(id+name+father+mother+mobile+work+email+verify_Email+img).appendTo('.verifyTbody');
                    } 
                });

                $("#verifyDataTable").DataTable();
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
    </script>
@endsection