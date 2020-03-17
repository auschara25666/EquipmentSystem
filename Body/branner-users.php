<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="../index.php"><img src="../images/logo.png" alt="logo" /></a>
            <!-- <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../images/logoh1.php" alt="logo"/></a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

            <?php
            $sql = "select * from user where User_id = '$session_User_id'";
            $result = mysqli_query($conn, $sql);
            while ($fetch = mysqli_fetch_assoc($result)) {
            ?>
                <span class="nav-link px-3"><?php echo $session_User_id ?></span>
                <span class="nav-link px-3"><?php echo $fetch['Name'] ?></span>
                <a class="btn btn-primary btn-sm" href="http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/logout.php">logout</a></div>
    <?php
            }
    ?>
    </nav>