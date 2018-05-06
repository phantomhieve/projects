<?php
    if(isset($_POST['submit'])){
        include_once 'db.inc.php';
        $user_name = mysqli_real_escape_string($conn, $_POST['inputUser']);
        $user_email = mysqli_real_escape_string($conn, $_POST['inputEmail']);
        $user_pass = mysqli_real_escape_string($conn, $_POST['inputPassword']);
        //for checking user_name or emial
        $sql = "SELECT * FROM users WHERE user_name = '$user_name' OR user_email = '$user_email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            header("Location: ../signup.php?signup=usertaken");
            exit();
        }
        else{
            session_start();
            //HASHING THE PASSWORD
            $hashedPwd = password_hash($user_pass, PASSWORD_DEFAULT);
            //inserting into data_base
            $sql = "INSERT INTO users (user_name ,user_email ,user_pass) 
            VALUES('$user_name','$user_email','$hashedPwd');";
            mysqli_query($conn, $sql);
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_moderator'] = 0;
            $_SESSION['user_email'] = $user_email;
            header("Location: ../profile.edit.php?signup=success");
            exit();
        } 
    }
    else{
        header("Location: ../signup.php?signup=usertaken");
        exit();
    }
?>