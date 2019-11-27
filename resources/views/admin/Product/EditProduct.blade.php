@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>{{$Product->Name}}</small>
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
                <form action="admin/Product/EditProduct/{{$Product->Id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" name="Name" placeholder="Please Enter Group Product Name Keywords" value="{{$Product->Name}}" readonly="" />
                        <label>Product Detail</label>
                        <textarea class="form-control" name="Detail">{{$Product->Detail}}</textarea>
                        <label>Product Price</label>
                        <input class="form-control" name="Price" placeholder="Please Enter Group Product Content Keywords" value="{{$Product->Price}}" />
                        <label>Product Image</label>
                        <div>
                            <img class="row" src="public/Update/Product/{{$Product->Image}}" width="200px" id="imageShow" />    
                        </div>
                        <input class="form-control" type="file" name="Image" id="Image" onchange="document.getElementById('imageShow').src = window.URL.createObjectURL(this.files[0])" />
                        <label>Product PriceNew</label>
                        <input class="form-control" name="PriceNew" placeholder="Please Enter Group Product Content Keywords" value="{{$Product->PriceNew}}" />
                        <label>Product Date</label>
                        <input class="form-control" name="Date" placeholder="Please Enter Group Product Content Keywords" value="{{$Product->Date}}" />
                        <label>Product Order</label>
                        <input class="form-control" name="Order" placeholder="Please Enter Group Product Content Keywords" value="{{$Product->Order}}" />
                        <label>Product Status</label>
                        <input class="form-control" name="Status" placeholder="Please Enter Group Product Content Keywords" value="{{$Product->Status}}" />
                        <label>Product Type</label>
                        <select class="form-control" name="ProductType" id="ProductType">
                            @foreach($ProductType as $pt)
                                <option
                                    @if($a->Id == $pt->Id)
                                        {{"selected"}}
                                    @endif
                                value="{{$pt->Id}}">{{$pt->Name}}</option>
                            @endforeach
                        </select>
                        <label>Group Product</label>
                        <select class="form-control" name="GroupProduct" id="GroupProduct">
                            @foreach($GroupProduct as $gp)
                                @if($a->Id == $gp->ProductType_Id)
                                <option
                                    @if($Product->GroupProduct_Id == $gp->Id)
                                        {{"selected"}}
                                    @endif
                                value="{{$gp->Id}}">{{$gp->Name}}</option>
                                @endif
                            @endforeach
                        </select>
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
@section('script')
    <script>
        $(document).ready(function() {
            $('#ProductType').change(function() {
                var ProductType_Id = $(this).val();
                $.get('admin/ajax/GroupProduct/'+ProductType_Id,function(data){
                    $('#GroupProduct').html(data);
                });
            });           
        });
    </script>
@endsection