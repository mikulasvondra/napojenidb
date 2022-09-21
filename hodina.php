<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbz5";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET["submit"])){

   
    $jmeno = $_GET["jmeno"];
    $prijmeni = $_GET["prijmeni"];
    $email = $_GET["email"];
    $pohlavi = $_GET["pohlavi"];
    $os = $_GET["os"];
    
    
    $sql = "INSERT INTO TEST (jmeno,prijmeni,email,pohlavi,os)  VALUES ('$jmeno','$prijmeni','$email','$pohlavi','$os')";

    
    if ($conn->query($sql) === TRUE) {
        echo "Vytvořeno uspěšně<br>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

if (isset($_GET["delete"])){

    //sestavení DELETE dotazu
    $sql = "DELETE FROM TEST WHERE idTest=".$_GET["delete"];

    
    if ($conn->query($sql) === TRUE) {
        echo "Smazáno uspěšně";
    } 
    else {
        echo "Error deleting record: " . $conn->error;
    }
}


?>
<html>
<H1>FORMULAR </H1>
    
    <body>
    
        <form action="" method="get">
            <label for="jmeno">Jméno:</label><br>
            <input type="text" id="jmeno" name="jmeno" value="Petr"><br>    <br>

            <label for="prijmeni">Přijmení:</label><br>
            <input type="text" id="prijmeni" name="prijmeni" value="Mukhamedov"><br>    <br>

            <label for="email">email:</label><br>
            <input type="text" id="email" name="email" value="email@seznam.cz"><br>    <br>

            <label for="pohlavi">pohlavi:</label>
            <select name="pohlavi" id="pohlavi">
            <option value="muz">Muž</option>
            <option value="zena">Žena</option>
            <option value="jino">Jiné</option>
            </select>
            <br><br>
            <p>Jaký preferuješ Operační systém?</p>
            <label for="linux">Linux</label>
            <input type="radio" id="os" name="os">
            <label for="windows">Windows</label>
            <input type="radio" id="os" name="os">
            <br>

            <input name="submit" type="submit" value="Submit">

            
            
        
        </form>
        </html> 


<?php



$sql = "SELECT idTest, jmeno, prijmeni,email,pohlavi,os FROM TEST";



$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table><tr><th>idTest</th><th>jmeno</th><th>prijmeni</th><th>email</th><th>pohlavi</th><th>os</th></tr>";
    
    while($row = $result->fetch_assoc()) {
  
    
    echo "<tr>
        <td>".$row["idTest"]."</td>
        <td>".$row["jmeno"]."</td>
        <td>".$row["prijmeni"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["pohlavi"]."</td>
        <td>".$row["os"]."</td>
       

        <td><a href=\"?delete=".$row["idTest"]."\">delete</td>
        </tr>";
    }
    echo "</table>";
    } 
    else {
        echo "Žádné výsledky";
    }


$conn->close();
?>
</body>
</html>
<style>
    html{
     background-color: #d3d3d3;
     font-family: "Gill Sans", sans-serif;
    color: purple;
}
body{
    margin: 20px;
    padding: 50px;
    width: 1200px;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}



td{
    background-color: #ffe4e1;
}
input{
    background-color: #ffe4e1;
    margin:10px;
    padding:2px;
}
 
    </style>