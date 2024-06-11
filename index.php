<?php
include('database.inc.php');
session_start();
$msg="";
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	
	$sql="select * from user where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){ 
		$row=mysqli_fetch_assoc($res);
		$_SESSION['UID']=$row['id'];
		//header("location:dashboard.php");
		//die();
		?>
		<script>
			window.location.href='dashboard.php';
		</script>
		<?php
	}else{
		$msg="Please enetre correct login details.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         body {
         margin: 0;
         padding: 0;
         background-color: #45619D;
         height: 100vh;
         }
		 .text-info {
			color: #000 !important;
		}
         #login .container #login-row #login-column #login-box {
         margin-top: 120px;
         max-width: 600px;
         height: 320px;
         border: 1px solid #9C9C9C;
         background-color: #fff;
         }
         #login .container #login-row #login-column #login-box #login-form {
         padding: 20px;
         }
         #login .container #login-row #login-column #login-box #login-form #register-link {
         margin-top: -85px;
         }    
		 .container h2{
			margin-bottom:25px;
		 }
      </style>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      
   </head>
   <body>
      <body>
         <div id="login">
            <div class="container">
               <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                     <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                           <h2 class="text-center text-info">Login Form</h2>
                           <div class="form-group">
                              <label for="username" class="text-info">Username:</label><br>
                              <input type="text" name="username" id="username" class="form-control" required>
                           </div>
                           <div class="form-group">
                              <label for="password" class="text-info">Password:</label><br>
                              <input type="password" name="password" id="password" class="form-control" required>
                           </div>
                           <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-success" value="Submit">
							  <span style="color:red;"><?php echo $msg?></span>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
</html>