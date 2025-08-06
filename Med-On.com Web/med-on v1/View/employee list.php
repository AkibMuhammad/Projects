<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee List</title>
</head>

<body>
    <center>
        <table border="0">
                <tr height="100px">    
                <td width="1000px">
                <center><br><h1>List of employees</h1></br></center>
                <right><br></br><a href="admin dashboard.php"> Back </a></right>
                </td>
            </tr>
            <tr height="570px">
                <td colspan="2" >
                <form align = "top-center" action="../View/papplicant.php" method="POST">
                    <table border="1" align="center">
                        <tr width="500px">
                            <th colspan="6" width="200px" align="center">Employee Details</th>  
                            <tr width="500px">
                            <th colspan="2">Name & Picture</th>
                            <th colspan="1">Roles</th>
                            <th colspan="1">Joining Date</th>
                            <th colspan="1">Service Record</th>
                        </tr>
                        </tr>
                        </tr>
                        <tr align="right">
                        
                        </tr>

                        <tr>
                            <td align="center">Nina Gonzales</td>
                            <td><img src="images/nina.jpg" align = "right" width="400px" height="250px" alt=""></td>
                            <td align="center">Nurse</td>
                            <td align="center">30/12/2018</td>
                            <td align="center">14 days out of 30 days</td>
                        </tr>
                        <tr>
                            <td align="center">Joshim Islam</td>
                            <td><img src="images/josh.jpg" align = "right" width="400px" height="250px" alt=""></td>
                            <td align="center">Assistant</td>
                            <td align="center">01/02/2020</td>
                            <td align="center">20 days out of 30 days</td>
                        </tr>                           
                    </table>
                    </form>

                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; @Med-On
                </td>
            </tr>
        </table>

    </center>
</body>

</html>