@extends('layouts.template')


@section('jquery')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#priceInquireInput").click(function() {
            if($("#priceInquireInput").is(':checked'))
            {
                $('#priceInput').hide();
                $('#priceInput').val('');
                $('#priceUnitSelect').hide();
            }   
            else
            {
                $('#priceInput').show();
                $('#priceUnitSelect').show();
            }
                
        });

        $("#daysInquireCheckbox").click(function() {
            if($("#daysInquireCheckbox").is(':checked'))
            {
                $('#daysInquireInput').hide();
                $('#daysInquireInput').val('');
                $('#daysInquireSelect').hide();
            }   
            else
            {
                $('#daysInquireInput').show();
                $('#daysInquireSelect').show();
            }
                
        });

        function readICON(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#icon_input").change(function() {
            readICON(this, '#icon_url');
        });

        $("#image_1_input").change(function() {
            readICON(this, '#image_1_url');
        });

        $("#image_2_input").change(function() {
            readICON(this, '#image_2_url');
        });

        $("#image_3_input").change(function() {
            readICON(this, '#image_3_url');
        });

        $("#image_4_input").change(function() {
            readICON(this, '#image_4_url');
        });

        $("#image_5_input").change(function() {
            readICON(this, '#image_5_url');
        });

        $("#image_6_input").change(function() {
            readICON(this, '#image_6_url');
        });

        $("#image_7_input").change(function() {
            readICON(this, '#image_7_url');
        });

        $("#image_8_input").change(function() {
            readICON(this, '#image_8_url');
        });

        $("#image_9_input").change(function() {
            readICON(this, '#image_9_url');
        });

        $("#image_10_input").change(function() {
            readICON(this, '#image_10_url');
        });

        $("#image_11_input").change(function() {
            readICON(this, '#image_11_url');
        });
    });
</script>

<style>

</style>

@endsection

@section('contents')

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">{{ trans('index.home') }}</a></li>
            <li><a href="/home">アカウント</a></li>
            <li><a href="/enterprise/products?enterprise_id={{ $product->enterprise_id }}">{{ trans('product.product_list') }}</a></li>
            <li class="active">{{ trans('product.product_information_update') }}</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <form id="product-form" class="clearfix" method="POST" action="/product/update" enctype="multipart/form-data">
        {{ csrf_field() }}    
            <!-- row -->
            <div class="row">
                <input name="enterprise_id" value="{{ $product->enterprise_id }} " style="display:none" />
                <input name="product_id" value="{{ $product->id }} " style="display:none" />
                <div class="col-md-6">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 class="title">{{ trans('product.product_basic_information') }}</h5>
                        </div>
   
                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">*{{ trans('product.product_name') }}:</div>
                            <div class="col-md-9"><input class="input" type="text" name="name" value="{{ $product->name }}" required="required"></div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">*{{ trans('product.category') }}:</div>
                            <div class="col-md-9">
                                <select class="input" name="category">
                                    @foreach($categories as $c)
                                    <option value="{{ $c }}">{{ $c }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">*{{ trans('product.unit_price') }}:</div>
                            @if(is_null($product->price))
                            <div class="col-md-3"><p style="margin-top:10px;margin-right:-10px"><input type="checkbox" value="" id="priceInquireInput" checked>{{ trans('index.short_inquiry') }}</p></div>
                            <div class="col-md-3" ><input class="input" type="number" name="price" placeholder="" id="priceInput" style="display:none"></div>
                            <div class="col-md-3">
                                <select class="input" name="price_unit" id="priceUnitSelect" style="display:none">
                                    @foreach($price_unit as $pn)
                                    <option value="{{ $pn }}">{{ $pn }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @else
                            <div class="col-md-3"><p style="margin-top:10px;margin-right:-10px"><input type="checkbox" value="" id="priceInquireInput">{{ trans('index.short_inquiry') }}</p></div>
                            <div class="col-md-3"><input class="input"  type="number" name="price" id="priceInput" value="{{ explode(',',$product->price)[0] }}"></div>
                            <div class="col-md-3">
                                <select class="input" name="price_unit"  id="priceUnitSelect">
                                    <option value="{{ explode(',',$product->price)[1] }}">{{ explode(",",$product->price)[1] }}</option>
                                    @foreach($price_unit as $pn)
                                    <option value="{{ $pn }}">{{ $pn }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">*{{ trans('product.minimum_order_quantity') }}:</div>
                            <div class="col-md-9"><input class="input"  type="number" name="minimum_order_quantity" value="{{ $product->minimum_order_quantity }}" required="required"></div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">*{{ trans('product.deadline') }}:</div>
                            @if(is_null($product->minimum_build_days))
                            <div class="col-md-3"><p style="margin-top:10px;margin-right:-10px"><input type="checkbox" value="" id="daysInquireCheckbox" checked>お{{ trans('index.inquiry') }}</p></div>
                            <div class="col-md-3"><input class="input"  type="number" name="minimum_build_days" id="daysInquireInput" style="display:none"></div>
                            <div class="col-md-3">
                                <select class="input" name="order_interval" id="daysInquireSelect" style="display:none">
                                    @foreach($order_interval as $oi)
                                    <option value="{{ $oi }}">{{ $oi }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            @else
                            <div class="col-md-3"><p style="margin-top:10px;margin-right:-10px"><input type="checkbox" value="" id="daysInquireCheckbox">{{ trans('index.short_inquiry') }}</p></div>
                            <div class="col-md-3"><input class="input"  type="number" name="minimum_build_days" id="daysInquireInput" value="{{explode(',',$product->minimum_build_days)[0] }}" ></div>
                            <div class="col-md-3">
                                <select class="input" name="order_interval" id="daysInquireSelect">
                                    <option value="{{ explode(',',$product->minimum_build_days)[1] }}">{{ explode(",",$product->minimum_build_days)[1] }}</option>
                                    @foreach($order_interval as $oi)
                                    <option value="{{ $oi }}">{{ $oi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">*{{ trans('product.built_at') }}:</div>
                            
                            <div class="col-md-9"><input class="input" type="text" name="build_at" value="{{ $product->build_at }}" required="required"></div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>
               </div>
                </div>
                <div class="col-md-6">
                    <div class="billing-details">
                        <div class="section-title">
                            <h5 class="title"> &nbsp&nbsp </h5>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">3D URL:</div>
                            <div class="col-md-9"><input class="input" type="text" name="three_d_url" value="{{ $product->three_d_url }}"></div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">{{ trans('product.video') }}URL:</div>
                            <div class="col-md-9"><input class="input" type="text" name="video_url" value="{{ $product->video_url }}"></div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">*{{ trans('product.product_introduction') }}:</div>
                            <div class="col-md-9">
                                <textarea class="input" name="comment" style="height:135px;" required="required">{{ $product->comment }}</textarea>
                            </div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                        <div class="form-group inline-block">
                            <div class="col-md-3" style="margin-top:10px;margin-right:-10px">{{ trans('index.other') }}:</div>
                            <div class="col-md-9"><input class="input" type="text" name="other"  value="{{ $product->other }}"></div>
                        
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="margin-top:10px;margin-right:-10px"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">*{{ trans('index.icon') }}</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="icon_input" name="icon_url" form="product-form" />
                                    <hr>
                                    <img id="icon_url" src="../{{ $product->icon_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}①</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_1_input" name="image_1_url" form="product-form" />
                                    <hr>
                                    <img id="image_1_url" src="../{{ $product->image_1_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}②</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_2_input" name="image_2_url" form="product-form" />
                                    <hr>
                                    <img id="image_2_url" src="../{{ $product->image_2_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}③</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_3_input" name="image_3_url" form="product-form" />
                                    <hr>
                                    <img id="image_3_url" src="../{{ $product->image_3_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>
            </div>
                <!-- row -->
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}④</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_4_input" name="image_4_url" form="product-form" />
                                    <hr>
                                    <img id="image_4_url" src="../{{ $product->image_4_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}⑤</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_5_input" name="image_5_url" form="product-form" />
                                    <hr>
                                    <img id="image_5_url" src="../{{ $product->image_5_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}⑥</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_6_input" name="image_6_url" form="product-form" />
                                    <hr>
                                    <img id="image_6_url" src="../{{ $product->image_6_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}⑦</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_7_input" name="image_7_url" form="product-form" />
                                    <hr>
                                    <img id="image_7_url" src="../{{ $product->image_7_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>
            </div>
                <!-- row -->
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}⑧</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_8_input" name="image_8_url" form="product-form" />
                                    <hr>
                                    <img id="image_8_url" src="../{{ $product->image_8_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}⑨</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_9_input" name="image_9_url" form="product-form" />
                                    <hr>
                                    <img id="image_9_url" src="../{{ $product->image_9_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}⑩</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_10_input" name="image_10_url" form="product-form" />
                                    <hr>
                                    <img id="image_10_url" src="../{{ $product->image_10_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="billing-details">

                        <div class="section-title">
                            <h5 id="enterprise_name" class="title">{{ trans('index.image') }}①①</h5>
                        </div>

                        <div class="form-group">

                            <!-- banner -->
                            <div class="form-group">
                                <a class="banner banner-1" href="#">
                                    <input type='file' id="image_11_put" name="image_11_url" form="product-form" />
                                    <hr>
                                    <img id="image_11_url" src="../{{ $product->image_11_url }}" alt="">
                                </a>
                            </div>
                            <!-- /banner -->
                        </div>

                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
                <button type="submit" class="primary-btn">{{ trans('index.update') }}</button>
            </div>

            
        </form>
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection