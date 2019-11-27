@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Type
                    <small>{{$ProductType->Name}}</small>
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
                <form action="admin/ProductType/EditProductType/{{$ProductType->Id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Product Type Name</label>
                        <input class="form-control" name="NewName" placeholder="Please Enter Group Product Name Keywords" value="{{$ProductType->Name}}" readonly="" />
                        <label>Product Type Content</label>
                        <textarea class="form-control" name="Content">{{$ProductType->Content}}</textarea>
                        <label>Image</label>
                        <img class="row" src="public/Update/ProductType/{{$ProductType->Image}}" width="200px" id="imageShow" />
                        <input class="form-control" type="file" name="Image" onchange="document.getElementById('imageShow').src = window.URL.createObjectURL(this.files[0])" >
                        <label>Order</label>
                        <input class="form-control" name="Order" value="{{$ProductType->Order}}">
                        <label>Status</label>
                        <input class="form-control" name="Status" value="{{$ProductType->Status}}">
                    </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection