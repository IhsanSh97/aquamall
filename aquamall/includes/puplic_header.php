<?php 
session_start(); 
include("includes/connection.php");

	if(isset($_POST['check'])/* && isset($_SESSION['customer_id'])*/){
		if(isset($_SESSION['cust_id'])){
			echo '<script>window.top.location="checkout.php"</script>';
			
		}
		else{
			echo '<script>window.top.location="login.php"</script>';
			
		}
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>   
<!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Rompers</a></li>
                                        <li><a href="shop.html">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                    <li><a href="regular-page.html">Regular Page</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="get">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="login.php"><img src="img/core-img/user.svg" alt=""></a>
                </div>
				<!-- User Logout -->
                <div class="user-login-info">
                    <a href="logout.php">Logout</a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> 
						<span><?php 
							if(isset($_SESSION['product_id']))
								echo count($_SESSION['product_id']);
							else
								echo 0;
						?>
						</span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    
 

<!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> 
				<span><?php if(isset($_SESSION['product_id']))
								echo count($_SESSION['product_id']);
							else
								echo 0;
						?>
				</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
				<?php
					
				$price = 0;
					if(isset($_SESSION['product_id']) && count($_SESSION['product_id']) > 0){
						
						foreach($_SESSION['product_id'] as $prod_id)
							{
							$query2 = "SELECT * FROM product WHERE product_id = $prod_id";
							$result2 = mysqli_query($conn, $query2);



							while($row2 = mysqli_fetch_assoc($result2)){


								echo "<div class='single-cart-item'>
									<a href='#' class='product-image'>
										<img src='admin/upload/{$row2['prod_img']}' class='cart-thumb' alt=''>

										<div class='cart-item-desc'>
										  <span class='product-remove'><i class='fa fa-close' aria-hidden='true'></i></span>";
								echo	"<span class='badge'>{$row2['product_name']}</span>";
								echo		"<h6>Description</h6>
											<p class='size'>Size: S</p>
											<p class='color'>Color: Red</p>";
								echo		"<p class='price'>{$row2['product_price']}</p>";
								echo	"</div></a></div>";
								
								

							$price += $row2['product_price']; 
				}
						}
					}
            echo "</div>";

            
            echo "<div class='cart-amount-summary'>";
			
				echo "<h2>Summary</h2>
                	  <ul class='summary-table'>
						<li><span>subtotal:</span> <span>$ $price</span></li>
						<li><span>delivery:</span> <span>Free</span></li>
						<li><span>discount:</span> <span>0%</span></li>
						<li><span>total:</span> <span>$ $price</span></li>
					 </ul>";
                ?>
				<form action="#" method="post">
					<div class='checkout-btn mt-100'>
						<button type="submit" name="check" class="btn essence-btn">check out</button>
					</div>
				</form>	
			
                
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->