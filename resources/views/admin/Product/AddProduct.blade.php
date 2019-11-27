@extends('admin.index')

@section('content')
<!-- Page Content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
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
                <form action="admin/Product/AddProduct" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control" name="ProductType" id="ProductType">
                            @foreach($ProductType as $tp)
                                <option value="{{$tp->Id}}">{{$tp->Name}}</option>
                            @endforeach
                        </select>
                        <label>Group Product</label>
                        <select class="form-control" name="GroupProduct" id="GroupProduct">
                            @foreach($GroupProduct as $gp)
                                @if($gp->ProductType_Id == 1)
                                    <option value="{{$gp->Id}}">{{$gp->Name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>Name</label>
                        <input class="form-control" name="Name" placeholder="Nhập Tên">
                        <label>Detail</label>
                        <textarea class="form-control" name="Detail"></textarea>
                        <label>Price</label>
                        <input class="form-control" name="Price" placeholder="Nhập nội dung">
                        <label>Image</label>
                        <div>
                            <img class="row" width="200px" id="imageShow" />    
                        </div>
                        <input class="form-control" type="file" name="Image" onchange="document.getElementById('imageShow').src = window.URL.createObjectURL(this.files[0])" placeholder="Nhập nội dung">
                        <label>Price New</label>
                        <input class="form-control" name="PriceNew" placeholder="Nhập nội dung">
                        <label>Date</label>
                        <input class="form-control" name="Date" placeholder="Nhập nội dung" value="{{$date}}">
                        <label>Order</label>
                        <input class="form-control" name="Order" placeholder="Nhập nội dung">
                        <label>Status</label>
                        <input class="form-control" name="Status" placeholder="Nhập nội dung">
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
            $('#ProductType').change(function(){
                var ProductType_Id = $(this).val();
                $.get('admin/ajax/GroupProduct/'+ProductType_Id,function(data){
                    $('#GroupProduct').html(data);
                });
            });
        });
    </script>
@endsection