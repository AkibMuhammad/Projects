<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pending Applicants</title>
</head>

<body background="../views/images/bg_img.jpg">
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
                            <td>
                                 <div id="demo1">
                                 <button type="button" align="right" onclick="loadApp1()"> Approve </button> / 
                                 <button type="button" align="right" onclick="loadRej1()"> Reject </button>       
                                 </div>
                        </tr>
                        <tr>
                            <td>Applicant-2</td>
                            <td>Name: Bhuiya Ajom</td>
                            <td>Degrees: MBBS, FCPS (Surgery), MS (Neurosurgery), PH.D FICS</td>
                            <td>Specialized in Neurology</td>
                            <td> <div id="demo2">
                                 <button type="button" align="right" onclick="loadApp2()"> Approve </button> / 
                                 <button type="button" align="right" onclick="loadRej2()"> Reject </button>       
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Applicant-3</td>
                            <td>Name: Faysal Sarkar</td>
                            <td>Degrees: MBBS, FRCP, FCPS, MD</td>
                            <td>Specialized in Medicine</td>
                            <td> <div id="demo3">
                                 <button type="button" align="right" onclick="loadApp3()"> Approve </button> / 
                                 <button type="button" align="right" onclick="loadRej3()"> Reject </button>       
                                 </div>
                            </td>     
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

        <script>
            
            function loadApp1(){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState = 4 && this.status == 200) {
                        document.getElementById("demo1").innerHTML = this.responseText;
                        ML = this.responseText;

                }
            };

            xhttp.open("GET","../Model/approve1.txt", true);
            xhttp.send();
            }            


            function loadApp2(){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState = 4 && this.status == 200) {
                        document.getElementById("demo2").innerHTML = this.responseText;
                        ML = this.responseText;

                }
            };

            xhttp.open("GET","../Model/approve2.txt", true);
            xhttp.send();
            }

            function loadApp3(){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState = 4 && this.status == 200) {
                        document.getElementById("demo3").innerHTML = this.responseText;
                        ML = this.responseText;

                }
            };

            xhttp.open("GET","../Model/approve3.txt", true);
            xhttp.send();
            }

            function loadRej1(){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState = 4 && this.status == 200) {
                        document.getElementById("demo1").innerHTML = this.responseText;
                        ML = this.responseText;

                }
            };

            xhttp.open("GET","../Model/reject1.txt", true);
            xhttp.send();
            }

            function loadRej2(){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState = 4 && this.status == 200) {
                        document.getElementById("demo2").innerHTML = this.responseText;
                        ML = this.responseText;

                }
            };

            xhttp.open("GET","../Model/reject2.txt", true);
            xhttp.send();
            }

            function loadRej3(){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState = 4 && this.status == 200) {
                        document.getElementById("demo3").innerHTML = this.responseText;
                        ML = this.responseText;

                }
            };

            xhttp.open("GET","../Model/reject3.txt", true);
            xhttp.send();
            }
        </script>


    </center>
</body>

</html>