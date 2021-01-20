<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');

class ProductsController extends BaseController{
    function __construct() {
        $this->folder = 'products';
      }

      public function index() {
        $products = Product::getAll();
        $data = array('products' => $products);
        $this->render('index', $data);
      }
    
      public function showPro() {
        $product = Product::find($_GET['pro_id']);
        $data = array('product' => $product);
        $this->render('product_details', $data);
      }
    
      public function insertPro(){
        $result =[];
        {
            if(isset($_POST['pro_name'])&&isset($_POST['pro_desc'])&&isset($_POST['pro_price'])&&isset($_POST['pro_image'])&&isset($_POST['pro_quantity']))
            $result = Product::insert($_POST['pro_name'],$_POST['pro_desc'],$_POST['pro_price'],$_POST['pro_image'],$_POST['pro_quantity']);
    
        }
        
        $data = array('result' => $result);
        $this->render('product_add_form',$data);
      }

}


?>