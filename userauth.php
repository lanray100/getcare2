<?php


// Connect to the database

class DatabaseConfig{
	// database handler
	public $dbcon;
	
	function __construct(){
		$this->dbcon = new mysqli("localhost","root","","getcaregiverdb");

		// check connection 
			// if ($this->dbcon->connect_error) {
			// 	die('Connection Failed'.$this->dbcon->connect_error);
			// }else{
			// 	echo "Connection successful";
			// }
	}
}

	
	// Authentication class for users

	class Authentication
	{
		public $firstname;
		public $lastname;
		public static $emailaddress;
		public $password;
		public $gender;
		public $dbobj;


		public function __construct(){
			$this->dbobj = new DatabaseConfig;
		}

		public function getState(){
			// write a query to get states
			$sql = "SELECT * FROM state";

			if ($result = $this->dbobj->dbcon->query($sql)) {
				
				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}


		public function registerEmployer($lname,$fname,$company,$email,$password,$gender,$phone,$id,$city,$cardnumber,$stateid){
			
			$password = md5($password);
			// write query to insert into the database
			$rgsql = "INSERT INTO employer(employer_lname,employer_fname,employer_company,employer_email,employer_password,employer_gender,employer_phone,employer_idnumber,employer_city,employer_cardnumber,state_id) VALUES ('$lname','$fname','$company','$email','$password','$gender','$phone','$id','$city','$cardnumber','$stateid')";

			// check if the query() runs //if data is insert into user table
			if ($this->dbobj->dbcon->query($rgsql) == true) {
				// get the last inserted user id 
				$employerid = $this->dbobj->dbcon->insert_id;

				// create session variable
				$_SESSION['myemployerid'] = $employerid;
				$_SESSION['employer_lname'] = $lname;
				$_SESSION['employer_fname'] = $fname;
				$_SESSION['employer_city'] = $city;
				$_SESSION['employer_company'] = $company;
				$_SESSION['employer_gender'] = $gender;
				$_SESSION['employer_phone'] = $phone;
				$_SESSION['employer_email'] = $email;
				
				$msg = "<div class='alert alert-success'>Successfully Registered</div>";
				// redirect to dashboard
				header("Location: http://localhost/getcare/demployer.php?"."msg=".$msg);
				exit;
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

		}

		public function registerCaregiver($lname,$fname,$username,$email,$password,$gender){
			
			$password = md5($password);
			// write query to insert into the database
			$rgsql = "INSERT INTO caregiver(caregiver_lname,caregiver_fname,caregiver_username,caregiver_email,caregiver_password,caregiver_gender) VALUES ('$lname','$fname','$username','$email','$password','$gender')";

			// check if the query() runs //if data is insert into user table
			if ($this->dbobj->dbcon->query($rgsql) == true) {
				// get the last inserted user id 
				$employeeid = $this->dbobj->dbcon->insert_id;

				// create session variable
				$_SESSION['mycaregiverid'] = $employeeid;
				$_SESSION['caregiver_lname'] = $lname;
				$_SESSION['caregiver_fname'] = $fname;
				$_SESSION['caregiver_email'] = $email;
				$_SESSION['caregiver_gender'] = $gender;
				

				// redirect to dashboard
				header("Location: http://localhost/getcare/dcaregiver1.php");
				exit;
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

		}


		public function loginEmployer($email,$password){

			
			$password = md5($password);
			// write your query
			$logsql = "SELECT employer.*, state.state_name FROM employer left join state on employer.state_id WHERE employer.employer_email='$email' 
					AND employer.employer_password='$password' limit 1 ";

			// run the query
			$result = $this->dbobj->dbcon->query($logsql);

			// check if number of rows return is equal to one
			if ($this->dbobj->dbcon->affected_rows == 1) {
				// fetch the result 
					$row = $result->fetch_assoc();

					// create session variable
				$_SESSION['myemployerid'] = $row['employer_id'];
				$_SESSION['employer_lname'] = $row['employer_lname'];
				$_SESSION['employer_fname'] = $row['employer_fname'];
				$_SESSION['employer_email'] = $row['employer_email'];
				$_SESSION['employer_city'] = $row['employer_city'];
				$_SESSION['employer_company'] = $row['employer_company'];
				$_SESSION['employer_gender'] = $row['employer_gender'];
				$_SESSION['employer_phone'] = $row['employer_phone'];
				$_SESSION['profilephoto'] = $row['employer_photo'];
				$_SESSION['type'] = $row['type'];

				if($row['type'] == 1){

					// redirect to dashboard
				header("Location: http://localhost/getcare/dashadmin.php");
				exit;
				}elseif ($row['type'] == 0) {

					// redirect to dashboard
				header("Location: http://localhost/getcare/demployer.php");
				exit; 
			}
				
				}else{
				// display invalid login credentials
				$result = "<div class='alert alert-danger'>Invalid Email Address or Password!</div>";
			}

			return $result;
		}

		public function loginCaregiver($email,$password){

			
			$password = md5($password);
			// write your query
			$logsql = "SELECT caregiverinfo.* , caregiver.* FROM caregiverinfo left join caregiver on caregiverinfo.caregiver_id WHERE caregiver_email='$email' 
					AND caregiver_password='$password' limit 1 ";

			// run the query
			$result = $this->dbobj->dbcon->query($logsql);

			// check if number of rows return is equal to one
			if ($this->dbobj->dbcon->affected_rows == 1) {
				// fetch the result 
					$row = $result->fetch_assoc();

					// create session variable
				$_SESSION['mycaregiverid'] = $row['caregiver_id'];
				$_SESSION['caregiver_lname'] = $row['caregiver_lname'];
				$_SESSION['caregiver_fname'] = $row['caregiver_fname'];
				$_SESSION['caregiver_email'] = $row['caregiver_email'];
				$_SESSION['profilephoto'] = $row['caregiver_photo'];
				$_SESSION['caregiver_gender'] = $row['caregiver_gender'];
				
				
					// redirect to dashboard
				header("Location: http://localhost/getcare/dashboardemployee.php");
				exit;
				}else{
				// display invalid login credentials
				$result = "<div class='alert alert-danger'>Invalid Email Address or Password!</div>";
				}

			return $result;
		}

		public function caregiverDetails($dob,$past,$work,$available,$worktype,$caregiverid,$city,$phone,$idnumber,$cardnumber,$stateid){
			
			// write query to insert into the database
			$rsql = "INSERT INTO caregiverinfo(caregiverinfo_dob,caregiverinfo_past,caregiverinfo_work,
			caregiverinfo_available,caregiverinfo_worktype,caregiver_id,caregiverinfo_city,caregiverinfo_phone,caregiverinfo_idnumber,caregiverinfo_cardnumber,state_id) VALUES ('$dob','$past','$work','$available','$worktype','$caregiverid','$city','$phone','$idnumber','$cardnumber','$stateid')";

			// check if the query() runs //if data is insert into user table
			if ($this->dbobj->dbcon->query($rsql) == true) {

				$caregiverdetlsid = $this->dbobj->dbcon->insert_id;

				// create session variable
				$_SESSION['myemployerid'] = $caregiverinfoid;
				$_SESSION['caregiverinfo_dob'] = $dob;
				$_SESSION['caregiverinfo_past'] = $past;
				$_SESSION['caregiverinfo_work'] = $work;
				$_SESSION['caregiverinfo_worktype'] = $worktype;
				$_SESSION['caregiverinfo_available'] = $available;
				$_SESSION['caregiverinfo_city'] = $city;
				$_SESSION['caregiverinfo_state'] = $stateid;
				$_SESSION['caregiverinfo_phone'] = $phone;
				$_SESSION['caregiverinfo_idnumber'] = $idnumber;


				$msg = "<div class='alert alert-success'>Successfully Registered</div>";
				// redirect to dashboard
				header("Location: http://localhost/getcare/dashboardemployee.php?"."msg=".$msg);
				exit;
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

		}


		//method to get all the caregiver details in the database

		public function getcaregiverDetails($caregiverid){

			// write query to fetch caregiver details from the caregiverdetails and caregiver table
			$sql = "SELECT caregiverinfo.*, caregiver.* FROM caregiverinfo left join caregiver on caregiver.caregiver_id = caregiverinfo.caregiver_id WHERE caregiverinfo.caregiver_id = '$caregiverid' " ;
			// var_dump($sql);
			// exit;

			if ($result = $this->dbobj->dbcon->query($sql)) {
				
				$row = $result->fetch_assoc();
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}

		public function updateCaregiver($available,$past,$work,$worktype,$phone,$verify,$city,$idnumber,$stateid,$caregiverid){

			// write the query
			$myquery = "UPDATE caregiverinfo SET caregiverinfo_available='$available', caregiverinfo_past ='$past', 
			caregiverinfo_work='$work', caregiverinfo_worktype='$worktype', caregiverinfo_phone='$phone', 
			caregiverinfo_idnumber='$verify', caregiverinfo_city='$city',caregiverinfo_cardnumber='$idnumber', state_id = '$stateid' WHERE caregiver_id = '$caregiverid' ";

			// execute myquery
			$this->dbobj->dbcon->query($myquery);

			// how many rows affected // updated
			if ($this->dbobj->dbcon->affected_rows == 1) {

				// redirect to the same page editcaregiverprofile.php page
				$msg ="<div class='alert alert-success'>Update successful</div>";

				
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $msg;
		}

		// to update the employer profile
		public function updateEmployer($phone,$city,$stateid,$employerid){

			// write a query to update the employer profile
			$sql = "UPDATE employer SET employer_phone = '$phone', employer_city = '$city', 
			state_id= '$stateid' WHERE employer_id = '$employerid' ";

			// execute the query
			$this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows == 1) {
				
				// redirect to the same page
			$msg ="<div class='alert alert-success'>Update successful</div>";

			}else{

				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $msg;
		}

		// method to get the employer detials for update
		public function getEmployer($employerid){

			//write a query to get the details
			$msql = "SELECT * FROM employer where employer_id = '$employerid' ";

			if ($result = $this->dbobj->dbcon->query($msql)) {
				
				$row = $result->fetch_assoc();
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}

		

		//function to upload profile photo
		public function uploadProfileImage(){
			// check if global variables $_FILES has a value
			if ($_FILES['profilephoto']['error'] == 0) {
				
				// start file upload
				$filesize = $_FILES['profilephoto']['size'];
				$filename = $_FILES['profilephoto']['name'];
				$filetype = $_FILES['profilephoto']['type'];
				$filetempname = $_FILES['profilephoto']['tmp_name'];
				// specify the destination folder to upload files to
				$folder = "profilephoto/";
				//check the file size
				if ($filesize > 2097152) {
						$error[] = "File Size must be exactly or less than 2mb";
				}

				// get the file extension
				$file_ext = explode(".", $filename);
				$file_ext = end($file_ext);  // get the last element of array
				$file_ext = strtolower($file_ext); // to lowercase

				// specify the extension allowed
				$extension = array('jpg', 'png', 'gif' ,'jpeg','bmp','jpe' );

				// check if the file extension is valid
				if (in_array($file_ext, $extension) === false) {
					$error[] = "Extension not allowed!";
				}

				// change the filename
				$filename = time()."_".$_SESSION['myemployerid'];
				$destination = $folder.$filename.".$file_ext";

				//var_dump($destination);

				//now check if there is no error and upload the file
				if (!empty($error)) {
					var_dump($error);
				}else{
					// otherwise, upload to destination folder
					move_uploaded_file($filetempname, $destination);

					// update photograph column in users table based on the userid
					$myemployerid = $_SESSION['myemployerid'];
					// write query to update the table column
					$sql = "UPDATE employer SET employer_photo='$destination' WHERE employer_id='$myemployerid' ";

					//run the query
					$result = $this->dbobj->dbcon->query($sql);
					if ($this->dbobj->dbcon->affected_rows == 1) {
						// create session variable
						$_SESSION['profilephoto'] = $destination;

						$result = "<div class='alert alert-success'>Profile Photo Uploaded</div>";

					}else{
						$result = "<div class='alert alert-danger'>No Profile Photo uploaded!</div>".$this->dbobj->dbcon->error;
					}
				}

				
			}else{
				$result = "<div class='alert alert-danger'>You've not uploaded any image!</div>";
			}

			return $result;
		}

		//function to upload profile photo
		public function uploadProfileImageCare(){
			// check if global variables $_FILES has a value
			if ($_FILES['profilephoto']['error'] == 0) {
				
				// start file upload
				$filesize = $_FILES['profilephoto']['size'];
				$filename = $_FILES['profilephoto']['name'];
				$filetype = $_FILES['profilephoto']['type'];
				$filetempname = $_FILES['profilephoto']['tmp_name'];
				// specify the destination folder to upload files to
				$folder = "profilephoto/";
				//check the file size
				if ($filesize > 2097152) {
						$error[] = "File Size must be exactly or less than 2mb";
				}

				// get the file extension
				$file_ext = explode(".", $filename);
				$file_ext = end($file_ext);  // get the last element of array
				$file_ext = strtolower($file_ext); // to lowercase

				// specify the extension allowed
				$extension = array('jpg', 'png', 'gif' ,'jpeg','bmp','jpe' );

				// check if the file extension is valid
				if (in_array($file_ext, $extension) === false) {
					$error[] = "Extension not allowed!";
				}

				// change the filename
				$filename = time()."_".$_SESSION['mycaregiverid'];
				$destination = $folder.$filename.".$file_ext";

				//var_dump($destination);

				//now check if there is no error and upload the file
				if (!empty($error)) {
					var_dump($error);
				}else{
					// otherwise, upload to destination folder
					move_uploaded_file($filetempname, $destination);

					// update photograph column in users table based on the userid
					$mycaregiverid = $_SESSION['mycaregiverid'];
					// write query to update the table column
					$sql = "UPDATE caregiver SET caregiver_photo='$destination' WHERE caregiver_id='$mycaregiverid' ";

					//run the query
					$result = $this->dbobj->dbcon->query($sql);
					if ($this->dbobj->dbcon->affected_rows == 1) {
						// create session variable
						$_SESSION['profilephoto'] = $destination;

						$result = "<div class='alert alert-success'>Profile Photo Uploaded</div>";

					}else{
						$result = "<div class='alert alert-danger'>No Profile Photo uploaded!</div>".$this->dbobj->dbcon->error;
					}
				}

				
			}else{
				$result = "<div class='alert alert-danger'>You've not uploaded any image!</div>";
			}

			return $result;
		}

		// method to get all the caregivers on the platform
		public function getallCaregivers(){
			// write a query to get all the caregivers
			$msql = "SELECT * FROM caregiver ";

			if ($result = $this->dbobj->dbcon->query($msql)) {
				
				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{

				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}


		// method to get caregivers on the admin dashboard
		public function getallcaregiversDash(){
			// write a query to get all the caregivers
			$msql = "SELECT * FROM caregiver order by caregiver_dateregistered desc limit 2";

			if ($result = $this->dbobj->dbcon->query($msql)) {
				
				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{

				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}

		// method to get all the employers on the platform
		public function getallEmployer(){
			// write a query to get all the caregivers
			$msql = "SELECT * FROM employer ";

			if ($result = $this->dbobj->dbcon->query($msql)) {
				
				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{

				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}


		// method to get all the employers on the platform on the admin dashboard
		public function getallemployerDash(){
			// write a query to get all the caregivers
			$msql = "SELECT * FROM employer order by employer_date desc limit 2";

			if ($result = $this->dbobj->dbcon->query($msql)) {
				
				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{

				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}


		// function to delete a posting based on the caregiver id on the admin page
		public function deleteCaregiver($caregiverid){
			// write the delete query
			$sql = "DELETE FROM caregiver where caregiver_id = '$caregiverid'";

			//run the query
			$this->dbobj->dbcon->query($sql);

			// to know how many rows affected
			if ($this->dbobj->dbcon->affected_rows == 1) {

				$msg = "<div class='alert alert-success'>Deleted Successfully</div>";
				// redirect to employerjobs page
				header("Location: http://localhost/getcare/tablesforcaregivers.php?"."msg=".$msg);
				exit;
			}else{
				$msg = "<div>Oops! something happened.".$this->dbobj->dbcon->error."</div>";
			}

			return $msg;
		}

		// function to delete a employer based on the employer id on the admin page
		public function deleteEmployer($employerid){
			// write the delete query
			$sql = "DELETE FROM employer where employer_id = '$employerid'";

			//run the query
			$this->dbobj->dbcon->query($sql);

			// to know how many rows affected
			if ($this->dbobj->dbcon->affected_rows == 1) {

				$msg = "<div class='alert alert-success'>Deleted Successfully</div>";
				// redirect to employerjobs page
				header("Location: http://localhost/getcare/tableforemployers.php?"."msg=".$msg);
				exit;
			}else{
				$msg = "<div>Oops! something happened.".$this->dbobj->dbcon->error."</div>";
			}

			return $msg;
		}


		public static function sanitizeInput($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			$data = addslashes($data);


			return $data;
		}

		
	}

	/**
	 * 
	 */
	class Post {
		
		public $job;
		public $desc;
		public $req;
		public $city;
		public $dbobj;
		
		public function __construct(){
			$this->dbobj = new DatabaseConfig;
		}

		public function postJobs($job,$desc,$req,$city,$state,$opendate,$closedate,$employerid){
			
			// write query to insert into the database
			$psql = "INSERT INTO post(post_title,post_city,	post_requirement,
			post_description,post_stateid,post_open,post_close,post_employerid) VALUES ('$job','$city','$req','$desc','$state','$opendate','$closedate','$employerid')";

			// check if the query() runs //if data is insert into user table
			if ($this->dbobj->dbcon->query($psql) == true) {

				// get the last inserted user id 
				$postid = $this->dbobj->dbcon->insert_id;

				// create session variable
				$_SESSION['mypostid'] = $postid;
				$_SESSION['post_title'] = $job;
				$_SESSION['post_description'] = $desc;
				$_SESSION['post_requirement'] = $req;
				$_SESSION['post_city'] = $city;
				$_SESSION['post_stateid'] = $state;
				
				$msg = "<div class='alert alert-success'>Job Posted Successfully</div>";
				// redirect to dashboard
				header("Location: http://localhost/getcare/demployer.php?"."msg=".$msg);
				exit;
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

		}

		// fetch all posted jobs according to date in the listing job page from post table
		public function getCaregiver(){

			
			// write query
			$sql = "SELECT * FROM post where post_type ='publish' order by post_date desc ";

			// execute the query
			$result = $this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows > 0) {

				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			}else{
				
				echo "<div class='alert alert-danger'>No Record Found</div>";
				
			}

			return $row;
		}

		// fetch all posted jobs accordingly with date in the caregiver dashboard page from post table
		public function getcaregiverdash(){

			
			// write query
			$sql = "SELECT * FROM post where post_type ='publish' order by post_date desc";

			// execute the query
			$result = $this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			}else{
				
				echo "<div class='alert alert-danger'>No Record Found</div>";
				
			}

			return $row;
		}

		// fetch 4 posted jobs randomly from post table
		public function getCaregiver4(){

			
			// write query
			$sql = "SELECT * FROM post where post_type ='publish' order by rand() limit 4";

			// execute the query
			$result = $this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			}else{
				
				echo "<div class='alert alert-danger'>No Record Found</div>";
				
			}

			return $row;
		}

		public function getlatestJob(){

			
			// write query
			$sql = "SELECT * FROM post where post_type ='publish' order by post_date desc limit 4";

			// execute the query
			$result = $this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			}else{
				
				echo "<div class='alert alert-danger'>No Record Found</div>";
				
			}

			return $row;
		}

		public function getpostedJobs($postid){

			// write query to fetch the posting details from the post table based on the postid
			$sql = "SELECT * FROM post WHERE post_id = '$postid' " ;

			if ($result = $this->dbobj->dbcon->query($sql)) {
				
				$row = $result->fetch_assoc();
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;
		}

		public function findPostings($search){

			//write a query to find posted jobs
			$sql = "SELECT * FROM post WHERE post_type = 'publish' and post_title LIKE '%$search%' and concat(post.post_title,' ',post.post_title) like '%$search%'  ";

			// run the query

			if ($result = $this->dbobj->dbcon->query($sql)) {

				$rows = $result->fetch_all(MYSQLI_ASSOC);
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $rows;
		}

		public function getFeaturedPost($state){

			// write query to get featured posting for state
			$sql = "SELECT post.*, state.* FROM post LEFT JOIN state on state.state_id=post.post_stateid WHERE post.post_stateid='$state' and post_type = 'publish' order by post_id limit 12";

			$row = array();
			// execute the query
			$result = $this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "<div class='alert alert-danger'>No Record Found</div>";
				
			}

			return $row;
		}

		// method to get posted jobs joined with the state table
		public function getPost(){

			$qry = "SELECT post.*, state.state_name FROM post JOIN state ON post.post_id = state.state_id where post_type ='publish' ";


			if ($this->dbobj->dbcon->query($qry)) {

				$deta = $this->dbobj->dbcon->query($qry);

			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $deta;
		}

		//function to upload resume file and send application
		public function sendApply($names,$email,$phone,$posttitle,$employerid,$postid,$caregiverid){
			// var_dump($_FILES);
			// exit;
			// check if global variables $_FILES has a value
			if ($_FILES['resume']['error'] == 0) {
				
				// start file upload
				$filesize = $_FILES['resume']['size'];
				$filename = $_FILES['resume']['name'];
				$filetype = $_FILES['resume']['type'];
				$filetempname = $_FILES['resume']['tmp_name'];
				// specify the destination folder to upload files to
				$folder = "resume/";
				//check the file size
				if ($filesize > 2097152) {
						$error[] = "File Size must be exactly or less than 2mb";
				}

				// get the file extension
				$file_ext = explode(".", $filename);
				$file_ext = end($file_ext);  // get the last element of array
				$file_ext = strtolower($file_ext); // to lowercase

				// specify the extension allowed
				$extension = array('doc', 'docx', 'odt' , 'pdf' , 'txt' );

				// check if the file extension is valid
				if (in_array($file_ext, $extension) === false) {
					$error[] = "Extension not allowed!";
				}

				// change the filename
				$filename = time()."_".$_SESSION['mycaregiverid'];
				$destination = $folder.$filename.".$file_ext";

				//var_dump($destination);

				//now check if there is no error and upload the file
				if (!empty($error)) {
					var_dump($error);
				}else{
					// otherwise, upload to destination folder
					move_uploaded_file($filetempname, $destination);

					
					// write query to update the table column
					$sql = "INSERT INTO caregiversapplied(caregiver_names,applied_email,applied_phone,applied_resume,post_title,employer_id,post_id,caregiver_id) VALUES ('$names','$email', '$phone','$destination','$posttitle','$employerid','$postid','$caregiverid')";

					// var_dump($sql);
					// exit;
					//run the query
					
					if ($this->dbobj->dbcon->query($sql) == true) {
						
						$msg = "<div class='alert alert-success' style='margin:10px;'>Application Sent</div>";

					}else{
						echo "Error :".$this->dbobj->dbcon->error;
					}

					return $msg;
				}

				
			}

		}


		public function getemployerPost($employerid){

			// write query to fetch the posting details from the post table based on the postid
			$sql = "SELECT * FROM post WHERE post_employerid = '$employerid' " ;

			$row = array();
			// execute the query
			$result = $this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "<div>No Posting </div>";
				
			}

			return $row;
		}

		public function getemployerPostDetails($postid){

			// write query to fetch the posting details from the post table based on the postid
			$sql = "SELECT * FROM post WHERE post_id = '$postid' " ;

			if ($result = $this->dbobj->dbcon->query($sql)) {
				
				$rows = $result->fetch_assoc();
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $rows;
		}
		

		public function updatePosting($job,$desc,$req,$city,$stateid,$opendate,$closedate,$postid){

			$squery = "UPDATE post SET post_title ='$job', post_description = '$desc' , post_requirement = '$req', 
					post_city = '$city', post_stateid = '$stateid', post_open = '$opendate', post_close = '$closedate' WHERE post_id = '$postid' ";

			$this->dbobj->dbcon->query($squery);

			//$msg ="<div class='alert alert-success'>Update successful</div>";

			// how many rows affected // updated
			if ($this->dbobj->dbcon->affected_rows == 1) {

				$msg = "<div class='alert alert-success'>Update successful</div>";
				
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $msg;
		}


		// function to unpublish a posting based on the post id on the employer
		public function unpublishPosting($postid){
			// write the delete query
			$sql = "UPDATE post SET post_type = 'Unpublish' where post_id = '$postid' ";

			//run the query
			$this->dbobj->dbcon->query($sql);

			// to know how many rows affected
			if ($this->dbobj->dbcon->affected_rows == 1) {
				// redirect to employerjobs page
				$msg = "<div class='alert alert-success'>Job is Successfully Unpublished</div>";
				
				header("Location: http://localhost/getcare/employerjobs.php?"."msg=".$msg);
				exit;
			}else{
				echo "<div class='alert alert-danger'>You have already unpublished this Posting.".$this->dbobj->dbcon->error."</div>";
			}

		}


		public function appliedCaregivers($employerid){
			// write a query 
		  $msql = "SELECT * FROM caregiversapplied WHERE employer_id = '$employerid' ";

		  	$row = array();
			// execute the query
			$result = $this->dbobj->dbcon->query($msql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "<div>No Application Received</div>";
				
			}

			return $row;

		}

		// method to show applied jobs in the admin table
		public function appliedJobs($caregiverid){
			// write a query 
		  $jsql = "SELECT caregiversapplied.*, post.* FROM post left join caregiversapplied on caregiversapplied.post_id = post.post_id WHERE caregiver_id = '$caregiverid' ";

		  	$row = array();
			// execute the query
			$result = $this->dbobj->dbcon->query($jsql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "<div>No Application Sent</div>";
				
			}

			return $row;

		}

		// method to get the employer posting on dashboard with limit 3.
		public function employerPostDash($employerid){

			// write query to fetch the posting details from the post table based on the postid
			$sql = "SELECT * FROM post WHERE post_employerid = '$employerid' order by post_date desc Limit 3 " ;

			$row = array();
			// execute the query
			$result = $this->dbobj->dbcon->query($sql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "<div>No Posting </div>";
				
			}

			return $row;
		}

			// method to show applied caregivers on employer dashboard
		public function appliedcaregiverDash($employerid){
			// write a query 
		  $msql = "SELECT * FROM  caregiversapplied WHERE employer_id = '$employerid' order by applied_id desc limit 2 ";

		  	$row = array();
			// execute the query
			$result = $this->dbobj->dbcon->query($msql);

			if ($this->dbobj->dbcon->affected_rows > 0) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "<div>No Application Received</div>";
				
			}

			return $row;

		}

			// method to show applied caregivers in the admin end 
		public function appliedcaregiverAdmin(){
			// write a query 
		  $msql = "SELECT * FROM caregiversapplied ";

			if ($result = $this->dbobj->dbcon->query($msql)) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "Error: ".$this->dbobj->dbcon->error;
				
			}

			return $row;

		}

			// method to show applied caregivers resume
		public function appliedcaregiverResume($appliedid){
			// write a query 
		  $sql = "SELECT * FROM caregiversapplied WHERE applied_id = '$appliedid' " ;

		  // var_dump($sql);
		  // exit();

			if ($result = $this->dbobj->dbcon->query($sql)) {
				
				$row = $result->fetch_assoc();
			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $row;

		}


			// method to show applied caregivers in the admin dashboard 
		public function appliedadminDash(){
			// write a query 
		  $msql = "SELECT * FROM caregiversapplied order by applied_date desc limit 2";

			if ($result = $this->dbobj->dbcon->query($msql)) {
				// fetch the result 
					$row = $result->fetch_all(MYSQLI_ASSOC);

			
			}else{
				
				echo "Error: ".$this->dbobj->dbcon->error;
				
			}

			return $row;

		}


		// method to get posted jobs joined with the state table on the admin dashboard
		public function getpostDash(){

			$qry = "SELECT post.*, state.state_name FROM post JOIN state ON post.post_id = state.state_id order by post_date desc limit 2";


			if ($this->dbobj->dbcon->query($qry)) {

				$deta = $this->dbobj->dbcon->query($qry);

			}else{
				echo "Error: ".$this->dbobj->dbcon->error;
			}

			return $deta;
		}

		// function to delete a applied caregivers based on the applied id
		public function deleteApplied($appliedid){
			// write the delete query
			$sql = "DELETE FROM appliedcaregivers where applied_id = '$appliedid'";

			//run the query
			$this->dbobj->dbcon->query($sql);

			// to know how many rows affected
			if ($this->dbobj->dbcon->affected_rows == 1) {

				$msg = "<div class='alert alert-success'>Applicant Deleted Successfully</div>";
				// redirect to employerjobs page
				header("Location: http://localhost/getcare/tableforappliedcaregiver.php?"."msg=".$msg);
				exit;
			}else{
				echo "<div>Oops! something happened.".$this->dbobj->dbcon->error."</div>";
			}

		}

		// method to delete posting form the database and on the platform
		public function deleteJobs($postid){
			// write the delete query
			$sql = "DELETE FROM post where post_id = '$postid'";

			//run the query
			$this->dbobj->dbcon->query($sql);

			// to know how many rows affected
			if ($this->dbobj->dbcon->affected_rows == 1) {

				$msg = "<div class='alert alert-success'>Job Deleted Successfully</div>";
				// redirect to employerjobs page
				header("Location: http://localhost/getcare/tableforjobs.php?"."msg=".$msg);
				exit;
			}else{
				echo "<div>Oops! something happened.".$this->dbobj->dbcon->error."</div>";
			}

		}


	}


?>