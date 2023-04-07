<?php 
if ($_SERVER["REQUEST_METHOD"] != "POST")
    header("Location: /");
else{
    $dbconn = pg_connect("host=localhost port=5432") or die('Could not connect: ' . pg_last_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferma login</title>
</head>
<body>
    <?php 
    if($dbconn){
        $email = $_POST["email"];
        $query = "select * from utente where email=$1";
        $result = pg_query_params($dbconn, $query,array($email));
        if($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)){
            
        }
    }
    ?>
</body>
</html>