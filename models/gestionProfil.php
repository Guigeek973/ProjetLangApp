<?php

include ('../library/gestion_BD.php');

function getInfosProfil() {
    $connect = connection();
    $query1 = 'SELECT username,firstname,lastname,mail,natal,souhait1,souhait2,souhait3,niv_souhait1,niv_souhait2,niv_souhait3 FROM Users WHERE mail=:mail';
    $prep1 = $connect->prepare($query1);
    $prep1->bindParam(':mail', $_SESSION["session"],  PDO::PARAM_STR);
    $prep1->execute();
    $tabInfos = $prep1->fetch(PDO::FETCH_ASSOC);


    return $tabInfos;
}
function checkPhoto(){
    //répertoire de déstination
    $target_dir = "Storage/";
    $_FILES["fileselect"]["name"]=$_SESSION['idUser'];
    $name=basename($_FILES["fileselect"]["name"])
    $target_file = $target_dir . $name ;
    //on initialise la variable update ok
    $uploadOk = 1;
    //on recup l'extention du fichier
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    //on a cliqué sur le bouton qui s'appel submit
    if(isset($_POST["submit"])) {
        //fichier image?
        $check = getimagesize($_FILES["fileselect"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $message = "Le fichier n'est pas une image valide.";
            echo $message;
            $uploadOk = 0;
        }
    }
    // le fichier existe déjà?
    if (file_exists($target_file)) {
        $message = "Erreur! le fichier image existe déjà.";
        echo $message;
        $uploadOk = 0;
    }
    // le poid de l'image
    if ($_FILES["fileselect"]["size"] > 500000) {
        $message = "Le fichier selectionné est trop volumineux.";
        echo $message;
        $uploadOk = 0;
    }
    // les formats autorisés
    if($imageFileType != "jpg" &&$imageFileType != "JPG"&& $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" && $imageFileType != "GIF") {

        $message = "Les images doivent etre au format: JPG, JPEG, PNG ou GIF.";
        echo $message;
        $uploadOk = 0;
    }
    // erreur
    if ($uploadOk == 0) {
        $message = "Erreur! impossible d'ajouter l'image.";
        echo $messag);

        // pas d'erreur, on procède à l'enregistrement de la photo
    } else {
        //supprime la photo existante
        if(is_file($target_dir . $name)){
            unlink($target_dir . $name);
        }
        // enregiste la photo
        if (move_uploaded_file($_FILES["fileselect"]["tmp_name"], $target_file)) {

            $connect=connection();

            $query1 = 'DELETE all FROM Users WHERE Stockage=:chemin ';
            $prep1 = $connect->prepare($query1);
            $prep1->bindParam(':chemin', $target_file,  PDO::PARAM_STR);
            $prep1->execute();

            $query2 = 'INSERT INTO photo (NomFichier, Stockage, Taille) VALUES (:nom,:chemin,:taille)  ';
            $prep2 = $connect->prepare($query1);
            $prep2->bindParam(':nom',$_FILES["fileselect"]["name"],':chemin', $target_file, ':taille', $_FILES["fileselect"]["size"]  PDO::PARAM_STR);
            $prep2->execute();
            $message = "Image ajoutée avec succès.";

            echo $message;

        } else {
            $message = "Erreur inconnue! Merci de retenter l'ajout plus tard ou de contacter l'administrateur.";
            echo $message;
        }

    }

}
