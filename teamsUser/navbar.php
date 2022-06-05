
<style type="text/css">
     *{
          font-family: 'Poppins';
     }
     .btnLogin{
          width:100%; 
          color:#fff; 
          background-color:#7788F4; 
          padding:15px;
     }
     .btnLogin:hover{
          background-color: #4A63FF;
          box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
     }
    .cont{
          border-radius: 20px;
          border: none;
     }
     .loginbtn{
          color:#fff; 
          background-color:#7788F4; 
          border: none;
          width: 100%;
          height: 40px;
     }
     .loginbtn:hover{
          background-color: #4A63FF;
          color: #fff;
     }
     @media (max-width: 500px) {
          .modalLogo{
               max-height: 37px;
          }
     }
</style>
<nav class="navbar navbar-expand-lg navbar-light" style="padding:30px;">
     <div class="container-fluid">
          <img class="img-fluid" style="height:50px;" src="../teamsResources/teamsLogo_1.png"/>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-3 mb-lg-0">

                    <!-- Home tab -->
                    <li class="nav-item" style="margin-left:40px; font-weight: 500; font-size: 13pt;">
                         <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <!-- About us tab -->
                    <li class="nav-item" style="margin-left:40px; font-weight: 500; font-size: 13pt;">
                         <a class="nav-link" href="about.php">About us</a>
                    </li>

                    <!-- support tab -->
                    <li class="nav-item" style="margin-left:40px; font-weight: 500; font-size: 13pt;">
                         <a class="nav-link" href="support.php">Support</a>
                    </li>

                    <!-- library tab -->
                    <li class="nav-item" style="margin-left:40px; font-weight: 500; font-size: 13pt;">
                         <a class="nav-link" href="library.php">Thesis Library</a>
                    </li>

               </ul>
                             
                    <div><button type="button" data-bs-toggle="modal" data-bs-target="#signin" class="form-control me-2 btnLogin" style="">Login</button></div>
                    
                    
                    
          </div>
     </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: fixed; ">
     <div class="modal-dialog modal-dialog-centered" >
          <div class="modal-content cont">
               <div class="modal-header" style=" border-top-left-radius: 20px; border-top-right-radius: 20px; border: none;">
                    <img class="img-fluid modalLogo" style="height:40px;" src="../teamsResources/teamsLogo_7.png"/>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <h2 style="font-size: 20pt; font-weight: 600;">Log in</h2>
                    <form method="post">
                         <!-- <label style="font-size:2vh;" class="form-label"><i class='bx bx-id-card'></i> Student Number</label>
                         <input name="studnumber" type="number" 
                         class="form-control" 
                         ondrop="return false" 
                         placeholder="Student Number" 
                         style="font-size:13px; 
                         line-height:20px; 
                         padding:10px; 
                         border:1px solid rgba(167, 172, 182, 0.99); 
                         background-color:#F8FAFF;" required /> -->
                         <br>
                         <div class="form-floating mb-3" ">
                                   <input name="studnumber" style="border-radius: 10px;"
                                   type="number" 
                                   class="form-control" 
                                   id="floatingInput" 
                                   placeholder="00000000"
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return true;"
                                    required />
                                   <label for="floatingInput">Student Number</label>
                              </div>

                        <!--  <label style="margin-top:5px; font-size:2vh;" class="form-label"><i class='bx bx-lock' ></i> Password</label>
                         <input name="password" id="showP" type="password" class="form-control" ondrop="return false" placeholder="Your Password" style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;" required /> -->
                         <div class="form-floating mb-3">
                                   <input name="password" style="border-radius: 10px; margin-top: 10px;"
                                   type="password" 
                                   class="form-control" 
                                   pattern=".{8,}" 
                                   id="showP" 
                                   placeholder="Password" 
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return true;"
                                   required />
                                   <label for="floatingPassword">Password</label>
                              </div>
                         <input type="checkbox"  name="" class="ms-2" onclick="showPassword()"id="">
                              <label for="" class="mb-3" style="margin-top: 0;">Show Password</label>
                              <br>
                         <a href="recover.php" type="button" class="btn btnforgot"  style=" color:#7788F4;margin-top:0;">Forgot Password?</a>

               </div>
               <div class="modal-footer" style="border: none;">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <input name="studlogin" type="submit" class="btn loginbtn" value="Login" style="" />
                    </form>
               </div>
          </div>
     </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="signinfirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" >
          <div class="modal-content" >
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
               <div class="modal-footer" style="border: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input name="studlogin" type="submit" class="btn" value="Login" style="color:#fff; background-color:#FD8978; border:1px solid #FD8978;" />
                    </form>
               </div>
          </div>
     </div>
</div> -->
<!-- Modal -->
<div class="modal fade" id="signinfirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: fixed; ">
     <div class="modal-dialog modal-dialog-centered" >
          <div class="modal-content cont">
               <div class="modal-header" style=" border-top-left-radius: 20px; border-top-right-radius: 20px; border: none;">
                    <img class="img-fluid modalLogo" style="height:40px;" src="../teamsResources/teamsLogo_7.png"/>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <h2 style="font-size: 20pt; font-weight: 600;">Log in</h2>
                    <form method="post">
                         <!-- <label style="font-size:2vh;" class="form-label"><i class='bx bx-id-card'></i> Student Number</label>
                         <input name="studnumber" type="number" 
                         class="form-control" 
                         ondrop="return false" 
                         placeholder="Student Number" 
                         style="font-size:13px; 
                         line-height:20px; 
                         padding:10px; 
                         border:1px solid rgba(167, 172, 182, 0.99); 
                         background-color:#F8FAFF;" required /> -->
                         <br>
                         <div class="form-floating mb-3" ">
                                   <input name="studnumber" style="border-radius: 10px; 
                                   type="number" 
                                   class="form-control" 
                                   id="floatingInput" 
                                   placeholder="00000000"
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return true;"
                                    required />
                                   <label for="floatingInput">Student Number</label>
                              </div>

                        <!--  <label style="margin-top:5px; font-size:2vh;" class="form-label"><i class='bx bx-lock' ></i> Password</label>
                         <input name="password" id="showP" type="password" class="form-control" ondrop="return false" placeholder="Your Password" style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;" required /> -->
                         <div class="form-floating mb-3">
                                   <input name="password" style="border-radius: 10px; margin-top: 10px;"
                                   type="password" 
                                   class="form-control" 
                                   pattern=".{8,}" 
                                   id="showP" 
                                   placeholder="Password" 
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return true;"
                                   required />
                                   <label for="floatingPassword">Password</label>
                              </div>
                         <input type="checkbox"  name="" class="ms-2" onclick="showPassword()"id="">
                              <label for="" class="mb-3" style="margin-top: 0;">Show Password</label>
                              <br>
                         <a href="recover.php" type="button" class="btn btnforgot"  style=" color:#7788F4;margin-top:0;">Forgot Password?</a>

               </div>
               <div class="modal-footer" style="border: none;">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <input name="studlogin" type="submit" class="btn loginbtn" value="Login" style="" />
                    </form>
               </div>
          </div>
     </div>
</div>
<?php
          if(isset($xmessage['message'])){
               $message = $xmessage['message'];
               foreach($xmessage as $showerror){
                    echo "<script>swal('Something went wrong', '$message', 'error')</script>";
               }
               $xmessage = null;
          }
     ?>
<script type="text/javascript">
     function showPassword(){
     var showPass = document.getElementById('showP');
     if (showPass.type== 'password'){
          showPass.type='text';
     }
     else{
          showPass.type='password';
     }
}
</script>