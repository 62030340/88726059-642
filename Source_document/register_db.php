<?php 
    session_start();
    include('dbconfig.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $stf_code = mysqli_real_escape_string($mysqli, $_POST['stf_code']);
        $stf_name = mysqli_real_escape_string($mysqli, $_POST['stf_name']);
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        // $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $password_1 = mysqli_real_escape_string($mysqli, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($mysqli, $_POST['password_2']);

        if (empty($stf_code)) {
            array_push($errors, "CodeId is required");
            $_SESSION['error'] = "CodeId is required";
        }
        if (empty($stf_name)) {
            array_push($errors, "Name is required");
            $_SESSION['error'] = "Name is required";
        }
        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        // if (empty($email)) {
        //     array_push($errors, "Email is required");
        //     $_SESSION['error'] = "Email is required";
        // }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM staff WHERE username = '$username'  LIMIT 1";
        $query = mysqli_query($mysqli, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['stf_code'] === $stf_code) {
                array_push($errors, "CodeId already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO staff (stf_code ,stf_name,username,  password) VALUES ('$stf_code','$stf_name','$username', '$password')";
            mysqli_query($mysqli, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            header("location: register.php");
        }
    }

?>
