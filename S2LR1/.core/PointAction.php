<?php

class PointAction
{
    public static function CreatePoint()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }

        if (isset($_POST['save_point'])) {
            $point_Sales = $_POST['point_Sales'];
        }


        PointTable::SetPoint($point_Sales);
        header("Location: indexPS.php");

    }

    public static function GetId()
    {

        $id = $_GET["id"] ?? '';
        return PointTable::GetById($id);


    }

    public static function UpdatePoints()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }

        if (isset($_POST['update_point'])) {
            $point_Sales = $_POST['point_Sales'];
            $id = $_GET['id'];
        }


        PointTable::UpdatePoints($point_Sales, $id);
        header("Location: indexPS.php");
    }

    public static function DeletePoint()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }
        if (isset($_POST['delete_point'])) {
            $id = $_POST['delete_point'];
        }

        PointTable::DeletePoints($id);
        header("Location: indexPS.php");


    }
}







