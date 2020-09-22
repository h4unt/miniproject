<?php
class userModel extends DB {
    public function insertUser($username,$password,$email,$birthday) {
        $stm = $this->conn->prepare('INSERT INTO `users`(`username`, `password`, `email`, `birthday`) VALUES (?,?,?,?)');
        $stm->execute([$username,$password,$email,$birthday]);
    }
    public function editUser($username,$password,$email,$birthday){
        try {
            $stm = $this->conn->prepare('UPDATE `users` SET `password` = ?, `email` =? , `birthday` = ? WHERE `username` = ? LIMIT 1');
            $stm->execute([$password,$email,$birthday,$username]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    public function getListUsers() {
        $stm = $this->conn->prepare('SELECT * FROM `users` ORDER BY `id` DESC');
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    public function getByName($username){
        $stm = $this->conn->prepare('SELECT * FROM `users` WHERE `username` = ? LIMIT 1');
        $stm->execute([$username]);
        return $stm->fetch(PDO::FETCH_OBJ);;
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
    public function delete($sername){
        $stm = $this->conn->prepare('DELETE FROM `users` WHERE `username` = ? LIMIT 1');
        $stm->execute([$sername]);       
    }

}