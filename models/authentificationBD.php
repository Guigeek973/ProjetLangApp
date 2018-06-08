<?php


include ('../library/gestion_BD.php');


function addToBD() {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $mail = $_POST['email'];
        $password = $_POST['password-register'];
        $passwordV = $_POST['confirm-password'];
        $select1 = $_POST['natal'];

        $select2 = $_POST['langSouhait1'];
        $select3 = $_POST['langSouhait2'];
        $select4 = $_POST['langSouhait3'];
        $select5 = $_POST['nivSouhait1'];
        $select6 = $_POST['nivSouhait2'];
        $select7 = $_POST['nivSouhait3'];

        $connect = connection();
        try {
            if (isset($lastname) && isset($firstname) && isset($mail) && isset($password) && isset($passwordV) && $password == $passwordV) {
                $query0 = 'SELECT email FROM user WHERE email=:mail';
                $prep0 = $connect->prepare($query0);
                $prep0->bindParam(':mail', $mail);
                $prep0->execute();
                $mailBD = $prep0->fetchColumn();
                if ($mailBD != $mail) {
                    $query = 'INSERT INTO user(name,firstname,email,password,natal) VALUES (:lastname,:firstname,:mail,:password,:natal)';
                    $prep = $connect->prepare($query);
                    $prep->bindParam(':firstname', $firstname);
                    $prep->bindParam(':lastname', $lastname);
                    $prep->bindParam(':mail', $mail);
                    $passwordCoded = md5($password);
                    $prep->bindParam(':password', $passwordCoded);//$passwordCoded);
                    $prep->bindParam(':natal', $select1);
                    $prep->execute();
                    $prep->closeCursor();
                    $prep = NULL;

                    $query0 = 'SELECT id FROM user WHERE email=:mail';
                    $prep0 = $connect->prepare($query0);
                    $prep0->bindParam(':mail', $mail);
                    $prep0->execute();
                    $idUser = $prep0->fetchColumn();
                    $prep0->execute();
                    $prep0->closeCursor();
                    $prep0 = NULL;

                    $query1 = 'INSERT INTO parler(id_langue, id_level, id_user) VALUES (:souhait1,:nivSouhait1,:idUser)';
                    $prep1 = $connect->prepare($query1);
                    $prep1->bindParam(':idUser', $idUser);
                    $prep1->bindParam(':souhait1', $select2);
                    $prep1->bindParam(':nivSouhait1', $select5);
                    $prep1->execute();
                    $prep1->closeCursor();
                    $prep1 = NULL;

                    $query2 = 'INSERT INTO parler(id_langue, id_level, id_user) VALUES (:souhait2,:nivSouhait2,:idUser)';
                    $prep2 = $connect->prepare($query2);
                    $prep2->bindParam(':idUser', $idUser);
                    $prep2->bindParam(':souhait2', $select3);
                    $prep2->bindParam(':nivSouhait2', $select6);
                    $prep2->execute();
                    $prep2->closeCursor();
                    $prep2 = NULL;

                    $query3 = 'INSERT INTO parler(id_langue, id_level, id_user) VALUES (:souhait3,:nivSouhait3,:idUser)';
                    $prep3 = $connect->prepare($query3);
                    $prep3->bindParam(':idUser', $idUser);
                    $prep3->bindParam(':souhait3', $select4);
                    $prep3->bindParam(':nivSouhait3', $select7);
                    $prep3->execute();
                    $prep3->closeCursor();
                    $prep3 = NULL;

                }
            } else throw new Exception();
        } catch (Exception $e) {
            echo $e->getMessage();?>
            <script>alert("Resgistering error");</script>
            <?php
        }
    }

}

function authentificate()
{
    try {
        $mail = ($_POST['email-login']);
        if (isset($_POST['email-login']) && isset($_POST['password-login'])) {
            $connect = connection();
            $password = $_POST['password-login'];
            $passwordCoded = md5($password);
            $query1 = 'SELECT email FROM user WHERE email=:mail';
            $prep1 = $connect->prepare($query1);
            $prep1->bindParam(':mail', $mail,  PDO::PARAM_STR);
            $prep1->execute();
            $mailSql = $prep1->fetchColumn();

            if ($mailSql == $mail) {
                $prep1->closeCursor();
                $prep1 = NULL;
                $query2 = 'SELECT password FROM user WHERE email=:mail';
                $prep2 = $connect->prepare($query2);
                $prep2->bindParam(':mail', $mail, PDO::PARAM_STR);
                $prep2->execute();
                $MdpSql = $prep2->fetchColumn();
                if ($MdpSql == $passwordCoded) {//$passwordCoded) {
                    $prep2->closeCursor();
                    $prep2 = NULL;
                    session_start();
                    $_SESSION["session"] = $mail;
                    $query3 = 'SELECT id FROM user WHERE email=:mail';
                    $prep3 = $connect->prepare($query3);
                    $prep3->bindParam(':mail', $mail,  PDO::PARAM_STR);
                    $prep3->execute();
                    $idUser = $prep3->fetchColumn();
                    $_SESSION["idUser"] = $idUser;
                }
            }
        } else throw new Exception();
    } catch (Exception $e) {
        echo $e->getMessage();?>
        <script>alert("Authentication error");</script>
        <?php
    }

}

function getAllLanguagesHTML() {
    $connect = connection();
    $query1 = 'SELECT id, name from langages';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLang = $prep1->fetchAll();
    $html = "";
    for($i = 0; $i < sizeof($tabLang); $i++) {
        $html .= "<option value='". $tabLang[$i]['id'] ."'>". $tabLang[$i]['name'] ."</option>";
    }

    return $html;
}

function getAllLevelHTML() {
    $connect = connection();
    $query1 = 'SELECT id, niveau from level';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLevel = $prep1->fetchAll();
    $html = "";
    for($i = 0; $i < sizeof($tabLevel); $i++) {
        $html .= "<option value='". $tabLevel[$i]['id'] ."'>". $tabLevel[$i]['niveau'] ."</option>";
    }
    return $html;
}
?>
