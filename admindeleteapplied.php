<?php 
$pagetitle = "Dashboard";
include ('admindashhead.php'); 

include_once ('userauth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	

	$appliedid = $_POST['appliedid'];

	// create object of users class
	$appobj = new Post;
	$output = $appobj->deleteApplied($appliedid);
}

?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<?php include ('adminsidedashboard.php'); ?>
		</div>

		<div class="col-md-9">
			<h1>Are you sure you want to delete ?</h1>

			<?php
				if (isset($output)) {
					echo $output;
				}
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?appliedid=<?php echo $_GET['appliedid']; ?>" >
				<input type="hidden" name="postid" value="<?php if (isset($_GET['applied'])){ echo $_GET['applied'];} ?>">
                                   
             <button type="submit" name="submit" class="btn btn-danger btn-lg">Yes, Delete Job</button>
				
			</form>
		</div>

	</div>


</div>

<?php include ('admindashfoot.php'); ?>