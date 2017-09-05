<!-- Header -->
<?php
    include_once 'header.php';
?>

<section  class="main-section">
    <div class="section-one">
        <h2>Home</h2>
        <?php
            if (isset($_SESSION['u_id'])) {
                echo "You are logged in!";
            }
        ?>
    </div>
</section>

<!-- Footer -->
<?php
    include_once 'footer.php';
?>