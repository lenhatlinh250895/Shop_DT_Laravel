@extends('admin.index')

@section('content')
<!-- Page Content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users
                    <small>{{$users->name}}</small>
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
                <form action="admin/users/EditUser/{{$users->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="Name" placeholder="Nhập Tên" value="{{$users->name}}">
                        <input type="checkbox" name="ChangePassWord" id="ChangePassWord">
                        <label>Change PassWord</label>
                        <input type="password" class="form-control password" name="PassWord" value="{{$users->password}}" disabled="">
                        <label>PassWordAgain</label>
                        <input type="password" class="form-control password" name="PassWordAgain" value="{{$users->password}}" placeholder="Nhập nội dung" disabled="">
                        <label>Email</label>
                        <input class="form-control" name="Email" placeholder="Nhập nội dung" value="{{$users->email}}" readonly="">
                        <label>Level</label>
                        <input class="form-control" name="Level" placeholder="Nhập nội dung" value="{{$users->Level}}">
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#ChangePassWord").change(function(){
                if($(this).is(":checked"))
                    $('.password').removeAttr('disabled');
                else
                    $('.password').attr('disabled', '');
            });
        });
    </script>
@endsection