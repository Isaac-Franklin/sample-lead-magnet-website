<?php
    include_once 'dbh.inc.php';
    session_start();

    if (isset($_POST['submit'])) {
        session_unset();
        session_destroy();
        header("Location: index.html?logoutsuccess");
        exit();
}


?>
