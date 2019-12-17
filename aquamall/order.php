<?php 
include("includes/puplic_header.php");

	

?>

<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg); height: 30pc; ">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
					<div class='page-title text-center'>

						<h4>THANK YOU FOR YOUR TRUST!</h4>
						
							<?php 
							
								if(isset($_POST['order'])){

									$date = date('Y.m.d');
									$order_query = "INSERT INTO orders(order_date, customer_id) VALUES('$date', {$_SESSION['cust_id']})";
									
									/*echo $order_query;
									die;
									*/
									/*mysqli_query($conn, $order_query);

									$sel_query = "SELECT * FROM order";*/

									if(mysqli_query($conn, $order_query))
									{
										$last_id = mysqli_insert_id($conn);
										echo "<span>your order ID is: ".$last_id."</span>"; 
									}
								}
							?>
							

					</div>
				</div>
			</div>
		</div>
</div>

<?php include("includes/puplic_footer.php");?>