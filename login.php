<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		// $_SESSION['username'] = $row['username'];
		header("Location: main.php");
	} 
    else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="./login.css">    
</head>    
<body>    
    <h2>Login Page</h2><br>    
    <div class="login">    
    <form method="POST" action="">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="username" autocomplete="off" id="Uname" placeholder="Username"  value="<?php echo $username; ?>" required>    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="password" autocomplete="off" id="Pass" placeholder="Password"  value="<?php echo $password; ?>" required>    
        <br><br>    
        <button name="submit" id="log">Log in</button>       
        <br><br>    
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br>        
    </form>     
</div>    
</body>    
</html>