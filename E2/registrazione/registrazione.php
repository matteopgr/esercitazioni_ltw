<?php 
if ($_SERVER["REQUEST_METHOD"] != "POST")
    header("Location: /");
else{
    $dbconn = pg_connect("host=localhost port=5432 dbname=prova_ltw user=postgres password=prova") or die('Could not connect: ' . pg_last_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
</head>
<body>
<?php 
    if($dbconn){
        $email = $_POST["email"];
        $query = "select * from utente where email=$1";
        $result = pg_query_params($dbconn, $query,array($email));
        if($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)){
            echo "<h1>L'indirizzo email è già in uso</h1>
                    Clicca <a href=../login>qui</a> per fare il login";
        }
        else{
            $nome = $_POST["nome"];
            $cognome = $_POST['cognome'];
            $password = $_POST["password"];
            $cap = $_POST['cap'];
            $q2 = "insert into utente values ($1,$2,$3,$4,$5)";
            $r2 = pg_query_params($dbconn, $q2, array($email,$nome,$cognome,$password,$cap));
            if($r2){
                echo "<h1> Registrazione conmpletata </h1>
                Puoi iniziare a usare il sito <br/></h1>” ;
                echo ”<a href =../login> Clicca qui</a>
                per loggarti! ";
            }
        }
    }
    ?>
</body>
</html>