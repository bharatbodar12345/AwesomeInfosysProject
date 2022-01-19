<?php
require_once "connection.php";
$showError_email = $showError_pass = false;
if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    $existSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError_email = true;
    } else {
        if ($password != $password_confirmation) {
            $showError_pass = true;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `name`, `email`, `password`, `created_at`) VALUES ( '$name', '$email', '$password', current_timestamp())";
            if (mysqli_query($conn, $sql)) {

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;
                header("location: welcome.php");
                exit();
            } else {
                echo "Error: " . $sql . " " . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
}

require_once 'head.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal" id="users_form">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" name="name" value="<?php if ($_POST) { echo $_POST['name']; } ?>" required="required" autofocus="autofocus" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" name="email" value="<?php if ($_POST) { echo $_POST['email']; } ?>" required="required" class="form-control">
                                <?php
                                if ($showError_email) {
                                    echo '<span class="help-block"><strong>The email has already been taken.</strong></span>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" name="password" required="required" class="form-control">
                                <?php
                                if ($showError_pass) {
                                    echo '<span class="help-block"><strong>The password confirmation does not match.</strong></span>';
                                }
                                ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" name="password_confirmation" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="register">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>