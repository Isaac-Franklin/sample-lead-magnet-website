<?php
    include 'dbh.inc.php';
    session_start();

if (isset($_POST['submit'])) {

   
    
        $first = mysqli_real_escape_string($conn, $_POST['firstname']);
        $last = mysqli_real_escape_string($conn, $_POST['lastname']);
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        if (empty($first) || empty($last) || empty($uid) || empty($email) || empty($pwd)) {
            header ("Location: signup.html?Kindlyfillalltags");
            exit();

        }else {
            if (!preg_match ("/^[a-zA-Z]*$/", $first) || !preg_match ("/^[a-zA-Z]*$/", $last)) {
                header("Location: signup.html?invalidcharacters");
                exit();

            }else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
                    header("Location: signup.html?invalidemailaddress");
                    exit();
                
                }else{
                    $sql = 'SELECT * FROM users WHERE username = "$uid" || email = "$email"';
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);

                    if($resultcheck > 0){
                        header("Location: signup.html?username, emailaddresstaken");
                        exit(); 
                    }else{
                        $sql1 = "INSERT INTO users(firstname, lastname, username, email, password) 
                        VALUES('$first', '$last', '$uid', '$email', '$pwd');";
                        $result1 = mysqli_query($conn, $sql1);

                        if ($row = mysqli_fetch_assoc($result1)) {
                            $_SESSION['firstname'] = $row['firstname'];
                            $_SESSION['lastname'] = $row['lastname'];
                            $_SESSION['uid'] = $row['username'];
                            $_SESSION['email'] = $row['email'];
                            header("Location: index.php?signupsuccess");
                            exit();
                        }
                        
                    }
                }
            }
        }
            
    }else{
        header("Location: signup.html?Signupfailed");
        exit();
    }
       
      