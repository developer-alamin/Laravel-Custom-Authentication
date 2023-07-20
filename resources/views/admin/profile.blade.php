@extends('admin.layout.app')
@section('title','Admin | Profile')
@section('content')
<div class="padding">
    <div class="col-md-8">
        <!-- Column -->
        <div class="card">
         <img class="card-img-top" src="{{ $data->admin_img}}" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <div class="pro-img">
                	<img src="{{ $data->admin_img}}" alt="user">
                </div>
                <h3 class="m-b-0">{{ $data->admin_name}}</h3>
                <p>{{ $data->admin_about}}</p> <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Update</a>
                <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">10434</h3><small>Articles</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">434K</h3><small>Followers</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">5454</h3><small>Following</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
</script>
@endsection