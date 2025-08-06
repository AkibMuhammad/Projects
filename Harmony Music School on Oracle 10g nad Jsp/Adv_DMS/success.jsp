
<!DOCTYPE>

<html>
<body>
	<title>
	Harmony Music School
	</title>
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
	
	.about{
		 top: 200px;
		background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%);
		width= 1200px;
		height: auto;
		margin-left: 260px;
		margin-right: 200px;
		color: #fff;
		position: relative;

		padding-left:30px;
		padding-bottom:200px;
		cursor: default;
		border-radius:10px;
	}
	.aboutf{
		color:rgb(255, 255, 60);
        padding-top: 5px;
		padding-left: 0px;
		font-size: 40px;
	}
	.aboutp{
		margin-top: 10px;
		margin-left: 30px;
	}
	</style>
	<div class="main">
	<div class="about">
		<h2 class="aboutf" > <%
            out.print("SUCCESFFULLY_LOGED_IN");
            %> <h2>
		
	</div>
</div>
</body>
</html>
