<?php
require_once 'connection.php';
$sql = "DELETE FROM employees WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION['msg']="Employee deleted successfully!";
   header("location: welcome.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>