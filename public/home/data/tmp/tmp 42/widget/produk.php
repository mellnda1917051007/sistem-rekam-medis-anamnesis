<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol)
{
    
?>

<div class="col-md-12">

    <br><br>
    <form name="formcari" id="formcari" action="" method="get">
        <fieldset>
            <table>
                <tbody>
                    <input name="p" value="produk" id="page" type="hidden">
                    <input
                        name="Berdasarkan"
                        value="<?php echo $nama; ?>"
                        id="Berdasarkan"
                        type="hidden">
                   	<div class="row">
							<div class="col-md-6">
                                <input type="text" class="form-control" name="isi" value="">
								</div>
															<div class="col-md-6">

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
							btn_cari('Cari');
							
						}
						?></div>
								</div>
                        
                </tbody>
            </table>
        </fieldset>
    </form>
    <br>
</div>

<div id="fh5co-guest">
			<div class="container">
			 <div class="row row-bottom-padded-lg">
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
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { 
                    $nama_data = $data[$nama];
                    $nama_link = str_replace('-', 'x~x',$nama_data);
					$nama_link = str_replace(' ', '-',$nama_link);
					
			  
			?>

    
   <div class="col-md-4 text-center animate-box fadeInUp animated">
					 
					 <div class="groom-men">
                    <a
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>">
                        <img  class="img-responsive" 
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
					<div class="row">
					<div class="col-md-6" style="padding-right:10px; width:150px">
					
                    <a
                        href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" style="width:150px" class="btn btn-info">
                        Detail
                    </a>
					</div>
					<div class="col-md-6" style="padding-left:0px">
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
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>" style="width:150px" class="btn btn-primary btn-block">

                        <?php echo $namatombol;?>
                    </a>
                    <?php } ?>
					</div>
					</div>
                    <br>
                    <br>
                </center>
								</div>
							
							</div> 

    <?php
			  
			  } ?>
</div>
</div>
</div>

<div class="col-md-12">
  <center>  <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?> </center>
    <br>
    <br>
    <br>
</div>
<?php } ?>