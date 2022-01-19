<?php 
require_once "connection.php";
$showError_pass  = $showError_email  = false;
if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"]; 

    $sql = "Select * from users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['name'];
                header("location: welcome.php");
            } 
            else{
                $showError_pass=true;
            }
        }
        
    } 
    else{
        $showError_email=true;
    }
}

require_once 'head.php';  ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal">
						<div class="form-group">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input id="email" type="email" name="email" value="<?php if($_POST){ echo $_POST['email'] ; } ?>" required="required" autofocus="autofocus" class="form-control">
                                <?php
                                if($showError_email){
                                    echo '<span class="help-block"><strong>These credentials do not match our records.</strong></span>';
                                } 
                                ?>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input id="password" type="password" name="password" required="required" class="form-control">
                                <?php
                                if($showError_pass){
                                    echo '<span class="help-block"><strong>These credentials do not match our records.</strong></span>';
                                } 
                                ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="login">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php require_once 'footer.php';  ?>