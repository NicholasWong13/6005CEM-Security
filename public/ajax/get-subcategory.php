<?php
use Phppot\Category;

if (! empty($_POST["category-id"])) {
    require_once __DIR__ . '/../Model/Category.php';
    $categoryModel = new Category();
    $subcategoryResult = $categoryModel->getAllSubcategory($_POST["category-id"]);
    $html = '<div class="h5 font-weight-bold w-75 px-3 p-2">' . $_POST["name"] . ' > Subcategories</div><div class="w-25 text-right px-3 p-2 close" id="closeWindow">X</div>';
    if (! empty($subcategoryResult)) {
        foreach ($subcategoryResult as $k => $v) {
            $html .= "<div class='col-md-3'><div class='text-center'><img src='" . $subcategoryResult[$k]["image_path"] . "' id='" . $subcategoryResult[$k]["id"] . "' class='rounded mt-3'><div class='text-center font-weight-bold mt-3 mb-3'>" . $subcategoryResult[$k]["sub_category_name"] . "</div></div></div>";
        }
    }
    print($html);
    exit();
}