<?php 

	//start connection
	include("../includes/connection.php");
	//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$name         = $_POST['cat_name'];
		
		/*echo "<pre>"; print_r($_FILES);die;*/
		// get data from file
		$cat_img      = $_FILES['cat_img']['name'];
		$temp_name    = $_FILES['cat_img']['tmp_name'];
		$path         = "upload/".$cat_img;
		
		
		move_uploaded_file($temp_name, $path);
		
		$query 	 = "INSERT INTO category (cat_name,cat_img) values('$name', '$cat_img')";
		
		//perform query
		mysqli_query($conn, $query);
		header("location:manage_category.php");
	}

	

	include("../includes/admin_header.php"); 
	
?>


	<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Create Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="cat_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
											<div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Image</label>
                                                <input id="cc-pament" name="cat_img" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
											<div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">Save
                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
							<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>view</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$query  = "SELECT * FROM category";
												$result = mysqli_query($conn, $query);
												while($row = mysqli_fetch_assoc($result)){
													echo "<tr>";
													echo "<td>{$row['cat_id']}</td>";
													echo "<td>{$row['cat_name']}</td>";
													echo "<td><img width='100px' src='upload/{$row['cat_img']}'/></td>";
													echo "<td><a href = 'view_prod.php?cat_id={$row['cat_id']}' class='btn btn-success'>View</a></td>";
													echo "<td><a href='edit_cat.php?cat_id={$row['cat_id']}&cat_img={$row['cat_img']}' class='btn btn-warning' data-toggle = 'modal' data-target = '#largemodal'>Edit</a></td>";
													echo "<td><a href = 'delete_cat.php?cat_id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
													echo "</tr>";
												}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
						</div>
					</div>
				</div>					
		</div>
<?php include("../includes/admin_footer.php"); ?>