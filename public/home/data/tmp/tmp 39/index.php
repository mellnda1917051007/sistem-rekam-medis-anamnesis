<?php 
$url = "home/data/tmp/tmp 39/web/";
$komponen = "home/data/tmp/tmp 39/";
include 'home/include/all_include.php';
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
 <!DOCTYPE html>
 <html lang="en">
 <head>
<!-- Original URL: https://demo.w3layouts.com/demos_new/17-02-2017/bouquet-demo_Free/545102308/web/index.html
Date Downloaded: 16/04/2021 09:08:41 !-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title></title>
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 
 <meta name="keywords" content="Bouquet Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Custom Theme files -->
 <link href="<?php echo $url; ?>css/bootstrap.css" type="text/css" rel="stylesheet" media="all" />
 <link href="<?php echo $url; ?>css/style.css" type="text/css" rel="stylesheet" media="all" />  
 <link href="<?php echo $url; ?>css/font-awesome.css" rel="stylesheet" />    <!-- font-awesome icons -->
 <link rel="stylesheet" href="<?php echo $url; ?>css/swipebox.css" /> 
 <!-- //Custom Theme files -->   
 <!-- js -->
 <script src="<?php echo $url; ?>js/jquery-2.2.3.min.js"></script> 
 <!-- //js -->
 <!-- web-fonts -->    
 <link href="<?php echo $url; ?>../../../../../../fonts.googleapis.com/css_33b71cc1.css" rel="stylesheet" />
 <link href='../../../../../../fonts.googleapis.com/css_647463b7.css' rel='stylesheet' type='text/css' />
 <!-- //web-fonts -->  
 </head>
 <body>
 <script src="<?php echo $url; ?>../../../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
 <script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
 <script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
 <script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
 <!-- Global site tag (gtag.js) - Google Analytics -->
 <script async="" src='../../../../../../www.googletagmanager.com/gtag/js_b86919a9.js'></script>
 <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149859901-1');
</script>

 <script>
     window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
     ga('create', 'UA-149859901-1', 'demo.w3layouts.com');
     ga('require', 'eventTracker');
     ga('require', 'outboundLinkTracker');
     ga('require', 'urlChangeTracker');
     ga('send', 'pageview');
   </script>
 <script async="" src='../../../../../js/autotrack.js'></script>

 <meta name="robots" content="noindex" />
 <body><link rel="stylesheet" href="<?php echo $url; ?>../../../../../assests/css/font-awesome.min.css" />
 <!-- New toolbar-->

  <?php if ($_GET['p'] == 'home' || !isset($_GET['p'])) {
    # code...
    ?>
	 <!-- banner start here -->
	 <div id="home" class="banner">
		 <div class="agileinfo-main">
			 <div class="slider">
				 <script src="<?php echo $url; ?>js/responsiveslides.min.js"></script>
				 <script>
					// You can also use "$(window).load(function() {"
					$(function () {
					  // Slideshow 1
					  $("#slider1").responsiveSlides({
						 auto: true,
						 nav: true,
						 speed: 500,
						 namespace: "callbacks",
					  });
					});
				</script>
				 <ul class="rslides" id="slider1">
					 <li> 
						 <div class="banner-w3lstext">
							 <h3><?php echo $objek; ?></h3>
						 </div>	
					 </li>
					 <li> 
						 <div class="banner-w3lstext">
							 <h3>Wedding Organizer for help your Event</h3>
						 </div>	
					 </li>
					 <li>	
						 <div class="banner-w3lstext">
							 <h3><?php echo $judul; ?></h3>
						 </div>	
					 </li>
				 </ul>
			 </div>	
			 <div class="agileinfo-header">
				 <div class="container">
					 <div class="agile-logo">
						 <h1><a href="<?php echo $url; ?>index.html" style="font-size:20px; display:revert"><img src="<?php echo $url; ?>images/i1.png" style="width:60px" class="img-responsive" alt="" /> <?php echo $objek; ?> </a></h1>
					 </div>
					<!-- <div class="agileits-w3layouts-icons">
						 <div class="social-icon w3-agile">
							 <a href= "#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
							 <a href= "#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
							 <a href= "#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
							 <a href= "#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
						 </div> 
					 </div>-->
					 <div class="clearfix">  </div>
				 </div>	    
			 </div>
			 <!-- navigation start here -->
			 <div class="top-nav">
				 <span class="menu">Menu </span>	
				 <ul class="w3l" style="width:90%">
				 
				 <!-- MENU -->
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
		<?php $apa = $i->n;
		if ($apa=="Login")
		{
			if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
			{
				$kodene = decrypt($_COOKIE["kodene"]);
				$ip = $_SERVER['REMOTE_ADDR']; 
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$token = sha1($ip.$useragent.$key);
				$token = crypt($token, $key);
				if ($_COOKIE['token_user'] == $token)
				{
					$token = "ada";
				}
				else
				{
					$token = "";
				}
				$kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
			}
			else
			{
				$token = "";
				$kode ="";
			}
			if ($kode=="ada" && $token=="ada")
			{
			?>
			<!--
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
			-->
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout</a> </li>
			<?php	 
			}
			else
			{
			?>
			<li class="nav-item"> <a class="scroll" href="index.php?p=login&action=logout" style="width:80px; height:85%"><?php echo $i->n;?></a> </li>
			<?php
			}
		}
		else
		{
		?>
		 <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
		<?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
		<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="dropdown-menu agile_short_dropdown">
		<?php
		$m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
			<li><li>
			<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
			<?php echo $i1->n;?></a>
			</li></li>
		<?php }} ?>
		</ul>
		</li>
<!-- /MULTI -->
		<?php }} ?>
<!-- /MENU -->

					
				 </ul>
				 <!-- script-for-menu -->
				 <script>
				   $( "span.menu" ).click(function() {
					 $( "ul.w3l" ).slideToggle( 300, function() {
					 // Animation complete.
					  });
					 });
				</script>
				 <!-- //script-for-menu -->
			 </div><!-- //navigation end here -->	
		 </div>
	 </div> 
	 <!-- //banner end here -->
	 <!---728x90--->

	 <!-- about -->
	 <div id="about" class="about w3-agile">
		 <div class="container">
			 <div class="about-agileinfo-row">
				 <div class="col-md-4 col-sm-4 about-w3grids about-w3left">
					 <h3 class="agileits-title"> About Us </h3> 
					 <h6>Sedikit Tentang Kami</h6>
					 <p>Kami membantu anda untuk mempersiapkan hari spesial anda dengan maximal. Dengan perpaduan Warna yang elegant dan konsep yang unik, membuat hari spesialmu menjadi lebih meriah. Kami menyediakan berbagai macam paket yang dapat anda ambil dengan berbagai macam konsep.</p>
				 </div>
				 <div class="col-md-4 col-sm-4 about-w3grids about-w3limg">
					 <img src="<?php echo $url; ?>images/img1.jpg" class="img-responsive" alt="" /> 
				 </div>
				 <div class="col-md-4 col-sm-4 about-w3grids about-w3right">
					 <h3 class="agileits-title">Our Review</h3>
					 <div class="bar_group">
						 <div class='bar_group__bar thin'  label='Kepuasan Client' show_values='' tooltip='' value='310'><p class="bar_label_max">100</p></div>
						 <div class='bar_group__bar thin' label='Kepuasan Layanan' show_values='' tooltip='' value='330'><p class="bar_label_max">100</p></div>
						 <div class='bar_group__bar thin' label='Kepuasan Dekorasi' show_values='' tooltip='' value='305'><p class="bar_label_max">100</p></div>
						 <div class='bar_group__bar thin' label='Kepuasan Organizer' show_values='' tooltip='' value='300'><p class="bar_label_max">100</p></div>
					 </div>
					 <script src="<?php echo $url; ?>js/bars.js"></script> 
				 </div>
				 <div class="clearfix">  </div>
			 </div>
		 </div>
	 </div> 
	 <!-- //about -->
	 <!---728x90--->
	 <!-- table-book -->
	 <div class="table-book">
		 <div class="container">
			 <div class="book-info agile-rowinfo">
				 <div class="book-left">
					 <h3>Order Your Service Now  </h3>
					 <p>Call NOW to our ____ free number  </p>
				 </div>
				 <div class="book-right">
					 <h4><?php echo $telepon; ?></h4>
				 </div>
				 <div class="clearfix">  </div>
			 </div> 
		 </div>
	 </div>
	 <!-- //table-book -->
	 <!---728x90--->
	 <!-- services -->
	 <div id="services" class="services">
		 <div class="container">  
			 <h3 class="agileits-title">Our Services </h3> 
			 <div class="services-w3ls-row agileits-w3layouts">
				 <div class="col-md-4 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
					<center> <i class="fa fa-book" aria-hidden="true"></i>
					 <h5>Planning Wedding</h5>
					 <p>Kami menyediakan jasa untuk membantu anda merencanakan dan mempersiapkan acara pernikahan</p>
				 </div>
				 <div class="col-md-4 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
					<center> <i class="fa fa-bell-o" aria-hidden="true"></i>
					 <h5>Coordinate Wedding</h5>
					 <p>Jasa Kami juga berlanjut untuk membantu menjaga kelancaran acara pernikahan anda agar berjalan sukses</p>
				 </div>
				 <div class="col-md-4 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
					<Center> <i class="fa fa-heart-o" aria-hidden="true"></i>
					 <h5>Bride and Groom</h5>
					 <p>Melayani pasangan pengantin dan keluarga dan sebisa mungkin berinisiatif memberikan masukan dan terlibat Aktif.   </p>
				 </div>
			
				 <div class="clearfix">  </div>
			 </div>  
		 </div>
	 </div>
	 
	 
	  <?php
} else {
    ?>
	 <div id="home" class="banner">
		 <div class="agileinfo-main">
			 <div class="slider">
				 <script src="<?php echo $url; ?>js/responsiveslides.min.js"></script>
				 <script>
					// You can also use "$(window).load(function() {"
					$(function () {
					  // Slideshow 1
					  $("#slider1").responsiveSlides({
						 auto: true,
						 nav: true,
						 speed: 500,
						 namespace: "callbacks",
					  });
					});
				</script>
				 <ul class="rslides" id="slider1">
					
					 <li>	
						 <div class="banner-w3lstext" style="padding:12em 0">
							 <h3><?php echo str_replace("_"," ",ucwords($_GET['p']));?></h3>
						 </div>	
					 </li>
				 </ul>
			 </div>	
			 <div class="agileinfo-header">
				 <div class="container">
					 <div class="agile-logo">
						 <h1><a href="<?php echo $url; ?>index.html" style="font-size:20px; display:revert"><img src="<?php echo $url; ?>images/i1.png" style="width:60px" class="img-responsive" alt="" /> <?php echo $objek; ?> </a></h1>
					 </div>
					<!-- <div class="agileits-w3layouts-icons">
						 <div class="social-icon w3-agile">
							 <a href= "#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
							 <a href= "#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
							 <a href= "#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
							 <a href= "#" class="social-button dribbble"><i class="fa fa-dribbble"></i></a> 
						 </div> 
					 </div>-->
					 <div class="clearfix">  </div>
				 </div>	    
			 </div>
			 <!-- navigation start here -->
			 <div class="top-nav">
				 <span class="menu">Menu </span>	
				 <ul class="w3l" style="width:90%">
				 
				 <!-- MENU -->
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
		<?php $apa = $i->n;
		if ($apa=="Login")
		{
			if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
			{
				$kodene = decrypt($_COOKIE["kodene"]);
				$ip = $_SERVER['REMOTE_ADDR']; 
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$token = sha1($ip.$useragent.$key);
				$token = crypt($token, $key);
				if ($_COOKIE['token_user'] == $token)
				{
					$token = "ada";
				}
				else
				{
					$token = "";
				}
				$kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
			}
			else
			{
				$token = "";
				$kode ="";
			}
			if ($kode=="ada" && $token=="ada")
			{
			?>
			<!--
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
			-->
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout</a> </li>
			<?php	 
			}
			else
			{
			?>
			<li class="nav-item"> <a class="scroll" href="index.php?p=login&action=logout" style="width:80px; height:85%"><?php echo $i->n;?></a> </li>
			<?php
			}
		}
		else
		{
		?>
		 <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
		<?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
		<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="dropdown-menu agile_short_dropdown">
		<?php
		$m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
			<li><li>
			<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
			<?php echo $i1->n;?></a>
			</li></li>
		<?php }} ?>
		</ul>
		</li>
<!-- /MULTI -->
		<?php }} ?>
<!-- /MENU -->

					
				 </ul>
				 <!-- script-for-menu -->
				 <script>
				   $( "span.menu" ).click(function() {
					 $( "ul.w3l" ).slideToggle( 300, function() {
					 // Animation complete.
					  });
					 });
				</script>
				 <!-- //script-for-menu -->
			 </div><!-- //navigation end here -->	
		 </div>
	 </div> 
	
<?php } include 'halaman.php';?>
    
	
	 <div class="footer-agile">
		 <div class="container">
			 <div class="footer-top-agileinfo"> 
				 <div class="col-md-4 col-sm-4 footer-wthree-grid">  
					 <div class="agile-logo footer-w3logo">
						  <h1><a href="<?php echo $url; ?>index.html" style="font-size:20px; display:revert"><img src="<?php echo $url; ?>images/i1.png" style="width:60px" class="img-responsive" alt="" /> <?php echo $objek; ?> </a></h1>
					 </div>
				 </div> 
				 <div class="col-md-8 col-sm-8 footer-wthree-grid" style="padding-right:0px"> 
					 <ul>
					 
					 <!-- MENU -->
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
		<?php $apa = $i->n;
		if ($apa=="Login")
		{
			if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
			{
				$kodene = decrypt($_COOKIE["kodene"]);
				$ip = $_SERVER['REMOTE_ADDR']; 
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$token = sha1($ip.$useragent.$key);
				$token = crypt($token, $key);
				if ($_COOKIE['token_user'] == $token)
				{
					$token = "ada";
				}
				else
				{
					$token = "";
				}
				$kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
			}
			else
			{
				$token = "";
				$kode ="";
			}
			if ($kode=="ada" && $token=="ada")
			{
			?>
			<!--
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
			-->
			<li class="nav-item"> <a class="scroll" href="index.php?p=login&action=logout">Logout</a> </li>
			<?php	 
			}
			else
			{
			?>
			<li class="nav-item"> <a class="scroll" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
			<?php
			}
		}
		else
		{
		?>
		 <li class="nav-item"> <a class="scroll" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
		<?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
		<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="dropdown-menu agile_short_dropdown">
		<?php
		$m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
			<li><li>
			<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
			<?php echo $i1->n;?></a>
			</li></li>
		<?php }} ?>
		</ul>
		</li>
<!-- /MULTI -->
		<?php }} ?>
<!-- /MENU -->
</ul>
				 </div> 	  
				 <div class="clearfix">  </div>		
			 </div>
			 <div class="footer-btm-agileinfo">
				 <div class="col-md-3 col-xs-3 footer-grid">
					 <h3>Useful Info </h3>
					 <ul>
						 <li><a><i class="glyphicon glyphicon-menu-right"></i><?php echo $alamat; ?></a></li>
						 <li><a><i class="glyphicon glyphicon-menu-right"></i><?php echo $telepon; ?></a></li>
						 <li><a><i class="glyphicon glyphicon-menu-right"></i><?php echo $email; ?></a></li>
						 <li><a><i class="glyphicon glyphicon-menu-right"></i>Donec ut lectus  </a></li>
					 </ul>
				 </div> 
				 <div class="col-md-3 col-xs-3 footer-grid w3social">
					 <h3>logo</h3>
					<image src="admin/data/image/logo/logo.png" width="120px">
				 </div> 
				 <div class="col-md-6 col-xs-6 footer-grid footer-review">
					 <h3> </h3>
					 
					 <div class="copy-w3lsright"> 
						 <p><?php echo $copyright; ?></p>
					 </div> 
				 </div> 
				 <div class="clearfix">  </div>
			 </div>   
		 </div>
	 </div> 
	 <!-- //footer end here -->   
	 <!-- Kick off Filterizr -->
	 <script src="<?php echo $url; ?>js/jquery.filterizr.js"></script>  
	 <script src="<?php echo $url; ?>js/controls.js"></script> 
	 <script type="text/javascript">
		$(function() {
			//Initialize filterizr with default options
			$('.filtr-container').filterizr();
		});
	</script>	
	 <!-- swipe box js -->
	 <script src="<?php echo $url; ?>js/jquery.swipebox.min.js"></script> 
	 <script type="text/javascript">
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
	</script> 
	 <!-- //swipe box js --> 	 
	 <!-- start-smooth-scrolling -->
	 <script src="<?php echo $url; ?>js/SmoothScroll.min.js"></script> 
	 <script type="text/javascript" src="<?php echo $url; ?>js/move-top.js"></script>
	 <script type="text/javascript" src="<?php echo $url; ?>js/easing.js"></script>	
	 <script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	 <!-- //end-smooth-scrolling -->	
	 <!-- smooth-scrolling-of-move-up -->
	 <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	 <!-- //smooth-scrolling-of-move-up -->  
	 <!-- Bootstrap core JavaScript
    ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <script src="<?php echo $url; ?>js/bootstrap.js"></script>


 <div id="v-w3layouts"></div><script>(function(v,d,o,ai){ai=d.createElement('script');ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, '../../../../../../a.vdo.ai/core/v-w3layouts/vdo.ai.js');</script>
	 </body>
 </body></html>