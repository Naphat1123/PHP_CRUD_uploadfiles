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
    <div class="container mt-5">
        <h1 class="mt-5">Information Page</h1>
        <a href="insertdata.php" class="btn btn-success">Go to insert Data</a>
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th>#</th>
                <th>รายการ</th>
                <th>การแจ้ง</th>
                <th>วันที่ส่ง</th>
                <th>กำหนดส่ง</th>
                <th>ไฟล์แนบ</th>
                <th>ผู้แจ้ง</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php
                include_once('function.php');
                $fetchdata = new DB_con();
                $sql = $fetchdata->fetchdata();

                while ($row = mysqli_fetch_array($sql)) {

                ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['report']; ?></td>
                        <td><?php echo $row['postdate']; ?></td>
                        <td><?php echo $row['deadline']; ?></td>
                        <td><a href="upload/<?php echo $row['file']; ?>"><?php echo $row['file']; ?></a></td>
                        <td><?php echo $row['name'];   ?></td>
                        <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                <?php

                }




                ?>

            </tbody>
        </table>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>