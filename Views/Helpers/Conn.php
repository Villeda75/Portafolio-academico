<?php

    function strConnection(){
        $conn = mysqli_connect('localhost', 'root', '', 'db_jovesolides');
        return $conn;
    }
?>