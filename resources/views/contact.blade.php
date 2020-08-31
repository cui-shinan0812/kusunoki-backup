@extends('layouts.template')

@section('jquery')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
        $(".primary-btn").click(function(e) {
			
			e.preventDefault();
        	var name = $("#sendEmailName").val();
			var email = $("#sendEmailEmail").val();
			var tel = $("#sendEmailTel").val();
			var content = $("#sendEmailContent").val();
			$("#sendEmailName").val('');
			$("#sendEmailEmail").val('');
			$("#sendEmailTel").val('');
			$("#sendEmailContent").val('');
            $.ajax({
				type:'POST',
				url:'/send/email',
				data:{name:name, email:email, tel:tel,content:content},
				success:function(data){
					alert('問い合わせされました');
				},
				error:function(data){
					alert('エラー発生されました、japan-oem@outlook.jpに直接にメールしてください');
				}
			});
		});
	});
</script>

@endsection



@section('contents')
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="/">{{ trans('index.home') }}</a></li>
			<li class="active">{{ trans('index.brief_introduction_corporation') }} </li>
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
			<form id="checkout-form" class="clearfix">


				<div class="col-md-6">
					<div class="shiping-methods">
						<div class="section-title">
							<h3 class="title">{{ trans('index.contact') }}</h3>
						</div>
						<div>

							<label for="shipping-1">{{ trans('index.head_office') }}</label>
							<div class="caption">
								<p>〒422-8019　静岡県静岡市駿河区東静岡二丁目6番26-501号
									<p>
							</div>
						</div>

						<div>

							<label for="shipping-2">{{ trans('index.inquiry') }}</label>
							<div class="caption">
								<p>{{ trans('index.person_in_charge') }} ：沈(シン) 080-9543-2888<br>
Web: www.japan-oem.jp<br>
E-mail : japan-oem@outlook.jp<br>
									<p>
							</div>
						</div>
						<div class="form-group">
							<div id="googleMap" style="width:100%;height:400px;"></div>
						</div>
					</div>


				</div>
				<div class="col-ml-6">

				</div>
				


			</form>
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-md-6">
					<div class="billing-details">
						<meta name="csrf-token" content="{{ Session::token() }}"> 
						<div class="section-title">
							<h3 class="title">{{ trans('index.inquiry') }}</h3>
						</div>
						<div class="form-group">
							<input class="input" id="sendEmailName" type="text" placeholder="{{ trans('index.name') }}" />
						</div>
						<div class="form-group">
							<input class="input" id="sendEmailEmail" type="email" placeholder="{{ trans('index.email') }}" />
						</div>
						<div class="form-group">
							<input class="input" id="sendEmailTel" type="tel" placeholder="{{ trans('index.tel') }}" />
						</div>
						<div class="form-group">
							<textarea class="input" id="sendEmailContent" placeholder="{{ trans('index.content') }}" style="height:150px"></textarea>
						</div>
						<div class="form-group">
							<button id="sendEmailButton" class="primary-btn">{{ trans('index.send') }}</button>
						</div>

					</div>
				</div>
		</div>
	</div>
	<!-- /container -->
</div>
<!-- /section -->


@endsection

@section('script')
<script>
	function myMap() {
		var mapProp = {
			center: new google.maps.LatLng(34.8372432, 138.1328842),
			zoom: 14,
		};
		var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(34.8372432, 138.1328842)
		});
		marker.setMap(map);
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3J3Su1N3NHQLWrmhGGXchKdG8Ln5sfAw&callback=myMap"></script>
@endsection