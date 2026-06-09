<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/S2LR1/.core/index.php');

$product = ProductAction::GetId()[0];
$brands = ProductTable::GetBrands();
ProductAction::UpdateProducts();




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
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Изменить сет
                        <a href="index.php" class="btn btn-danger float-end">Назад</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <input type="file" placeholder="Enter name" name="img_path"
                                   value="<?= htmlspecialchars($product ['img_path']) ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Название</label>
                            <input type="text" name="productname" value="<?=  htmlspecialchars($product ['name_Client']) ?>"
                                   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Описание</label>
                            <input type="text" name="productdescription" value="<?=  htmlspecialchars($product ['description']) ?>"
                                   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Точка продажи</label>
                            <select name="id_brand" class="form-control">


                                <?php
                                foreach ($brands as $items) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($items['ID']); ?>"<?php if ($product['ID_point'] == $items['ID']) echo 'selected'; ?>><?php echo $items['point_Sales']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Стоимость</label>
                            <input type="text" name="cost" value="<?= htmlspecialchars($product ['cost']) ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update_product" class="btn btn-primary">Сохранить изменения</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>