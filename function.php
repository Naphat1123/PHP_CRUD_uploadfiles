<?php

include_once('../config.php');

class DB_con
{
    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed" . mysqli_connect_error();
        }
    }


    public function insert($postdate, $title, $report, $deadline, $file, $name)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO uploadfiles (postdate, title, report, deadline, file, name) values('$postdate', '$title', '$report', '$deadline','$file', '$name')");
        return $result;
    }

    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM uploadfiles");
        return $result;
    }

    public function registration($fname, $uname, $uemail, $password)
    {
        $reg = mysqli_query($this->dbcon, "INSERT INTO tbluser(fullname , username , useremail , password) values('$fname' , '$uname' , '$uemail' , '$password')");
        return $reg;
    }

    public function usernameavilable($uname)
    {
        $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbluser WHERE username = '$uname'");
        return $checkuser;
    }

    public function signin($uname, $password)
    {
        $signingquery = mysqli_query($this->dbcon, "SELECT id , fullname FROM tbluser WHERE username='$uname' AND password = '$password'");
        return $signingquery;
    }

    public function fetch_one_record($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM uploadfiles WHERE id = '$id'");
        return $result;
    }

    public function update_data($id,$postdate, $title, $report, $deadline, $file, $name)
    {
        $result = mysqli_query($this->dbcon, "UPDATE uploadfiles SET 
            name = '$name',
            title = '$title',
            report = '$report',
            deadline = '$deadline',
            file = '$file'
            WHERE id = '$id'
        ");
        return $result;
    }

    public function download($userid)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM user_data WHERE id = '$userid'");
        return $result;
    }

    public function delete_data($id)
    {
        $result = mysqli_query($this->dbcon, "DELETE FROM uploadfiles WHERE id = '$id'");
        return $result;
    }
}
