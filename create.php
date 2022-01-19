<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

require_once "connection.php";

if (isset($_POST['create'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $sql = "INSERT INTO `employees` ( `first_name`, `last_name`, `contact_no`, `created_at`) VALUES ( '$firstname', '$lastname', '$contact', current_timestamp())";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION['msg']="Employee created successfully!";
        header("location: welcome.php");
        exit();
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
 <?php require_once 'head.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Employee</div>
                    <div class="panel-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="employees_form">
                            <div class="form-group">
                                <label for="firstname">Firstname:</label>
                                <input type="firstname" id="firstname" name="firstname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname:</label>
                                <input type="lastname" id="lastname" name="lastname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number:</label>
                                <input type="contact" id="contact" name="contact" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" name="create">Create</button>
                            <a type="submit" href="./welcome.php" class="btn btn-default">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php' ; ?>