<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php"; ?>
<body>

<!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

    <!-- Hero -->
    <div class="pagetitle w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;LOG IN&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div> 
    </div>
    <!-- LOGIN FORM -->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row">
            <form action="action/do_login.php" method="post"class="w3-container w3-card-4 w3-margin">
                <p><label>Name</label></p>
                <input class="w3-input" type="text" name="n" style="width:90%" required placeholder="your username">

                <p><label>Password</label></p>
                <input class="w3-input" type="password" name="p" style="width:90%" required placeholder="your password">

                <p><button class="w3-button w3-section w3-teal w3-ripple"> Log in </button></p>
            </form>
        </div>
    </div>

    <!-- login fail message -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright w3-red">&times;</span>
                <p>Incorrect username / password.</p>
                <p>Please try again.</p>
            </div>
        </div>
    </div>
    <!--div class="w3-content w3-container">
        <p>usera / users</p>
        <p>userb / users</p>
        <p>admin / users</p>
    </div-->
    <!-- Footer -->
    <?php include "include/footer.php"; ?>


<?php
// get login error parameter and show error message
if (isset($_GET["e"]) && $_GET["e"] == 1) {
?>
    <script>
        document.getElementById("id01").style.display="block";
    </script>
<?php } ?>

</body>
</html>
