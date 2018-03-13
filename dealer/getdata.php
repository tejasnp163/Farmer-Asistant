<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
            <?php
            $q = $_GET['q'];

            $con = mysqli_connect("localhost", "root", "","temp");
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }

           
            if($q=="")
            {
                $sql="SELECT * FROM details";
            }
            else{
              $sql="SELECT * FROM details WHERE type = '".$q."'" ;
            }
            $result = mysqli_query($con,$sql);

            echo "<table> <tr> <th>Firstname</th> <th>Lastname</th><th>Age</th></tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($con);
            ?>
     
</body>
</html>