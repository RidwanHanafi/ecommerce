<?php 
	//ambil data dari konfigurasi_model
	$listing_kategori = $this->produk_model->listing_kategori();
	$site = $this->konfigurasi_model->listing();
	$nav_produk_footer = $this->konfigurasi_model->nav_produk();
?>

<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Kategori
					</h4>

					<ul>
						<?php foreach ($listing_kategori as $listing_kategori) { ?>
						<li class="p-b-10">
							<a href="<?php echo base_url('produk/kategori/' .$listing_kategori->slug_kategori) ?>" class="stext-107 cl7 hov-cl1 trans-04">
								<?php echo $listing_kategori->nama_kategori ?>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Bantuan
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="<?php echo base_url('') ?>" class="stext-107 cl7 hov-cl1 trans-04">
								Home
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?php echo base_url('produk') ?>" class="stext-107 cl7 hov-cl1 trans-04">
								Produk 
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?php echo base_url('kontak') ?>" class="stext-107 cl7 hov-cl1 trans-04">
								Kontak
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?php echo base_url('tentang') ?>" class="stext-107 cl7 hov-cl1 trans-04">
								Tentang
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						LEBIH DEKAT 
					</h4>

					<p class="stext-107 cl7 size-201">
						Ada pertanyaan?<br><br>
						<?php echo nl2br($site->alamat)?><br>
						<i class="color1 p-r-5 fa fa-envelope"></i><?php echo $site->email ?>
					</p>

					<div class="p-t-27">
						<a href="<?php echo $site->facebook ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank" rel="nofollow">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="<?php echo $site->instagram ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank" rel="nofollow">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="https://goo.gl/maps/XuZSLbbTr9E6Q1jw5" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank" rel="nofollow">
							<i class="fa fa-map"></i>
						</a>

						<a href="<?php echo $site->telepon ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank" rel="nofollow">
							<i class="fa fa-whatsapp"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						TERIMA KASIH 
					</h4>
					<p class="stext-107 cl7 size-201">
						Kenikmatan anda adalah kepuasan kami
					</p>
				</div>
			</div>

			<div class="p-t-40">
				<p class="stext-107 cl6 txt-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <?php echo 'Esthree Cake and Bakery' ?> <i class="fa fa-heart-o" aria-hidden="true"></i>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="<?php echo base_url() ?>assets/template2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/template2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/slick/slick.min.js"></script>
	<script src="<?php echo base_url() ?>assets/template2/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');

			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template2/js/main.js"></script>

<!--===============================================================================================-->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO5yEKG2DNa-Rl_ZLiShMV8Sfqyy6Q3Pw&callback=initialize"></script>

<!-- maps kedua alternatif -->
<script src="<?php echo base_url() ?>assets/template2/js/leaflet/leaflet.js"></script>

<!-- google maps -->
<script>
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-7.652803,110.284246),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("google_map"), propertiPeta);
  	
  // membuat Marker
  var marker = new google.maps.Marker({
      position: new google.maps.LatLng(-7.652803,110.284246),
      map: peta,
      //animation: google.maps.Animation.BOUNCE
      icon : "<?php echo base_url() ?>assets/template2/images/toko/markerku.png ?>"


  });
  google.maps.event.addDomListener(window, 'load', initialize);
}

// // event jendela di-load  
// 
</script>


<!--===============================================================================================-->
<!-- Salam -->
<script>
    var myDate = new Date();
    var hrs = myDate.getHours();

    var greet;

    if (hrs < 10)
        greet = 'Selamat Pagi';
    else if (hrs >= 10 && hrs <= 15)
        greet = 'Selamat Siang';
    else if(hrs >= 16  && hrs <= 18)
    	greet = 'Selamat Sore';
    else if (hrs >= 19 && hrs <= 4)
        greet = 'Selamat Malam';

    document.getElementById('lblGreetings').innerHTML =
        '<b>' + greet + '!';
</script> 


<!--===============================================================================================-->


<!-- untuk alert pilih provinsi -->
<!-- <script>
	document.getElementById('provinsi').addEventListener('change', function(){
		alert('asda')
	})
</script> -->
<!--===============================================================================================-->

<script type="text/javascript">
	$(document).ready(function(){
		$('#kecamatan').change(function() {
			var kecamatan_id = $(this).val();
			$.ajax({
				url: "<?php echo base_url();?>/belanja/desa",
				method: "POST", //metode
				dataType: "JSON",
				data: {
					kecamatan_id : kecamatan_id
				}, // $input->post('kecam_id)
				success: function(array){
					var html ='';
					for (let index = 0; index < array.length; index++) {
						html += "<option>"+array[index].name+ "</option>"
						
					}
					$('#desa').html(html);
				}
			})
		}) 
	});
</script>

<!--===============================================================================================-->

<!-- Midtrans -->
<script type="text/javascript"
	src="https://app.sandbox.midtrans.com/snap/snap.js"
	data-client-key="SB-Mid-client-I0ojA9CUwUrt_Fzd"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script type="text/javascript">

  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
  
  $.ajax({
    url: '<?=base_url()?>snap/token',
    cache: false,

    success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
        //resultType.innerHTML = type;
        //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {
        
        onSuccess: function(result){
          changeResult('success', result);
          console.log(result.status_message);
          console.log(result);
          $("#payment-form").submit();
        },
        onPending: function(result){
          changeResult('pending', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        },
        onError: function(result){
          changeResult('error', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        }
      });
    }
  });
});

</script>
<!--===============================================================================================-->

</body>
</html>