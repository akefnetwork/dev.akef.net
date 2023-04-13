<?php
require_once('../../config/database.php');
require_once('../../models/users.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $fname = trim(filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING));
    $lname = trim(filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $password = $_POST["password"];

    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        // Display an error message if any field is empty
    } else {
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Display an error message if the email is not valid
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Create a new user
            $userId = User::create($conn, $fname, $lname, $email, $hashed_password);

            if ($userId) {
                // Registration successful, redirect to login page or set session and redirect to dashboard
            } else {
                // Registration failed, display an error message
            }
        }
    }
}
?>
<!-- Rest of the HTML content -->
<form action="action_page.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First name</b></label>
    <input type="text" placeholder="Your first name" name="fname" id="fname" required>

    <label for="lname"><b>Last name</b></label>
    <input type="text" placeholder="Your last name" name="lname" id="lname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

    <label for="web"><b>Last name</b></label>
    <input type="text" placeholder="Your website" name="web" id="web">
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form> 