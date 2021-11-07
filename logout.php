<?php
		require 'db.php';
		session_start();
		unset($_SESSION['loggedin']);
        echo '<script>alert("Logout Succesfully")</script>';
        header("location: index.php");
?>