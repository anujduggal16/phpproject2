<?php
  session_start();

  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['username'];
$userid = $_SESSION['user_Id'];

?>
<html>
<head>
	<title></title>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">VSIT FORUM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="#quest"> Post a Question</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="upload.php"> Upload</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="download.php"> Download</a></li>
                </ul>
					 <ul class="nav navbar-nav navbar-right">
                         <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
                        <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
                </ul>
                </div>
              </div>
              </nav>		
            <div class="container" style="margin:7% auto;"> 
                   <h4>Upload File</h4>
      <hr>
                <form method="POST" enctype="multipart/form-data" action="" name="form">
                        
                        <label>Title</label>
                        <input type="text" style="width:300px;" class="form-control" name="cat"required><br>
                        <label>Upload File</label>
                        <input  type="file" name="photo" id="photo" required /><br>
                        <input class="btn btn-success" type="submit" class="s" name="submit" id="submit" value="Submit" />
                   </form><br>
                   <?php
error_reporting(E_ALL ^ E_DEPRECATED);
$conn=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("demo",$conn) or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $cat=$_POST['cat'];
  move_uploaded_file($temp,"files/".$name);
$insert=mysql_query("insert into upload(category,name)values('$cat','$name')");
if($insert){
echo "<h3>Upload Successful!</h3>";
}
else{
die(mysql_error());
}
}
?>
<div class="my-quest" id="quest">
            <div> 
                <form method="POST" action="question-function.php">
                        
                         <label>Category</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <?php 
                            include "../functions/db.php";

                            $sel = mysql_query("SELECT * from category");

                                if($sel==true){
                                    while($row=mysql_fetch_assoc($sel)){
                                        extract($row);
                                        echo '<option value='.$cat_id.'>'.$category.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <label>Topic Title/Language</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>Content</label>
                        <textarea name="content"class="form-control">
                        </textarea>
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                        <input type="submit" class="btn btn-success pull-right" value="Post">
                   </form><br>
                <hr>
                  <a href="" class="pull-right">Close</a>
              </div>
        </div>
                <hr>
                  
              </div>
        </div>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 


</body>
</html>