<?php require_once "../teamsDataCenter/controller.php";?>
<?php include  "checker.php"; ?>

<?php  
require_once "../teamsDataCenter/tool.php";
    //ADD BOOK
    if(!isset($_POST['title']) && !isset($_POST['author']) && !isset($_POST['professors']) && !isset($_POST['publish']) ){
        /*echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">no data available to add</div>";*/
    }else {
        $_bookTitle = $_POST['title'];
        $_bookAuthor = $_POST['author'];
        $_bookProfessor = $_POST['professors'];
        $_bookPublished = $_POST['publish'];
        $_bookCategory = $_POST['category'];
        $_bookCourse = $_POST['course'];
        $_bookCover = $_POST['bookCover'];
        $_bookAbstract = $_POST['abstract'];

        $addBookQuery = "
        INSERT INTO thesislibrary (bookCategory, bookProgram, bookCover, bookAbstract, bookTitle, bookAuthor, bookProfessor, bookPublished) 
        VALUES ('$_bookCategory', '$_bookCourse', '$_bookCover','$_bookAbstract', '$_bookTitle','$_bookAuthor','$_bookProfessor','$_bookPublished')";

        if($connect->query($addBookQuery) === TRUE){
            /*echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">New record created successfully</div>";*/
        }else{
            /*echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">". $connect->error . "</div>";*/
        }
    }
    //EDIT BOOKS
    if(!isset($_POST['editTitle']) && !isset($_POST['editAuthor']) && !isset($_POST['editProfessors']) && !isset($_POST['editPublish']) ){
       /* echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">no data available to add</div>";*/
    }else {
        //$editBookId = $_POST['id'];
        $editBookId = $_POST['editId'];
        $editBookTitle = $_POST['editTitle'];
        $editBookAuthor = $_POST['editAuthor'];
        $editBookProfessor = $_POST['editProfessors'];
        $editBookPublished = $_POST['editPublish'];
        $editBookCategory = $_POST['editCategory'];
        $editBookCourse = $_POST['editCourse'];
        $editBookCover = $_POST['editBookCover'];
        $editBookAbstract = $_POST['editAbstract'];


        $editBookQuery = "UPDATE thesislibrary SET bookAuthor = '$editBookAuthor', bookCategory = '$editBookCategory', bookProgram = '$editBookCourse', bookCover = '$editBookCover', bookTitle = '$editBookTitle', bookAbstract = '$editBookAbstract', bookProfessor = '$editBookProfessor', bookPublished = '$editBookPublished' WHERE bookId = '$editBookId'";

        /*echo $editBookQuery;*/

        if($connect->query($editBookQuery) === TRUE){
            /*echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">New record edited</div>";*/
            //echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">". $connect->error . "</div>";
            
        }else{
            /*echo "<div style=\"position: relative; text-align: right; font-size: 10px;\"" . ">". $connect->error . "</div>";*/

        }

        /*tools\request::reqBook(tools\Otpcode::genOTP(), $_SESSION['number'], tools\thesisbook::$tBookID, "Pending", date("Y/m/d"));*/

    }

?>
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons Package From Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- External Files -->
        <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/st.css"/>

        <!-- sweetalert libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head> 

    <body style="background-color: #F8FAFF;;">
        <style type="text/css">
            .btn-action{
                box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
                border: 1px solid #FD8978; 
                padding: 10px; 
                width: 200px; 
                background-color: #FD8978; 
                color: #FFF; 
                border-radius: 5px; 
                margin-top: -25px;
            }
            .btn-action:hover{
                background-color: #FF6E59;
                color: #FFF;
                box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
            }
                input.search__input:hover,
                input.search__input:focus{
                    outline: 0;
                    border: 1px solid #fff;
                    box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
                }
            }
            .form-label{
                margin-top:5px; 
                font-size:16px; 
                line-height:24px;
            }
            .title{
                font-size:40pt; 
                font-weight:600; 
                line-height:64px; 
                font-family:'Poppins'; 
                color:#7788F4;
            }
            @media (max-width: 400px) {
            *{
                
                padding: 0;
            }
            .home-section{
            }
            .bx-plus{
                display: none;
            }
            .title{
                font-size: 25pt;
            }
            .searchbox{
                margin-top: -60px;
            }

      }
        </style>
        <!-- This section is for menus -->
        <?php include "menu.php"; ?>

        <section class="home-section" style="background-color: #F8FAFF;">
            <div class="text" style="">
                <p  class="title">Books</p></div>
            <div class="container-fluid row searchbox" style="padding-right:20px;">
                <div class="search__container col-md-9">
                    <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search thesis books..." 
                    style="">
                </div>
                <div class="credits__container col-md-3" style="text-align: center; ">
                    <button type="button" id="addBtn" class="btn-action" data-bs-toggle="modal" data-bs-target="#addBook" style="">
                        <i class='bx bx-plus'></i> Add New Book
                    </button>
                </div>
            </div>
            <div class="container-fluid" 
            style="overflow-x: scroll; ">
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <thead style="background-color: #7788F4; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
                        <th>ID</th>
                        <th>Book Title</th>
                        <th>Date Published</th>
                        <th>Cover Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody  id="myTable">
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
                            $dataQuery = "SELECT *, DATE_FORMAT(bookPublished, '%M %Y') as publish FROM thesislibrary WHERE year(bookPublished)>='$today' 
                            ORDER BY bookId ASC LIMIT $offset, $total_records_per_page";
                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">
                            <td><?php echo $row['bookId']; ?></td>
                            <td style="text-align:left; width:600px"><?php echo ucwords($row['bookTitle']); ?></td>
                            <td><?php echo $row['publish']; ?></td>
                            <td><img class="img-fluid" style="height: 50px;" src="../teamsResources/<?php echo $row['bookCover']; ?>"/></td>
                            <td><?php echo ucwords($row['bookStatus']); ?></td>
                            <td><button id="<?php echo $row['bookId'] ?>" onclick="adminBook.sdb(this)" type="button" class="btn-action" data-bs-toggle="modal" data-bs-target="#editBook" style="padding: 5px; 
                            width: 70px; 
                            /*color: #fff; */
                            /*background-color: #FD8978; */
                            /*border: #FD8978;*/
                            ">
                            <i class='bx bx-pencil' ></i>Edit
                            </button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- This section is for Pagination -->
            <?php# include "pagination.php"; ?>

        </section>

        <!--ADD NEW BOOK MODAL -->
        <div class="modal fade" id="addBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add New Thesis Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Thesis Book Details</p>
                        <form action="books.php" method="post">
                        <label style="" class="form-label"><i class='bx bx-book'></i> Book Title</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="title" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Title" required="Required"/>

                        <label style="" class="form-label"><i class='bx bx-user'></i> Authors</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="author" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Researcher" required="Required"/>

                        <label style="" class="form-label"><i class='bx bx-book'></i> Book Cover</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="bookCover" type="file" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Researcher" required="Required"/>

                        <label style="" class="form-label"><i class='bx bx-book-content'></i> Program/Course</label>
                        <br>
                            <select style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; width: 100%;" name="course">
                              <option>BSCS</option>
                              <option>BSIS</option>
                              <option>BSIT</option>
                              <option>BSEMC</option>
                            </select>

                        <label style="" class="form-label"><i class='bx bx-book-content'></i> Book Category</label>
                        <br>
                            <select style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; width: 100%;" name="category">
                              <option>Desktop App</option>
                              <option>Mobile App</option>
                              <option>Website</option>
                            </select>

                        <!-- <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="category" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Category" required="Required"/> -->
                        <br>
                        <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book-content'></i> Thesis Abstract</label>
                        <textarea style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="abstract" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Abstract" required="Required"></textarea>

                        <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-time'></i> Date Published</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="publish" type="date" ondrop="return false;" onpaste="return false;" class="form-control" required="Required"/>

                        <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Thesis Adviser</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" name="professors" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Professors" required="Required"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Add"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF ADD NEW BOOK MODAL-->

        <!-- EDIT BOOK MODAL -->
        <div class="modal fade" id="editBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Thesis Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Thesis Book Details</p>
                        <form action="books.php" method="post">
                            <div style="display: none;">
                                <input id="bookId" type="number" name="editId">
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book'></i> Book Title</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editTitle" name="editTitle" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Title" required="Required"/>

                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Authors</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editAuthor" name="editAuthor" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Researcher" required="Required"/>

                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book'></i> Book Cover</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editBookCover" name="editBookCover" type="file" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Researcher" required="Required"/>

                            <label style="" class="form-label"><i class='bx bx-book-content'></i> Program/Course</label>
                        <br>
                            <select style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; width: 100%;" name="editCourse" id="editProgram">
                              <option>BSCS</option>
                              <option>BSIS</option>
                              <option>BSIT</option>
                              <option>BSEMC</option>
                            </select>

                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book-content'></i> Book Category</label>
                            <br>
                            <select style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px; width: 100%;" name="editCategory" id="editCategory">
                              <option>Desktop App</option>
                              <option>Mobile App</option>
                              <option>Website</option>
                            </select>

                            <!-- <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editCategory" name="editCategory" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Category" required="Required"/> -->

                            <br>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-book-content'></i> Thesis Abstract</label>
                            <textarea style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editAbstract" name="editAbstract" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Research Abstract" required="Required"></textarea>

                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-time'></i> Date Published</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editPublish" name="editPublish" type="date" ondrop="return false;" onpaste="return false;" class="form-control" required="Required"/>

                            <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-user'></i> Thesis Adviser</label>
                            <input style="font-size:13px; line-height:20px; padding:10px; border:1px solid rgba(167, 172, 182, 0.99); border-radius:0px;" id="editProfessors" name="editProfessors" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Professors" required="Required"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Save"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF EDIT BOOK MODAL-->

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
    <!-- navigation of menu -->
    <script type="text/javascript" src="../teamsScript/getBookInfo.js"></script>
    <script src="../teamsScript/bootstrap.js"></script>
    <!--<script src="../teamsScript/navigation.js"></script>-->
</html>
