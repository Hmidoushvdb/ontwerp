<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    
   
    $sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ('$username', '$password')";
    


    if ($conn->query($sql) === TRUE) {
        echo "Gegevens succesvol naar de database verstuurd.";
    } else {
        echo "Fout bij het versturen van de gegevens naar de database: " . $conn->error;
    }
}
?>