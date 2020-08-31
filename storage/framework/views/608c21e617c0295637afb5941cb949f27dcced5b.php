<?php $__env->startSection('jquery'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".quick-view").click(function() {
            $.get("/product/quickView?product_id=" + this.id,function(data,status){
				$("#quickView").html(data);
			});
        });

        $(".add-to-cart").click(function() {
			$.get("/inquiry?query=" + this.id,function(data,status){
				$("#inquiryView").html(data);
			});
		});

		$(".three-d-btn").click(function() {
			var myIframe = document.createElement('iframe');
            myIframe.src = $(this).val();
            document.body.appendChild(myIframe);
            myIframe.style.width = '100%';
            myIframe.style.height = '600px';
			$("#threeDView").html(myIframe);
		});

    });
</script>

<style>

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/"><?php echo e(trans('index.home'), false); ?></a></li>
            <li class="active"><?php echo e(trans('index.product'), false); ?></li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div id="product-main-view">
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_1_url, false); ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_2_url, false); ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_3_url, false); ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_4_url, false); ?>" alt="">
                        </div>
                    </div>
                    <div id="product-view">
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_1_url, false); ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_2_url, false); ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_3_url, false); ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="../<?php echo e($product->image_4_url, false); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-body">

                        <h2 class="product-name"><?php echo e($product->name, false); ?></h2>
                        <table class="shopping-cart-table table table-borderless">
                            <thead>
                                <tr>
                                    <th class="text-left"><?php echo e(trans('product.price'), false); ?>:</th>
                                    <?php if(is_null($product->price)): ?>                                
                                    <th class="text-left"><?php echo e(trans('index.inquiry'), false); ?></th>
                                    <?php else: ?>
                                    <th class="text-left"><?php echo e(explode(",",$product->price)[0], false); ?><?php echo e(explode(",",$product->price)[1], false); ?></th>
                                    <?php endif; ?>         
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('product.deadline'), false); ?>:</th>
                                        <?php if(is_null($product->minimum_build_days)): ?>
                                        <th class="text-left"><?php echo e(trans('index.inquiry'), false); ?></th>
                                        <?php else: ?>
                                        <th class="text-left"> <?php echo e(explode(",",$product->minimum_build_days)[0], false); ?><?php echo e(explode(",",$product->minimum_build_days)[1], false); ?> </th>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('product.minimum_order_quantity'), false); ?>:</th>
                                        <th class="text-left"><?php echo e($product->minimum_order_quantity, false); ?> pcs</th>
                                    </tr>
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('product.built_at'), false); ?>:</th>
                                        <th class="text-left"><?php echo e($product->build_at, false); ?></th>
                                    </tr>
                                </tbody>
                                <hr>
                        </table>
                        
                        <div class="product-btns">
                            <div class="pull-right">
                                <?php if(!is_null($product->three_d_url)): ?>
                                <button class="main-btn icon-btn three-d-btn" value="<?php echo e($product->three_d_url, false); ?>"><a href="#threeDModal" data-toggle="modal"><i class="fa fa-share-alt"></i>3D</a></button>
                                <?php endif; ?>
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1"><?php echo e(trans('product.product_information'), false); ?></a></li>
                            <li><a data-toggle="tab" href="#tab2"><?php echo e(trans('product.supplier'), false); ?></a></li>
                            <li><a data-toggle="tab" href="#tab3"><?php echo e(trans('index.inquiry'), false); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <h4><?php echo e(trans('product.product_detail'), false); ?></h4>
                                
                                <p><?php echo e($product->comment, false); ?></p>

                                <h4><?php echo e(trans('product.product_introduction_video'), false); ?></h4>
                                <?php if(!is_null($product->video_url)): ?>
                                <iframe style='width:60%;max-width:800px;height:400px;'
                                    src="<?php echo e($product->video_url, false); ?>">
                                    </iframe>
                                <?php else: ?>
                                <p><?php echo e(trans('product.not_uploaded'), false); ?></p>
                                <?php endif; ?>

                                <?php if(!is_null($product->image_5_url) || !is_null($product->image_6_url) || !is_null($product->image_7_url) || !is_null($product->image_8_url) || !is_null($product->image_9_url) || !is_null($product->image_10_url) || !is_null($product->image_11_url)): ?>
                                <h4><?php echo e(trans('product.extra_introduction'), false); ?><?php echo e(trans('index.image'), false); ?></h4>

                                <?php if(!is_null($product->image_5_url)): ?>
                                <hr>
                                <img src="../<?php echo e($product->image_5_url, false); ?>" alt="">
                                <?php endif; ?>

                                <?php if(!is_null($product->image_6_url)): ?>
                                <hr>
                                <img src="../<?php echo e($product->image_6_url, false); ?>" alt="">
                                <?php endif; ?>

                                <?php if(!is_null($product->image_6_url)): ?>
                                <hr>
                                <img src="../<?php echo e($product->image_6_url, false); ?>" alt="">
                                <?php endif; ?>

                                <?php if(!is_null($product->image_7_url)): ?>
                                <hr>
                                <img src="../<?php echo e($product->image_7_url, false); ?>" alt="">
                                <?php endif; ?>

                                <?php if(!is_null($product->image_8_url)): ?>
                                <hr>
                                <img src="../<?php echo e($product->image_8_url, false); ?>" alt="">
                                <?php endif; ?>

                                <?php if(!is_null($product->image_9_url)): ?>
                                <hr>
                                <img src="../<?php echo e($product->image_9_url, false); ?>" alt="">
                                <?php endif; ?>

                                <?php if(!is_null($product->image_10_url)): ?>
                                <hr>
                                <img src="../<?php echo e($product->image_10_url, false); ?>" alt="">
                                <?php endif; ?>
                                <?php endif; ?>
                                
                            </div>
                            <div id="tab2" class="tab-pane fade in">

                                <?php echo $__env->make('enterprise.basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                            <div id="tab3" class="tab-pane fade in">

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <?php if(auth()->guard()->check()): ?>
                                        <?php echo $__env->make('common.inquiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                        <h5 class="text-uppercase"><?php echo e(trans('product.inquiry_after_login'), false); ?></h5>
                                        <?php echo $__env->make('common.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h4 class="title"><?php echo e(trans('index.recommended'), false); ?></h4>
                </div>
            </div>
            <!-- section title -->

            <?php $__currentLoopData = $recommend_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommend_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <button class="main-btn quick-view" id="<?php echo e($recommend_product->id, false); ?>"><a href="#PreviewModal" data-toggle="modal"><i class="fa fa-search-plus"></i> view</a></button>
                        <img src="<?php echo asset($recommend_product->icon_url); ?>" alt="">
                    </div>
                    <div class="product-body">
                        
                        <h2 class="product-name"><a href="/product/single?product_id=<?php echo e($recommend_product->id, false); ?>"> <?php echo e($recommend_product->name, false); ?></a></h2>
                        <div class="product-btns">
                            <?php if(!is_null($recommend_product->three_d_url)): ?>
							<button class="primary-btn three-d-btn"><a href="#threeDModal" data-toggle="modal">&nbsp&nbsp<i class="fa fa-share-alt"></i>&nbsp3D</a>&nbsp&nbsp</button>
							<?php endif; ?>
                            <button class="main-btn add-to-cart" id="<?php echo e($recommend_product->id, false); ?>,product"><a href="#InquiryModal" data-toggle="modal"><?php echo e(trans('index.short_inquiry'), false); ?></a></button>
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<div id="threeDModal" class="modal fade">
    <!-- class modal and fade -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- modal header -->
                <h4>3D View</h4>
            </div>
            <div class="modal-body" id="threeDView">
                
            </div>
            <div class="modal-footer">
				<!-- modal footer -->
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('index.close'), false); ?></button>
                
            </div>

        </div> <!-- / .modal-content -->

    </div> <!-- / .modal-dialog -->
</div><!--/ .modal -->

<div id="InquiryModal" class="modal fade">
    <!-- class modal and fade -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- modal header -->
                <h4><?php echo e(trans('index.unite_corporation'), false); ?></h4>
            </div>

            <div class="modal-body" id="inquireArea">
                <!-- container -->
                <div class="container" id="inquiryView">


                </div>
                <!-- /container -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('index.close'), false); ?></button>
            </div>

        </div> <!-- / .modal-content -->

    </div> <!-- / .modal-dialog -->
</div>
<!--/ .modal -->

<div id="PreviewModal" class="modal fade">
    <!-- class modal and fade -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- modal header -->
                <h4><?php echo e(trans('index.unite_corporation'), false); ?></h4>
            </div>
            <div class="modal-body" id="inquireArea">
                <!-- section -->
                <div class="section">
                    <!-- container -->
                    <div class="container" id="quickView">

                        
                    </div>
                    <!-- /container -->
                </div>
                <!-- /section -->
            </div>
            <div class="modal-footer">
				<!-- modal footer -->
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('index.close'), false); ?></button>
                
            </div>

        </div> <!-- / .modal-content -->

    </div> <!-- / .modal-dialog -->
</div><!--/ .modal -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/kusunoki/resources/views/product/single.blade.php ENDPATH**/ ?>