<?php
echo "Ruta de config.php: " . __DIR__ . '/config.php' . PHP_EOL;
if (file_exists(__DIR__ . '/config.php')) {
    echo "El archivo config.php existe y es accesible." . PHP_EOL;
} else {
    echo "El archivo config.php no se encuentra en la ruta especificada." . PHP_EOL;
}

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
