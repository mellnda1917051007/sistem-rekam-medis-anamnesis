<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol)
{
    
?>
<Style>
:root {
  --font-primary: "Open Sans", sans-serif;
  --font-secondary: "Josefin Sans", sans-serif;
  --color-primary: #7c83ff;
  --color-secondary: #f097a5;
  --color-text-primary: #000;
  --color-text-secondary: #666;
  --bg-body: #eee;
  --bg-primary: #fff;
  --bg-secondary: #fcfcfc;
  --rem-mobile: 10px;
  --rem-tablet: 12px;
  --rem-laptop: 13px;
  --rem-desktop: 14px;
  --rem-big: 16px;
  --size-mini: 0.8rem;
  --size-small: 1.5rem;
  --size-medium: 2rem;
  --size-big: 3rem;
  --size-massive: 4rem;
}

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
  font-size: 10px;
}
@media screen and (min-width: 426px) {
  html {
    font-size: 12px;
  }
}
@media screen and (min-width: 769px) {
  html {
    font-size: 13px;
  }
}
@media screen and (min-width: 1025px) {
  html {
    font-size: 14px;
  }
}
@media screen and (min-width: 1441px) {
  html {
    font-size: 16px;
  }
}

body {
  font-size: 1.4rem;
  background-color: #eee;
  font-family: var(--font-primary);
}

.Icon {
  transition: all 0.3s;
}

.Icon--colored {
  fill: #f097a5;
}

.Icon--stroked {
  fill: none;
  stroke: var(--color-secondary);
  stroke-width: 3px;
}

.Icon:hover {
  opacity: 0.75;
}

.Icon--small {
  height: 1.5rem;
  width: 1.5rem;
}

.Icon--medium {
  height: 2rem;
  width: 2rem;
}

.Icon--big {
  height: 3rem;
  width: 3rem;
}

.Icon--massive {
  height: 4rem;
  width: 4rem;
}

.Icon--facebook {
  fill: #3b5999;
}

.Icon--twitter {
  fill: #55acee;
}

.SocialLink {
  text-decoration: none;
  transition: all 0.3s;
  padding: 0 0.2rem;
}

.IconBtn {
  padding: 0;
  border: none;
  background-color: transparent;
  cursor: pointer;
  outline: none;
}

.ProductSet {
  display: flex;
  flex-wrap: wrap;
  padding: 1rem;
}
.ProductSet--grid {
  margin-left: 1rem;
  justify-content: center;
}
.ProductSet--grid > * {
  margin: 0 1rem 1rem 0;
}
.ProductSet--list {
  flex-direction: column;
}
.ProductSet--list > *:not(:last-child) {
  margin-bottom: 1rem;
}

.ProductCard {
  display: flex;
  text-decoration: none;
  border-radius: 1rem;
  overflow: hidden;
  background-color: #fff;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.15);
  transition: all 0.2s;
}
.ProductCard:hover {
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  transform: translateY(-0.5rem);
}
@media screen and (min-width: 426px) {
  .ProductCard {
    font-size: 1.2rem;
  }
}
.ProductCard--grid {
  width: 25rem;
  flex-direction: column;
}
.ProductCard--list {
  max-height: 15rem;
}
.ProductCard--list .ProductCard__img-wrapper {
  max-width: 15rem;
  width: 40%;
  margin: 2rem 0 2rem 2rem;
  overflow: hidden;
  display: flex;
  align-items: center;
}
@media screen and (min-width: 426px) {
  .ProductCard--list .ProductCard__img-wrapper {
    margin: initial;
    flex: 1 1 auto;
  }
}
.ProductCard__img {
  width: 100%;
}
.ProductCard--grid .ProductCard__details {
  padding: 3rem 2.5rem;
}
.ProductCard--list .ProductCard__details {
  margin: 2.5rem;
  width: 60%;
}
@media screen and (min-width: 426px) {
  .ProductCard--list .ProductCard__details {
    width: 0;
    flex: 1 1 auto;
  }
}
.ProductCard__details__header {
  display: flex;
  justify-content: space-between;
}
.ProductCard--grid .ProductCard__details__header {
  align-items: flex-end;
}
.ProductCard--list .ProductCard__details__header {
  margin-bottom: 2rem;
  align-items: flex-start;
}
.ProductCard .ProductCard__titles {
  margin-right: 1rem;
}
.ProductCard__title {
  color: #000;
  margin-bottom: 1rem;
  text-transform: uppercase;
  font-family: var(--font-secondary);
  font-weight: 400;
}
.ProductCard--list .ProductCard__title {
  margin-bottom: 1.5rem;
}
.ProductCard__price {
  font-size: 1.2rem;
  color: var(--color-text-secondary);
  font-weight: 400;
}
@media screen and (min-width: 426px) {
  .ProductCard__price {
    font-size: 1.1rem;
  }
}
.ProductCard__description {
  color: var(--color-text-secondary);
  display: none;
}
@media screen and (min-width: 426px) {
  .ProductCard__description {
    font-size: 1rem;
  }
}
@media screen and (min-width: 426px) {
  .ProductCard--list .ProductCard__description {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: block;
  }
}
</Style>


   <div class="container">
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
                    <tr>
                        <td>Pencarian</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="isi" value="">
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
						?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
   </div>
   <Br>
   <Br>

<div class="ProductSet ProductSet--grid">

<div class="col-md-12">

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
<div class="col-md-4" style="margin-bottom:40px">
      <a class="ProductCard ProductCard--grid">
    <div class="ProductCard__img-wrapper">
      <img  src="admin/upload/<?php echo $data[$foto];?>" onerror="this.src='home/data/image/error/error.png'" alt="Shoe" class="ProductCard__img">
    </div>

    <div class="ProductCard__details">

      <div class="ProductCard__details__header">
        <div class="ProductCard__titles">
		<Br>
          <h4 class="ProductCard__title" style="padding-left:20px"> <?php echo $data["$nama"];?></h4>
		  <h5 style="padding-left:20px">   <?php echo ucwords($kategori);?>
                        :
                        <?php echo $data["$kategori"];?></h5>
						<h5 style="padding-left:20px"> Stok :
                        <?php echo $jmlstok = $data["$stok"];?></h5>
          <h5 style="padding-left:20px" class="ProductCard__price"><?php echo rupiah($data["$harga"]);?></h5>
		  <Br>
		 <CenteR>  <a
                        href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" class="btn btn-info">
                        Detail
                    </a>
					
		   <?php if ($jmlstok <=0)
										{
											?>
                    <a onclick="alert('Maaf Stok Tidak Cukup');" class="btn btn-danger">
                      <Center> Habis </center>
                    </a>
                <?php
										}
										else
										{
										?>
                    <a  href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>"  class="btn btn-success">

                       <center> <?php echo $namatombol;?> </center>
                    </a> </center>
                    <?php } ?>
        
		 </div>

        <button class="IconBtn">
          <svg class="Icon Icon--medium Icon--colored">
            <use xlink:href="admin/upload/<?php echo $data[$foto];?>"></use>
          </svg>
        </button>
		
      </div>

      <p class="ProductCard__description">
        The Low 2 in Alloy grey is constructed with a premium nubuck leather upper and a leather coated Sanipur insole.
      </p>
    </div>
	
	 
		
  </a>
  </div>
  
   <!-- <div class="col-lg-4">
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

<div class="col-md-12">
    <br>
 <center>   <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?></center>
    <br>
    <br>
</div>
<?php } ?>