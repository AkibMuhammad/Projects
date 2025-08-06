<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pending Applicants</title>
</head>

<body>
    <center>
        <table border="2">
                <tr height="240px">    
                <td width="1200px" align="right">
            <center><br><br><h1>Pending Applicants</h1></br></br><a href="papplicant.php"> Back </a> | <a href="approved applicants.php"> Approved Applicants </a> | <a href="rejected applicants.php"> Rejected Applicants </a></center>
                </td>
            </tr>
            <tr height="500px">
                <td colspan="2" align="center">
                <form align = "center" action="../View/papplicant.php" method="POST">
                    <table height="400px" border="1" align="center">
                        <tr width="500px">
                            <th colspan="6">Pending List</th>
                        </tr>
                        <tr>
                            <td>Applicant-1</td>
                            <td>Name: Abedin Islam </td>
                            <td>Degrees: MBBS, MS (CTS)</td>
                            <td>Specialized in Cardiology</td>
                            <td> <button type="submit" align="right" name="submit" value="Submit"><h8> Approve </h8></button> / <button type="submit" align="right" name="submit" value="Submit"><h8> Reject </h8></button> </td>
                        </tr>
                        <tr>
                            <td>Applicant-2</td>
                            <td>Name: Bhuiya Ajom</td>
                            <td>Degrees: MBBS, FCPS (Surgery), MS (Neurosurgery), PH.D FICS</td>
                            <td>Specialized in Neurology</td>
                            <td> <button type="submit" align="right" name="submit" value="Submit"><h8> Approve </h8></button> / <button type="submit" align="right" name="submit" value="Submit"><h8> Reject </h8></button> </td>
                        </tr>
                        <tr>
                            <td>Applicant-3</td>
                            <td>Name: Faysal Sarkar</td>
                            <td>Degrees: MBBS, FRCP, FCPS, MD</td>
                            <td>Specialized in Medicine</td>
                            <td> <button type="submit" align="right" name="submit" value="Submit"><h8> Approve </h8></button><b> / <b><button type="submit" align="right" name="submit" value="Submit"><h8> Reject </h8> </button> </td></td>
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