<?php 
$url = "home/data/tmp/tmp 42/nuptial/";
$komponen = "home/data/tmp/tmp 42/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="<?php echo $url; ?>favicon.ico">
	
	<link href= "https://fonts.googleapis.com/css?family=Montez" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo $url; ?>css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo $url; ?>css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="<?php echo $url; ?>css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo $url; ?>css/magnific-popup.css">
	
	<link rel="stylesheet" href="<?php echo $url; ?>css/style.css">


	<!-- Modernizr JS -->
	<script src="<?php echo $url; ?>js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?php echo $url; ?>js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href= "#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="#"><?php echo $objek; ?></a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
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
		<li  class="">
		<a href="#" class="fh5co-sub-ddown sf-with-ul" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="fh5co-sub-menu" style="display: none;">
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
					</nav>
				</div>
			</div>
		</header>
<?php if ($_GET['p'] == 'home' || !isset($_GET['p'])) {?>
		<div class="fh5co-hero" data-section="home">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(home/data/image/background/slide_a.png);">
				<div class="display-t">
					<div class="display-tc">
						<div class="container">
							<div class="col-md-10 col-md-offset-1">
								<div class="animate-box">
									<h1>Prepare Your Wedding</h1>
									<h2>With Us</h2>
									<p><span><?php echo $objek; ?></span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	
		<!-- end:header-top -->
		
	<div id="fh5co-couple" class="fh5co-section-gray">
			<div class="container">
				<div class="row row-bottom-padded-md animate-box fadeInUp animated">
					<div class="col-md-6">
						 	<img src="home/data/image/background/slide_b.png" style="width:300px; height:300px" class=" " alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
							
						 
						
					</div>
					
					<div class="col-md-6">
						 <h3><?php echo $objek; ?></h3>
						<p><?php echo $objek; ?> merupakan salah satu Wedding Organizer terbaik yang mempunyai tugas untuk memperlancar rencana pernikahan anda</p>
						 
						</div>
				</div>
				 
			</div>
		</div>
		
		
		<div id="fh5co-countdown">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center animate-box">
					<p class="countdown">
					<span id="">-<?php echo baca_database('','ii',"select count(*) as ii From data_paket"); ?>-<small>Paket</small></span>
					<span id="">-<?php echo baca_database('','ii',"select count(*) as ii From data_kategori"); ?>-<small>Kategori Pemesanan</small></span>
					<span id="">-<?php echo baca_database('','ii',"select count(*) as ii From data_pelanggan"); ?>-<small>Member</small></span>
					<span id="">-<?php echo baca_database('','ii',"select count(*) as ii From data_pemesanan"); ?>-<small>Pemesanan</small></span>
					
					</p>
				</div>
			</div>
		</div>


<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section">
						<h2>Recent Blog</h2>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row row-bottom-padded-md">
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

<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box fadeInUp animated">
							<a href="index.php?p=berita&Go=<?php echo $data[$judul];?>"><img class="img-responsive" style="width:100%;height:250px"  src="admin/upload/<?php echo $data['foto']; ?>" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3><a href="index.php?p=berita&Go=<?php echo $data[$judul];?>"><?php echo strtoupper(substr($data['judul'],0,200)); ?></a></h3>
									<span class="by">by Admin</span>
									<span class="posted_date"><?php echo $bulan; ?>, <?php echo $tahun; ?>. <?php echo $tanggal; ?></span>
									 
									<p><?php echo (substr($data['isi'],0,200)); ?>.</p>
									<p><a href="index.php?p=berita&Go=<?php echo $data[$judul];?>">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
				 
			 
				<?php } ?>
		
					
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center animate-box fadeInUp animated">
						<a href="?p=berita" class="btn btn-primary btn-lg">More Blog Posts</a>
					</div>
				</div>

			</div>
		</div>

 <?php
} else {
	
	?>
	<div class="fh5co-hero" data-section="home" style="height:300px">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(home/data/image/background/slide_b.png);height:300px">
				<div class="display-t" style="height:300px">
					<div class="display-tc">
						<div class="container">
							<div class="col-md-10 col-md-offset-1">
								<div class="animate-box">
									<h1><a href="?p=home">Home</a> / <?php echo str_replace("_"," ",ucwords($_GET['p']));?></h1>
									<h2><?php echo str_replace("_"," ",ucwords($_GET['p']));?></h2>
									<p><span><?php echo $objek; ?></span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } 
include 'halaman.php'; ?>
		
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2><?php echo $objek; ?></h2>
						</div>
						<div class="col-md-6 col-md-offset-3 text-center">
							 
							<p><?php echo $copyright; ?></p>
						</div>
					</div>
				</div>
			</div>
		</footer>

	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- Google Map -->
	<script src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<!-- jQuery -->
	<script src="<?php echo $url; ?>dist/scripts.min.js"></script>
	</body>
</html>

