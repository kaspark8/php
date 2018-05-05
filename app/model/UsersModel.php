<?php

class UsersModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllUsers()
    {
        $sql = "SELECT user_id, user_name, user_created FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getUser($user_id)
    {
        $sql = "SELECT user_id, user_name, user_email, user_type, user_created FROM users WHERE user_id = :user_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        $query->execute($parameters);
        return $query->fetch();
    }

    public function getLoginUser($user_name)
    {
        $sql = "SELECT user_id, user_name, user_email, user_pass, user_type FROM users WHERE user_name = :user_name LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_name' => $user_name);

        $query->execute($parameters);
        return $query->fetch();
    }

    public function addUser($user_name, $user_email, $user_pass)
    {
        $sql = "INSERT INTO users (user_name, user_email, user_pass, user_created) VALUES (:user_name, :user_email, :user_pass, :user_created)";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_name' => $user_name, ':user_email' => $user_email, ':user_pass' => $user_pass, ':user_created' => time());

        $query->execute($parameters);
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        $query->execute($parameters);
    }

    public function updateUser($user_id, $user_name, $user_email, $user_type)
    {
        $sql = "UPDATE users SET user_name = :user_name, user_email = :user_email, user_type = :user_type WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_name' => $user_name, ':user_email' => $user_email, ':user_type' => $user_type, ':user_id' => $user_id);

        $query->execute($parameters);
    }

    public function updateProfile($user_id, $user_name, $user_pass, $user_email)
    {
        $sql = "UPDATE users SET user_name = :user_name, user_pass = :user_pass, user_email = :user_email WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_name' => $user_name, ':user_pass' => $user_pass, ':user_email' => $user_email, ':user_id' => $user_id);

        $query->execute($parameters);
    }
}
