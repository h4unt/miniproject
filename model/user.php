<?php
class userModel extends DB {
    public function insertUser($username,$password,$email) {
        try {
        $stm = $this->conn->prepare('INSERT INTO `users`(`username`, `password`, `email`) VALUES (?,?,?)');
        $stm->execute([$username,$password,$email]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    public function checkExistUsername($username){
        $stm = $this->conn->prepare('SELECT id FROM `users` WHERE `username` = ? LIMIT 1');
        $stm->execute([$username]);
        return $stm->rowCount();
    }
    public function checkExistEmail($email){
        $stm = $this->conn->prepare('SELECT id FROM `users` WHERE `email` = ? LIMIT 1');
        $stm->execute([$email]);
        return $stm->rowCount();
    }
    public function checkLogin($username,$password){
        $stm = $this->conn->prepare('SELECT id FROM `users` WHERE `username` = ? AND `password` = ? LIMIT 1');
        $stm->execute([$username,$password]);
        return $stm->rowCount();
    }
}