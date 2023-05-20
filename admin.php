<!DOCTYPE html>
<html lang="en">
	<title>Online Gallery</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="newshop.css">
	<style>
	body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
	.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
	.w3-third img:hover{opacity: 1}
	html {
		scroll-behavior: smooth;
	}
	.btnx{
		color:black;
	}
	/* The Modal (background) */
	.modal27,.modal26,.modal25,.modal24,.modal23,.modal22,.modal21, .modal20,
	.modal19, .modal18, .modal17, .modal16, .modal15, .modal14,
	.modal13, .modal12, .modal11, .modal10, .modal9, .modal8, 
	.modal7, .modal6, .modal5, .modal4, .modal3, .modal2, .modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 7; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		padding-top: 60px;
	}
	.modal-contentprofile {
		background-color: #E8E8E8;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 1px solid black;
		width: 60%; /* Could be more or less, depending on screen size */
	}
	.modal-content1 {
	background-color: #F4F9F9;
	margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
	border: 1px solid black;
	width: 40%; /* Could be more or less, depending on screen size */
	}
	.modal-content2 {
		background-color: #F4F9F9;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 1px solid black;
		width: 30%; /* Could be more or less, depending on screen size */
	}
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
		position: relative;
		color:black;
	}
	</style>
	<body class="w3-light-grey w3-content" style="max-width:1600px">
		<!-- Sidebar/menu -->
		<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
		<?php
				include_once ('dbConn.php'); // Using database connection file here
				session_start();
				$username = $_SESSION["user"];
				$query=mysqli_query($db,"select *from usertb where username='$username'");
				while($rows=mysqli_fetch_assoc($query))
				{
			?>
					<center><img style="height:150px; width:150px; border-radius:50%;" src="<?php echo "profile/". $rows['img'];?>">
					<h3 class="w3 w3-center" style="padding-bottom:20px;"><b><?php echo $rows['username'];?></b></h3>
		<?php
				}
		?>
		  
		  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
		  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">GALLERY</a> 
		  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT ME</a> 
		  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
		  <button onclick="document.getElementById('id13').style.display='block'" class="w3-bar-item w3-button">LOG OUT</button>
		</nav>

		<!-- Top menu on small screens -->
		<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
		  <span class="w3-left w3-padding">D' PSBL</span>
		  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
		</header>

		<!-- Overlay effect when opening sidebar on small screens -->
		<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

		<!-- !PAGE CONTENT! -->
		<div class="w3-main" style="margin-left:300px">
		  <!-- Push down content on small screens --> 
		  <div class="w3-hide-large" style="margin-top:83px"></div>
		<div style="display:grid; grid-template-columns:1fr auto">
			<form method="post" style="display:flex; ">
				<input value="<?php echo $username;?>" type="hidden" name="userval">
				<td style="width:100%"><input style="width:100%; margin:10px;" name="date" class="w3-input w3-border" type="date" required></input></td>
				<td><button type="submit" name="search" class="w3-button w3-black" style="margin:10px; width:140px"><i class="bi bi-search"></i> Search</button></td>
			</form>
			<button type="button" onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-black" style="margin:10px;"><i class="bi bi-plus-circle"></i> Add image</button>
		</div>
		  <!-- Photo grid -->
		  <div class="w3-row">
		  <?php
				include_once ('dbConn.php'); // Using database connection file here
				$username = $_SESSION["user"];
				if(isset($_POST['search'])){
					$date = $_POST['date'];
					$query=mysqli_query($db,"select *from portfoliotb where username='$username' and date='$date'");
				}
				else{
					$query=mysqli_query($db,"select *from portfoliotb where username='$username'");
				}
				while($rows=mysqli_fetch_assoc($query))
				{
			?>
					<div class="w3-col l4 s6">
					  <img name="<?php echo "images/". $rows['portfolioid'];?>" src="<?php echo "images/". $rows['img'];?>" style="width:100%; padding:10px;" onclick="onClick(this)" alt="<?php echo $rows['caption'];?>">
					  <p style="color:black; margin-left:10px"><?php echo $rows['date'];?><p>
						<form action="admin.php" method="post">
							<input value="<?php echo $rows['portfolioid'];?>" type="hidden" name="imgid">
							<button type="button" onclick="document.getElementById('id11').style.display='block'" class="btn btn-link">Edit</button>
							<button type="submit" name="deleted" class="btn btn-link">Delete</button>
						</form>
					</div>
					
					<!----delete------>
					<div class="modal4" id="id14" style="z-index:7">
						<div class="modal-content2 animate">
							<div class="imgcontainer2">
								<img width="200px" height="200px" src="question-icon.png">
								<h2><?php echo 'Are you sure?';?></h2>
							</div>
							<div class="container2" style="background-color:black;">
								<form method="post" action="admin.php">
									<input value="<?php echo $_POST['imgid'];?>" type="text"  name="id">
									<input value="<?php echo $username;?>" type="hidden" name="userval">
									<button type="button" style="width:50%" onclick="document.getElementById('id14').style.display='none'">Cancel</button><button type="Submit" name="deleted" style="width:50%" onclick="document.getElementById('id14').style.display='none'">Yes</button>
								</form>
							</div>
						</div>
					</div>
						<?php
							if(isset($_POST['deleted']))
							{
								$db = mysqli_connect("localhost","root","","finalproject");
								$id = $_POST['imgid'];
								$sql = " DELETE FROM `portfoliotb` WHERE portfolioid='$id'";
								if (mysqli_query($db, $sql)){
								?>
									<audio autoplay> 
										<source src="sound/Message Alert Sound Effect.mp3">
									</audio>
									<style>
										.modal15{
											display:block;
										}
									</style>
										<div class="modal15" id="id15">
											<div class="modal-content2 animate">
												<div class="imgcontainer2">
													<img class="animate" width="200px" height="200px" src="success-icon.png">
													<h2><?php echo 'Deleted.';?></h2>
												</div>
												<div class="container2" style="background-color:black;">
													<form method="post">
														<input value="<?php echo $username;?>" type="hidden" name="userval">
														<center><button type="submit" onclick="document.getElementById('id15').style.display='none'" style="width:100%">Okay</button></center>
													</form>
												</div>
											</div>
										</div>
									<script>
										// Get the modal8
										var modal = document.getElementById('id15');

										// When the user clicks anywhere outside of the modal, close it
										window.onclick = function(event) {
											if (event.target == modal) {
												modal.style.display = "none";
												}
											}
									</script>
						<?php
								}
							}
						?>
					<script>
						// Get the modal05
						var modal = document.getElementById('id14');
											
								// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
							if (event.target == modal) {
								modal.style.display = "none";
							}
						}
					</script>
					
					<!---modal for edit portfolio--->				
					<div id="id11" class="modal11">
						<form class="modal-content1 animate" method="POST" enctype="multipart/form-data" action="admin.php">
						<input value="<?php echo $rows['portfolioid'];?>" type="hidden" name="imgid">
							<div class="imgcontainer">
								<h2>Edit</h2>
							</div>
							<div class="container" style="background-color:#F4F9F9; padding:15px;">
								<div class="form-group">
									<label for="exampleFormControlFile1">Select Image</label>
									<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Caption</label>
									<textarea name="caption" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
								</div>
							</div>
							<table class="container" style="width:100%;">
								<tr>
									<td style="background-color:black;">
										<input value="<?php echo $username;?>" type="hidden" name="userval">
										<button type="button" onclick="document.getElementById('id11').style.display='none'">Cancel</button>
										<button type="Submit" name="updateprof">Save</button>
									</td>
								</tr>
							</table>
						</form>
					</div>
						<?php
							if(isset($_POST['updateprof']))
							{
								$target="images/".basename($_FILES['image']['name']);	
								$db = mysqli_connect("localhost","root","","finalproject");
								$id = $_POST['imgid'];
									
								$image = $_FILES['image']['name'];
								$cap = $_POST['caption'];
								$date = date("Y-m-d", strtotime("+6 HOURS"));
								$sql = "UPDATE `portfoliotb` SET `img`='$image',`caption`='$cap',`date`='$date' WHERE portfolioid='$id'";
								mysqli_query($db, $sql);
								if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){		
								?>
									<audio autoplay> 
										<source src="sound/Message Alert Sound Effect.mp3">
									</audio>
									<style>
										.modal12{
											display:block;
										}
									</style>
										<div class="modal12" id="id12">
											<div class="modal-content2 animate">
												<div class="imgcontainer2">
													<img class="animate" width="200px" height="200px" src="success-icon.png">
													<h2><?php echo 'Saved.';?></h2>
												</div>
												<div class="container2" style="background-color:black;">
												<form method="post" action="admin.php">
													<input value="<?php echo $username;?>" type="hidden" name="userval">
													<center><button type="submit" onclick="document.getElementById('id12').style.display='none'" style="width:100%">Okay</button></center>
												</form>
												</div>
											</div>
										</div>
									<script>
										// Get the modal8
										var modal = document.getElementById('id12');

										// When the user clicks anywhere outside of the modal, close it
										window.onclick = function(event) {
											if (event.target == modal) {
												modal.style.display = "none";
												}
											}
									</script>
						<?php
								}
							}
						?>
					<script>
						// Get the modal11
						var modal = document.getElementById('id11');

						// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
							if (event.target == modal) {
								modal.style.display = "none";
							}
						}
					</script>
					
			<?php
				}
			?>
		  </div>
		  
		  <!-- Modal for full size images on click-->
		  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
			<span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
			<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
			  <img id="img01" class="w3-image">
			  <p id="caption"></p>
			</div>
		  </div>
			
			<!---modal for add to portfolio--->				
			<div id="id03" class="modal3">
				<form class="modal-content1 animate" method="POST" enctype="multipart/form-data" action="admin.php">
					<div class="imgcontainer">
						<h2>Add Image</h2>
					</div>
					<div class="container" style="background-color:#F4F9F9; padding:15px;">
						<div class="form-group">
							<label for="exampleFormControlFile1">Select Image</label>
							<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Caption</label>
							<textarea name="caption" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
						</div>
					</div>
					<table class="container" style="width:100%;">
						<tr>
							<td style="background-color:black;">
								<input value="<?php echo $username;?>" type="hidden" name="userval">
								<button type="button" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
								<button type="submit" name="upload">Save</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
				<?php
					if(isset($_POST['upload']))
					{
						$target="images/".basename($_FILES['image']['name']);	
						$db = mysqli_connect("localhost","root","","finalproject");
						$username = $_SESSION["user"];
										
						$image = $_FILES['image']['name'];
						$cap = $_POST['caption'];
						$date = date("Y-m-d", strtotime("+6 HOURS"));
						$sql = "INSERT INTO `portfoliotb`(username,`img`, `caption`, `date`) VALUES ('$username','$image','$cap','$date')";
						mysqli_query($db, $sql);
						if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){		
						?>
							<audio autoplay> 
								<source src="sound/Message Alert Sound Effect.mp3">
							</audio>
							<style>
								.modal23{
									display:block;
								}
							</style>
								<div class="modal23" id="id23">
									<div class="modal-content2 animate">
										<div class="imgcontainer2">
											<img class="animate" width="200px" height="200px" src="success-icon.png">
											<h2><?php echo 'Saved.';?></h2>
										</div>
										<div class="container2" style="background-color:black;">
										<form method="post" action="admin.php">
											<input value="<?php echo $username;?>" type="hidden" name="userval">
											<center><button type="submit" onclick="document.getElementById('id23').style.display='none'" style="width:100%">Okay</button></center>
										</form>
										</div>
									</div>
								</div>
							<script>
								// Get the modal8
								var modal = document.getElementById('id23');

								// When the user clicks anywhere outside of the modal, close it
								window.onclick = function(event) {
									if (event.target == modal) {
										modal.style.display = "none";
										}
									}
							</script>
				<?php
						}
					}
				?>
			<script>
				// Get the modal07
				var modal = document.getElementById('id03');

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			</script>
			
			<!-----LOG OUT MODAL------>
			<div class="modal3" id="id13" style="z-index:7">
				<div class="modal-content2 animate">
					<div class="imgcontainer2">
						<img width="200px" height="200px" src="question-icon.png">
						<h2><?php echo 'Are you sure?';?></h2>
					</div>
					<div class="container2" style="background-color:black;">
						<form method="get" action="login.php">
							<button type="button" style="width:50%" onclick="document.getElementById('id13').style.display='none'">Cancel</button><button type="Submit" style="width:50%">Yes</button>
						</form>
					</div>
				</div>
			</div>
			<script>
				// Get the modal05
				var modal = document.getElementById('id13');
									
						// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			</script>
			
		  <!-- About section -->
		  <div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">
			<h4><b>About Me</b></h4>
			<div class="w3-content w3-justify" style="max-width:600px">
				<?php
				include_once ('dbConn.php'); // Using database connection file here
				$username = $_SESSION["user"];
				$query=mysqli_query($db,"select *from usertb where username='$username'");
				while($rows=mysqli_fetch_assoc($query))
				{
				?>
					<center><img style="height:150px; width:150px; border-radius:50%;" src="<?php echo "profile/". $rows['img'];?>">
					<h4 class="w3 w3-center" style="padding-bottom:20px;"><b><?php echo $rows['username'];?></b></h4>
					<button type="button" onclick="document.getElementById('id05').style.display='block'" class="btn btn-link">Edit</button>
					<p><?php echo $rows['fullname'];?></p>
					<p><?php echo $rows['gender'];?></p>
					<p><?php echo $rows['birthday'];?></p>
					<p><?php echo $rows['address'];?></p>
					<p><?php echo $rows['bio'];?></p>
				<?php
				}
				?>
		  </div>
		  
		 <!---modal for updating profile--->
		<form method="post" enctype="multipart/form-data">
			<div class="modal5" id="id05">
				<div class="modal-contentprofile w3-animate-right" style="margin-left:500px; margin-top:-50px;">
					<header class="w3-container w3-xlarge" style="color:black; padding:0px;">
						<p class="w3-left" style="padding:10px;">Edit profile</p>
						<p class="w3-right">
							<button type="button" class="btnx" onclick="document.getElementById('id05').style.display='none'" style="width:auto; color:black"><i class="bi bi-x-lg"></i></button>
						</p>
					</header>
					<?php
					include_once ('dbConn.php'); // Using database connection file here
					$username = $_SESSION["user"];
					$query=mysqli_query($db,"select *from usertb where username='$username'");
					while($rows=mysqli_fetch_assoc($query))
						{
					?>
					<div class="imgcontainer2">
						<img class="image animate" src="<?php echo "profile/". $rows['img'];?>" alt="Profile Photo" width="200px" height="200px" style="border-radius:50%;">
						<input name="profilepic" type="file" required/>
						<p>Select Profile Picture</p>
					</div>
					<div class="w3-container" style="color:black">
						<div class="w3-col s4">
							<input style="width:95%" name="fname" class="w3-input w3-border" required></input><p>Fullname</p>
							<input style="width:95%" name="bday" class="w3-input w3-border" type="date" required></input><p>Birthday</p>
						</div>
						<div class="w3-col s4">
							<input style="width:95%" name="uname" class="w3-input w3-border" required></input><p>Username</p>
							<select class="w3-input w3-border" name="gender" style="width:95%" required>
								<option value=""></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select><p>Gender</p>
						</div>
						<div class="w3-col s4">
							<input style="width:95%" name="password" class="w3-input w3-border" required></input><p>Password</p>
							<input style="width:95%" name="cnumber" class="w3-input w3-border" type="number"></input><p>Contact Number</p>
						</div>
						<div class="w3-col s12">
							<div class="input-group mb-3">
								<span class="input-group-text">Street</span>
								<input name="st" type="text" class="form-control" required>
								<span class="input-group-text">Baranggay</span>
								<input name="brgy" type="text" class="form-control" required>
								<span class="input-group-text">Municipality</span>
								<input name="municipality" type="text" class="form-control" required>
							</div>
						</div>
						<div class="w3-col s12">
							<div class="input-group mb-3">
								<span class="input-group-text">Province</span>
								<input name="pro" type="text" class="form-control" required>
								<span class="input-group-text">Region</span>
								<input name="reg" type="text" class="form-control" required>
							</div><p>Address</p>
							<textarea name="bio" style="width:100%"></textarea><p>Bio</p>
						</div>
					</div>
					<div class="container2" style="background-color:black">
						<input value="<?php echo $rows['username'];?>" type="hidden" name="userval">
						<center><button type="submit" name="update" style="width:100%">Update</button></center>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</form>
		<script>
			// Get the modal8
			var modal = document.getElementById('id05');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
				}
			}
		</script>
		  
		  <!---modal for updated profile-->
			<?php
				if(isset($_POST['update']))
				{
					$target="profile/".basename($_FILES['profilepic']['name']);	
					$db = mysqli_connect("localhost","root","","finalproject");
					
					//user
					$initial = $_SESSION["user"];
					$fullname = $_POST['fname'];
					$gender = $_POST['gender'];
					$username = $_POST['uname'];
					$password = $_POST['password'];
					$birthday = $_POST['bday'];
					$image = $_FILES['profilepic']['name'];
					$contactno = $_POST['cnumber'];
					$bio = $_POST['bio'];
					//address
					$st = $_POST['st'];
					$brgy = $_POST['brgy'];
					$mun = $_POST['municipality'];
					$pro = $_POST['pro'];
					$reg = $_POST['reg'];
					$address = ($st.", Baranggay ". $brgy . " ".  $mun . ", " . $pro . "( " . $reg . " )");
					
					$sqlloginvalidity= mysqli_query($db,"select *from usertb where username='$username'");
					$valid=mysqli_num_rows($sqlloginvalidity);
					if($valid == 0)
					{
						$sql1 = "update `usertb` set username='$username', password='$password', fullname='$fullname', birthday='$birthday',
													gender='$gender', contactnumber='$contactno', address='$address',
													img='$image', bio='$bio' where username='$initial'";
						$sql="UPDATE `portfoliotb` SET `username`='$username' WHERE username='$initial'";
						mysqli_query($db, $sql);
						mysqli_query($db, $sql1);
						if(move_uploaded_file($_FILES['profilepic']['tmp_name'], $target))
						{
						?>
							<audio autoplay> 
								<source src="sound/Message Alert Sound Effect.mp3">
							</audio>
							<style>
								.modal6{
									display:block;
								}
							</style>
							<div class="modal6" id="id06">
								<div class="modal-content2 animate">
									<div class="imgcontainer2">
										<img class="animate" width="200px" height="200px" src="success-icon.png">
										<h2>Updated.</h2>
										<p>Profile updated</p>
									</div>
									<div class="container2" style="background-color:black">
										<form method="post" action="admin.php">
											<input value="<?php echo $username;?>" type="hidden" name="userval">
											<center><button type="submit" onclick="document.getElementById('id06').style.display='none'" style="width:100%">Okay</button></center>
										</form>
									</div>
								</div>
							</div>
						<script>
							// Get the modal8
							var modal = document.getElementById('id06');

							// When the user clicks anywhere outside of the modal, close it
							window.onclick = function(event) {
								if (event.target == modal) {
									modal.style.display = "none";
									}
								}
						</script>
				<?php
						}
					}
					else
					{
				?>
						<audio autoplay> 
							<source src="sound/Message Alert Sound Effect.mp3">
						</audio>
						<style>
							.modal7{
								display:block;
							}
						</style>
						<div class="modal7" id="id07">
							<div class="modal-content2 animate">
								<div class="imgcontainer2">
									<img class="animate" width="200px" height="200px" src="failed-icon.png">
									<h2>Failed.</h2>
									<p>Update error, Username already taken</p>
								</div>
								<div class="container2" style="background-color:black">
									<center><button type="button" onclick="document.getElementById('id07').style.display='none'" style="width:100%">Okay</button></center>
								</div>
							</div>
						</div>
					<script>
						// Get the modal8
						var modal = document.getElementById('id07');

						// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
							if (event.target == modal) {
								modal.style.display = "none";
								}
							}
					</script>
			<?php
					}
				}
			?>
		  
		  <!-- Contact section -->
		  <div class="w3-container w3-light-grey w3-padding-32 w3-padding-large" id="contact">
			<div class="w3-content" style="max-width:600px">
			  <h4 class="w3-center"><b>About company</b></h4>
			  <p></p>
				<div class="w3-section">
				  <label>The D'PSBL Team</label>
				</div>
				<div class="w3-section">
				<h4>Our purpose:</h4>
					To deliver on the promise of technology and human ingenuity

					We embrace the power of change to create long-lasting value 
					in every direction for our clients, people and communities. 
				<h4>Core Values:</h4>	
				 <label>Our values shape the culture of our organization and define the character of our company. We live the core values through individual behaviors. They serve as the foundation for how we act and make decisions.</label>
				<label>Acting with ethics and integrity always has been and always will be the right thing to do.</label>
				<label></label>
				<label></label>
				<label></label>
				</div>
				<h4 class="w3-center"><b>Follow us on</b></h4>
				<div class="w3-section">
				  <label><i class="bi bi-facebook"></i> Facebook: D'PSBL</label>
				</div>
				<div class="w3-section">
				  <label><i class="bi bi-twitter"></i> Twitter: WeD'PSBL</label>
				</div>
				<div class="w3-section">
				  <label><i class="bi bi-instagram"></i> Instagram: @psblatthetop</label>
				</div>
			</div>
		  </div>
		  
		  <div class="w3-black w3-center w3-padding-24"><p>Developed by: D'PSBL company</p></div>

		<!-- End page content -->
		</div>
		</div>

		<script>
		// Script to open and close sidebar
		function w3_open() {
		  document.getElementById("mySidebar").style.display = "block";
		  document.getElementById("myOverlay").style.display = "block";
		}
		 
		function w3_close() {
		  document.getElementById("mySidebar").style.display = "none";
		  document.getElementById("myOverlay").style.display = "none";
		}

		// Modal Image Gallery
		function onClick(element) {
		  document.getElementById("img01").src = element.src;
		  document.getElementById("modal01").style.display = "block";
		  var captionText = document.getElementById("caption");
		  captionText.innerHTML = element.alt;
		}

		</script>
	</body>
</html>
