<?php

class PagesModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllPages()
    {
        $sql = "SELECT page_id, page_name, page_created, page_modified FROM pages";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function getPage($page_id)
    {
        $sql = "SELECT page_id, page_name, page_content, page_created, page_modified FROM pages WHERE page_id = :page_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':page_id' => $page_id);

        $query->execute($parameters);
        return $query->fetch();
    }

    public function addPage($page_name, $page_content)
    {
        $sql = "INSERT INTO pages (page_name, page_content, page_created, page_modified) VALUES (:page_name, :page_content, :page_created, :page_modified)";
        $query = $this->db->prepare($sql);
        $parameters = array(':page_name' => $page_name, ':page_content' => $page_content, ':page_created' => time(), ':page_modified' => time());

        $query->execute($parameters);
    }

    public function deletePage($page_id)
    {
        $sql = "DELETE FROM pages WHERE page_id = :page_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':page_id' => $page_id);

        $query->execute($parameters);

        echo $page_id;
    }

    public function updatePage($page_id, $page_name, $page_content)
    {
        $sql = "UPDATE pages SET page_name = :page_name, page_content = :page_content, page_modified = :page_modified WHERE page_id = :page_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':page_name' => $page_name, ':page_content' => $page_content, ':page_content' => $page_content, ':page_modified' => time(), ':page_id' => $page_id);

        $query->execute($parameters);
    }
}
