<?php
require_once "../teamsDataCenter/controller.php";
require "../teamsDataCenter/tool.php";
?>
<?php include "checker.php"; ?>
<!DOCTYPE html>
<html>

     <head>

          <title>Thesis Archiving System | Library</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
          <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <?php include "libraries.php"; ?>
     </head>
     <body style="background-color:#F8FAFF;">
          <style type="text/css">
               *{
                    font-family: 'Poppins';
               }
               .filterBtn{
                width:100%; 
                padding:10px;color:#fff; 
                background-color:#FD8978; 
                border:1px solid #FD8978; 
                border-radius: 4px;
                margin-top: 23px;
               }
               .filterBtn:hover{
                background-color: #FF6048;
               }
               .card:hover{
               box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
               }
               .seeDetails{
                width:100%; 
                color:#fff; 
                background-color: #7788F4;
                border: transparent;
                border-radius: 4px;
                padding:5px;
               }
               .seeDetails:hover{
                background-color: #4A63FF;
               }

              ::-webkit-scrollbar {
                width: 7px;
              }

              /* Track */
              /* ::-webkit-scrollbar-track {
                background: #f1f1f1; 
              } */
               
              /* Handle */
              /* ::-webkit-scrollbar-thumb {
                background: #888; 
              } */

              /* Handle on hover */
              /* ::-webkit-scrollbar-thumb:hover {
                background: #555; 
              } */
              h1{
                padding-left: 100px;
                font-size: 25pt;
                font-family: 'Poppins';
                font-weight: 600;
                color: #FD8978;
               }
               #myTable{
                display: grid; 
                grid-template-columns: repeat(5, minmax(0, 1fr)); 
                gap: 1.25rem; 
                margin-left: 90px;
                margin-right: 90px;
               }
               @media (max-width: 500px) {
               #myTable{
                 display: inline-grid; 
                grid-template-columns: auto; 
                gap:3rem; 
                margin-left: 35px;
               }
               }
               tbody{

               }
          </style>

          <?php include "nv.php"; ?>

          <h1>Borrow Books</h1>
          <center><hr style="width: 90%;"></center>
          <!--SEARCH BAR-->
          <center><div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
                <div class="search__container col-md-12">
                    <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search books by title, course, and year..." 
                    style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                </div>
            </div>
          </div></center>
          
          <table>
          <center><tbody  id="myTable" style="">
          <div class="container-fluid row" style="padding:5%;">

               <?php

                    if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                         $page_no = $_GET['page_no'];
                    }
                    else{
                         $page_no = 1;
                    }
                    $total_records_per_page = 200;
                    $offset = ($page_no-1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM thesislibrary");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];

                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1;

                    $today = date('Y')-5;
                    $dataQuery = "SELECT *, DATE_FORMAT(bookPublished, '%M %Y') as publish FROM thesislibrary 
                         WHERE bookStatus='available' AND year(bookPublished)>='$today'
                    ORDER BY bookTitle $title_filter LIMIT $offset, $total_records_per_page";
                    $data = mysqli_query($connect, $dataQuery);
               ?>
               <?php include "pagination.php"; ?>
               <?php
                    
                    for($i = 0; $row = mysqli_fetch_array($data); $i++){
               ?>
               <tr style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1.25rem;">
               <td > 
               <div class="card" style="width: 19rem;  margin-left:auto; margin-right:auto; margin-top:1%; margin-bottom: 10px; padding: 0; border-radius: 9px; border: none;">
                    <img src="../teamsResources/<?php echo $row['bookCover']; ?>" class="card-img-top img-fluid" style="height:250px; border-top-right-radius: 9px; border-top-left-radius: 9px;">
                    <div class="card-body" style="max-height: 100px; min-height: 100px; overflow:auto;">
                         <h5 class="card-title" style="font-size:11pt;">                               
                             <!--  <label style="color:#FD8978;">Thesis Title</label> -->
                  
                              <br><?php echo ucwords($row['bookTitle']); ?>
                              <p>
                                <span> </span><br>
                                   <p style="display: none;"><?php echo $row['publish']; ?></p>
                                  
                                   <p style="display: none;"> <?php echo $row['bookProgram']; ?></p>
                         </h5>
                    </div>
                    
                    <div class="container-fluid" style="padding:10px; margin:0; width: 150px;">
                         <button class="seeDetails" type="button" id="<?php echo $row['bookId']?>" onclick="book.sdb(this)" data-bs-toggle="modal" data-bs-target="#signinfirst" class="form-control me-2" style="">See Details</button>
                    </div>
               </div></td>
                    </tr>

               <?php } ?>
          </div>
          </tbody></center>
          </table>



          <?php# include "footer.php"; ?>
          <script src="../teamsScript/bootstrap.js"></script>
          <script type="text/javascript" src="../teamsScript/getBookInfo.js"></script>
          <?php
          if(isset($_SESSION['info'])){
               $message = $_SESSION['info'];
               echo "<script>swal('Done', '$message', 'success')</script>";
          }
          $_SESSION['info'] = null;

          
     ?>

           
     </body>
     <script>
    function searchbar__Function() {

    //Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            var found = false;
            var td = tr[i].getElementsByTagName("td");
            for(j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {

                    //if found at least once it is set to true
                    found = true;
                }
            }

            //only hides or shows it after checking all columns
            if(found){
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    </script>
    <script type="text/javascript">
      var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
    </script>

</html>
