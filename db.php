<?php
    $server = 'localhost';
    $username = 'root';
    $password = '<?PHP?>4132';
    $dbname = 'forumpost';

    $conn = mysqli_connect($server, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        echo 'Failed to connect';
    }

?>