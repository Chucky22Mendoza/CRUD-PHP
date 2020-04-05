<?php

include("database/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }

}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['message'] = 'Error updating task';
        $_SESSION['message_type'] = 'warning';
    } else {
        $_SESSION['message'] = 'Task updated successfully';
        $_SESSION['message_type'] = 'success';
    }

    header("Location: index.php");
}


?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-title mt-3 text-center">
                    <h3>UPDATING TASK</h3>
                </div>
                <div class="card-body">
                    <form action="edit.php?id=<?=$_GET['id']?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?=$title?>" class="form-control" placeholder="Update Title..." autofocus required>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Update Description" required><?=$description?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="update">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>