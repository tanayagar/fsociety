<?php
                                date_default_timezone_set('Asia/Calcutta');
								$conn=mysqli_connect('localhost','id3671018_vbhv','123456','id3671018_vit');
								if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
								{
									$name=$_POST['name'];
									$email=$_POST['email'];
									$message=$_POST['message'];
									
									$dat=date("d/m/Y");
									$time=date("h:ia");
									$sql="INSERT INTO `comments`(`name`,`email`,`message`,`dat`,`time`) VALUES ('$name','$email','$message','$dat','$time')";
									$result=mysqli_query($conn,$sql);
								}
								header("location:skill_landing.php");
								
?>