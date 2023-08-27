<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //connect to database 
    $servername = "localhost";
    $username = ":::TYPE THE PASSWORD:::";
    $password = "";
    $database = ":::TYPE YOUR DATABASE NAME HERE:::";

    $conn = mysqli_connect($servername, $username, $password, $database);
    //declared variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "Select * from `signin` where email='$email' and password='$password'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            // if(password_verify($fpassword,$row['Password'])){
            //     $showAlert= true;
            //     session_start();
            //     //$_SESSION['loggedin'] = true;
            //     $_SESSION['email'] = $email;
            //     header("location: home.html");
            // } $login = true;
            // $showAlert=true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location: loader.html");

            // else{
            //     $showError = "Invalid Credentials";
            // }
        }
    }
    // else{
    //     $showError = "Invalid Credentials";
    // }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css">
    <link rel="icon" href="netflix.png" type="image/png">

    <title>Netflix</title>
</head>

<body>
    <div class="header">
        <h1>NETFLIX</h1>
    </div>
    <div class="box">
        <p>Sign In</p>
        <section>
            <form method="post" style="margin-left: -60px;">
                <input type="email" name="email" id="email" placeholder="Email or phone number" required>
                <input type="password" name="password" id="password" placeholder="Password" maxlength="8" required>
                <button type="submit">Sign In</button>
            </form>
            <span id="span-1" style="margin-left: -60px;">
                <input type="checkbox" name id="checkbox" style="margin-left: 50px; background-color: #333333;">
                <label for="checkbox">Remember me</label>
                <h6>Need help?</h6>
                <br>
                <br>
                <br>
                <br>

                <h4>New to Netflix?&nbsp;<span id="span-2">Sign up now.</span></h4><br>
                <h5>This page is protected by Google reCAPTCHA to<br> ensure
                    you're not a bot. <span id="span-3">Learn more.</span>
                </h5>

            </span>

        </section>

    </div>


    <footer>
        <p id="footer-p">Questions? Call <span id="span-4">000-800-919-1694</span></p>
        <div class="list">
            <div class="items" style=" width: 90px;">FAQ</div>
            <div class="items" style=" width: 440px;">Help Centre</div>
            <div class="items" style=" width: 440px;">Terms of Use</div>
            <div class="items" style=" width: 440px;">Privacy</div>

        </div>
        <br>
        <br> <br> <br>
        <div class="list2">
            <div class="items2" style=" width: 190px;">Cookie Preferences</div>
            <div class="items2" style=" width: 340px;">Corporate Information</div>
        </div>

    </footer>

</body>

</html>
