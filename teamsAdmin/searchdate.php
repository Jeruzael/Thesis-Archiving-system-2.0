
<?php

                                $con = mysqli_connect("localhost","root","","db_teams");
                                $studentStamp = $_POST['studentStamp'];
     /*dito sya nalabas*/       $query = "SELECT * FROM enrolled_csd WHERE studentStamp = '$studentStamp'";
                                $query_run = mysqli_query($con, $query);
                                header('Location: student.php');
                                                                
                                if(mysqli_num_rows($query_run)>0){
                                    foreach($query_run as $row){
                                        ?>
                                        <tr style="border-bottom:2px solid whitesmoke;">
                                            <td><?php echo $row['studentId']; ?></td>
                                            <td><?php echo $row['studentPassword']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                }
                                else{
                                    ?>
                                    <tr style="border-bottom:2px solid whitesmoke;">
                                            <td colspan = "2" >No records found</td>
                                    </tr>
                                        <?php
                                }
                                ?>