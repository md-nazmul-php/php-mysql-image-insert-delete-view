
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>

 <!-- style for the page -->

<style type="text/css">
         #content{
         	width: 50%;
         	margin: 20px auto;
         	border: 1px solid #cbcbcb;
         }
         form{
         	width: 50%;
         	margin: 20px auto;
         }
         form div{
         	margin-top: 5px;
         }
         #img_div{
         	width: 80%;
         	padding: 5px;
         	margin: 15px auto;
         	border: 1px solid #cbcbcb;
         }
         #img_div:after{
         	content: "";
         	display: block;
         	clear: both;
         }
         img{
         	float: left;
         	margin: 5px;
         	width: 300px;
         	height: 140px;
         }
        button{
          padding:8px 20px;
        }
</style>

</head>

<body>

<div id="content" align="center">

  <h1>Image upload/View/Delete</h1><hr>

                    <!-- Get data and dispaly -->
                   <?php

                        $db = mysqli_connect("localhost", "root", "", "global");
                        $result = mysqli_query($db, "SELECT * FROM  bgimae");

                        
                      // Convert string to array to echo image as array, you can echo also as attachment or Object

                          while ($row = mysqli_fetch_array($result)) {
                            $delid =$row['id'];


                            echo "<div id='img_div'>";
                              echo "<img src='images/".$row['image']."' >";
                              echo "<br>.<br>";
                              echo "<button >"."<a href='action.php?del=$delid'>Delete</a>"."</button>";
                            echo "</div>";
                          }
                   ?>

 <!-- form to insert image data -->

  <form method="POST" action="action.php" enctype="multipart/form-data"> <!-- You should use encype -->
  	
          <input type="hidden" name="size" value="2000000">
        	
          <div>
        	  <input type="file" name="image">
        	</div>
          <br>

       	  <div>
        		<button type="submit" name="upload">Upload Now</button>
        	</div>
  </form>

</div>

</body>
</html>