<?php
session_start();
// Include database connection file
include_once('database.php');

    if (isset($_POST['submit'])) {
<<<<<<< HEAD
      $errorMsg = "";
=======
>>>>>>> 7218bcb6743f066db53cc2c9030e1312927a00a5
    
        $id = mysqli_real_escape_string($con, $_POST['admin_userid']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $fname     = mysqli_real_escape_string($con, $_POST['firstname']);
        $lname     = mysqli_real_escape_string($con, $_POST['lastname']);
        $role     = mysqli_real_escape_string($con, $_POST['role']);
        $query  = "INSERT INTO admin_account_user (admin_userid,firstname,lastname,username,password,role) VALUES ('$id','$fname','$lname','$username','$password','$role')";
        $result = mysqli_query($con, $query);
        if ($result==true) {
          header("Location:admin-dashboard.php");
          die();
        }else{
<<<<<<< HEAD
          $query1 = "SELECT * FROM admin_account_user WHERE admin_userid = '$id'";
          $errorMsg  = "ID Number already taken!... Please Try again!";
=======
          $errorMsg  = "You are not Registred..Please Try again";
>>>>>>> 7218bcb6743f066db53cc2c9030e1312927a00a5
        }   
      }

?>
<style type="text/css">
    .nav-link{
	color: #f9f6f6;
	font-size: 14px;
    }	

	.logo{
	width: 120px;
	cursor: pointer;
}
</style>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
       <body>
	    <nav class="navbar navbar-info sticky-top bg-info flex-md-nowrap p-10">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="" style="color: #5b5757;"><img src="images/logo.webp" class="logo"></a>
	            <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
		    	    <a class="nav-link" href="logout.php">Hi, <?php echo ucwords($_SESSION['FNAME']); ?> <input type="submit" name="submit" class="btn btn-success" value="Log Out"></a>
			</li>
		    </ul>
		</nav>		
		<div class="container-fluid">
		    <div class="row">
			<nav class="col-md-2 d-none d-md-block bg-info sidebar" style="height: 1000px">
		    	    <div class="sidebar-sticky">
			        <ul class="nav flex-column" style="color: #5b5757;">
				    <li class="nav-item">
					<a class="nav-link active" href="">
					<span data-feather="home"></span>
				            Dashboard <span class="sr-only">(current)</span>
							</a>
				    </li>

<<<<<<< HEAD
                    <!-- <h6>ADMINISTRATOR</h6>		 -->
=======
                    <h6>ADMINISTRATOR</h6>		
>>>>>>> 7218bcb6743f066db53cc2c9030e1312927a00a5
				    <li class="nav-item">
					<a class="nav-link" href="">
					    <span data-feather="users"></span>
					    Admin Profile
					</a>
				    </li>
<<<<<<< HEAD
            <!-- <li class="nav-item">
=======
            <li class="nav-item">
>>>>>>> 7218bcb6743f066db53cc2c9030e1312927a00a5
					<a class="nav-link" href="admin-approved.php?id=<?php echo ucwords($_SESSION['ID']); ?>">
				    	    <span data-feather="users"></span>
					    Admin Approval
						</a>
<<<<<<< HEAD
				    </li> -->
            <li class="nav-item">
					<a class="nav-link" href="admin-analysis.php">
				    	    <span data-feather="users"></span>
					    User Analysis
						</a>
				    </li>
            <a class="nav-link" href="user-report.php">
				    	    <span data-feather="users"></span>
					    User Reports
=======
				    </li>
            <li class="nav-item">
					<a class="nav-link" href="admin-analysis.php">
				    	    <span data-feather="users"></span>
					    Admin Analysis
>>>>>>> 7218bcb6743f066db53cc2c9030e1312927a00a5
						</a>
				    </li>

                    <?php if ($_SESSION['ROLE'] == 'Super Admin') { ?>
					<li class="nav-item">
					<a class="nav-link" href="">
				    	    <span data-feather="users"></span>
					    Admin Lists
						</a>
				    </li>
				<?php } ?>						
			    </ul>
			</div>
		    </nav>
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
		    
		</div>
        <div class="card-header">
                        <h4>ADD ADMIN 
                            <a href="admin-dashboard.php" class="btn btn-danger float-right">BACK</a>
                        </h4>
                    </div>
		<div class="table-responsive">
<<<<<<< HEAD
		  <table class="table table-striped">  <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>

        <?php if ($_SESSION['ROLE'] == "Super Admin") {?>
=======
		  <table class="table table-striped">
          <?php if ($_SESSION['ROLE'] == "Super Admin") {?>
>>>>>>> 7218bcb6743f066db53cc2c9030e1312927a00a5

        <form action="" method="POST">
          <div class="form-group">
            <label for="admin_userid" style="color:#000000;"><b>Admin ID Number:</label>
            <input type="text" class="form-control" name="admin_userid" placeholder="Enter ID Number" required="">
          </div>
          <div class="form-group">
            <label for="firstname" style="color:#000000;"><b>First Name:</label>
            <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required="">
          </div>
          <div class="form-group">
            <label for="lastname" style="color:#000000;"><b>Last Name:</label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required="">
          </div>
          <div class="form-group">  
            <label for="username" style="color:#000000;"><b>Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required="">
          </div>
          <div class="form-group">  
            <label for="password" style="color:#f000000ff;"><b>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
          <div class="form-group">  
            <label for="role" style="color:#000000;">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">---Select Role---</option>
              <option value="Super Admin">Super Admin</option>
              <option value="Regular Admin">Regular Admin</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
        <?php } ?>
		    </table>
		</div>
	    </main>
	</div>
    </div>		
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    feather.replace();
</script>			
</body>
</html>