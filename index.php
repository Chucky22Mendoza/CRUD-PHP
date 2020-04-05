<?php include("database/db.php"); ?>

<? include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>
            <div class="card">
                <div class="card-title mt-3 text-center">
                    <h3>ADD A NEW TASK</h3>
                </div>
                <div class="card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title..." autofocus required>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task Description" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="save_task">SAVE TASK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_tasks)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $row['title'] ?></td>
                            <td class="text-center"><?= $row['description'] ?></td>
                            <td class="text-center"><?= $row['created_at'] ?></td>
                            <td class="text-center">
                                <div class="row d-flex justify-content-center">
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-info">
                                        <span class="fa fa-pencil-square-o" style="font-size: 18px"></span>
                                    </a>
                                    <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                        <span class="fa fa-trash-o" style="font-size: 18px"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<? include("includes/footer.php") ?>