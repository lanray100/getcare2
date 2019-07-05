<?php 
$pagetitle = "Dashboard";
include ('admindashhead.php'); 

include_once ('userauth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	

	$caregiverid = $_POST['caregiverid'];

	// create object of users class
	$careobj = new Authentication;
	$output = $careobj->deleteCaregiver($caregiverid);
}

?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<?php include ('adminsidedashboard.php'); ?>
		</div>

		<div class="col-md-9">
			<h1>Are you sure you want to delete <?php if (isset($_GET['name'])){ echo $_GET['name'];} ?></h1>

			<?php
				if (isset($output)) {
					echo $output;
				}
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?caregiverid=<?php echo $_GET['caregiverid']; ?>&name=<?php echo $_GET['name']; ?>" >
				<input type="hidden" name="caregiverid" value="<?php if (isset($_GET['caregiverid'])){ echo $_GET['caregiverid'];} ?>">
                                   
             <button type="submit" name="submit" class="btn btn-danger btn-lg">Yes, Delete Job</button>
				
			</form>
		</div>

	</div>


</div>

<?php include ('admindashfoot.php'); ?>