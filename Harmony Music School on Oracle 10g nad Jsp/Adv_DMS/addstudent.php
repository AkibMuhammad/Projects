	
<!DOCTYPE html>


<html>
	<title> Harmony Music School </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="addstudent.css">
	
	
	
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
		<div class="login">
			<h2>SIGN UP HERE</h2>
			
			
		
				<form action="addstudent.jsp" method="POST" autocomplete="off"   >

		
		<table>
			<tr>
				<td>Name</td>
				<td> :</td>
				<td>
				<input type='text' id='sname' name='snamee' placeholder='Example: Boss' >
				<br/><span id="snamee"></span>
				</td>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td>
					<input type='password' id='password' name='passwords' placeholder='Example: Boss@12345' >
				<br/><span id="passwordd"></span>
				</td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td>
					<input type='password' id='cpassword' name='cpasswords' placeholder='Example: Boss@12345' >
				<br/><span id="cpasswordd"></span>
				</td>
			</tr>
			<tr>
			<td>Email</td>
				<td> :</td>
				<td>
				<input type='text' id='email' name='emails' placeholder='Example: Boss@email.com' >
				<br/><span id="emaile"></span>
				</td>
			</tr>	
			<tr>
				<td>Phone Number</td>
				<td>:</td>
				<td>
				<input type='text' id='phone' name='phones' placeholder='Example: 01700000000'>
				<br/><span id="phonee"></span>
				</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td>
				<div class="radio">
				<input type='radio' name='genders'   value='Male'> &nbsp;Male
					<input type='radio' name='genders'  value='Female'> &nbsp;Female
					<input type='radio' name='genders'   value='Others'> &nbsp;Others
				<br/><span id="genderr"></span>
				</div>
				</td>
			</tr>
			
			<tr>
					<td>What Are You?</td>
					<td>:</td>
					<td>
					<select class='regway' id='selection' name='rstudent'  >
						 <option value='select'>Select One</option>
						
						<option>Student</option>
					<br/><span id="selectionn"></span>
					</td>
			</tr>
			
				<tr>
					<td><input class="btn" type="submit" value="Submit" name="btnClick" id="sub" ></td> 
				</tr>			
			</table>

		</form>
	
		</div>
	</div>
</body>
</html>