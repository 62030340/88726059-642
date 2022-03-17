<?php 
    session_start();
    include('dbconfig.php');

    
    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM staff WHERE username = $username AND password = $password ";
            // $result = mysqli_query($mysqli,$query );
            $result = mysqli_query("SELECT * FROM staff WHERE username = $username AND password = $password ",$query );
            $stmt = $mysqli->prepare($query);
          
            // Retrieves a result set from a prepared statement

            // $link = mysql_connect("database", "root", "tiger");
            // mysql_select_db("docdb", $link);

            // $result = mysql_query("SELECT * FROM staff", $mysqli);
            // $num_rows = mysql_num_rows($result);

            // echo "$num_rows Rows\n";
            // num_rows เป็นจำนวนแถวที่ได้กลับคืนมา
            
            // echo "mysqli_query($ mysqli, $ query) = ";
            // echo mysqli_query($mysqli, $query) ; echo "e";
            
            // echo $username ;
            // echo "<BR>password = <BR>";
            // echo $stmt;
            // if (mysql_num_rows($query) == 1) {
            if ($result->num_rows == 1) {
                
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Your are now logged in";
                header("location: PageHome.php");
            } else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: login.php");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: login.php");
        }
    }

?>
