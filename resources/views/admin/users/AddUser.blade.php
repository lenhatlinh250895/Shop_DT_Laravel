@extends('admin.index')

@section('content')
<!-- Page Content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="admin/users/AddUser" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="Name" placeholder="Nhập Tên">
                        <label>PassWord</label>
                        <input type="password" class="form-control" name="PassWord"></input>
                        <label>PassWordAgain</label>
                        <input type="password" class="form-control" name="PassWordAgain" placeholder="Nhập nội dung">
                        <label>Email</label>
                        <input class="form-control" name="Email" placeholder="Nhập nội dung">
                        <label>Level</label>
                        <input class="form-control" name="Level" placeholder="Nhập nội dung">
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection