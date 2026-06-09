<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/S2LR1/.core/indexPS.php');
$result = PointTable::GetAllPoints();
PointAction::DeletePoint();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S2 LR1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <?php include "header.php"; ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Список точек продажи
                        <a href="add_PS.php" class="btn btn-primary float-end">Добавить точку</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Адрес</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($result

                        as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['ID']); ?></td>
                            <td><?= htmlspecialchars($item['point_Sales']); ?></td>
                            <td>
                                <a href="edit_PS.php?id=<?= $item['ID']; ?>"
                                   class="btn btn-success btn-sm">Изменить</a>
                                <form method="POST" class="d-inline">
                                    <button type="submit" value="<?= $item['ID']; ?>" name="delete_point" class="btn btn-danger btn-sm">Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php include "footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>