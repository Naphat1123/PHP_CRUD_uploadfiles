<?php

include_once('function.php');

$insertdata = new DB_con();

if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $report = $_POST['report'];
    $deadline = $_POST['deadline'];
    $postdate = $_POST['postdate'];
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $location = "upload/" . $fileName;

    move_uploaded_file($fileTmpName, $location);

    $sql = $insertdata->insert($postdate, $title,  $report, $deadline,  $fileName, $name);

    if ($sql) {
        echo "<script>alert ('Add complete');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert ('Something wrong');</script>";
        // echo "<script>window.location.href='insertdata.php';</script>";
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 class="mt-5">
            Insert Page
        </h1>

        <a href="index.php" class="btn btn-primary">Go back</a>
        <hr>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อผู้ส่ง</label>
                <input type="text" class="form-control" id="name" name="name" require>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">รายการ</label>
                <input type="text" class="form-control" id="title" name="title" require>
            </div>
            <div class="mb-3">
                <label for="report" class="form-label">การแจ้ง</label>
                <input type="text" class="form-control" id="report" name="report" require>
            </div>
            <div class="mb-3">
                <label for="postdate" class="form-label">วันที่ส่ง</label>
                <input type="date" class="form-control" id="postdate" name="postdate" require>
            </div>
            <div class="mb-3">
                <label for="deadline" class="form-label">กำหนดส่ง</label>
                <input type="date" class="form-control" id="deadline" name="deadline" require>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <label for="file" class="input-group-text">ไฟล์แนบ</label>
                    <input type="file" class="form-control" name="file" accept="application/pdf,image/png,image/jpng,image/jpg" require>
                </div>
            </div>

            <button type="submit" name="insert" class="btn btn-primary">Insert</button>
        </form>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>