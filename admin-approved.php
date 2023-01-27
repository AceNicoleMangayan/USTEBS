<?php
session_start();
// Include database connection file
include_once('database.php');
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
if(isset($_POST['approve'])) {

    $id_numb = mysqli_real_escape_string($con, $_POST['approve']);

    $query = "UPDATE student_users SET status = 'Active' WHERE id_number='$id_numb' ";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location:user-dashboard.php");
        die();
    }
}

if(isset($_POST['delete'])) {

    $id_numb = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM student_user WHERE id_number='$id_numb' ";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location:user-dashboard.php");
        die();
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
        <title>Requests</title>
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
			<nav class="col-md-2 d-none d-md-block bg-info sidebar" style="height: 1000px;">
		    	    <div class="sidebar-sticky">
			        <ul class="nav flex-column" style="color: #5b5757;">
				    <li class="nav-item">
					<a class="nav-link active" href="user-dashboard.php">
					<span data-feather="home"></span>
				            Dashboard <span class="sr-only">(current)</span>
							</a>
				    </li>

					<h6>ADMINISTRATOR</h6>
					<?php if ($_SESSION['ROLE'] == 'Super Admin' || $_SESSION['ROLE'] == 'Regular Admin') { ?>		
				    <li class="nav-item">
					<a href="admin-profile.php?id=<?php echo ucwords($_SESSION['ID']); ?>" class="nav-link" >
					    <span data-feather="users"></span>
					    Admin Profile
					</a>
				    </li>
                    <li class="nav-item">
					<a class="nav-link" href="">
				    	    <span data-feather="users"></span>
					    Admin Approval
						</a>
				    </li>
                    <li class="nav-item">
					<a class="nav-link" href="admin-analysis.php">
				    	    <span data-feather="users"></span>
					    Admin Analysis
                        </a>
				    </li>
					<?php } ?>	

				<?php if ($_SESSION['ROLE'] == 'Super Admin') { ?>
					<li class="nav-item">
					<a class="nav-link" href="admin-dashboard.php">
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
                        <h4>LIST OF USER REQUEST
						<?php if ($_SESSION['ROLE'] == "Super Admin") {?>
                            <a href="user-dashboard.php" class="btn btn-danger float-right" >BACK</a>
						<?php } ?>
                        </h4>
                    </div>
		<div class="table-responsive">
		  <table class="table table-striped">
		    <thead>
            <tr>
			   <th>ID Number</th>
			   <th>First Name</th>
			   <th>Last Name</th>
               <th>School Year Started</th>
               <th>Address</th>
			   <th>Contact Number</th>
			   <th>Email</th>
               <th>Gender</th>
			   <th>Status</th>
			   <th>Action</th>
			</tr>
		    </thead>
		    <tbody>
			<?php
		    	    if ($_SESSION['ROLE'] == "Super Admin") {
				$query = "SELECT * FROM admin_account_user";
			    }else{
				$role = $_SESSION['ROLE'];
				$query = "SELECT * FROM admin_account_user WHERE role = '$role'";
			    }

                $query2 = "SELECT * FROM student_users WHERE status='Pending'";
				$result2 = mysqli_query($con, $query2);
				if (mysqli_num_rows($result2) > 0) {
			        while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
			    ?>		
			    <tr>
				<td><?php echo $row['id_number']?></td>
				<td><?php echo $row['firstname']?></td>
				<td><?php echo $row['lastname']?></td>
				<td><?php echo $row['schoolyear_started']?></td>
                <td><?php echo $row['address']?></td>
                <td><?php echo $row['contact_number']?></td>
				<td><?php echo $row['email']?></td>
                <td><?php echo $row['gender']?></td>
				<td><?php echo $row['status']?></td>
					<td>
						<form action="" method="POST" class="d-inline">
                        <button type="submit" name="approve" value="<?=$row['id_number'];?>" class="btn btn-success btn-sm">Approved</button>
                        <button type="submit" name="delete" value="<?=$row['id_number'];?>" class="btn btn-danger btn-sm" style="width:103%;">Declined</button>
                        </form>
					</td>
			    </tr>
		        <?php	}
			}else{
			    echo "<h2>No record found!</h2>";
			} ?>									
			</tbody>
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