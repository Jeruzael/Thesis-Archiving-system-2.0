<div class="sidebar" style="background-color: #FD8978">
    <div class="logo-details">
        <img src="../teamsResources/teamsLogo_5.png" class="img-fluid" style="height: 60px;">
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

        <!-- dashboard -->
        <li>
            <a href="dashboard.php" style="background-color: #FD8978">
                <i class='bx bx-home'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <!-- profile -->
        <li>
            <a href="profile.php" style="background-color: #FD8978">
                <i class='bx bx-user-circle' ></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>

        <!-- login details and logout -->
        <li class="profile">
            <div class="profile-details">
                <div class="name_job">
                    <div class="name"><?php echo ucwords($adminLastname); ?>,  <?php echo ucwords($adminFirstname); ?></div>
                    <div class="job">Programmer</div>
                </div>
            </div>
            <a href="logout.php"><i class='bx bx-log-out' id="log_out" style="background-color: #FD8978"></i></a>
        </li>
    </ul>
</div>
<script src="../teamsScript/submenu.js"></script>
