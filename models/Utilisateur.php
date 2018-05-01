<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 19/01/2017
 * Time: 09:19
 */

class Utilisateur {
    private $id;
    private $lastname;
    private $firstname;
    private $mail;
    private $isConfirmed;

    function __construct($id, $lastname, $firstname, $mail) {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->mail = $mail;
        $this->isConfirmed = 0;
    }

    public function setIsConfirmed($isConfirmed) {
        $this->isConfirmed = $isConfirmed;
    }

    public function getId(){
        return $this->id;
    }
    public function getLastname() : string {
        return $this->lastname;
    }
    public function getFirstname(): string{
        return $this->firstname;
    }
    public function getMail(): string{
        return $this->mail;
    }
    public function getIsConfirmed(): int {
        return $this->isConfirmed;
    }



}