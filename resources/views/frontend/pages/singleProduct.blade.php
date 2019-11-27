@extends('frontend.index')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index">Home</a></li>
                <li class="active"><a href="shop/{{$ProductTypeFind->Id}}">{{$ProductTypeFind->Name}}</a></li>
                <li class="active"><a href="shopProduct/{{$GroupProductFind->Id}}">{{$GroupProductFind->Name}}</a></li>
                <li class="active">{{$ProductFind->Name}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
               <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1 slick-initialized slick-slider">
                        <div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 2896px; transform: translate3d(-362px, 0px, 0px);" role="listbox"><div class="lg-image slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 362px;">
                            <img src="public/images/product/large-size/6.jpg" alt="product image">
                        </div><div class="lg-image slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 362px; margin-top: 50px">
                            <img src="public/update/Product/{{$ProductFind->Image}}" alt="product image">
                        </div></div></div>                                                                                              
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content sp-affiliate-content pt-60">
                    <div class="product-info">
                        <h2>{{$ProductFind->Name}}</h2>
                        <span class="product-details-ref"><a href="shopProduct/{{$GroupProductFind->Id}}">{{$GroupProductFind->Name}}</a></span>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="review-item"><a href="#">Read Review</a></li>
                                <li class="review-item"><a href="#">Write Review</a></li>
                            </ul>
                        </div>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">{{number_format($ProductFind->Price,0,",",".")}} Vnđ</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>{{$ProductFind->Detail}}
                                </span>
                            </p>
                        </div>
                        <div class="single-add-to-cart">
                            <form action="shopping/{{$ProductFind->Id}}" method="post" class="cart-quantity" enctype="multipart/form-data">
                            	<input type="hidden" name="_token" value="{{csrf_token()}}" >
                            	<input type="hidden" name="id" value="{{$ProductFind->Id}}">
                                <button class="add-to-cart" type="submit">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection