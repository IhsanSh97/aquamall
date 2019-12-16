<?php

	include("../includes/connection.php");

	$query2 = "SELECT * FROM product where cat_id = {$_GET['cat_id']}";
	
	mysqli_query($conn, $query2);

	/*echo $_GET['cat_name'];
die;*/

	include("../includes/admin_header.php"); 
?>
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
<div class="row m-t-30">
     <div class="col-md-12">
         <!-- DATA TABLE-->
         <div class="table-responsive m-b-40">
			 <h1 align="center"><?php echo $_GET['cat_name']; ?></h1>
              <table class="table table-borderless table-data3">
                    <thead>
                          <tr>
                              <th>#</th>
                              <th>Product Name</th>
                              <th>Product Price</th>
                              <th>Product Description</th>
                              <th>Image</th>
                          </tr>
                    </thead>
                    <tbody>
                          <?php
											
								$query  = "SELECT * FROM product WHERE cat_id = {$_GET['cat_id']}";
						
								$result = mysqli_query($conn, $query);
						
								while($row = mysqli_fetch_assoc($result)){
									echo "<tr>";
									echo "<td>{$row['product_id']}</td>";
									echo "<td>{$row['product_name']}</td>";
									echo "<td>{$row['product_price']}</td>";
									echo "<td>{$row['product_desc']}</td>";
									echo "<td><img width='100px' src='upload/{$row['prod_img']}'/></td>";									
								}
											
							?>
                        </tbody>
                    </table>
          </div>
	</div>
</div>
							</div></div>
	</div>
</div>
<?php include("../includes/admin_footer.php"); ?>