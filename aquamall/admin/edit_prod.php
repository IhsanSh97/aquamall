<?php 

	//start connection
	include("../includes/connection.php");
	//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$product_name  = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$product_desc  = $_POST['product_desc'];
		$cat_id        = $_POST['ctgry'];
	
		/*$cat_name      = $_POST['cat_name'];*/
		
		$prod_img   = $_FILES['prod_img']['name'];
		$tmp_name   = $_FILES['prod_img']['tmp_name'];
		$path       = "upload/";
		$err          = $_FILES['prod_img']['error'];
		
		move_uploaded_file($tmp_name, $path.$prod_img);
		
		
		
		
			if($err == 0){
				$query1 	= "UPDATE product SET product_name = '$product_name', product_price = '$product_price', product_desc = '$product_desc', prod_img = '$prod_img' , cat_id = '$cat_id' WHERE product_id = {$_GET['product_id']}";
			}
			else{
				$query1 	= "UPDATE product SET product_name = '$product_name', product_price = '$product_price', product_desc = '$product_desc', cat_id = '$cat_id' WHERE product_id = {$_GET['product_id']}";
			}
		
			mysqli_query($conn, $query1);
		
			header("location:manage_product.php");
		/*}
		else{
			$query 	= "INSERT INTO product(product_name, product_price, product_desc) values('$product_name', '$product_price', '$product_desc')";
		
			//perform query
			mysqli_query($conn, $query);
			header("location:manage_product.php");
		}*/
		
		
	}

	$query  = "SELECT * FROM product WHERE product_id = {$_GET['product_id']}";
	$result = mysqli_query($conn, $query);
	$row    = mysqli_fetch_assoc($result);

	/*echo $query;
	die;*/

	include("../includes/admin_header.php"); 
	
?>


	<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Create Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-pament" name="product_name" type="text" class="form-control" value="<?php echo $row['product_name'] ?>" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                                <input id="cc-pament" name="product_price" type="text" class="form-control" value="<?php echo $row['product_price']?>" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Description</label>
                                                <input id="cc-pament" name="product_desc" type="text" class="form-control" value="<?php echo $row['product_desc']?>" aria-required="true" aria-invalid="false">
                                            </div>
											<div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Image</label>
                                                <input id="cc-pament" name="prod_img" type="file" class="form-control" value="<?php echo $row['prod_img']?>" aria-required="true" aria-invalid="false">
                                            </div>
											<div class="form-group">
												<label for="cc-payment" class="control-label mb-1">Category</label>
												<select required name="ctgry" class="form-control">
													<option selected disabled>Select Category</option>
													<?php
														$select_cat = "SELECT * FROM category";
													  /* echo $select_cat;
													   die;*/
														$res = mysqli_query($conn, $select_cat);
													
														while($cat = mysqli_fetch_array($res)){
															if($_GET['cat_id'] == $cat['cat_id']){
																echo "<option selected value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
															}
															else
																echo "<option value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
														}
													?>
												</select>
											</div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">Update
                                                    
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
                                    <!--<table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Product Description</th>
                                                <th>Category</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>-->
                                </div>
                                <!-- END DATA TABLE-->
								<!-- modal large -->
							<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<button type="button" class="btn btn-primary">Confirm</button>
										</div>
									</div>
								</div>
							</div>
							<!-- end modal large -->
						</div>
					</div>
				</div>					
		</div>
<?php include("../includes/admin_footer.php"); ?>