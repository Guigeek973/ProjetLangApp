<?php


include ('../library/gestion_BD.php');

function addToBD() {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $id = $_POST['username'];
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
            if (isset($id) && isset($lastname) && isset($firstname) && isset($mail) && isset($password) && isset($passwordV) && $password == $passwordV) {
                $query0 = 'SELECT mail FROM Users WHERE mail=:mail';
                $prep0 = $connect->prepare($query0);
                $prep0->bindParam(':mail', $mail);
                $prep0->execute();
                $mailBD = $prep0->fetchColumn();
                if ($mailBD != $mail) {
                    $query = 'INSERT INTO Users(username,firstname,lastname,mail,password,natal,souhait1,souhait2,souhait3,niv_souhait1,niv_souhait2,niv_souhait3) VALUES (:id,:firstname,:lastname,:mail,:password,:natal,:souhait1,:souhait2,:souhait3,:nivSouhait1,:nivSouhait2,:nivSouhait3)';
                    $prep = $connect->prepare($query);
                    $prep->bindParam(':id', $id);
                    $prep->bindParam(':firstname', $firstname);
                    $prep->bindParam(':lastname', $lastname);
                    $prep->bindParam(':mail', $mail);
                    $passwordCoded = md5($password);
                    $prep->bindParam(':password', $passwordCoded);//$passwordCoded);
                    $prep->bindParam(':natal', $select1);
                    $prep->bindParam(':souhait1', $select2);
                    $prep->bindParam(':souhait2', $select3);
                    $prep->bindParam(':souhait3', $select4);
                    $prep->bindParam(':nivSouhait1', $select5);
                    $prep->bindParam(':nivSouhait2', $select6);
                    $prep->bindParam(':nivSouhait3', $select7);
                    $prep->execute();
                    $prep->closeCursor();
                    $prep = NULL;
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
            $query1 = 'SELECT mail FROM Users WHERE mail=:mail';
            $prep1 = $connect->prepare($query1);
            $prep1->bindParam(':mail', $mail,  PDO::PARAM_STR);
            $prep1->execute();
            $mailSql = $prep1->fetchColumn();

            if ($mailSql == $mail) {
                $prep1->closeCursor();
                $prep1 = NULL;
                $query2 = 'SELECT password FROM Users WHERE mail=:mail';
                $prep2 = $connect->prepare($query2);
                $prep2->bindParam(':mail', $mail, PDO::PARAM_STR);
                $prep2->execute();
                $MdpSql = $prep2->fetchColumn();
                if ($MdpSql == $passwordCoded) {//$passwordCoded) {
                    $prep2->closeCursor();
                    $prep2 = NULL;
                    session_start();
                    $_SESSION["session"] = $mail;
                }
            }
        } else throw new Exception();
    } catch (Exception $e) {
        echo $e->getMessage();?>
        <script>alert("Authentication error");</script>
        <?php
    }

}
?>
