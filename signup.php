<!-- Header -->
<?php
    include_once 'header.php';
?>

<section  class="main-section">
    <div class="section-one">
        <h2>Sign up</h2>
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</section>

<!-- Footer -->
<?php
    include_once 'footer.php';
?>