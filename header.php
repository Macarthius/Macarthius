<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
	<title>Egglords DnD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="DnD with friends">
	<meta name="keywords" content="">
</head>
<body>

<!-- Website Header -->
<header>
    <img id="head" src="images/dndplaceheader.jpg" alt="Placeholder Header Image">
    
    <!-- Navigation -->
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="nav-login">
                <?php
                    if (isset($_SESSION['u_id'])) {
                        echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit">Logout</button>
                    </form>';
                    } else {
                        echo '<form action="includes/login.inc.php" method="POST">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" name="submit">Login</button>
                        <a href="signup.php">Sign up</a>
                    </form>';
                    }
                ?>
                
                
            </div>
        </div>
    </nav>
</header>