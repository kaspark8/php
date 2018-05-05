<?php

class ProductsModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllProducts()
    {
        $sql = "SELECT product_id, product_name, product_price, product_owner_id, product_created FROM products";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllUsers()
    {
        $sql = "SELECT user_id, user_name FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function getProduct($product_id)
    {
        $sql = "SELECT product_id, product_name, product_price, product_owner_id, product_created FROM products WHERE product_id = :product_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id);

        $query->execute($parameters);
        return $query->fetch();
    }

    public function addProduct($product_name, $product_price, $product_owner_id)
    {
        $sql = "INSERT INTO products (product_name, product_price, product_owner_id, product_created) VALUES (:product_name, :product_price, :product_owner_id, :product_created)";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_name' => $product_name, ':product_price' => $product_price, ':product_owner_id' => $product_owner_id, ':product_created' => time());

        $query->execute($parameters);
    }

    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM products WHERE product_id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id);

        $query->execute($parameters);

        echo $product_id;
    }

    public function updateProduct($product_id, $product_name, $product_price, $product_owner_id)
    {
        $sql = "UPDATE products SET product_name = :product_name, product_price = :product_price, product_owner_id = :product_owner_id WHERE product_id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_name' => $product_name, ':product_price' => $product_price, ':product_owner_id' => $product_owner_id, ':product_id' => $product_id);

        $query->execute($parameters);
    }
}
