<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 18/01/2017
 * Time: 14:46
 */

class ListeAttente {
    private $users;

    public function __construct() {
        $this->users = array();
    }

    public function addUser($user) {
        array_push($this->users, $user);
    }
    /**
     * @return Utilisateur[]
     */
    public function getUsers(): array {
        return $this->users;
    }
}