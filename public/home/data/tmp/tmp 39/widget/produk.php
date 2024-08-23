<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol)
{
    
?>
<style>
body{margin-top:20px;
background:#f1f2f7;
}

/*panel*/
.panel {
    border: none;
    box-shadow: none;
}

.panel-heading {
    border-color:#eff2f7 ;
    font-size: 16px;
    font-weight: 300;
}

.panel-title {
    color: #2A3542;
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 0;
    margin-top: 0;
    font-family: 'Open Sans', sans-serif;
}


/*product list*/

.prod-cat li a{
    border-bottom: 1px dashed #d9d9d9;
}

.prod-cat li a {
    color: #3b3b3b;
}

.prod-cat li ul {
    margin-left: 30px;
}

.prod-cat li ul li a{
    border-bottom:none;
}
.prod-cat li ul li a:hover,.prod-cat li ul li a:focus, .prod-cat li ul li.active a , .prod-cat li a:hover,.prod-cat li a:focus, .prod-cat li a.active{
    background: none;
    color: #ff7261;
}

.pro-lab{
    margin-right: 20px;
    font-weight: normal;
}

.pro-sort {
    padding-right: 20px;
    float: left;
}

.pro-page-list {
    margin: 5px 0 0 0;
}

.product-list img{
    width: 100%;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
}

.product-list .pro-img-box {
    position: relative;
}
.adtocart {
    background: #fc5959;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    color: #fff;
    display: inline-block;
    text-align: center;
    border: 3px solid #fff;
    left: 45%;
    bottom: -25px;
    position: absolute;
}

.adtocart i{
    color: #fff;
    font-size: 25px;
    line-height: 42px;
}

.pro-title {
    color: #5A5A5A;
    display: inline-block;
    margin-top: 20px;
    font-size: 16px;
}

.product-list .price {
    color:#fc5959 ;
    font-size: 15px;
}

.pro-img-details {
    margin-left: -15px;
}

.pro-img-details img {
    width: 100%;
}

.pro-d-title {
    font-size: 16px;
    margin-top: 0;
}

.product_meta {
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    padding: 10px 0;
    margin: 15px 0;
}

.product_meta span {
    display: block;
    margin-bottom: 10px;
}
.product_meta a, .pro-price{
    color:#fc5959 ;
}

.pro-price, .amount-old {
    font-size: 18px;
    padding: 0 10px;
}

.amount-old {
    text-decoration: line-through;
}

.quantity {
    width: 120px;
}

.pro-img-list {
    margin: 10px 0 0 -15px;
    width: 100%;
    display: inline-block;
}

.pro-img-list a {
    float: left;
    margin-right: 10px;
    margin-bottom: 10px;
}

.pro-d-head {
    font-size: 18px;
    font-weight: 300;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container bootdey">
    <div class="col-md-3">
	
	 <section class="panel">
            <div class="panel-body">
                <form name="formcari" id="formcari" action="" method="get">
        <fieldset>
            <table>
                <tbody>
                    <input name="p" value="produk" id="page" type="hidden">
                    <input
					class="form-control"
                        name="Berdasarkan"
                        value="<?php echo $nama; ?>"
                        id="Berdasarkan"
                        type="hidden">
                    <tr>
                      
                        <td>
                            <input type="text" name="isi" class="form-control" value="">
                            <?php
						if (isset($_GET['Berdasarkan']))
						{
							btn_cari('Cari');
							?>
                            <a class="btn btn-primary" href="index.php?p=produk">
                                Reset
                            </a>
                        <?php
						}
						else
						{
							?>

                            <?php
							btn_cari('	');
							
						}
						?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
   
            </div>
        </section>
      <section class="panel">
            <header class="panel-heading">
                Category
            </header>
            <div class="panel-body">
                <ul class="nav prod-cat">
				 <?php
		  
				$querykategori="select * from data_$kategori";		
				$proseskategori = mysql_query($querykategori);
				while ($datakategori = mysql_fetch_array($proseskategori))
				  { 
			  
		  ?>
                    <li>
                        <a href="?p=kategori&Berdasarkan=kategori&isi=<?php echo $datakategori["$kategori"];?>"><?php echo $datakategori["$kategori"];?></a>
                    </li>
				  <?php } ?>
                </ul>
            </div>
        </section>
      
</div>

  <div class="col-md-9">
       

       
<?php
				if (isset($_GET['page']) && !empty($_GET['page'])){ $page = (int)$_GET['page']; }
				else { $page = 1; }
				if (isset($_GET['perPage']) && !empty($_GET['perPage'])){ $dataPerPage = (int)$_GET['perPage']; }
				else { $dataPerPage = 12; }
				
				
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan = $_GET['Berdasarkan'];
				$isi = $_GET['isi'];
				$querytabel="SELECT * FROM $tabel where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM $tabel  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel";
				}
				$proses = mysql_query($querytabel); ?>
				
				 <section class="panel">
            <div class="panel-body">
                <div class="pull-right" style="padding-bottom:10px">
                    <ul class="pagination pagination-sm pro-page-list">
                   <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?>
                    </ul>
					
                </div>
            </div>
			
        </section>
		
				 <div class="row product-list">
				<?php 
				while ($data = mysql_fetch_array($proses))
				  { 
                    $nama_data = $data[$nama];
                    $nama_link = str_replace('-', 'x~x',$nama_data);
					$nama_link = str_replace(' ', '-',$nama_link);
					
			$jmlstok =  $data["$stok"];
			?>
			
			 <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="admin/upload/<?php echo $data[$foto];?>" onerror="this.src='home/data/image/error/error.png'" width="100%" alt="" />
						  <?php if ($jmlstok <=0)
										{
											?>
						<a  onclick="alert('Maaf Stok Tidak Cukup');" class="adtocart">
                            <i class="fa fa-times"></i>
                        </a>
						
                <?php
										}
										else
										{
										?>
                   
						<a  href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    <?php } ?>
                       
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                             <?php if ($jmlstok <=0)
										{
											?>
						<a  onclick="alert('Maaf Stok Tidak Cukup');" class="pro-title">
                                <?php echo $data["$nama"];?>
                            </a>
							
							  </a>
						
                <?php
										}
										else
										{
										?>
                   
				     <a  href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>" class="pro-title">
                                <?php echo $data["$nama"];?>
                            </a>
							
						
                    <?php } ?>
					
                        </h4> <Br>
                        <p class="price"><?php echo rupiah($data["$harga"]);?></p>
						<p>Stock : <?php echo $jmlstok = $data["$stok"];?></p>
                    </div>
                </section>
            </div> 
  
<!--
    
    <div class="col-lg-4">
  <div class="pricing-box-alt">		
					<div class="pricing-terms">
                    <a
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>">
                        <img
                            width="350"
                            height="200"
							onerror="this.src='home/data/image/error/error.png'"
                            src="admin/upload/<?php echo $data[$foto];?>" alt="item4">
                    </a>
								</div>
								<div class="pricing-content">
								 <center>
                    
                    <?php echo $data["$nama"];?>
                    <br>
                    <font color="red">
                        <?php echo ucwords($kategori);?>
                        :
                        <?php echo $data["$kategori"];?>
                    </font>
                    <br>
                    <font color="green">
                        Stok :
                        <?php echo $jmlstok = $data["$stok"];?>
                    </font>
                    <br>
                    <b><?php echo rupiah($data["$harga"]);?></b>
                    <br>
                    <br>
                    <a
                        href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" class="btn btn-info">
                        Detail
                    </a>
                    <?php if ($jmlstok <=0)
										{
											?>
                    <a onclick="alert('Maaf Stok Tidak Cukup');" class="btn btn-danger">
                        <?php echo $namatombol;?>
                    </a>
                <?php
										}
										else
										{
										?>
                    <a
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>"class="btn btn-danger">

                        <?php echo $namatombol;?>
                    </a>
                    <?php } ?>
                    <br>
                    <br>
                </center>
								</div>
							
							</div></div>
-->

    <?php
			  
			  } ?>
 </div>
    </div>
</div>
<div class="col-md-12">
    <br>
    
    <br>
    <br>
</div>
<?php } ?>