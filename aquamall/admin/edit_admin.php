<?php

	include("../includes/connection.php");

	//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$email    = $_POST['admin_email'];
		$password = $_POST['admin_password'];
		$fullname = $_POST['fullname'];
		
		$query 	= "UPDATE admin SET admin_email = '$email', admin_password = '$password', fullname = '$fullname' WHERE admin_id = {$_GET['admin_id']}";
		
		//perform query
		mysqli_query($conn, $query);
		header("location:manage_admin.php");
	}

	$query  = "SELECT * FROM admin WHERE admin_id = {$_GET['admin_id']}";
	$result = mysqli_query($conn, $query);
	$row    = mysqli_fetch_assoc($result);

	include("../includes/admin_header.php"); 
	

?>

	<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input id="cc-pament" name="admin_email" type="text" class="form-control" value="<?php echo $row['admin_email'] ?>" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                                <input id="cc-pament" name="admin_password" type="password" class="form-control" value="<?php echo $row['admin_password']?>" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Fullname</label>
                                                <input id="cc-pament" name="fullname" type="text" class="form-control" value="<?php echo $row['fullname']?>" aria-required="true" aria-invalid="false">
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
                                
								
						</div>
					</div>
				</div>					
		</div>
<?php include("../includes/admin_footer.php"); ?>