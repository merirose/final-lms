<?php
include "connection.php";

?>
<?php
include "header.php";
?>

	<div class="row">
		<div class="panel panel-danger">
  <div class="panel-heading">New Books</div>
  <div class="panel-body">
  		<div class="row">
  			<?php
  			$qry=mysqli_query($con,"select * from table_category order by category_id desc ");
  			while ($row=mysqli_fetch_array($qry)) {
	  			echo "<div class='col-lg-2 col-md-2 col-sm-4 col-xs-4'>
		  		<a href='https://goalkicker.com/'><img src='images/lectures/".$row["category_image"]."'
	  			style='width:100%;' /><br /><h4 style='text-align:center;'>".$row["category_name"]."</h4></div>";
  			}
  			?>
</div>
</div>
</div>
	</div>

	<?php include "footer.php";?>
</div>
</body>
</html>