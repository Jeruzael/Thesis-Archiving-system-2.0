<nav class="navbar navbar-expand-lg navbar-light" style="padding:30px; background-color:#F8FAFF;">
     <div class="container-fluid">
          <img class="img-fluid" style="height:50px;" src="../teamsResources/teamsLogo_1.png"/>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-3 mb-lg-0">

                    <!-- Home tab -->
                    <li class="nav-item" style="margin-left:40px;">
                         <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <!-- About us tab -->
                    <li class="nav-item" style="margin-left:40px;">
                         <a class="nav-link" href="about.php">About us</a>
                    </li>

                    <!-- support tab -->
                    <li class="nav-item" style="margin-left:40px;">
                         <a class="nav-link" href="support.php">Support</a>
                    </li>

                    <!-- library tab -->
                    <li class="nav-item" style="margin-left:40px;">
                         <a class="nav-link" href="library.php">Thesis Library</a>
                    </li>

               </ul>
               <?php
                    if($_SESSION['number'] == ''){
                         echo '<div><button type="button" data-bs-toggle="modal" data-bs-target="#signin" class="form-control me-2" style="width:100%; color:#fff; background-color:#FD8978; border:1px solid #FD8978; padding:15px;">Login</button></div>';
                    }
                    else{
                         echo '<div class="dropdown">
                              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration:none; color:#FD8978;"><img class="img-fluid" style="height:50px;" src="../teamsResources/developerBriol.png"/> Jeffrix Pabroquez</a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                   <li><h6 class="dropdown-header">Profile</h6></li>
                                   <li><a class="dropdown-item" href="#">Pending Requests</a></li>
                                   <li><a class="dropdown-item" href="#">Change Password</a></li>
                                   <li><hr class="dropdown-divider"></li>
                                   <li><a class="dropdown-item" href="#">Logout</a></li>
                              </ul>
                         </div>';
                    }
               ?>
          </div>
     </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <img class="img-fluid" style="height:50px;" src="../teamsResources/teamsLogo_1.png"/>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="post">
                         <label style="font-size:2vh;" class="form-label"><i class='bx bx-id-card'></i> Student Number</label>
                         <input name="studnumber" type="number" class="form-control" ondrop="return false" placeholder="Student Number" style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;" required />

                         <label style="margin-top:5px; font-size:2vh;" class="form-label"><i class='bx bx-lock' ></i> Password</label>
                         <input name="password" type="password" class="form-control" ondrop="return false" placeholder="Your Password" style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;" required />
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input name="studlogin" type="submit" class="btn" value="Login" style="color:#fff; background-color:#FD8978; border:1px solid #FD8978;" />
                    </form>
               </div>
          </div>
     </div>
</div>

<!-- Modal -->
<div class="modal fade" id="signinfirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <img class="img-fluid" style="height:50px;" src="../teamsResources/teamsLogo_1.png"/>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <label style="margin-bottom: 5px; color:red;">Please Login First</label>
                    <form method="post">
                         <label style="font-size:2vh;" class="form-label"><i class='bx bx-id-card'></i> Student Number</label>
                         <input name="studnumber" type="number" class="form-control" ondrop="return false" placeholder="Student Number" style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;" required />

                         <label style="margin-top:5px; font-size:2vh;" class="form-label"><i class='bx bx-lock' ></i> Password</label>
                         <input name="password" type="password" class="form-control" ondrop="return false" placeholder="Your Password" style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;" required />
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input name="studlogin" type="submit" class="btn" value="Login" style="color:#fff; background-color:#FD8978; border:1px solid #FD8978;" />
                    </form>
               </div>
          </div>
     </div>
</div>
