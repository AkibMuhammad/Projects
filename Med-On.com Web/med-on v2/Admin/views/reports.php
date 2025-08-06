<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reports</title>
</head>

<body>
    <center>
        <table border="2">
                <tr height="240px">    
                <td width="1200px" align="right">
            <center><br><br><h1>Reports</h1></br></br><a href="papplicant.php"> Back </a> | <a href="approved applicants.php"> Approved Applicants </a> | <a href="rejected applicants.php"> Rejected Applicants </a></center>
                </td>
            </tr>
            <tr height="500px">
                <td colspan="2" align="center">
                <form align = "center" action="../views/papplicant.php" method="POST">
                    <table height="400px" border="1" align="center">
                        <tr width="500px">
                            <th colspan="6">Report Uploads</th>
                        </tr>
                        <tr>
                            <td>Patient-1</td>
                            <td>Upload File </td>
                            <td><input type="file" name="file" value=""></td>
                            </tr>
                        </tr>
                        <tr>
                            <td>Patient-2</td>
                            <td>Upload File </td>
                            <td><input type="file" name="file" value=""></td>
                            </tr>
                        </tr>
                        <tr>
                            <td>Patient-3</td>
                            <td>Upload File </td>
                            <td><input type="file" name="file" value=""></td>
                            </tr>
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