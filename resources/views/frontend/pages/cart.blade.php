@extends('frontend.index')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="table-content table-responsive">
                        <table class="table" id="tbl_cart">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($Content as $item)
                                <tr id="{{$item->id}}">
                                    <td class="li-product-remove"><a class="delCart" id="{{$item->id}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img src="public/update/Product/{{$item->attributes->img}}" width="150px" alt="Li's Product Image"></a></td>
                                    <td class="li-product-name"><a href="#">{{$item->name}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($item->price,0,",",".")}}</span></td>
                                    <td class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$item->quantity}}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div></div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($item->price*$item->quantity,0,",",".")}}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="updatecart button" name="update_cart" value="Update cart" id="updatecart" type="button">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>{{number_format($total,0,",",".")}} vnđ</span></li>
                                    <li>Total <span>{{number_format($total,0,",",".")}} vnđ</span></li>
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection