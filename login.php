<?php
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Verbonden met de database";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    echo "Gebruikersnaam:" . $username . "<br>";
    echo "Wachtwoord:" . $password;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Gegevens succesvol naar de database verstuurd.";
    } else {
        echo "Fout bij het versturen van de gegevens naar de database: " . $conn->error;
    }
}
?>





<html>
<title>Registratiepagina</title>
</head>
<body>
    <h2>log here...</h2>
    <form action="klaar.php" method="POST">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="login">
    </form>
