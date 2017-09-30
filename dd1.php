<?php
						
						@$cat=$_GET['cat_name'];
						require "config.php";
						$sql1="select name from state where state='$cat'";
						    $row1=$dbo->prepare($sql1);
                            $row1->execute();
                            $result1=$row1->fetchAll(PDO::FETCH_ASSOC);
							$main1 = array('data'=>$result1);
                            echo json_encode($main1);
?>