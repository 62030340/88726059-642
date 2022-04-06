<?php 
    session_start();
    include('dbconfig.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
                <label for="stf_code">รหัสบุคลากร</label>
                <input type="text" placeholder="SF000XYZ"class="form-control" 
                name="stf_code" id="stf_code" required>
        </div>
        <div class="input-group">
                <label for="stf_name">ชื่อ-นามสกุล</label>
                <input type="text" placeholder="ข้อความไม่เกิน 50 ตัวอักษร"class="form-control" 
                name="stf_name" id="stf_name" required>
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>
        <!-- <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div> -->
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" placeholder="Password"required>
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2"  placeholder="Confirm Password" required>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>

</body>
</html>