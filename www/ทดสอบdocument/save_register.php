<?php
	// mysql_connect("database","root","tiger");
	// mysql_select_db("docdb");
	require_once("dbconfig.php");
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "Please input Username!";
		exit();	
	}
	
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	
	if(trim($_POST["txtName"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	
	// $sql = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
	// $stmt = mysql_query($sql);
    // $row = mysql_num_rows($sql);
	

    $sql = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";

        $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("s", $kw);
        $stmt->execute();
        $objResult = mysql_fetch_array($stmt);
        // Retrieves a result set from a prepared statement
        $result = $stmt->get_result();
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$sql = "INSERT INTO member (Username,Password,Name,Status) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["ddlStatus"]."')";
		$stmt = mysql_query($sql);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='login.php'>Login page</a>";
		
	}

	mysql_close();
?>