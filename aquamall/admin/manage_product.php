<?php 

	//start connection
	include("../includes/connection.php");
	//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$product_name  = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$product_desc  = $_POST['product_desc'];
		$cat_id        = $_POST['cat_id'];
	
		/*$cat_name      = $_POST['cat_name'];*/
		
		
		
		if(isset($_POST['ctgry'])){
			echo $select = "SELECT * FROM category WHERE {$_GET['cat_id']} ";
			die;
			mysqli_query($conn, $select);
			$cat_id = $_POST['cat_id'];
			$query1 = "INSERT INTO product(cat_id) values('$cat_id')";
			mysqli_query($conn, $query1);
			
		}
		$query 	= "INSERT INTO product(product_name, product_price, product_desc) values('$product_name', '$product_price', '$product_desc')";
		
		//perform query
		mysqli_query($conn, $query);
		header("location:manage_product.php");
	}

	

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
                                        <form action="" method="get">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                                <input id="cc-pament" name="product_price" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Description</label>
                                                <input id="cc-pament" name="product_desc" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
											
											<div class="form-group">
												<label for="cc-payment" class="control-label mb-1">Category</label>
												<select required name="ctgry" class="btn btn-outline-primary btn-lg btn-block">
													<option selected disabled>Select Category</option>
													<?php
														$select_cat = "SELECT * FROM category";
														$res = mysqli_query($conn, $select_cat);
														while($cat = mysqli_fetch_assoc($res)){
															echo"<option value='{$_GET['cat_id']}'>{$cat['cat_name']}</option>";
														}
													?>
												</select>
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
                                            <?php
												$query  = "SELECT * FROM product";
												$result = mysqli_query($conn, $query);
												while($row = mysqli_fetch_assoc($result)){
													echo "<tr>";
													echo "<td>{$row['product_id']}</td>";
													echo "<td>{$row['product_name']}</td>";
													echo "<td>{$row['product_price']}</td>";
													echo "<td>{$row['product_desc']}</td>";
													echo "<td>{$row['cat_id']}</td>";
													echo "<td><a href='edit_prod.php?product_id={$row['product_id']}' class='btn btn-warning'>Edit</a></td>";
													echo "<td><a href = 'delete_prod.php?product_id={$row['product_id']}' class='btn btn-danger'>Delete</a></td>";
													echo "</tr>";
												}
											?>
                                        </tbody>
                                    </table>
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