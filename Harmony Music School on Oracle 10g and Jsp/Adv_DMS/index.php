<!DOCTYPE html>
<html>
	<title> Harmony Music School </title>
	
	<style type="text/css">	
	*{
		margin:0;
		padding:0;
	}
	
	.main{
		width:100%;
		background-image: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(ie.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
		backgroud-position: center;
		
		height:109vh;
	}
	
	.navbar{
		width: 1200px;
		height: 75px;
		margin: auto;
	}
	
	.icon{
		width:300px;
		float:left;
		height: 70px;
	}
	
	.logo{
		color: red;
		font-size:20px;
		font-family:Arial;
		padding-left:20px;
		float:left;
		padding-top: 10px;
		cursor: default;
	}
	
	.menu{
		width: 400px;
		float:left;
		height: 70px;
	}
	
	.menu ul{
		float:left;
		display: flex;
		justify-contant:center;
		align-items: center;
	}
	
	.menu ul li{
		list-style: none;
		margin-left:62px;
		margin-top:27px;
		font-size:19px;
	}
	.menu ul li a{
		text-decoration:none;
		color: white;
		font-family: Arial;
		font-weight: bold;
		
		
	}
	
	ul li a:hover{
		color: red;
	}
	
	.content{
		
		width= 700px;
		height: auto;
		margin: auto;
		color: #fff;
		position: relative;
		padding-left:30px;
		cursor: default;
	}
	
	.content .par{
		padding-left:20px;
		padding-bottom:25px;
		font-family: arial;
		line-height:30px;
	}
	
	.content h1{
		font-family: Arial;
		padding-left:20px;
		
	}
	.content h2{
		font-family: Arial;
		font-size: 40px;
		padding-left:20px;
		margin-top:9%;
	}
	
	.content .joinButton{
		width: 160px;
		height: 40px;
		background-color: red;
		border:none;
		margin-bottom: 10px;
		margin-left: 20px;
		font-size: 18px;
		border-radius: 10px;
		cursor: pointer;
		transition: .4s ease;
	}
	
	.content .joinButton a{
		
		text-decoration: none;
		color: black;	
		transition: .3s ease;
	}
	.content .joinButton:hover{
		
		background-color: yellow;
		
	}
	
	.content span{
		color:red;
		font-size: 60px;
	}
	
	.form{
		width: 250px;
		height:320px;
		background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%);
		position: absolute;
		top: -20px;
		left: 870px;
		border-radius: 10px;
		padding: 25px;
	}
	
	.form h2{

		width: 220px;
		font-family=sans-sherif;
		text-align: center;
		color:red;
		font-size: 22px;
		background-color:white;
		
		<!-- border-radius: 10px; -->
		margin: 2px;
		padding: 8px;
		
	}
	
	.form input{
		width:240px;
		height: 35px;
		background: transparent;
		border-bottom: 1px solid red;
		border-top:	none;
		border-right:	none;
		border-left:	none;
		color: white;
		font-size: 15px;
		letter-spacing: 1px;
		margin-top: 30px;
		font-family: sans-serif;
	}
	.form input:focus{
		outline:none;
	}
	
	::placeholder{
		color: white;
		font-family: Arial;
	}
	
	.form .loginButton{
		width: 240px;
		height: 40px;
		background: red;
		border= none;
		margin-top: 30px;
		font-size: 18px;
		border-radius: 10px;
		cursor: pointer;
		color: black;
		font-weight: bold;
		transition: 0.4s ease;
		position: center;
	}
	
	.loginButton:hover{
		background: white;
		color: red;
	}
	.form .link{
		font-family: Arial;
		font-size: 17px;
		padding-top: 20px;
		text-align: center;
	}
	
	.form .link a{
		text-decoration: none;
		color: red;
		
	}
	
	
	</style>
	
<body>
	
	<div class="main">
		<div class="navbar">
			<div class="icon">
				<h2 class="logo">Welcome to <br/>Harmony Music School </h2>
				
			</div>
			
			<div class="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="">About</a></li>
					<li><a href="">Services</a></li>
				</ul>
			</div>
			
			
		</div>
		<div class="content">
			<h2>Why</h2>
			<h1><span>Harmony?</span></h1>
				
			<p class="par">Cause it's B E S T</p>
				
			<button class="joinButton"><a href="login.html">JOIN TODAY</a></button>	
				
			<div class="form">
				<h2>Login Here</h2>
				
				<form action= "logincheck.jsp" method="post">
				<input type="text" id="email" name="email" required placeholder="Enter Email Here">
				<input type="password" id="password" name="password" required placeholder="Enter Password Here">
				
				<input class="loginButton" type="submit" value="Submit" name="LogbtnClick">
				
				<p class="link">Don't have an account<br/>
				<a href="login.html">Sign Up here</a> </p>
				</form>
				
				
		</div>
		
	</div>
</body>
</html>