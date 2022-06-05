<?php
require_once "../teamsDataCenter/controller.php";
?>
<?php include "checker.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Thesis Archiving System | Pending Requests</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- External Files -->
    <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
    <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../teamsDesign/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body style="background-color:#F8FAFF;">
  <style type="text/css">
   div.row{
        margin-bottom: 10px; 
        margin-right: 20px;
        flex-flow: wrap;
        display: inline-block;
        justify-content: space-around;
        text-align: left;
   }
   section{
    margin-bottom: 10px; 
        margin-right: 20px;
        flex-flow: wrap;
        display: inline-block;
        justify-content: space-around;
        padding-top:  100px;

   }
   h1{
    margin-top: 150px;
    padding-left: 100px;
    font-size: 25pt;
    font-family: 'Poppins';
    font-weight: 600;
    color: #FD8978;
   }
   .card:hover{
               box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
               }
  </style>
  <?php include "nv.php"; ?>
    <br>
     
<h1>Book Pending Request</h1>

      <center><hr style="width: 90%;">
      <section>
          <br>
          <?php
           $number = $_SESSION['number'];
           $dataQuery = "SELECT *, DATE_FORMAT(bookPublished, '%M %Y') as publish FROM thesisrequest INNER JOIN thesislibrary
            ON thesisrequest.requestBookId = thesislibrary.bookId WHERE requesterId = $number AND requestStatus='pending'" ;
              $data = mysqli_query($connect, $dataQuery);
              for($i = 0; $row = mysqli_fetch_array($data); $i++){
               ?>

                 <div class="row">
                  <div class="card" id="test" style="width: 15rem; margin-left:auto; margin-right:auto; margin-top:1%; margin-bottom: 10px; padding: 0; border-bottom-left-radius: 9px; border-bottom-right-radius: 9px;">
                      <img src="../teamsResources/<?php echo $row['bookCover']; ?>" class="card-img-top img-fluid" style="height:200px;">
                      <div class="card-body" style="max-height: 100px; min-height: 100px; overflow:auto;">
                           <h5 class="card-title" style="font-size:11pt;">
                                <label style="color:#FD8978;">Thesis Title</label> <br>
                                <?php echo ucwords($row['bookTitle']); ?><br>
                                <label style="color:#FD8978;">Publish: </label> <?php echo $row['publish']; ?>
                           </h5>
                      </div>
                      <div class="container-fluid" id="<?php $row['bookId'] ?>" style="padding:10px; margin:0;">
                      </div>
                  </div>
                 </div>
               <?php } ?>
        </section></center>


</body>
<script src="../teamsScript/bootstrap.js"></script>
</html>
