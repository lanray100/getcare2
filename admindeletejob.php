<?php 
$pagetitle = "Dashboard";
include ('admindashhead.php'); 

include_once ('userauth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	

	$postid = $_POST['postid'];

	// create object of users class
	$postobj = new Post;
	$output = $postobj->deleteJobs($postid);
}

?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<?php include ('adminsidedashboard.php'); ?>
		</div>

		<div class="col-md-9">
			<h1>Are you sure you want to delete <?php if (isset($_GET['title'])){ echo $_GET['title'];} ?></h1>

			<?php
				if (isset($output)) {
					echo $output;
				}
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?postid=<?php echo $_GET['postid']; ?>&title=<?php echo $_GET['title']; ?>" >
				<input type="hidden" name="postid" value="<?php if (isset($_GET['postid'])){ echo $_GET['postid'];} ?>">
                                   
             <button type="submit" name="submit" class="btn btn-danger btn-lg">Yes, Delete Job</button>
				
			</form>
		</div>

	</div>


</div>

<?php include ('admindashfoot.php'); ?>