<?php
require_once('../model/product.model.php');
require_once('../view/api-view.php');
require_once('../model/user.model.php');  // Asegúrate de que esto también esté correcto si es necesario

class ProductController
{
    private $modelProducts;
    private $view;
    private $model;

    public function __construct()
    {
        $this->modelProducts = new ProductsModel();
        $this->model = new Model();
        $this->view = new APIView();
    }

    public function getAllProducts()
    {
        $products = $this->modelProducts->getAllProducts();
        if ($products) {
            $this->view->response($products, 200);
        } else {
            $this->view->response("No products found", 404);
        }
    }
}
?>
