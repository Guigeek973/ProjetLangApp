<?php
include "../library/gestion_BD.php";



/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 */
$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET['task'];
}

if($task == "write"){
  postMessage();
} else {
  getMessages();
}

/**
 * Si on veut récupérer, il faut envoyer du JSON
 */
function getMessages(){
    $connect = connection();

  // 1. On requête la base de données pour sortir les 20 derniers messages
  $resultats = $connect->query("SELECT * FROM messages ORDER BY id DESC  LIMIT 12 WHERE to_id = ".$_SESSION['idContactSelected'] );
  // 2. On traite les résultats
  $messages = $resultats->fetchAll();
  // 3. On affiche les données sous forme de JSON
  echo json_encode($messages);
}
/**
 * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
 */
function postMessage(){
  // 1. Analyser les paramètres passés en POST (author, content)
  $connect = connection();
  if(!array_key_exists('content', $_POST)){
    echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
    return;
  }


  $content = $_POST['content'];
  // 2. Créer une requête qui permettra d'insérer ces données
  $query = "INSERT INTO messages( from_id, to_id, content, creat_at) VALUES (:author,:destinataire,:content,2017)";
  $prep = $connect->prepare($query);
  $prep->bindParam(':author', $_SESSION['idUser']);
  $prep->bindParam(':destinataire', $_SESSION['idContactSelected']);
  $prep->bindParam(':content', $content);
  $prep->execute();
  $prep->closeCursor();
  $prep = NULL;
  //$query = $db->prepare('INSERT INTO messages SET author = :author, content = :content, created_at = NOW()');

}

?>