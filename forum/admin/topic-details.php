<?php
  session_start();
  if (isset($_SESSION['uname'])&&$_SESSION['uname']!=""){
  }
  else
  {
    header("Location:index.php");
  }
$uname=$_SESSION['uname'];

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
                <a class="navbar-brand">Administrator</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	
                <ul class="nav navbar-nav navbar-left">
                   <li><a href="home.php"> Dashboard</a></li>
                    <li  class="active"><a href="post.php"> Topics</a></li>
                    <li><a href="user.php"> Users</a></li>
                    <li><a href="category.php">Category</a></li>


                </ul>
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?php echo $uname;?></a></li>
                <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               
        </ul>

                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
     <div class="container" style="margin:8% auto;width:900px;">
           
           <h2> Topics Posted</h2>

           <hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Topic Details</h3>

                </div> 
                 <div class="panel-body">
                  <?php
                  include "../functions/db.php";
                 if(isset($_GET['post_Id'])){
                 $id = $_GET['post_Id'];
                   }
                  if(empty($id)){
                    header("location:post.php");
                     }
                                      
                  $sql = "SELECT * FROM tblpost as tp join category as c on tp.cat_id=c.cat_id WHERE tp.post_Id='$id'";
                            $run = mysql_query($sql);

                            while($row=mysql_fetch_array($run))
                            {
                                $id = $row['post_Id'];
                       
                                $title = $row['title'];
                               $content = $row['content'];
                                $category= $row['category'];
                               $datetime =$row['datetime'];
                              
                 
                            }
                            $sql2 ="SELECT * FROM tblpost WHERE post_Id=$id ";
                            $run2 = mysql_query($sql2);
                            while($row2=mysql_fetch_array($run2))
                            {
                              $userid = $row2['user_Id'];

                            }

                            $sql1 ="SELECT * FROM tbluser WHERE user_id='$userid'";
                            $run1 = mysql_query($sql1);
                            while($row1=mysql_fetch_array($run1))
                            {
                              $f = $row1['fname'];
                              $l = $row1['lname'];
                            }

                            ?>

                            <form>
                            <input type="text" class="form-control" value="<?php echo $category;?>" readonly><br>
              
                        <input type="text" class="form-control" value="<?php echo $title;?>" readonly><br>
                        <textarea name="content"class="form-control" readonly><?php echo $content;?></textarea>
                        <?php echo "$f " ; echo " $l ";?>
                        <input type="text" class="form-control" value="<?php echo $datetime;?>" readonly>
                        
                   </form>
                   <hr style=" border-width: 5px ; border-color: black;">
                   <a class="navbar-brand">Comments</a>
                   <?php
                   $sql = "SELECT * FROM tblcomment WHERE post_Id='$id'";
                            $run = mysql_query($sql);

                            while($row=mysql_fetch_array($run))
                            {
                                
                               $comment = $row['comment'];
                               $uid = $row['user_Id'];
                               echo '<form>';
                            echo'<textarea name="content"class="form-control" readonly>'; echo" $comment ";
                            echo'</textarea>';
                             $sql1 ="SELECT * FROM tbluser WHERE user_id='$uid'";
                            $run1 = mysql_query($sql1);
                            while($row1=mysql_fetch_array($run1))
                            {
                              $f = $row1['fname'];
                              $l = $row1['lname'];
                            }
                            echo"$f "; echo"$l";
                            echo'<br>';
                            echo'</form>';
                 
                            }

                            ?>
                           

                </div>
    </div>
	</body>
</htmls