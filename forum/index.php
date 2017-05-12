<html>
<head>
	<title></title>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
    div#fixedfooter {
	position:fixed;
	bottom:0px;
	left:0px;
	width:100%;
	color:#ccc;
	background:black;
	padding:8px;
}
</style>
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
                <a class="navbar-brand" href="index.php">VSIT FORUM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<!--
                <ul class="nav navbar-nav navbar-left">
                    <li><a href=""><span class="glyphicon glyphicon-list"></span> Topics</a></li>
                </ul>
            -->
                <div>
					<form class="navbar-form navbar-right" method="POST"role="search" action="pages/login.php">
					<div class="form-group">
					<input type="text" class="form-control" name="username"placeholder="Username">
					<input type="password" class="form-control" name="password"placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success">Login</button>
					</form>
				</div>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
			<div class="container" style="margin:8% auto;">
				<div class="col-sm-4 col-md-3">
					<h2>Discuss with your friends</h2>
					<p><h4>It is a resource provided by VSIT to its students to discuss their problems regarding
					studies or any general happening around the world. While expressing yourself keep a check on 
					your language and A continuous check by the VSIT faculty members is done to keep a report of your 
					activities.</h4> </p>
				</div>
				 <div class="col-sm-5 col-md-4 pull-right">
                   <div class="row">
                   
					<ui>
					<li style="color:#ff3385 ; font-size:60px ; margin:10px ; ">SHARE</li>
					<li style="color:#ffff33 ; font-size:60px ; margin:10px ;">DISCUSS</li>
					<li style="color:#66e0ff ; font-size:60px ; margin:10px ;">LEARN</li>
					</ui>
				</div>
			</div>
		</div>
<div id="fixedfooter"><p align="center">Developed by <u>Anuj Duggal</u> Copyright &copy <?php echo date("Y")?> All Rights Reserved</p></div>
</body>
</html>