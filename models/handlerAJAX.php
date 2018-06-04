<?php

session_start();
include "../library/gestion_BD.php";


/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 */
if (!empty($_SESSION['idContactSelected']) && !empty($_SESSION['idUser']) ) {
    $task = "list";

    if(array_key_exists("task", $_GET)){
        $task = $_GET['task'];
    }

    if($task == "write"){
        postMessage();
    } else {
        getMessages();
    }
}

/**
 * Si on veut récupérer, il faut envoyer du JSON
 */
function getMessages(){
    $connect = connection();

    if (!empty($_SESSION['idContactSelected']) && !empty($_SESSION['idUser'])) {
        // 1. On requête la base de données pour sortir les 20 derniers messages
        $query1 = "SELECT messages.id, from_id, to_id, content, creat_at, name, firstname FROM messages JOIN user ON from_id = user.id WHERE (from_id=" . $_SESSION['idUser'] . " AND to_id=" . $_SESSION['idContactSelected'] . ") OR (from_id=" . $_SESSION['idContactSelected'] . " AND to_id=" . $_SESSION['idUser'] . ") ORDER BY messages.id DESC;";
        $resultat1 = $connect->query($query1);

        $json = array();
        while($row = $resultat1->fetch(PDO::FETCH_ASSOC)) {
            $json[] = $row;
        }
        echo json_encode($json);
    }
    else {
        echo "<script>alert('Contact unselected !');</script>";
        echo "<script>window.location.replace('/');</script>";
    }

}
/**
 * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
 */
function postMessage(){
    if (!empty($_SESSION['idContactSelected']) && !empty($_SESSION['idUser'])) {
        // 1. Analyser les paramètres passés en POST (author, content)
        $connect = connection();
        if(!array_key_exists('content', $_POST)){
            echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
            return;
        }
        $content = $_POST['content'];
        date_default_timezone_get();
        $dateRelative = date('Y-m-d H:i:s', time());

        // 2. Créer une requête qui permettra d'insérer ces données
        $query = "INSERT INTO messages( from_id, to_id, content, creat_at) VALUES (:author,:destinataire,:content,:datetime)";
        $prep = $connect->prepare($query);
        $prep->bindParam(':author', $_SESSION['idUser']);
        $prep->bindParam(':destinataire', $_COOKIE['idContactSelected']);
        $prep->bindParam(':content', $content);
        $prep->bindParam(':datetime', $dateRelative);
        $prep->execute();
        $prep->closeCursor();
        $prep = NULL;
        //$query = $db->prepare('INSERT INTO messages SET author = :author, content = :content, created_at = NOW()');
    }
    else {
        echo "<script>alert('Contact unselected !');</script>";
    }
    echo "<script>window.location.replace('/');</script>";

}

function getRelativeTime($date) {
    // Déduction de la date donnée à la date actuelle
    $time = time() - strtotime($date);

    // Calcule si le temps est passé ou à venir
    if ($time > 0) {
        $when = "il y a";
    } else if ($time < 0) {
        $when = "dans environ";
    } else {
        return "il y a 1 seconde";
    }
    $time = abs($time);

    // Tableau des unités et de leurs valeurs en secondes
    $times = array( 31104000 =>  'an{s}',       // 12 * 30 * 24 * 60 * 60 secondes
        2592000  =>  'mois',        // 30 * 24 * 60 * 60 secondes
        86400    =>  'jour{s}',     // 24 * 60 * 60 secondes
        3600     =>  'heure{s}',    // 60 * 60 secondes
        60       =>  'minute{s}',   // 60 secondes
        1        =>  'seconde{s}'); // 1 seconde

    foreach ($times as $seconds => $unit) {
        // Calcule le delta entre le temps et l'unité donnée
        $delta = round($time / $seconds);

        // Si le delta est supérieur à 1
        if ($delta >= 1) {
            // L'unité est au singulier ou au pluriel ?
            if ($delta == 1) {
                $unit = str_replace('{s}', '', $unit);
            } else {
                $unit = str_replace('{s}', 's', $unit);
            }
            // Retourne la chaine adéquate
            return $when." ".$delta." ".$unit;
        }
    }
}

?>