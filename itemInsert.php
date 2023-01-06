<?php

session_start();
require_once "./Model/Prduct.php";
$prod = new Prduct();






if ($_GET['action'] === "insert") {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        echo $_POST['status'];


        if (isset($_POST['save'])) {

            $prod->item_NAME = $_POST['Product'];
            $prod->supplier = $_POST['supplier'];
            $name = $prod->getSingleProd();


            $prod->item_NAME = $_POST['Product'];
            $exist = $prod->getSingleProd();
            if ($exist > 0) {
                $_SESSION['PRODNAME'] = "1";
                header("Location: Product.php");
            } else {


                if (!is_dir("images")) {
                    mkdir("images");
                }


                function randoms($n)
                {
                    $charac = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $str = "";
                    for ($i = 0; $i < $n; $i++) {
                        $index = rand(0, strlen($charac) - 1);
                        $str .= $charac[$index];
                    }
                    return $str;
                }

                $image = $_FILES['image'] ?? null;

                $fullpath = "";

                if ($image && $image['tmp_name']) {



                    $path = "images/";
                    $folder = randoms(8) . "/";
                    $ImName = $image['name'];

                    $fullpath = $path . $folder . $ImName;
                    mkdir(dirname($fullpath));

                    move_uploaded_file($image['tmp_name'], $fullpath);
                }

                $catId = $_POST['category'];
                $suppId = $_POST['supplier'];
                $prod->prod = $_POST['Product'];
                $prod->desc = $_POST['Descrip'];
                $prod->price = $_POST['Price'];
                $prod->quantity = $_POST['Quantity'];
                $prod->code = $_POST['Code'];
                $prod->img = $fullpath;
                $prod->category = $catId;
                $prod->supplier = $suppId;
                $prod->status = $_POST['status'];

                if ($prod->insertItem()) {
                    header("Location: Product.php");
                };
            }
        }
    }
}
