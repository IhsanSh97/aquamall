<?php 

	//start connection
	include("../includes/connection.php");
	//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$email    = $_POST['admin_email'];
		$password = $_POST['admin_password'];
		$fullname = $_POST['fullname'];
		
		$query 	= "INSERT INTO admin(admin_email, admin_password, fullname) values('$email', '$password', '$fullname')";
		
		//perform query
		mysqli_query($conn, $query);
		header("location:manage_admin.php");
	}

	

	include("../includes/admin_header.php"); 
	
?>


	<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Create Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input id="cc-pament" name="admin_email" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                                <input id="cc-pament" name="admin_password" type="password" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Fullname</label>
                                                <input id="cc-pament" name="fullname" type="text" class="form-control" aria-required="true" aria-invalid="false">
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
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$query  = "SELECT * FROM admin";
												$result = mysqli_query($conn, $query);
												while($row = mysqli_fetch_assoc($result)){
													echo "<tr>";
													echo "<td>{$row['admin_id']}</td>";
													echo "<td>{$row['admin_email']}</td>";
													echo "<td>{$row['fullname']}</td>";
													echo "<td><a href='edit_admin.php?admin_id={$row['admin_id']}' class='btn btn-warning' data-toggle = 'modal' data-target = '#largemodal'>Edit</a></td>";
													echo "<td><a href = 'delete_admin.php?admin_id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
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