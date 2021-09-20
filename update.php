<?php

include_once('function.php');

$update_user = new DB_con();

if (isset($_POST['update'])) {

    $userid = $_GET['id'];
    $fullname = $_POST['fullname'];
    $title = $_POST['title'];
    $report = $_POST['report'];
    $deadline = $_POST['deadline'];
    $data_file = $_FILES['data_file']['name'];

    $sql = $update_user->update_data($id,$postdate, $title, $report, $deadline, $file, $name);

    if ($sql) {
        echo "<script>alert ('update complete');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert ('Something wrong');</script>";
        echo "<script>window.location.href='update.php';</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <h1>
            Update Data
        </h1>
        <hr>
        <?php
        $id = $_GET['id'];
        $updateData = new DB_con();
        $sql = $updateData->fetch_one_record($id);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อผู้ส่ง</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" require>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">รายการ</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" require>
                </div>
                <div class="mb-3">
                    <label for="report" class="form-label">การแจ้ง</label>
                    <input type="text" class="form-control" id="report" name="report" value="<?php echo $row['report']; ?>" require>
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">กำหนดส่ง</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo $row['deadline']; ?>" require>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <label for="file" class="input-group-text">ไฟล์แนบ</label>
                        <input type="file" class="form-control" name="file" value="<?php echo $row['file']; ?>" require>
                    </div>
                </div>

            
            <?php  } ?>

            <button type="submit" name="update" class="btn btn-primary">Update</button>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>