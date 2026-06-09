<?php

class ProductAction
{
    public static function CreateProduct()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }
        if (!ProductLogic::CheckPrice()) {
            Productlogic::ErrorMessage("Некоректная цена");
            return false;

        }

        if (!ProductLogic::CheckImg()) {
            Productlogic::ErrorMessage("Проблема с загрузкой файла");
            return false;

        }

        if (isset($_POST['save_product'])) {

            $img_path = (isset($_FILES['img_path']['name'])) ? $_FILES['img_path']['name'] : "";
            $productname = $_POST['productname'];
            $productdescription = $_POST['productdescription'];
            $id_brand = $_POST['id_brand'];
            $cost = $_POST['cost'];

        }


        ProductTable::SetProduct($img_path, $productname, $productdescription, $id_brand, $cost);
        header("Location: index.php");

    }

    public static function GetId()
    {

        $id = $_GET["id"] ?? '';
        return ProductTable::GetById($id);


    }

    public static function UpdateProducts()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }
        if (!ProductLogic::CheckPrice()) {
            Productlogic::ErrorMessage("Некоректная цена");
            return false;

        }
        $old_img = ProductTable::GetImageById($_GET['id']);
        if (!ProductLogic::EditImg($old_img)) {
            Productlogic::ErrorMessage("Картинка не может быть обновлена");
            return false;
        }


        if (isset($_POST['update_product'])) {

            $img_path = (isset($_FILES['img_path']['name'])) ? $_FILES['img_path']['name'] : "";
            $productname = $_POST['productname'];
            $productdescription = $_POST['productdescription'];
            $id_brand = $_POST['id_brand'];
            $cost = $_POST['cost'];
            $id = $_GET['id'];
        }


        ProductTable::UpdateProducts($img_path, $productname, $productdescription, $id_brand, $cost, $id);
        header("Location: index.php");
    }

    public static function DeleteProduct()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }
        if (isset($_POST['delete_product'])) {
            $id = $_POST['delete_product'];
        }


        Productlogic::DeleteImage($id);
        ProductTable::DeleteProducts($id);
        header("Location: index.php");


    }
}







