<?php

include("db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES('$title', '$description')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['message'] = 'Error saving task';
        $_SESSION['message_type'] = 'warning';
    } else {
        $_SESSION['message'] = 'Task saved successfully';
        $_SESSION['message_type'] = 'success';
    }

    header("Location: index.php");
}

?>