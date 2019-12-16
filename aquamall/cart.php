
<?php 

	

	

?> 

<!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
				<?php
					
					if(isset($_POST['addtocart'])){
						
						$query2 = "SELECT * FROM product WHERE product_id = {$_GET['product_id']}";
						$result2 = mysqli_query($conn, $query2);
						
						/*echo $query2;
						die;*/
						
						while($row2 = mysqli_fetch_assoc($result2)){
				
							$_SESSION['product_id'] = $_GET['product_id'];
							
							
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
					
						}
					}
				?>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$274.00</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-15%</span></li>
                    <li><span>total:</span> <span>$232.00</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->