<?php

include("database/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['message'] = 'Error deleting task';
        $_SESSION['message_type'] = 'warning';
    } else {
        $_SESSION['message'] = 'Task deleted successfully';
        $_SESSION['message_type'] = 'danger';
    }

    header("Location: index.php");
}


?>