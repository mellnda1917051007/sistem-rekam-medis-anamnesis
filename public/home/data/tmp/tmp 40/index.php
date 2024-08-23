<?php 
$url = "home/data/tmp/tmp 40/web/";
$komponen = "home/data/tmp/tmp 40/";
include 'home/include/all_include.php';
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Events Venue Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="<?php echo $url; ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="<?php echo $url; ?>css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="<?php echo $url; ?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="<?php echo $url; ?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo $url; ?>js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
</head>
<body>
	<!-- banner -->
	  <?php if ($_GET['p'] == 'home' || !isset($_GET['p'])) {?>
	<div class="banner">
		<div class="header">
			<div class="container">
				<div class="header-left">
					<div class="w3layouts-logo">
						<h1>
							<a href="">VD <span>Decoration</span></a>
						</h1>
					</div>
				</div>
				<div class="top-nav">
					<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
							
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
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout" style="width:80px; height:85%"><?php echo $i->n;?></a> </li>
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
							<div class="clearfix"> </div>
						</div>	
					</nav>		
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="w3layouts-banner-slider">
			<div class="container">
				<div class="slider">
					<div class="callbacks_container">
						<ul class="rslides callbacks callbacks1" id="slider4">
							<li>
								<div class="agileits-banner-info">
									<h3>Enjoy <span>your best event ever</span></h3>
									<div class="w3-button">
										<a href="?p=profil">More</a>
									</div>
								</div>
							</li>
							<li>
								<div class="agileits-banner-info">
									<h3><?php echo $objek ?> <span>for your special day</span></h3>
									<div class="w3-button">
										<a href="?p=profil">More</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<script src="<?php echo $url; ?>js/responsiveslides.min.js"></script>
					<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
					 </script>
					<!--banner Slider starts Here-->
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="w3l-banner-bottom-grids">
				<div class="col-md-4 w3l-banner-bottom-grid">
					<div class="bottom-icon">
						<i class="fa fa-cog" aria-hidden="true"></i>
					</div>
					<div class="bottom-text">
						<h4>Creative Thinking</h4>
						<p>Tim Event Organizer (EO) kami bekerja untuk menghasilkan acara yang unik dan menarik.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 w3l-banner-bottom-grid">
					<div class="bottom-icon">
						<i class="fa fa-thumbs-up" aria-hidden="true"></i>
					</div>
					<div class="bottom-text">
						<h4>Solid Teamwork</h4>
						<p>Tim yang sold dan kompak siap membantu melancarkan acara - acara Anda.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 w3l-banner-bottom-grid">
					<div class="bottom-icon">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>
					<div class="bottom-text">
						<h4>Reliable</h4>
						<p>Partner yang dapat anda andalkan dalam acara anda
</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //banner-bottom -->
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="welcome-grids">
				<div class="col-md-6 w3ls-welcome-left">
					<div class="w3ls-welcome-left-img">
						
					</div>
				</div>
				<div class="col-md-6 w3ls-welcome-right">
					<div class="w3ls-welcome-right-info">
						<h2>Some Words <span>About Us</span></h2>
						<p>Kami adalah penyedia layanan jasa event organizer (EO) profesional yang berfokus pada kualitas dan kepuasan klien. Kami berpengalaman dalam merancang dan menyelenggarakan acara untuk berbagai macam kegiatan dengan dokumentasi yang sangat lengkap. Berbagai kegiatan baik telah kami rancang dengan konsep yang unik baik indoor maupun outdoor untuk mempererat tali persaudaraan.</span></p>
					</div>
					<div class="agileits-border">
						<div class="agileinfo-red"> </div>
						<div class="agileinfo-red agileinfo-green"> </div>
						<div class="agileinfo-red agileinfo-blue"> </div>
						<div class="agileinfo-red agileinfo-yellow"> </div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<div class="posts">
		<div class="container">
			<div class="w3-agileits-heading">
				<h3>Recent <span>Posts</span></h3>
			</div>
			<div class="posts-grids">
			
			<?php 	$querytabel="SELECT * FROM data_berita  LIMIT 0,3";
				
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				{ 
			
			
$tanggal = $data['tanggal'];

 $array1=explode("-",$tanggal);
$tahun=$array1[0];
$bulan=$array1[1];
$sisa1=$array1[2];
$array2=explode(" ",$sisa1);
$tanggal=$array2[0];
$sisa2=$array2[1];
$array3=explode(":",$sisa2);
$jam=$array3[0];
$menit=$array3[1];
$detik=$array3[2];
//ubah nama bulan menjadi bahasa indonesia
switch($bulan)
{
case"01";
$bulan="Jan";
break;
case"02";
$bulan="Feb";
break;
case"03";
$bulan="Mar";
break;
case"04";
$bulan="Apr";
break;
case"05";
$bulan="Mei";
break;
case"06";
$bulan="Jun";
break;
case"07";
$bulan="Jul";
break;
case"08";
$bulan="Agus";
break;
case"09";
$bulan="Sep";
break;
case"10";
$bulan="Okt";
break;
case"11";
$bulan="Nov";
break;
case"12";
$bulan="Des";
break;
}?>
				<div class="col-md-4 w3-agile-post-grids">
					<div class="w3-agile-post-img" style="background: url('admin/upload/<?php echo $data["$foto"]; ?>')">
						<a href="index.php?p=berita&Go=<?php echo $data[$judul];?>"> 
							<ul>
								<li><?php echo $bulan; ?></li>
								<li><?php echo $tanggal; ?></li>
								<li><?php echo $tahun; ?></li>
							</ul>
						</a>
					</div>
					<div class="w3-agile-post-info">
						<h4><a href="index.php?p=berita&Go=<?php echo $data[$judul];?>"><?php echo strtoupper(substr($data['judul'],0,200)); ?></a></h4>
						<p><?php echo strtoupper(substr($data['isi'],0,200)); ?>...</p>
					</div>
				</div>
				
				<?php } ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //posts -->
	 <?php
} else {
	
	?>
	
	<div class="banner">
		<div class="header">
			<div class="container">
				<div class="header-left">
					<div class="w3layouts-logo">
						<h1>
							<a href="">VD <span>Decoration</span></a>
						</h1>
					</div>
				</div>
				<div class="top-nav">
					<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								
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
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout" style="width:80px; height:85%"><?php echo $i->n;?></a> </li>
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
							<div class="clearfix"> </div>
						</div>	
					</nav>		
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="agileinfo-top-heading">
			<h2><?php echo str_replace("_"," ",ucwords($_GET['p']));?></h2>
		</div>
	</div>
<?php } 
include 'halaman.php'; ?>
	
	
	<!-- footer -->
	<footer>
		<div class="agileits-w3layouts-footer-top">
			<div class="container">
				<div class="col-md-6 agileits-w3layouts-footer-top-left">
					<p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $telepon; ?></p>
				</div>
				<div class="col-md-6 agileits-w3layouts-footer-top-left">
					<p><i class="fa fa-envelope" aria-hidden="true"></i> Email :<a href="<?php echo $url; ?>mailto:<?php echo $email; ?>"> <?php echo $email; ?></a></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="agileits-footer-bottom">
			<div class="container">
				<div class="agileits-footer-bottom-grids">
					<div class="col-md-6 footer-bottom-left">
						<h5>About Us</h5>
						<div class="footer-img-grids">
							<div class="footer-img">
								<img src="admin/data/image/logo/logo.png" width="100%"alt="" />
							</div>
							<div class="footer-img-info">
								<p>Berkumpul bersama keluarga, sahabat, dan kolega tentu akan sangat menyenangkan jika semua orang menikmati acara, bahkan akan terus membicarakannya selama beberapa waktu setelahnya. Bagi Anda, hal ini tentu akan menjadi pertimbangan untuk membuat acara yang menyenangkan dan “tak terlupakan”</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-2 footer-bottom-right" style="line-height:2">
						<h5>Quick Link</h5>
						<a href="?p=home" style="color:white;line-height:2">Home</a> <Br>
						<a href="?p=profil" style="color:white;line-height :2">Profil</a><Br>
						<a href="?p=galery" style="color:white;line-height:2">Galery</a><Br>
						<a href="?p=berita" style="color:white;line-height:2">Berita</a>
					
					</div>
						<div class="col-md-1 footer-bottom-right" style="line-height:2">
						<h5 style="color:#ffffff00">sdfa</h5>
						<a href="?p=produk" style="color:white;line-height:2">Paket</a> <Br>
						<a href="?p=keranjang" style="color:white;line-height :2">Pemesanan</a><Br>
						<a href="?p=transaksi" style="color:white;line-height:2">Transaksi</a><Br>
						
					</div>
					<div class="col-md-3 footer-bottom-right">
						<h5>We are social</h5>
						<div class="agileinfo-social-grids">
							<ul>
								<li><a href= "#"><i class="fa fa-facebook"></i></a></li>
								<li><a href= "#"><i class="fa fa-twitter"></i></a></li>
								<li><a href= "#"><i class="fa fa-rss"></i></a></li>
								<li><a href= "#"><i class="fa fa-vk"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<p><?php echo $copyright; ?></p>
			</div>
		</div>
	</footer>
	<!-- //footer -->
	<script src="<?php echo $url; ?>js/responsiveslides.min.js"></script>
	<script src="<?php echo $url; ?>js/jarallax.js"></script>
	<script src="<?php echo $url; ?>js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
<script type="text/javascript" src="<?php echo $url; ?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/easing.js"></script>
	<!-- here stars scrolling icon -->
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
<!-- //here ends scrolling icon -->
</body>	
</html>