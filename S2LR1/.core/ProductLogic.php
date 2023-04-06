 <?php

class Productlogic
{
    public static function CheckPrice()
    {
        $price = $_POST['cost'];
        if ($price < 0 || $price > 1000000) {
            return false;

        }
        if (!ctype_digit($price)) {

            return false;

        }

        return true;

    }


    public static function CheckImg()
    {
        if (!isset($_FILES['img_path'])) {
            return false;
        }

        if (empty($_FILES)) {
            return false;
        }

        if (!file_exists($_FILES['img_path']['tmp_name']) || !is_uploaded_file($_FILES['img_path']['tmp_name'])) {
            return false;
        }

        $whitelist = array("image/png", "image/jpg", "image/jpeg");
        if (!in_array($_FILES['img_path']['type'], $whitelist)) {
            return false;
        }

        if ($_FILES['img_path']['size'] > 1024000) {
            return false;
        }


        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/S2LR1/catalog_images/" . $_FILES['img_path']['name'];
        move_uploaded_file($_FILES['img_path']['tmp_name'], $uploadfile);
        return true;
    }

    public static function EditImg($old_tmp_img_name)
    {
        if (empty($_FILES)) {
            return false;
        }
        if (!file_exists($_FILES['img_path']['tmp_name']) || !is_uploaded_file($_FILES['img_path']['tmp_name'])) {
            return false;
        }
        $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
        foreach ($blacklist as $item)
            if (preg_match("/$item\$/i", $_FILES['img_path']['name'])) {
                return false;

            }
        $delFile = $_SERVER['DOCUMENT_ROOT'] . "/S2LR1/catalog_images/" . $old_tmp_img_name;

        unlink($delFile);
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/S2LR1/catalog_images/" . $_FILES['img_path']['name'];
        move_uploaded_file($_FILES['img_path']['tmp_name'], $uploadfile);
        return true;


    }

    public static function DeleteImage(int $id)
    {
        $img_p = ProductTable::GetImageById($id);
        $file = $_SERVER['DOCUMENT_ROOT'] . "/S2LR1/catalog_images/" . $img_p;
        unlink($file);


    }

    public static function ErrorMessage($text)
    {
        echo "<div class='container p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end'>$text</div>";

    }


}