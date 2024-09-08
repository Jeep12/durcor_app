<?php
require_once ("api/model/product.model.php");
require_once ("api/view/api-view.php");

class ProductController
{
    private $modelProducts;
    private $view;  
  private $data;
    public function __construct()
    {
        $this->modelProducts = new ProductsModel();
        $this->data = file_get_contents("php://input");

        $this->view = new APIView();
    }

    public function get_data(){
      return json_decode($this->data);
    }
    public function getAllProducts()
    {
      $products = $this->modelProducts->getAllProducts();
      if($products){
        $this->view->response($products,200);
      }
    }
}
?>
