<?php

	include("../includes/connection.php");

	//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$name         = $_POST['cat_name'];
		
		// get data from file
		$cat_img      = $_FILES['cat_img']['name'];
		$temp_name    = $_FILES['cat_img']['tmp_name'];
		$path         = "upload/";
		$err          = $_FILES['cat_img']['error'];
		
		move_uploaded_file($temp_name, $path.$cat_img);
		
		if($err == 0){
			$query 	= "UPDATE category SET cat_name = '$name', cat_img = '$cat_img' WHERE cat_id = {$_GET['cat_id']}";
		}
		else{
			$query 	= "UPDATE category SET cat_name = '$name' WHERE cat_id = {$_GET['cat_id']}";
		}

		
		//perform query
		mysqli_query($conn, $query);
		/*die;*/
		header("location:manage_category.php");
	}

	$query  = "SELECT * FROM category WHERE cat_id = {$_GET['cat_id']}";
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
                                    <div class="card-header">Update Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="cat_name" type="text" class="form-control" value="<?php echo $row['cat_name']?>" aria-required="true" aria-invalid="false">
                                            </div>
											<div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Image</label>
                                                <input id="cc-pament" name="cat_img" type="file" class="form-control" aria-required="true" value="<?php echo $row['cat_img']?>" aria-invalid="false">
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