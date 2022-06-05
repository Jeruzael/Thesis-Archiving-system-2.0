<?php
require_once "../teamsDataCenter/controller.php";
?>
<!DOCTYPE html>
<html>

     <head>

          <title>Thesis Archiving System | Library</title>
          <?php include "libraries.php"; ?>
     </head>
     <body style="background-color:#F8FAFF;">

          <?php include "navbar.php"; ?>

          <div class="container-fluid searchbox" style="padding-left:20%;padding-right:20%;">
               <div class="search__container">
                   <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search thesis books...">
               </div>
          </div>

          <form method="post">
               <div class="container-fluid row" style="padding-left:10%;padding-right:10%;padding-top:20px;">
                    <div class="col-2">
                         <i class='bx bx-book'></i> Thesis Title<br>
                         <select name="title" style="width:100%; padding:5%; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;">
                              <?php
                                   if($title_filter == "ASC"){
                                        echo '<option>A to Z</option>';
                                        echo '<option>Z to A</option>';
                                   }
                                   else{
                                        echo '<option>Z to A</option>';
                                        echo '<option>A to Z</option>';
                                   }
                              ?>
                         </select>
                    </div>
                    <div class="col-2">
                         <i class='bx bx-book-content' ></i> Category<br>
                         <select style="width:100%; padding:5%; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;">
                              <option>All</option>
                              <option>Desktop App</option>
                              <option>Mobile App</option>
                              <option>Website</option>
                         </select>
                    </div>
                    <div class="col-2">
                         <i class='bx bx-user-pin' ></i> Professor<br>
                         <select style="width:100%; padding:5%; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;">
                              <option>A to Z</option>
                              <option>Z to A</option>
                         </select>
                    </div>
                    <div class="col-2">
                         <i class='bx bxs-calendar' ></i> Date Publish<br>
                         <select style="width:100%; padding:5%; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;">
                              <option>All</option>
                              <?php
                                   $year = date("Y");
                                   for($i = 2000;$year >= $i;--$year) {
                              ?>
                                   <option><?php echo $year; ?></option>
                              <?php } ?>
                         </select>
                    </div>
                    <div class="col-2">
                         <i class='bx bx-book-content' ></i> Thesis Book Status<br>
                         <select style="width:100%; padding:5%; border:1px solid rgba(167, 172, 182, 0.99); background-color:#F8FAFF;">
                              <option>All</option>
                              <option>Available</option>
                              <option>Unavailable</option>
                         </select>
                    </div>
                    <div class="col-2">
                         <input name="filter" type="submit" value="Filter" style="width:100%; padding:10px;color:#fff; background-color:#FD8978; border:1px solid #FD8978;"/>
                    </div>
               </div>
          </form>

          <div class="container-fluid row" style="padding:5%;">
               <?php

                    if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                         $page_no = $_GET['page_no'];
                    }
                    else{
                         $page_no = 1;
                    }
                    $total_records_per_page = 10;
                    $offset = ($page_no-1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM thesislibrary");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];

                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1;


                    $dataQuery = "SELECT *, DATE_FORMAT(bookPublished, '%M %Y') as publish FROM thesislibrary ORDER BY bookTitle $title_filter LIMIT $offset, $total_records_per_page";
                    $data = mysqli_query($connect, $dataQuery);
               ?>
               <?php include "pagination.php"; ?>
               <?php
                    for($i = 0; $row = mysqli_fetch_array($data); $i++){
               ?>
               <div class="card" style="width: 15rem; margin-left:auto; margin-right:auto; margin-top:5%;">
                    <img src="../teamsResources/<?php echo $row['bookCover']; ?>" class="card-img-top img-fluid" style="height:200px;">
                    <div class="card-body" style="max-height: 100px; min-height: 100px; overflow:auto;">
                         <h5 class="card-title" style="font-size:2vh;">
                              <label style="color:#FD8978;">Thesis Title</label> <br>
                              <?php echo ucwords($row['bookTitle']); ?><br>
                              <label style="color:#FD8978;">Publish: </label> <?php echo $row['publish']; ?>
                         </h5>
                    </div>
                    <div class="container-fluid" style="padding:10px; margin:0;">
                         <button type="button" data-bs-toggle="modal" data-bs-target="#signinfirst" class="form-control me-2" style="width:100%; color:#fff; background-color:#FD8978; border:1px solid #FD8978; padding:5px;">See Details</button>
                    </div>
               </div>
               <?php } ?>
          </div>

          <?php include "footer.php"; ?>
          <script src="../teamsScript/bootstrap.js"></script>
     </body>
</html>
