@include('backend.v2.header')
<?php $shop = ShopifyApp::shop();  ?>
@include('backend.v2.preloader')
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('backend.v2.layouts.app-header')
    <link rel="stylesheet" href="css/style.css" id="style">
    <div class="app-main">
        @include('backend.v2.layouts.app-sidebar')
        <div class="app-main__outer">
            <div class="ndnapps-wrapper">
                <div class="bgr" style="display: none;"></div>
                <div class="save-loading" style="display: none;">
                    <img src="https://www.ndnapps.com/ndnapps/dev/contact-form/images/backend/ajax-spinner.gif">
                </div>
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fa fa-bell icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div class="main-card card">
                                    <div class="card-body">
                                        @if(session()->has('message'))
                                            <div class="text-success">
                                                <span style="font-size: 14px;">{{ session()->get('message') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card ">
                                <div class="card-header">Cart Animation</div>
                                <div class="card-body table-responsive col-md-11" style="margin: auto">
                                    <form role="form" id="cart-form" action="{{route('add_cartAnimation')}}" method="GET" enctype="multipart/form-data">
                                        <input type = "hidden" name = "_ token" value = "{{Session :: token ()}}">
                                        {{ csrf_field() }}
                                        <div class="row" style="margin-bottom: 32px">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <div class="panel-body">
                                                        <div class="position-center">
                                                            <form role="form" action="{{route('add_cartAnimation')}}" method="post" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="col-lg-12 row form-group">
                                                                    <div class="col-lg-8">
                                                                        <div class="status row form-group" style="padding-bottom: 16px" >
                                                                            <div class="cart-left col-lg-6">
                                                                                <p><b>Enable Apps</b></p>
                                                                                <div class="text">
                                                                                    Enabling this will add animation to buttons on products pages.
                                                                                </div>
                                                                            </div>
                                                                            <div class="cart-right col-lg-6" style="padding-left: 0px">
                                                                                <div>
                                                                                    <div class="col-sm-9">
                                                                                        <p><b>Enable/Disable</b></p>
                                                                                        <label class="switch checkbox" data-toggle="tooltip"
                                                                                               data-placement="right"
                                                                                               title="" data-original-title="Click to Enable/Disable">
                                                                                            <input type="checkbox"@if($cart->status == 1) checked  @endif data-toggle="toggle" data-onstyle="success"
                                                                                                   name="status">
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" select row form-group " style="padding-bottom: 16px">
                                                                            <div class="cart-left col-lg-6">
                                                                                <p><b>Select Animation</b></p>
                                                                                <div class="text">
                                                                                    The selection of animation will apply on "Add To Cart" button on product pages.
                                                                                </div>
                                                                            </div>
                                                                            <div class="cart-right col-lg-6"  >
                                                                                <div class="col-sm-12" style="padding: 0">
                                                                                    <div class="select_left form-group" >
                                                                                        <p><b>Select Animation</b></p>
                                                                                        <select class="form-control " name="name" id="mySelect">
                                                                                            <option @if($cart->name == 1)selected="selected" @endif value="1" >Snake Border Button</option>
                                                                                            <option @if($cart->name == 2)selected="selected" @endif value="2">Animated Button</option>
                                                                                            <option @if($cart->name == 3)selected="selected" @endif value="3">Bubble Corlor Button</option>
                                                                                            <option @if($cart->name == 4)selected="selected" @endif value="4">Border Button Effect</option>
                                                                                            <option @if($cart->name == 5)selected="selected" @endif value="5">Button Chance Squires</option>
                                                                                            <option @if($cart->name == 6)selected="selected" @endif value="6">Button Load Add To Cart</option>
                                                                                            <option @if($cart->name == 7)selected="selected" @endif value="7">Border Button Effect</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" select row form-group ">
                                                                            <div class="cart-left col-lg-12 ">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Text</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input class="form-control" type="text"
                                                                                               class="form-check-input"
                                                                                               name="text"
                                                                                               id="inputtext"
                                                                                               value="{{$cart->text}}" style="width: 100%">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" select row form-group ">
                                                                            <div class="cart-left col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-5 col-form-label">Font
                                                                                        Family</label>
                                                                                    <div class="col-sm-7">
                                                                                        <select name="font_family" class="form-control"
                                                                                                id="exampleFormControlSelect1" >
                                                                                            <option @if($cart->font_family == 0)selected="selected"@endif style="font-family: Arapey,serif; " value="0">
                                                                                                Arapey,serif
                                                                                            </option>
                                                                                            <option @if($cart->font_family == 1)selected="selected"@endif style="font-family: sans-serif, Arial; " value="1">
                                                                                                sans-serif, Arial
                                                                                            </option>
                                                                                            <option @if($cart->font_family == 2)selected="selected"@endif style="font-family: Consolas, Menlo;" value="2">
                                                                                                Consolas, Menlo
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cart-right col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-5 col-form-label">Font
                                                                                        Size</label>
                                                                                    <div class="col-sm-7">
                                                                                        <input class="form-control" min="1" type="number"
                                                                                               class="form-check-input"
                                                                                               name="font_size"
                                                                                               id="font_size"
                                                                                               value="{{$cart->font_size}}" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="select row form-group ">
                                                                            <div class="cart-left col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-5 col-form-label">Color
                                                                                        Title</label>
                                                                                    <div class="col-sm-7">
                                                                                        <input value="{{$cart->color_title}}" data-jscolor="{}"
                                                                                               class="form-control"
                                                                                               class="form-check-input"
                                                                                               name="color_title"
                                                                                               id="color_title">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cart-right col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-5 col-form-label">Color
                                                                                        Title Hover</label>
                                                                                    <div class="col-sm-7">
                                                                                        <input value="{{$cart->color_title_hover}}" data-jscolor="{}"
                                                                                               class="form-control"
                                                                                               class="form-check-input"
                                                                                               name="color_title_hover"
                                                                                               id="color_title_hover">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" select row form-group ">
                                                                            <div class="cart-left col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-5 col-form-label">
                                                                                        Background Title</label>
                                                                                    <div class="col-sm-7">
                                                                                        <input value="{{$cart->background_title}}" data-jscolor="{}"
                                                                                               class="form-control"
                                                                                               class="form-check-input"
                                                                                               name="background_title"
                                                                                               id="background_title">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cart-right col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-5 col-form-label">
                                                                                        Background Title Hover</label>
                                                                                    <div class="col-sm-7">
                                                                                        <input value="{{$cart->background_title_hover}}" data-jscolor="{}"
                                                                                               class="form-control"
                                                                                               class="form-check-input"
                                                                                               name="background_title_hover"
                                                                                               id="background_title_hover">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 form-group" style="margin-top: 20%">
                                                                        <p style="font-size: 20px"><b>Preview</b></p>
                                                                        <div class="add-cartttt">
                                                                            <button type="submit" class="btn btn-info add-cart-animation small-12" id="button-text">
                                                                                <span></span>
                                                                                <span></span>
                                                                                <span></span>
                                                                                <span></span>
                                                                                <b>Add To Cart</b>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" name="submit" class="btn btn-info" style="padding: 8px, 16px; font-size: 20px">
                                                                    <i class="fa fa-plus-circle" style="margin-right: 4px"></i> Save
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('backend.v2.other-apps')
                </div>
                @include('backend.v2.layouts.footer-wrapper')
            </div>
        </div>
    </div>
</div>

<div class="ndn-message">

</div>
<script>
    function textthaydoi() {
        $value = $( this ).val();
        $( "#button-text b" ).text( $value );
    }
    //Bắt sự kiện keyup của textbox
    $( "#inputtext" ).keyup(textthaydoi);
    //Cho #inputext phát sinh một sự kiện keyup ban đầu
    $( "#inputtext" ).keyup();

    $("#mySelect").change(function() {
        $cart = document.getElementById("mySelect").value;
        if ($cart == 1) {
            $("link[id='style']").attr('href', 'css/style1.css');
        }
        else if ($cart == 2) {
            $("link[id='style']").attr('href', 'css/style2.css');
        }
        else if($cart == 3) {
            $("link[id='style']").attr('href', 'css/style3.css');
        }
        else if($cart == 4) {
            $("link[id='style']").attr('href', 'css/style4.css');
        }
        else if($cart == 5) {
            $("link[id='style']").attr('href', 'css/style5.css');
        }
        else if($cart == 6) {
            $("link[id='style']").attr('href', 'css/style6.css');
        }
        else if($cart == 7) {
            $("link[id='style']").attr('href', 'css/style7.css');
        }
        else {
            $("link[id='style']").attr('href', 'css/style0.css');
        }
    });

    $("#mySelect").each(function() {
        $font_family = "";
        $color_title = document.getElementById("color_title").value;
        $background_title = document.getElementById("background_title").value;
        $font = document.getElementById("exampleFormControlSelect1").value;
        $font_size = document.getElementById("font_size").value;
        $background_title_hover= document.getElementById("background_title_hover").value;
        $color_title_hover= document.getElementById("color_title_hover").value;
        if ($font == 0) {
            $font_family = 'Arapey, serif';
        } else if ($font == 1) {
            $font_family = 'sans-serif, Arial';
        } else {
            $font_family = 'Consolas, Menlo';
        }
        setInterval(function() {
            var $sample = $(".add-cart-animation");
            if ($sample.is(":hover")) {
                $sample.css({
                    'color': $color_title_hover,
                    'background': $background_title_hover
                });
            } else {
                $sample.css({
                    'color': $color_title,
                    'background': $background_title,
                    'font-family': $font_family,
                    'font-size': $font_size+'px',
                });
            }
        }, 200);
        // console.log($color_title);
        $cart = $('#mySelect option:selected').val();{
            if ($cart == 1) {
                $("link[id='style']").attr('href', 'css/style1.css');
            }
            else if ($cart == 2) {
                $("link[id='style']").attr('href', 'css/style2.css');
            }
            else if($cart == 3) {
                $("link[id='style']").attr('href', 'css/style3.css');
            }
            else if($cart == 4) {
                $("link[id='style']").attr('href', 'css/style4.css');
            }
            else if($cart == 5) {
                $("link[id='style']").attr('href', 'css/style5.css');
            }
            else if($cart == 6) {
                $("link[id='style']").attr('href', 'css/style6.css');
            }
            else if($cart == 7) {
                $("link[id='style']").attr('href', 'css/style7.css');
            }
            else {
                $("link[id='style']").attr('href', 'css/style0.css');
            }
        }

    });
    $(document).change(function() {
        $font_family = "";
        $color_title = document.getElementById("color_title").value;
        $background_title = document.getElementById("background_title").value;
        $font = document.getElementById("exampleFormControlSelect1").value;
        $font_size = document.getElementById("font_size").value;
        $background_title_hover= document.getElementById("background_title_hover").value;
        $color_title_hover= document.getElementById("color_title_hover").value;

        if ($font == 0) {
            $font_family = 'Arapey, serif';
        } else if ($font == 1) {
            $font_family = 'sans-serif, Arial';
        } else {
            $font_family = 'Consolas, Menlo';
        }
        setInterval(function() {
            var $sample = $(".add-cart-animation");
            if ($sample.is(":hover")) {
                $sample.css({
                    'color': $color_title_hover,
                    'background': $background_title_hover
                });
            } else {
                $sample.css({
                    'color': $color_title,
                    'background': $background_title,
                    'font-family': $font_family,
                    'font-size': $font_size+'px',
                });
            }
        }, 200);
    });
</script>
@include('backend.v2.footer')


