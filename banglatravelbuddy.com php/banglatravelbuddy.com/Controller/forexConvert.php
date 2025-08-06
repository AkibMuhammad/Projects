<?php
 session_start();

 $converted="";
 if(isset($_REQUEST['submit']))
 {
     $curr1=$_POST['currency1'];
     
     $am1=$_POST['amount1'];

     if($curr1 != null  && $am1 != null)
     {
        if($curr1 == "us")
        {
            $converted= $am1*80;
        }
        elseif($curr1 == "rm")
        {
            $converted= $am1*18.90;
        }
        elseif($curr1 =="inr")
        {
            $converted= $am1*1.75;
        }
     }
     
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forex | Bangla Travel Buddy</title>
</head>

<body>
    <center>
        <table border="1">
            <tr height="200px">
                <td width="90px" align="left"> <img src="images/tour.jpg" width="300px" height="150px" alt=""> </td>
                <td width="1050px" align="right">
                    <h2><a href="home.php">Home </a></h2> <br>
                    <a href="package.php"> Packages </a><br>
                    <a href="forex.php"> Forex </a><br>
                    <a href="about_us.php"> About </a><br>
                    <a href="contact.php"> Contact </a><br> 
                    <a href="login.php">Login/Sign Up</a>
                </td>
            </tr>
            <tr height="400px">
                <td colspan="2" align="center">
                      <h3><b>Foreign Currency Exchange</b></h3><br>
                      <form action="../Controller/forexConvert.php" method="post">
                      <table>
                          <tr>
                              <td colspan="2" align="center">From</td>
                          </tr>
                          <tr>
                            
                              <td>
                                  <select name="currency1" id="">
                                      <option value="<?= $curr1?>"><?= $curr1?></option>
                                      <option value="us">USD</option>
                                      <option value="inr">INR</option>
                                      
                                      <option value="rm">RM</option>
                                  </select>
                              </td>
                              <td><input type="number" name="amount1" value="<?= $am1?>"></td>
                          </tr>
                    
                          <tr>
                              <td colspan="2" align="center">to</td>
                          </tr>
                          <tr>
                              <td>
                                  Converted Amount: 
                              </td>
                              <td><b><?php echo $converted?></b></td>
                          </tr>
                          <tr>
                              <td colspan="2" align="center">
                                  <button type="submit" name="submit">Convert</button>
                                  <button type="reset">Reset</button>
                              </td>
                          </tr>
                      </table>

                      </form>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; Bangla Travel Buddy 2022
                </td>
            </tr>
        </table>

    </center>
</body>

</html>

<?php
 }

?>