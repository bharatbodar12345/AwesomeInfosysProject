<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

require_once "connection.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $sql = "UPDATE `employees` SET `first_name` = '$firstname', `last_name` = '$lastname', `contact_no` = '$contact' WHERE `employees`.`id` = $id";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION['msg']="Employee updated successfully!";
        header("location: welcome.php");
        exit();
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
$result = mysqli_query($conn, "SELECT * FROM employees WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);


require_once 'head.php'; 
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Employee</div>
                    <div class="panel-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="employees_form" >
                            <div class="form-group">
                                <label for="firstname">Firstname:</label>
                                <input type="text" value="<?= $row['first_name'] ?>" id="firstname" name="firstname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname:</label>
                                <input type="text" value="<?= $row['last_name'] ?>" id="lastname" name="lastname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number:</label>
                                <input type="tel" value="<?= $row['contact_no'] ?>" id="contact" name="contact" class="form-control">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                            <button type="submit" name="update" class="btn btn-primary">Update</button> <a type="submit" href="./welcome.php" class="btn btn-default">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php' ; ?>
