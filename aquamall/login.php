<?php include("includes/puplic_header.php"); 

	if(isset($_POST['regist'])){
		
		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$password = $_POST['password'];
		$number   = $_POST['number'];
		
		$q      = "SELECT * FROM customer";
		$result = mysqli_query($conn, $q);
		
		while($row = mysqli_fetch_assoc($result)){
			
			if($email != $row['email']){
				$reg_query = "INSERT INTO customer(name, email, password, mobile) VALUES('$name', '$email', '$password', '$number')";

				$reg_result = mysqli_query($conn, $reg_query);

				while($reg_row = mysqli_fetch_assoc($reg_result)){
					
					$_SESSION['cust_id'] = $reg_row['customer_id'];
					
					echo '<script>window.top.location="index.php"</script>';
				}
			}
			else
				$msg = "This email is already registered!";
		}
	}

	

	if(isset($_POST['login'])){
		
		$email    = $_POST['log_email'];
		$password = $_POST['log_pass'];
		
		if(!empty($email) && !empty($password)){
		
			$log_query = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";

			$rslt = mysqli_query($conn, $log_query);

			$cust = mysqli_fetch_assoc($rslt);


			if($cust['customer_id']){
				$_SESSION['customet_id'] = $cust['customer_id'];
				$_SESSION['name']        = $cust['name'];
				/*header("location:index.php");*/
				
				/*echo $_SESSION['customet_id'];
				die;*/
				echo '<script>window.top.location="index.php"</script>';
			}
			else
				$err = "Your email or password is incorrect.";

			}
	}
?>

<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>LogIn and Registration</h2>
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
							<div class="alert alert-warning">Don't have an account? Regist now</div>
                            <h5>Register</h5>
                        </div>

                        <form action="#" method="post">
							<h6>Personal Info</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Full Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="first_name" value="" required>
                                </div>
								<div class="col-md-6 mb-3">
                                    <label for="first_name">Phone Number <span>*</span></label>
                                    <input type="text" name="number" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-12 mb-3">
									<?php  if(isset($msg))
											  echo "<div class='alert alert-danger'>$msg</div>"; 
									?>
                                    <label for="company">Email <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="company" value="" required>
                                </div>
								<div class="col-12 mb-3">
                                    <label for="company">Password <span>*</span></label>
                                    <input type="password" name="password" class="form-control" id="company" value="" required>
                                </div>
							</div>
							<button href="#" name="regist" class="btn essence-btn">Regist</button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
					<div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
							<div class="alert alert-success">Already have an account? Login now</div>
                            <h5>Login</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <?php  
									if(isset($err))
									   {
										   echo "<div class='alert alert-danger'>$err</div>";
									   }
								?>
                                <div class="col-12 mb-3">
                                    <label for="company">Email <span>*</span></label>
                                    <input type="email" name="log_email" class="form-control" id="company" value="" required>
                                </div>
								<div class="col-12 mb-3">
                                    <label for="company">Password <span>*</span></label>
                                    <input type="password" name="log_pass" class="form-control" id="company" value="" required>
                                </div>
                                
                            </div>
							<button href="#" name="login" class="btn essence-btn">Login</button>
                        </form>
                    </div>
<!--
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>LogIn</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>
                            <li><span>Cocktail Yellow dress</span> <span>$59.90</span></li>
                            <li><span>Subtotal</span> <span>$59.90</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Total</span> <span>$59.90</span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-circle-o mr-3"></i>credit card</a>
                                    </h6>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse quo sint repudiandae suscipit ab soluta delectus voluptate, vero vitae</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="fa fa-circle-o mr-3"></i>direct bank transfer</a>
                                    </h6>
                                </div>
                                <div id="collapseFour" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est cum autem eveniet saepe fugit, impedit magni.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn essence-btn">Place Order</a>
                    </div>
-->
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
<?php include("includes/puplic_footer.php"); ?>