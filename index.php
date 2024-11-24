<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">

<script>
$(document).ready(function(){
   //create variable
   var counts = 0;
   $(".addtocart").click(function () {
   //to number and increase to 1 on each click
      counts += +1;
      $("#cart-counter").animate({
   //show span with number
                opacity: 1
            }, 300, function () {
   //write number of counts into span
                $(this).text(counts);
            });
        }); 
});
</script>

 <div class="header">
  <a href="#default" class="logo">Katalog Toko Saya</a>
  <div class="header-right">
      <button type="button" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-shopping-cart" ></span> <span class="badge" id="cart-counter"></span>
          Keranjangku
        </button>
  </div>
</div> 

<br>

<div class="containter">
<?php
include('koneksi.php');
$sql="select * from produk order by harga asc";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	echo "<div class='containter'>";
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<div class='col-xs-3'>";
		echo "<img src='".$row['FotoProduk']."' height='128px'>";
		echo "<div class='col-xs-12'><h3>".$row['NamaProduk']."</h3> ".number_format($row['Harga'],0,'','.')."</div>";
		echo "<div class='col-xs-12'><button type='button' class='btn btn-success btn-sm addtocart'>+ Keranjang</button></div>";
		echo "</div>";
	}
	
}else
{
	echo "Data Produk belum ada.";
}
?>
</div>

<div class="footer">
  &copy; 2021 Pemrograman Web | FTII Unisbank. 
</div>