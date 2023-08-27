<?php
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //connect to database 
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $database = "sarthak";

        $conn = mysqli_connect($servername, $username, $password, $database);
        //declared variables
        $email = $_POST['email'];
        $fpassword = $_POST['fpassword'];

        $sql = "Select * from `signup` where email='$email' and password='$fpassword'";
        
        $result = mysqli_query($conn, $sql);
        
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            while($row=mysqli_fetch_assoc($result))
            { 
                // if(password_verify($fpassword,$row['Password'])){
                //     $showAlert= true;
                //     session_start();
                //     //$_SESSION['loggedin'] = true;
                //     $_SESSION['email'] = $email;
                //     header("location: home.html");
                // } $login = true;
                $showAlert=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: home.php");

                // else{
                //     $showError = "Invalid Credentials";
                // }
            }     
        } 
        else{
            $showError = "Invalid Credentials";
        }
    }
        
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="loginnew.css">
	<title>Login</title>
</head>

	<body>
		<?php
    if($showAlert){
        // echo '<div class="alert alert-success alert-dismissible fade show"
        //   role="alert" style="margin-left: 20px; color: green; border: 0.5px solid green; padding:10px; background-color: #d2f8d2; ">
        //   <strong>Success!</strong>Logged In successfully!
          
        // </div>';
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';

    }

       else if($showError) {
            // echo '<div class="alert alert-danger alert-dismissible fade show"
            //   role="alert" style="margin-left: 20px; color: red; border: 0.5px solid red; padding:10px; background-color: #ffd8d8;">
            //   <strong>Error!</strong>'.$showError.'
            
            // </div>';
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
            }
    ?>
		<div class="bg-pic">
				<section class="features">
					<form method="POST">
						<br><br>
						<fieldset>
							<legend>
                                <div class="text-container">
                                    <h1>#Memories</h1>
                                </div>
                            </legend>

							<br><br>

							<div class="form-floating mb-3">
								<input type="email" class="form-control" id="email" name="email" placeholder="email" style="border">
                        <label for="email" style="color: rgb(5, 20, 28); ">Email</label>
							</div>


							<div class="form-floating">
								<input type="password" class="form-control" id="fpassword" name="fpassword" placeholder="Password">
								<label for="fpassword" style="color:rgb(5, 20, 28); ">Password</label>
							</div>

                               <!-- Forgot password -->
							<!-- <div class="forgot">
								<a href ="forgot.html" style="color: black ;font-weight: bold; text-decoration: none;">Forgot Password?</a>
							</div> -->


							<div class="box-2">
								<button  type="submit" >Log in</button>
                                <!-- onclick=confirm_box() -->
							</div>



							<br><h6 style="color: black; text-align: center;">OR</h6>
							<div class="box-3">
								<button><a href="signup.php" style="text-decoration: none; color: black;">Create</a></button>

							</div>
						</fieldset>
					</form>
				</section>
			</div>
            <footer>
      <p>&copy; 2023 #Memories. All rights reserved.</p>
    </footer>

			<script>
				function confirm_box(){
				var a=confirm("Are you sure you wan to submit the details?");
				if(a==true){
					alert("Successfully Logged in!")
          
				}
				else{
					alert("Failed to log in");
				}
			}
			</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>