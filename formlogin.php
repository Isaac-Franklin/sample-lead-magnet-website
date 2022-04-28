<?php
    include 'dbh.inc.php';
    session_start();

if(isset($_POST["submit"])){

    $first = mysqli_real_escape_string($conn, $_POST[first]);
    $email = mysqli_real_escape_string($conn, $_POST[email]);
    $pwd = mysqli_real_escape_string($conn, $_POST[pwd]);

    if (empty($first) || empty($email) || empty($pwd)) {
        header("Location: index.html?emptyfield");
        exit();
    }else{
        if (!preg_match ("/^[a-zA-Z]*$/", $first) || !preg_match ("/^[a-zA-Z]*$/", $last)) {
            header("Location: index.html?wronginput");
            exit();
        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: index.html?INVALIDEMAIL");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE firstname = '$first' && password = '$pwd' && email = '$email'";
                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);

                if ($resultcheck > 0) {
                    if ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['uid'] = $row['username'];
                        header("Location: index.php?LOGINSUCCESS");
                        exit(); 
                    }else{
                        header("Location: index.html?SESSION NOT STARTED");
                        exit();
                    };

                }else{
                    header("Location: index.html?loginfailed");
                    exit();
                }
            }
        }
    }
  

}else{
    header ("Location: index.html?Kindlylogincorrectly");
    exit();
}
