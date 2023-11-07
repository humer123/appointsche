<?php
include_once('database.php');

class authentication
{
    public function login($email, $password)
    {
        return $this->loginFunction($email, $password);
    }

    public function register($fullname, $email, $password)
    {
        return $this->registerFunction($fullname, $email, $password);
    }

    private function loginFunction($email, $password)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->loginQuery());
                $query->execute(array($email, md5($password)));
                $role = null;
                while ($row = $query->fetch()) {
                    $role = $row['role'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['profile'] = $row['profile'];
                    $_SESSION['fullname'] = $row['fullname'];
                }
                return $role;
            } else {
                return 501; //Connection not connected
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function registerFunction($fullname, $email, $password)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->registerQuery());
                $query->execute(array($fullname, $email, md5($password)));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200; //Successful
                } else {
                    return 401; //Error
                }
            } else {
                return 501; // Connection not Connected
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function loginQuery()
    {
        return "SELECT * FROM `users` WHERE `email` = ? AND `password` = ?";
    }

    private function registerQuery()
    {
        return "INSERT INTO `users`(`fullname`, `email`, `password`) VALUES(?,?,?)";
    }
}
