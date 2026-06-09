<?php

class ProductTable
{

    public static function SetProduct(string $img_path, string $productname, string $productdescription, int $id_material, int $cost)
    {
        $stmt = Database::prepare("INSERT INTO orders ( img_path, name_Client,  description, ID_point, cost) VALUES (:img_path, :productname, :productdescription, :id_brand, :cost)");
        $stmt->bindValue('img_path', $img_path);
        $stmt->bindValue('productname', $productname);
        $stmt->bindValue('productdescription', $productdescription);
        $stmt->bindValue('id_brand', $id_material);
        $stmt->bindValue('cost', $cost);

        if (!$stmt->execute()) {
            throw new PDOException('При добавлении товара возникла ошибка');
        }

    }

    public static function GetAllProducts()
    {

        $stmt = Database::prepare("SELECT  orders.ID, img_path, name_Client, point_Sales, description, cost FROM  orders INNER JOIN pointsales ON ID_point = pointsales.ID ORDER BY orders.ID");
        if (!$stmt->execute()) {
            throw new PDOException('При отображении товара возникла ошибка');
        }

        $items = $stmt->fetchAll();
        return $items;


    }

    public static function GetById(int $id)
    {

        $stmt = Database::prepare("SELECT * FROM orders WHERE ID= :id");
        $stmt->bindValue('id', $id);

        if (!$stmt->execute()) {
            throw new PDOException('Товар с таким id не найден');
        }
        $products = $stmt->fetchAll();
        return $products;


    }

    public static function GetBrands()
    {

        $stmt = Database::prepare("SELECT * FROM pointsales");
        if (!$stmt->execute()) {
            throw new PDOException('Такой точки продажи нет');
        }
        $brands = $stmt->fetchAll();
        return $brands;
    }

    public static function UpdateProducts(string $img_path, string $productname, string $productdescription, int $id_material, int $cost, int $id)
    {

        $stmt = Database::prepare("UPDATE orders SET img_path = :i, name_Client = :q, ID_point = :t, description = :d, cost = :c WHERE ID = :id");
        
        $stmt->bindValue(":t", $id_material);
        $stmt->bindValue(":i", $img_path);
        $stmt->bindValue(":d", $productdescription);
        $stmt->bindValue(":c", $cost);
        $stmt->bindValue(":q", $productname);
        $stmt->bindValue(":id", $id);
        if (!$stmt->execute()) {
            throw new PDOException('Не удалось обновить данные о товаре');
        }


    }

    public static function DeleteProducts(int $id)
    {

        $stmt = Database::prepare("DELETE FROM orders WHERE ID = :id");
        $stmt->bindValue(":id", $id);
        if (!$stmt->execute()) {
            throw new PDOException('Не удалось удалить товар');
        }


    }

    public static function GetImageById(int $id)
    {

        $stmt = Database::prepare("SELECT img_path FROM orders WHERE ID= :id");
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $items = $stmt->fetchAll();
        return $items[0]['img_path'];


    }


}

