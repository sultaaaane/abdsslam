<?php
                            require('DB/connect.php');
                            session_start();
                            if (isset($_POST["submit"])) {
                                $name = $_POST["email"];
                                $pass = $_POST["password"];
                                $select = "select * from admin where email = '$name' && password = '$pass' ";
                                $result = mysqli_query($conn, $select);
                                $rows = mysqli_num_rows($result);
                                if ($rows == 1) {
                                    $_SESSION['email'] = $name && $_SESSION['password'] = $pass;
                                    header("Location: /index.php");
                                } else {
                                    header("Location: ../login.php");
                                }
                            }
                            ?>