<?php

class PointTable
{

    public static function SetPoint(string $point_Sales)
    {
        $stmt = Database::prepare("INSERT INTO pointsales ( point_Sales) VALUES (:point_Sales)");
        $stmt->bindValue('point_Sales', $point_Sales);

        if (!$stmt->execute()) {
            throw new PDOException('При добавлении точки возникла ошибка');
        }

    }

    public static function GetAllPoints()
    {

        $stmt = Database::prepare("SELECT * FROM pointsales ORDER BY ID");
        if (!$stmt->execute()) {
            throw new PDOException('При отображении точки возникла ошибка');
        }

        $items = $stmt->fetchAll();
        return $items;


    }

    public static function GetById(int $id)
    {

        $stmt = Database::prepare("SELECT * FROM pointsales WHERE ID= :id");
        $stmt->bindValue('id', $id);

        if (!$stmt->execute()) {
            throw new PDOException('Точка с таким id не найдена');
        }
        $points = $stmt->fetchAll();
        return $points;


    }

    public static function UpdatePoints(string $point_Sales, int $id)
    {

        $stmt = Database::prepare("UPDATE pointsales SET point_Sales = :ps WHERE ID = :id");

        $stmt->bindValue(":ps", $point_Sales);
        $stmt->bindValue(":id", $id);
        if (!$stmt->execute()) {
            throw new PDOException('Не удалось обновить данные о точке');
        }
    }

    public static function DeletePoints(int $id)
    {

        $stmt = Database::prepare("DELETE FROM pointsales WHERE ID = :id");
        $stmt->bindValue(":id", $id);
        if (!$stmt->execute()) {
            throw new PDOException('Не удалось удалить точку');
        }
    }
}
