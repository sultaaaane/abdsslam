<?php
                            require('php/DB/connect.php');
                            session_start();
                            if (isset($_POST["submit"])) {
                                if($_POST['email'] == "admin@admin.com" || $_POST['email'] == "Admin@admin.com"){
                                    header("Location: php/Admin/client.php");
                                }else{
                                $name = $_POST["email"];
                                $pass = $_POST["password"];
                                $select = "select * from client where gmail = '$name' && password = '$pass' ";
                                $id_grabber = mysqli_query($conn, "select id from client where gmail = '$name' && password = '$pass' ");
                                $row = mysqli_fetch_assoc($id_grabber);
                                $id = $row['id'];
                                $_SESSION['id'] = $id;
                               setcookie("id", $id);
                                $result = mysqli_query($conn, $select);
                                $rows = mysqli_num_rows($result);
                                
                                if ($rows == 1) {
                                    header("Location: php/Client/index.php");
                                    ?>
                                    <script> alert(<?php echo $_SESSION['id']; ?>);</script>
                                    <?php
                                } else {
                                    header("Location: login.html");
                                }
                            }
                            }
                            ?>