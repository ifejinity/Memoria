<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="newshop.css">
		
		<title>Online Gallery - Log in</title>
		<style>
			body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
			body{
				overflow-y: scroll; 
			}
			
			body::-webkit-scrollbar {
				display: none;
			}
			
			body {
				-ms-overflow-style: none;  /* IE and Edge */
				scrollbar-width: none;  /* Firefox */
			}
			.btncus, .spancus {
				max-width: 0;
				-webkit-transition: max-width 1s;
				transition: max-width 1s;
				white-space: nowrap;
				overflow: hidden;
			}
			.btncus:hover, .spancus  {
				max-width: 30rem;
			}
			.d1{
				width:500px;
				border: solid 1px black;
				position:fixed;
				top:200px;
				right:480px;
				padding:20px;
			}
			.btnlogin{
				background-color:#153B44;
				border: 1px solid black;
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
			.container {
				background-color:#153B44;
				width:100%;
			}	
			.container2 {
				background-color:#153B44;
				width:100%;
			}
		</style>
	</head>
	<body class="w3-theme-l5">
	<!--for log in function-->
	<?php
		include "dbConn.php"; //Using database connection file here
		
		if(isset($_POST['login']))
			{				
			$uname = $_POST['username'];
			$upassword = $_POST['password'];

			$res = mysqli_query($db,"select* from usertb where username='$uname'and password='$upassword'");
			$result=mysqli_fetch_array($res);
			if($result)
			{
				session_start();
				$_SESSION["user"] = $uname;
	?>
				<style>
					.modal5{
						display:block;
					}
				</style>
				<audio autoplay> 
					<source src="sound/Message Alert Sound Effect.mp3">
				</audio>
				<div class="modal5" id="id05">
					<form method="POST" action="admin.php">
						<div class="modal-content2 animate">
							<div class="imgcontainer">
								<img class="animate" width="200px" height="200px" src="success-icon.png">
								<h2 style="color:black"><?php echo 'Log In Success.';?></h2>
							</div>
							<div class="container2">
								<input value="<?php echo $uname;?>" type="hidden" name="userval">
								<center><button type="Submit" onclick="document.getElementById('id05').style.display='none'"  style="width:100%">Okay</button></center>
							</div>
						</div>
					</form>
				</div>
				<script>
					// Get the modal05
					var modal = document.getElementById('id05');

					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
					}
				</script>
	<?php			
			}
			else
			{
	?>
				<audio autoplay> 
					<source src="sound/Error Sound Effect.mp3">
				</audio>
				<style>
				.modal6{
					display:block;
				}
				</style>
				<div class="modal6" id="id06">
					<div class="modal-content2 animate">
						<div class="imgcontainer">
							<img width="200px" height="200px" src="failed-icon.png">
							<h2 style="color:black"><?php echo 'Log In Failed.';?></h2>
						</div>
						<div class="container2">
							<center><button type="button" onclick="document.getElementById('id06').style.display='none'" class="failed" style="width:100%">Okay</button></center>
						</div>
					</div>
				</div>
				<script>
					// Get the modal03
					var modal = document.getElementById('id06');

					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
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
	mysqli_close($db); // Close connection
	?>
	<!---modal for Sign up--->
		<form method="post" enctype="multipart/form-data">
			<div class="modal8" id="id08">
				<div class="modal-contentprofile w3-animate-left" style="margin-left:100px; margin-top:-50px;">
					<header class="w3-container w3-xlarge" style="color:black; padding:0px;">
						<p class="w3-left" style="padding:10px;">Sign up</p>
						<p class="w3-right">
							<button type="button" class="btnx" onclick="document.getElementById('id08').style.display='none'" style="width:auto; color:black"><i class="bi bi-x-lg"></i></button>
						</p>
					</header>
					<div class="imgcontainer2">
						<img class="image animate" src="images/profile.jpg" alt="Profile Photo" width="200px" height="200px" style="border-radius:50%;">
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
								<option value="">Select</option>
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
						</div>
					</div>
					<div class="container2" style="background-color:black">
						<center><button type="submit" name="signup" style="width:100%">Sign up</button></center>
					</div>
				</div>
			</div>
		</form>
		<script>
			// Get the modal8
			var modal = document.getElementById('id08');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
				}
			}
		</script>
		<!---modal for created acc-->
			<?php
				if(isset($_POST['signup']))
				{
					$target="profile/".basename($_FILES['profilepic']['name']);	
					$db = mysqli_connect("localhost","root","","finalproject");
					
					//user
					$fullname = $_POST['fname'];
					$gender = $_POST['gender'];
					$username = $_POST['uname'];
					$password = $_POST['password'];
					$birthday = $_POST['bday'];
					$image = $_FILES['profilepic']['name'];
					$contactno = $_POST['cnumber'];
					$bio="Bio";
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
						$sql = "INSERT INTO `usertb`(`username`, `password`, `fullname`, `birthday`, `gender`, `contactnumber`, `address`, `img`, `bio`) VALUES 
								('$username','$password','$fullname','$birthday','$gender','$contactno','$address','$image','$bio')";
						move_uploaded_file($_FILES['profilepic']['tmp_name'], $target);
						if(mysqli_query($db, $sql))
						{
						?>
							<audio autoplay> 
								<source src="sound/Message Alert Sound Effect.mp3">
							</audio>
							<style>
								.modal9{
									display:block;
								}
							</style>
							<div class="modal9" id="id09">
								<div class="modal-content2 animate">
									<div class="imgcontainer2">
										<img class="animate" width="200px" height="200px" src="success-icon.png">
										<h2><?php echo 'Signed up.';?></h2>
										<p><?php echo "Welcome " . $username;?></p>
									</div>
									<div class="container2">
										<form method="post" action="admin.php">
											<input value="<?php echo $username;?>" type="hidden" name="userval">
											<center><button type="submit" onclick="document.getElementById('id09').style.display='none'" style="width:100%">Okay</button></center>
										</form>
									</div>
								</div>
							</div>
						<script>
							// Get the modal8
							var modal = document.getElementById('id09');

							// When the user clicks anywhere outside of the modal, close it
							window.onclick = function(event) {
								if (event.target == modal) {
									modal.style.display = "none";
									}
								}
						</script>
				<?php
						}
						else
						{
				?>
							<audio autoplay> 
								<source src="sound/Message Alert Sound Effect.mp3">
							</audio>
							<style>
								.modal17{
									display:block;
								}
							</style>
							<div class="modal17" id="id17">
								<div class="modal-content2 animate">
									<div class="imgcontainer2">
										<img class="animate" width="200px" height="200px" src="failed-icon.png">
										<h2><?php echo 'Failed.';?></h2>
										<p><?php echo 'Failed to create';?></p>
									</div>
									<div class="container2">
										<center><button type="button" onclick="document.getElementById('id17').style.display='none'" style="width:100%">Okay</button></center>
									</div>
								</div>
							</div>
						<script>
							// Get the modal8
							var modal = document.getElementById('id17');

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
							.modal2{
								display:block;
							}
						</style>
						<div class="modal2" id="id02">
							<div class="modal-content2 animate">
								<div class="imgcontainer2">
									<img class="animate" width="200px" height="200px" src="failed-icon.png">
									<h2><?php echo 'Failed.';?></h2>
									<p><?php echo 'The Username is already taken.';?></p>
								</div>
								<div class="container2">
									<center><button type="button" onclick="document.getElementById('id02').style.display='none'" style="width:100%">Okay</button></center>
								</div>
							</div>
						</div>
					<script>
						// Get the modal8
						var modal = document.getElementById('id02');

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
		<div class="d1">
			<center><table class=tbl1>
				<tr>
					<td colspan=2 align=center><h3>Log in</h3></td>
				</tr>
				<form method="POST">
					<tr>
						<td><input type="text" name="username" class="form-control form-control-lg" placeholder="Username" style="border-radius:50px 50px 50px 50px;" Required></td>
					</tr>
					<tr>
						<td><input type="password" name="password" class="form-control form-control-lg" placeholder="Password" style="border-radius:50px 50px 50px 50px;" id="mypassword" required></td>
					</tr>
					<tr>
						<td class=td2 align=right><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"  onclick="myFunction()">
								<label class="form-check-label" for="defaultCheck1">
									Show Password
								</label>
						</td>
						<script>
							function myFunction() {
								var x = document.getElementById("mypassword");
								if (x.type === "password") {
									x.type = "text";
								} else {
									x.type = "password";
								}
							}
						</script>
					</tr>
					<tr>
						<td align=center><button name="login" class="btnlogin" style="width:100%;"><strong>Log In</strong></button></td>
					</tr>
				</form>
			</table></center>
			<br>
			<p>Have no account yet? Click<button class="btn btn-link" onclick="document.getElementById('id08').style.display='block'">Sign up</button>.</p>
		</div>
	</body>
</html>