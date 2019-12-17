<?php 
include("includes/puplic_header.php"); 

	//customer data
	$query = "SELECT * FROM customer 
			  WHERE customer_id = {$_SESSION['cust_id']}";	

	$rslt  = mysqli_query($conn, $query);

	$row = mysqli_fetch_assoc($rslt);


	

	
	
?>
<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Full Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="first_name" value="<?php echo $row['name'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Phone <span>*</span></label>
                                    <input type="text" name="phone" class="form-control" id="last_name" value="<?php echo $row['mobile'] ?>" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <input type="text" name="cntry" class="form-control" id="city" value="<?php echo $row['country'] ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">City <span>*</span></label>
                                    <input type="text" name="city" class="form-control" id="city" value="<?php echo $row['city'] ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="state">Street <span>*</span></label>
                                    <input type="text" name="strt" class="form-control" id="state" value="<?php echo $row['street'] ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Building <span>*</span></label>
                                    <input type="text" name="bldng" class="form-control" id="phone_number" min="0" value="<?php echo $row['building'] ?>">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="email_address" value="<?php echo $row['email'] ?>">
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>
							<?php
								//product invoice data
	
								$price = 0;
								if(isset($_SESSION['product_id']) && count($_SESSION['product_id']) > 0){

									foreach($_SESSION['product_id'] as $prod_id){
										
										$query2 = "SELECT * FROM product WHERE product_id = $prod_id";
										$result2 = mysqli_query($conn, $query2);
										
										while($row2 = mysqli_fetch_assoc($result2)){
											
											echo "<li><span>{$row2['product_name']}</span><span>$ {$row2['product_price']}</span></li>";
											

											
											
											$price += $row2['product_price']; 
										}
									}
									echo "<li><span>Shipping</span> <span>Free</span></li>
												<li><span>Total</span><span>$ ";
									echo $price."</span>";
								}
                            	
							?>
								
							</li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery only</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
						<form action="order.php" method="post">
							<button name="order" class="btn essence-btn">Place Order</button>
						</form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
<?php include("includes/puplic_footer.php"); ?>