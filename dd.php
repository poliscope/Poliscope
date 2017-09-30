<?php
						
						@$cat=$_GET['cat_name'];
						require "config.php";
						
							$sql="select name from local where city='$cat'";
						    $row=$dbo->prepare($sql);
                            $row->execute();
                            $result=$row->fetchAll(PDO::FETCH_ASSOC);
							$main = array('data'=>$result);
                            echo json_encode($main);

						
						?>