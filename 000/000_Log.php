<?php
    $connection = mysqli_connect('localhost', 'root', '', '5ait_automobili')
    or die ("ERROR: Cannot connect");

    $filecorrente=basename($_SERVER['PHP_SELF']);
    $nomemacchina=get_current_user();

    $sql = "insert into log (utente,nomePagina,descrizione) values ('$nomemacchina','$filecorrente','accesso pagina web')";
    $result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");

    
    $contaRighe = "select count(*) as conta from log";
    $result = mysqli_query($connection, $contaRighe) or die ("ERROR: " . mysqli_error($connection) . " (query was $contaRighe)");
    $numRighe = mysqli_fetch_assoc($result);
    
    if ($numRighe['conta'] >= 150) {
        $sql = "truncate table log";
        $result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
    }

    mysqli_close($connection);

?>