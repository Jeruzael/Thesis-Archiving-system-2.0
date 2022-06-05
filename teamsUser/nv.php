     
<?php 
$Number =  $_SESSION['number'];

$Student = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userId = '$Number'"); 
$Info = mysqli_fetch_assoc($Student);
?>
<style type="text/css">
  @media (max-width: 700px) {
        .dropdown{
          margin-top: 20px;
        }
        .logo{
          margin-left: -49%;
        }

        .navbar-toggler{
         margin-bottom: 30px;
         align-self: center;
        }
        .collapse{
          margin-top: -20px;
          margin-left: -40%;
        }
        .dropdown{
          margin-left: 10%; 
        }
        .navbar-toggler{
          /*margin-left: 80%; */
          display: none;
        }
        .dropdown-toggle{
          margin-left: -10%;
        }
        .dropdown-menu{
          margin-left: -110px;
        }
      }
      @media (max-width: 300px) {
        .logo{
          margin-left: -49%;
          display: none;
        }
        .dropdown-toggle{
          display: inline-block;
        }
      }
      .dropdown-menu{
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 7px;
        border-radius: 12px;
        border-color: transparent;
      }
      .dropdown-item{
        font-family: 'Poppins';
      }
      .btnBorrow{
        background-color:#7788F4; 
        color:#FFF;
      }
      .btnBorrow:hover{
        background-color: #4A63FF;
        color: #fff;
      }
      body, html {
  overflow-x: hidden;
  overflow-y: auto;
}

</style>
<nav class="navbar navbar-expand-lg navbar-light" style="padding:20px; background-color:#7788F4; float: right; margin-top: 0; width: 100%; padding-left: 150px; display: block; margin-bottom: 50px;">
     <div class="container-fluid " style="margin-left: 2%;" >
          <img class="img-fluid logo" style="height:60px; margin-top: 20px;" src="../teamsResources/teamsLogo_5.png"/>

          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          

          <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
               <div class="dropdown" style="margin-left: 10%; margin-right: 5%;">
                              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style=" text-decoration:none; color:#fff; font-family: 'Poppins';"><img class="profileImg img-fluid" style="height:50px; max-height: 100%;" src="../teamsResources/<?php echo $Info['userImage']; ?>"/> <?php echo ucwords($Info['userFirstname']); ?></a>
                              <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                   <li><a class="dropdown-item" href="dashboard.php">Borrow Books</a></li>
                                   <li><a class="dropdown-item" href="pending.php">Pending Requests</a></li>
                                   <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
                                   <li><hr class="dropdown-divider"></li>
                                   <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
                              </ul>
                         </div>
                  
          </div>
     </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Modal Logout-->
        <div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px; border-color: transparent;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="bx bx-user"></i> Log out Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="logout.php" method="post">
                            <div style="display: none;">                     
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;text-align:center" class="form-label">Are you sure you want to log out your account?</label>     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Log out"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

  <!-- Modal-->
<div class="modal fade" id="signinfirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content"  style="border-radius: 15px; border-color: transparent; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
               <!-- <div class="modal-header">
                    <center><img class="img-fluid" style="height:50px;" src="../teamsResources/teamsLogo_1.png"/></center>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div> -->
               <div class="modal-body">
                    <br>
                    <form action="book.php" method="post">


                         <p style="color:#FD8978; font-size: 15pt; font-weight: 500; margin-top: 0;">Thesis Book Details</p>
                        <!--<form action="book.php" method="post">-->
                            <div style="display: none;">
                                <input id="bookId" type="number" name="id">
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book'></i> Book Title</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; border: none;" id="Title" name="Title" type="text" ondrop="return false;" onpaste="return false;" onshow="sbt()" class="form-control" placeholder="Research Title" required="Required" disabled />

                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Authors</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; border: none;" id="Author" name="Author" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Researcher" required="Required" disabled />
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book-content'></i> Thesis Abstract</label>
                            <textarea style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; border: none;" id="Abstract" name="Abstract" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Abstract" required="Required" disabled ></textarea>

                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Thesis Adviser</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; border: none;" id="Professors" name="Professors" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Professors" required="Required" disabled />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btnBorrow" style="" name="borrow" value="Borrow" id="reqBook()" />
                        </div>
                    </form>
               </div>
          </div>
     </div>
</div>


