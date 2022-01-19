<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
    <?php require_once "head.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees List <a href="./create.php" class="btn btn-warning pull-right">Add Employee</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        if(isset($_SESSION['msg']) ){
                            echo '
                            <div class="alert alert-success">'.$_SESSION['msg'].'</div>';
                            unset($_SESSION['msg']);
                        }
                        else{

                        }
                        require_once 'connection.php';
                        $result = mysqli_query($conn, "SELECT * FROM employees");
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                            <table class="table table-border">
                                <tbody>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Contact Number</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['first_name']; ?></td>
                                            <td><?= $row['last_name']; ?></td>
                                            <td><?= $row['contact_no']; ?></td>
                                            <td>
                                                <a href="update.php?id=<?= $row["id"]; ?>" class="btn btn-primary">Edit</a>
                                                <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete </a>
                                            </td>
                                        </tr>
                                    <?php

                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                            echo "No result found";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php' ; ?>
