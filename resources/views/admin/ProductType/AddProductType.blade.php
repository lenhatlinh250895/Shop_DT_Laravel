@extends('admin.index')

@section('content')
<!-- Page Content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Type
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
                <form action="admin/ProductType/AddProductType" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="Name" placeholder="Nhập Tên">
                        <label>Content</label>
                        <textarea class="form-control" name="Content"></textarea>
                        <label>Image</label>
                        <div>
                            <img class="row" width="200px" id="imageShow" />    
                        </div>
                        <input class="form-control" type="file" name="Image" onchange="document.getElementById('imageShow').src = window.URL.createObjectURL(this.files[0])" >
                        <label>Order</label>
                        <input class="form-control" name="Order">
                        <label>Status</label>
                        <input class="form-control" name="Status">
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