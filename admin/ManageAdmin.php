<?php

/**
 * Created by PhpStorm.
 * User: evilkid
 * Date: 7/15/2016
 * Time: 3:48 AM
 */
class ManageAdmin
{
    private $db;

    private $server = "localhost";
    private $database = "myfeel";
    private $username = "root";
    private $password = "";

    public function __construct()
    {
        try {
            $this->db = new PDO(
                "mysql:host=$this->server;dbname=$this->database",
                $this->username,
                $this->password
            );
        } catch (Exception $e) {
            echo $e;
        }
    }

    /**
     *Login
     */
    public function login($username, $password)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM `admin` WHERE username=:username AND password=:password LIMIT 1");
            $stmt->execute(array(':username' => $username, ':password' => md5($password)));

            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findAllUsers()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM `users`");
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateUser($userId, $enabled)
    {
        try {
            $stmt = $this->db->prepare("UPDATE `users` SET `enabled` = :enabled WHERE `id` = :id");

            $stmt->bindParam(":enabled", $enabled, PDO::PARAM_BOOL);
            $stmt->bindParam(":id", $userId, PDO::PARAM_INT);

            $res = $stmt->execute();

            return $res;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}