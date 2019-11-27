<!-- Begin Header Bottom Area -->
<div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Header Bottom Menu Area -->
                <div class="hb-menu">
                    <nav>
                        <ul style="font-family: Arial">
                            @foreach($ProductType as $pt)
                            <li class="megamenu-holder"><a href="{{url('shop')}}/{{$pt->Id}}">{{$pt->Name}}</a>
                                <ul class="megamenu hb-megamenu">
                                    <li><a href="{{url('shop')}}/{{$pt->Id}}">{{$pt->Name}}</a>
                                        @foreach($GroupProduct as $gp)
                                            @if($gp->ProductType_Id == $pt->Id)
                                            <ul>
                                                <li><a href="{{url('shopProduct')}}/{{$gp->Id}}">{{$gp->Name}}</a></li>
                                            </ul>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <!-- Header Bottom Menu Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Header Bottom Area End Here -->