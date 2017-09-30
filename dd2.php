<?php
						
						@$cat=$_GET['cat_name'];
						require "config.php";
						$sql2="select name from central";
						    $row2=$dbo->prepare($sql2);
                            $row2->execute();
                            $result2=$row2->fetchAll(PDO::FETCH_ASSOC);
							$main2= array('data'=>$result2);
                            echo json_encode($main2);
		?>