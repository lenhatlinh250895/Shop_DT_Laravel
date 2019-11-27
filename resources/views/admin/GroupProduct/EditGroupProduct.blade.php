@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Group Product
                    <small>{{$GroupProduct->Name}}</small>
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
                <form action="admin/GroupProduct/EditGroupProduct/{{$GroupProduct->Id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control" name="ProductType">
                            @foreach($ProductType as $tp)
                                <option
                                    @if($GroupProduct->ProductType_Id == $tp->Id)
                                        {{"selected"}}
                                    @endif
                                value="{{$tp->Id}}">{{$tp->Name}}</option>
                            @endforeach
                        </select>
                        <label>Group Product Name</label>
                        <input class="form-control" name="NewName" placeholder="Please Enter Group Product Name Keywords" value="{{$GroupProduct->Name}}" readonly="" />
                        <label>Group Product Content</label>
                        <textarea class="form-control" name="Content">{{$GroupProduct->Content}}</textarea>
                        <label>Image</label>
                        <img class="row" src="public/Update/GroupProduct/{{$GroupProduct->Image}}" width="200px" id="imageShow" />
                        <input class="form-control" type="file" name="Image" onchange="document.getElementById('imageShow').src = window.URL.createObjectURL(this.files[0])" >
                        <label>Order</label>
                        <input class="form-control" name="Order" value="{{$GroupProduct->Order}}">
                        <label>Status</label>
                        <input class="form-control" name="Status" value="{{$GroupProduct->Status}}">
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