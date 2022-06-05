<?php 
     session_start();
     require "connection.php";
     
      

     /*$_SESSION['number'];
     $_SESSION['firstname'] = '';
     $_SESSION['lastname'] = '';
     $_SESSION['image'] = '';*/
     $title_filter = "ASC";
    
      $searchLate = mysqli_query($connect, "SELECT * FROM thesisborrow WHERE borrowRemark='in borrowed' AND borrowStamp< current_timestamp()-interval 1 day");
      if (mysqli_num_rows($searchLate)>0) {
        $updateLate = mysqli_query($connect, "UPDATE thesisborrow SET borrowRemark='late' WHERE borrowRemark='in borrowed' AND borrowStamp< current_timestamp()-interval 1 day");
      }
      $searchLost = mysqli_query($connect, "SELECT * FROM thesisborrow WHERE 
        borrowStamp< current_timestamp()-interval 5 day AND (borrowRemark='in borrowed' OR borrowRemark='late')");
      if (mysqli_num_rows($searchLost)>0) {
        $updateLate = mysqli_query($connect, "UPDATE thesisborrow SET borrowRemark='lost' WHERE 
        borrowStamp< current_timestamp()-interval 5 day AND (borrowRemark='in borrowed' OR borrowRemark='late')");
      }

      

     /*DASHBOARD NUMBERING*/
      $totalRequests = mysqli_query($connect, "SELECT count(*) AS totalRequests FROM thesisrequest WHERE requestStatus='pending'");
      $requestCount = mysqli_fetch_assoc($totalRequests);

      $booksBorrowed = mysqli_query($connect, "SELECT count(*) AS totalBooks FROM thesisborrow");
      $booksCount = mysqli_fetch_assoc($booksBorrowed);

      $booksReturned = mysqli_query($connect, "SELECT count(*) AS totalReturned FROM thesisborrow WHERE borrowRemark='returned' OR borrowRemark='resolved late'");
      $returnedCount = mysqli_fetch_assoc($booksReturned);

     if(isset($_POST['filter'])){
          $title = mysqli_real_escape_string($connect, $_POST['title']);
          if($title == "A to Z"){
               $title_filter = "ASC";
          }
          else{
               $title_filter = "DESC";
          }
     }    
     //USER ACC LOGIN
     if(isset($_POST['studlogin'])){
          $usernum = mysqli_real_escape_string($connect, $_POST['studnumber']);
          $password = mysqli_real_escape_string($connect, $_POST['password']);

          $searchStudNumber = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userId = '$usernum'");
          if(mysqli_num_rows($searchStudNumber) > 0){
            $userInfo = mysqli_fetch_assoc($searchStudNumber);
            $userNumber = $userInfo['userId'];
            $userPassword = $userInfo['userPassword'];
            $userfirstname = $userInfo['userFirstname'];
            $userlastname = $userInfo['userLastname'];
            $userimage = $userInfo['userImage'];
            $encrypt_password = password_hash($userPassword, PASSWORD_BCRYPT);
           if(password_verify($password, $userPassword)){
              $_SESSION['number'] = $userNumber;
              $_SESSION['firstname'] = $userfirstname;
              $_SESSION['lastname'] = $userlastname;
              $_SESSION['image'] = $userimage;
              header('location: dashboard.php');
              exit();
            }
            else{
              $xmessage['message'] = "Invalid Student Number or Password!";            
            echo "<script>alert('Invalid Usernumber or Password')</script>";
            unset($_POST['studlogin']);
               
            }
          }
          else{
            $xmessage['message'] = "Invalid Student Number or Password!";            
            echo "<script>alert('Invalid Usernumber or Password')</script>";
            unset($_POST['studlogin']);
          }

     }
     //PROF ACC LOGIN ...
     if(isset($_POST['profLogin'])){
          $email = mysqli_real_escape_string($connect, $_POST['email']);
          $password = mysqli_real_escape_string($connect, $_POST['password']);

          $searchEmail = mysqli_query($connect, "SELECT * FROM teamsprof WHERE profEmail = '$email' AND profStatus='active'");
          if(mysqli_num_rows($searchEmail) > 0){
            $profInfo = mysqli_fetch_assoc($searchEmail);
            $profEmail = $profInfo['profEmail'];
            $profPW = $profInfo['profPassword'];
           if(password_verify($password, $profPW)){
              $_SESSION['email'] = $email;
              $_SESSION['number'] = $Num;
              echo "yehey";
              header('location: dashboard.php');
              exit();
            }
            else{
              
              $xmessage['message'] = "Invalid Moderator email or password!";
              echo "<script>alert('Invalid Moderator email or password!')</script>";
               unset($_POST['profLogin']);
            }
          }
          else{
              
            $xmessage['message'] = "Invalid Moderator email or password!";
              echo "<script>alert('Invalid Moderator email or password!')</script>";
               unset($_POST['profLogin']);
          }

     }

     // administration signing in to the system
       if(isset($_POST['adminLogin'])){
         $email = mysqli_real_escape_string($connect, $_POST['email']);
         $password = mysqli_real_escape_string($connect, $_POST['password']);

         $searchMail = mysqli_query($connect, "SELECT * FROM teamsadmin WHERE adminEmail = '$email'");
         if(mysqli_num_rows($searchMail) > 0){
           $adminInfo = mysqli_fetch_assoc($searchMail);
           $adminEmail = $adminInfo['adminEmail'];
           $adminPassword = $adminInfo['adminPassword'];
           if(password_verify($password, $adminPassword)){
             $_SESSION['email'] = $email;
             $_SESSION['adNum'] = $adminNum;
             header('location: dashboard.php');
             exit();
           }
           else{
             $xmessage['message'] = "Invalid Email Address or Password!";
               echo "<script>alert('Invalid Email or Password')</script>";
            unset($_POST['adminLogin']);               
           }
         }
         else{
           $xmessage['message'] = "Invalid Email Address or Password!";
           echo "<script>alert('Invalid Email or Password')</script>";
            unset($_POST['adminLogin']);
         }
       }

       // borrowing book
       if(isset($_POST['borrow'])){
         $requesterId = $_SESSION['number'];
         $bookId = $_SESSION['bookId'];

         
         $Insert = mysqli_query($connect, "INSERT INTO thesisrequest (requesterId, requestBookId) 
          VALUES ('$requesterId','$bookId')");
         
         $update = mysqli_query($connect, "UPDATE thesislibrary SET bookStatus = 'unavailable' WHERE bookId = $bookId");



         $count = mysqli_query($connect, "SELECT * FROM thesisrequest WHERE requesterId = $requesterId
         AND requestStatus = 'pending' ");
         
         if(mysqli_num_rows($count) <= 5){
          $Insert = mysqli_query($connect, "INSERT INTO thesisrequest (requesterId, requestBookId) 
         
          VALUES ('$requesterId','$bookId') ");
         
        
         $update = mysqli_query($connect, "UPDATE thesislibrary SET bookStatus = 'unavailable' WHERE bookId = $bookId");
         }
         echo "<script>alert('Book Borrowed')</script>";

         //unset($_POST['borrow']);
  }

    //Book Request
        $reqId = "";

        if(!isset($_REQUEST['id'])){          
        }else{
          $reqId = $_REQUEST['id'];         
        }

        if(!isset($_POST['otp'])){
          $getInfo = mysqli_query($connect, "SELECT * FROM thesisrequest WHERE requestId = '$reqId'");
          $data = mysqli_fetch_assoc($getInfo);
          
          if(!isset($_SESSION['requestBookId'])){
            if(!isset($data['requestBookId']) && !isset($data['requestId'])){
              //echo "--------------------------------------------no data";
            }else{
              $_SESSION['requestBookId'] = $data['requestBookId'];
              $_SESSION['reqId'] = $data['requestId'];
            }            
          }else{
            echo "session is set";
          }          
        } 
        
        //userchangepass
        if(isset($_POST['user_change'])){
          $studNum = $_SESSION['number'];
          $oldPass = mysqli_real_escape_string($connect, $_POST['currentpassword']);
          $newPass = mysqli_real_escape_string($connect, $_POST['newpassword']);
          $cpass = mysqli_real_escape_string($connect, $_POST['cpassword']);

          $getInfo = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userId = '$studNum'");
          $data = mysqli_fetch_assoc($getInfo);
          $userPass = $data['userPassword'];
          $encrypt_password = password_hash($newPass, PASSWORD_BCRYPT);
          if (password_verify($oldPass, $userPass)) {
               if($newPass == $cpass){
              
               $update_pass = mysqli_query($connect, "UPDATE teamsuser SET userPassword = '$encrypt_password' WHERE userId = '$studNum'");
               if($update_pass){
                    $_SESSION['info'] = "Changed Password Successfully";
                    echo $_SESSION['info'];
                    header('location: logout.php');
                    exit();
               }else{
                    echo "<script>alert('No data updated')</script>";
               }
          }
          else{
            $xmessage['message'] = "Password Mismatched!";
              echo "<script>alert('Password Mismatched!')</script>";
               unset($_POST['userLogin']);
          }
      }
           else {
            $xmessage['message'] = "Invalid password!";
              echo "<script>alert('Invalid password!')</script>";
               unset($_POST['userLogin']);

          }
    }
        //RECOVER ADMIN ACCOUNT
       $sendermail= "teamsph.inc@gmail.com";
       $date=date_create("now");
       $date_change = date_format($date,"Y-m-d H:i:s");
       $xmessage = array();
      if(isset($_POST['recover'])){
          $admin_email = strtolower(mysqli_real_escape_string($connect, $_POST['adminEmail']));
          $search_email = mysqli_query($connect, "SELECT * FROM teamsadmin WHERE adminEmail = '$admin_email' ");
          if(mysqli_num_rows($search_email) > 0){
               $fetch_admininfo = mysqli_fetch_assoc($search_email);
               $fetch_lastname = ucwords($fetch_admininfo['adminLastname']);
               $fetch_firstname = ucwords($fetch_admininfo['adminFirstname']);
               $otp_code = rand(999999, 111111);
               $update_code = mysqli_query($connect, "UPDATE teamsadmin SET adminCode = $otp_code WHERE adminEmail = '$admin_email' ");
               if($update_code){
                    $name= "$fetch_lastname, $fetch_firstname";
                    $body= "Here is your Email Verification Code: $otp_code";
                    $subject= "Email Verification Code";
                    $headers= array(
                         'Authorization: Bearer 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',
                         'Content-Type: application/json'
                    );
                    $data = array(
                         "personalizations" => array(
                              array(
                                   "to" =>array(
                                        array(
                                             "email" =>"$admin_email",
                                             "name"  => $name
                                        )
                                   )
                              )
                         ),
                         "from" => array(
                              "email"=> $sendermail
                         ),
                         "subject" =>$subject,
                         "content" =>array(
                              array(
                                   "type" => "text/html",
                                   "value" => $body
                              )
                         )
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    echo $response;

                    $_SESSION['adminEmail'] = $admin_email;
                    $_SESSION['info'] = "Email Verification Sent Successfully";
                    header('location: verify.php');
                    exit();
               }
          }
          else{
               $xmessage['message'] = "Unregistered Email";
          }
     }
     //VERIFICATION OF OTP CODE
     if(isset($_POST['verify'])){
          $ad_mail = $_SESSION['adminEmail'];
          $otp_code = mysqli_real_escape_string($connect, $_POST['otp']);
          $search_code = mysqli_query($connect, "SELECT * FROM teamsadmin WHERE adminCode = $otp_code");
          if(mysqli_num_rows($search_code) > 0){
               $update_code = mysqli_query($connect, "UPDATE teamsadmin SET adminCode = 0 WHERE adminEmail = '$ad_mail' ");
               if($update_code){
                    $get_adminid = mysqli_fetch_assoc($search_code);
                    $admin_id = $get_adminid['adminId'];
                    $_SESSION['adminId'] = $admin_id;
                    header('location: changepass.php');
                    exit();
               }
          }
          $xmessage['message'] = "Invalid Code";
     }
     //CHANGE PASSWORD AFTER VERIFYING OTP CODE FOR ADMIN
     if(isset($_POST['adminchangepass'])){
          $admin_id = $_SESSION['adminId'];
          $admin_password = mysqli_real_escape_string($connect, $_POST['password']);
          $confirm_password = mysqli_real_escape_string($connect, $_POST['cpassword']);
          $date=date_create("now");
          $date_change = date_format($date,"Y-m-d H:i:s");
          $get_admin = mysqli_query($connect, "SELECT * FROM teamsadmin WHERE adminId = $admin_id ");
          $fetch_admin = mysqli_fetch_assoc($get_admin);
          $fetch_lastname = ucwords($fetch_admin['adminLastname']);
          $fetch_firstname = ucwords($fetch_admin['adminFirstname']);
          $fetch_email = $fetch_admin['adminEmail'];
          if($admin_password == $confirm_password){
               $encrypt_password = password_hash($admin_password, PASSWORD_BCRYPT);
               $update_password = mysqli_query($connect, "UPDATE teamsadmin SET adminPassword = '$encrypt_password' WHERE adminId = $admin_id ");
               if($update_password){
                    $name= "$fetch_lastname, $fetch_firstname";
                    $body= "Successfully Changed Password <br>Change: $date_change";
                    $subject= "Admin Account";
                    $headers= array(
                         'Authorization: Bearer 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',
                         'Content-Type: application/json'
                    );
                    $data = array(
                         "personalizations" => array(
                              array(
                                   "to" =>array(
                                        array(
                                             "email" =>"$fetch_email",
                                             "name"  => $name
                                        )
                                   )
                              )
                         ),
                         "from" => array(
                              "email"=> $sendermail
                         ),
                         "subject" =>$subject,
                         "content" =>array(
                              array(
                                   "type" => "text/html",
                                   "value" => $body
                              )
                         )
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    echo $response;

                    header('location: index.php');
                    exit();
               }
          }
          else {
               $xmessage['message'] = "Password Mismatch";
          }

     }
     //STUDENT RECOVER..
     if(isset($_POST['recover'])){
          $user_email = strtolower(mysqli_real_escape_string($connect, $_POST['userEmail']));
          $search_email = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userEmail = '$user_email' ");
          if(mysqli_num_rows($search_email) > 0){
               $fetch_userinfo = mysqli_fetch_assoc($search_email);
               $fetch_lastname = ucwords($fetch_userinfo['userLastname']);
               $fetch_firstname = ucwords($fetch_admininfo['userFirstname']);
               $otp_code = rand(999999, 111111);
               $update_code = mysqli_query($connect, "UPDATE teamsuser SET userCode = $otp_code WHERE userEmail = '$user_email' ");
               if($update_code){
                    $name= "$fetch_lastname, $fetch_firstname";
                    $body= "Here is your Email Verification Code: $otp_code";
                    $subject= "Email Verification Code";
                    $headers= array(
                         'Authorization: Bearer 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',
                         'Content-Type: application/json'
                    );
                    $data = array(
                         "personalizations" => array(
                              array(
                                   "to" =>array(
                                        array(
                                             "email" =>"$user_email",
                                             "name"  => $name
                                        )
                                   )
                              )
                         ),
                         "from" => array(
                              "email"=> $sendermail
                         ),
                         "subject" =>$subject,
                         "content" =>array(
                              array(
                                   "type" => "text/html",
                                   "value" => $body
                              )
                         )
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    echo $response;

                    $_SESSION['userEmail'] = $user_email;
                    $_SESSION['info'] = "Email Verification Sent Successfully";
                    header('location: verify.php');
                    exit();
               }
          }
          else{
               $xmessage['message'] = "Unregistered Email";
          }
     }
     //STUDENT VERIFICATION OF CODE
     if(isset($_POST['verify'])){
          $user_mail = $_SESSION['userEmail'];
          $otp_code = mysqli_real_escape_string($connect, $_POST['otp']);
          $search_code = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userCode = $otp_code");
          if(mysqli_num_rows($search_code) > 0){
               $update_code = mysqli_query($connect, "UPDATE teamsuser SET userCode = 0 WHERE userEmail = '$user_mail' ");
               if($update_code){
                    $get_userid = mysqli_fetch_assoc($search_code);
                    $user_id = $get_userid['userId'];
                    $_SESSION['userId'] = $user_id;
                    header('location: changeuserpass.php');
                    exit();
               }
          }
          $xmessage['message'] = "Invalid Code";
     }
     if(isset($_POST['changeuserpass'])){
          $user_id = $_SESSION['userId'];
          $user_password = mysqli_real_escape_string($connect, $_POST['password']);
          $confirm_password = mysqli_real_escape_string($connect, $_POST['cpassword']);
          $date=date_create("now");
          $date_change = date_format($date,"Y-m-d H:i:s");
          $get_user = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userId = $user_id ");
          $fetch_user = mysqli_fetch_assoc($get_user);
          $fetch_lastname = ucwords($fetch_user['userLastname']);
          $fetch_firstname = ucwords($fetch_user['userFirstname']);
          $fetch_email = $fetch_user['userEmail'];
          if($user_password == $confirm_password){
               $encrypt_password = password_hash($user_password, PASSWORD_BCRYPT);
               $update_password = mysqli_query($connect, "UPDATE teamsuser SET userPassword = '$encrypt_password' WHERE userId = $user_id ");
               if($update_password){
                    $name= "$fetch_lastname, $fetch_firstname";
                    $body= "Successfully Changed Password <br>Change: $date_change";
                    $subject= "Student Account";
                    $headers= array(
                         'Authorization: Bearer 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',
                         'Content-Type: application/json'
                    );
                    $data = array(
                         "personalizations" => array(
                              array(
                                   "to" =>array(
                                        array(
                                             "email" =>"$fetch_email",
                                             "name"  => $name
                                        )
                                   )
                              )
                         ),
                         "from" => array(
                              "email"=> $sendermail
                         ),
                         "subject" =>$subject,
                         "content" =>array(
                              array(
                                   "type" => "text/html",
                                   "value" => $body
                              )
                         )
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    echo $response;

                    header('location: index.php');
                    exit();
               }
          }
          else {
               $xmessage['message'] = "Password Mismatch";
          }
     }         
     //RECOVER MODERATOR ACCOUNT
       $sendermail= "teamsph.inc@gmail.com";
       $date=date_create("now");
       $date_change = date_format($date,"Y-m-d H:i:s");
       $xmessage = array();
      if(isset($_POST['recovers'])){
          $prof_email = strtolower(mysqli_real_escape_string($connect, $_POST['profEmail']));
          $search_email = mysqli_query($connect, "SELECT * FROM teamsprof WHERE profEmail = '$prof_email' ");
          if(mysqli_num_rows($search_email) > 0){
               $fetch_profinfo = mysqli_fetch_assoc($search_email);
               $fetch_lastname = ucwords($fetch_profinfo['profLastname']);
               $fetch_firstname = ucwords($fetch_profinfo['profFirstname']);
               $otp_code = rand(999999, 111111);
               $update_code = mysqli_query($connect, "UPDATE teamsprof SET profCode = $otp_code WHERE profEmail = '$prof_email' ");
               if($update_code){
                    $name= "$fetch_lastname, $fetch_firstname";
                    $body= "Here is your Email Verification Code: $otp_code";
                    $subject= "Email Verification Code";
                    $headers= array(
                         'Authorization: Bearer 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',
                         'Content-Type: application/json'
                    );
                    $data = array(
                         "personalizations" => array(
                              array(
                                   "to" =>array(
                                        array(
                                             "email" =>"$prof_email",
                                             "name"  => $name
                                        )
                                   )
                              )
                         ),
                         "from" => array(
                              "email"=> $sendermail
                         ),
                         "subject" =>$subject,
                         "content" =>array(
                              array(
                                   "type" => "text/html",
                                   "value" => $body
                              )
                         )
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    echo $response;

                    $_SESSION['profEmail'] = $prof_email;
                    $_SESSION['info'] = "Email Verification Sent Successfully";
                    header('location: verify.php');
                    exit();
               }
          }
          else{
               $xmessage['message'] = "Unregistered Email";
          }
     } 
     //MODERATOR VERIFICATION OF OTP CODE
     if(isset($_POST['profverify'])){
          $prof_email = $_SESSION['profEmail'];
          $otp_code = mysqli_real_escape_string($connect, $_POST['otp']);
          $search_code = mysqli_query($connect, "SELECT * FROM teamsprof WHERE profCode = $otp_code");
          if(mysqli_num_rows($search_code) > 0){
               $update_code = mysqli_query($connect, "UPDATE teamsprof SET profCode = 0 WHERE profEmail = '$prof_email' ");
               if($update_code){
                    $get_profid = mysqli_fetch_assoc($search_code);
                    $prof_id = $get_profid['profId'];
                    $_SESSION['profId'] = $prof_id;
                    header('location: changepass.php');
                    exit();
               }
          }
          $xmessage['message'] = "Invalid Code";
     }
     //CHANGE PASSWORD AFTER VERIFYING OTP CODE FOR MODERATOR
     if(isset($_POST['profchangepass'])){
          $admin_id = $_SESSION['profId'];
          $admin_password = mysqli_real_escape_string($connect, $_POST['password']);
          $confirm_password = mysqli_real_escape_string($connect, $_POST['cpassword']);
          $date=date_create("now");
          $date_change = date_format($date,"Y-m-d H:i:s");
          $get_admin = mysqli_query($connect, "SELECT * FROM teamsprof WHERE profId = $admin_id ");
          $fetch_admin = mysqli_fetch_assoc($get_admin);
          $fetch_lastname = ucwords($fetch_admin['profLastname']);
          $fetch_firstname = ucwords($fetch_admin['profFirstname']);
          $fetch_email = $fetch_admin['profEmail'];
          if($admin_password == $confirm_password){
               $encrypt_password = password_hash($admin_password, PASSWORD_BCRYPT);
               $update_password = mysqli_query($connect, "UPDATE teamsprof SET profPassword = '$encrypt_password' WHERE profId = $admin_id ");
               if($update_password){
                    $name= "$fetch_lastname, $fetch_firstname";
                    $body= "Successfully Changed Password <br>Change: $date_change";
                    $subject= "Moderator Account";
                    $headers= array(
                         'Authorization: Bearer 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',
                         'Content-Type: application/json'
                    );
                    $data = array(
                         "personalizations" => array(
                              array(
                                   "to" =>array(
                                        array(
                                             "email" =>"$fetch_email",
                                             "name"  => $name
                                        )
                                   )
                              )
                         ),
                         "from" => array(
                              "email"=> $sendermail
                         ),
                         "subject" =>$subject,
                         "content" =>array(
                              array(
                                   "type" => "text/html",
                                   "value" => $body
                              )
                         )
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    echo $response;

                    header('location: index.php');
                    exit();
               }
          }
          else {
               $xmessage['message'] = "Password Mismatch";
          }

     }

                
                


?>