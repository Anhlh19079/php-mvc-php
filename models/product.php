<?php
class Product {

   public $pro_id; 
   public $pro_name; 
   public $pro_desc; 
   public $pro_price; 
   public $pro_image; 
   public $pro_quantity; 
   public $pro_status; 

   function __construct($pro_id ,$pro_name ,$pro_desc ,$pro_price ,$pro_image ,$pro_quantity,$pro_status)
    {
        $this->pro_id=$pro_id;
        $this->pro_name=$pro_name;
        $this->pro_desc=$pro_desc;
        $this->pro_price=$pro_price;
        $this->pro_image=$pro_image;
        $this->pro_quantity=$pro_quantity;
        $this->pro_status=$pro_status;
    }

    static function getAll(){
    $list = [];
    $db = DBConnection::getInstance();
    $req = $db->query('SELECT * FROM products');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Product($item['pro_id'], $item['pro_name'], $item['pro_desc'], $item['pro_price'], $item['pro_image'], $item['pro_quantity'], $item['pro_status']);
    }

    return $list;
  }

  static function find($pro_id){
    $db = DBConnection::getInstance();
    $req = $db->prepare('SELECT * FROM products WHERE pro_id = :pro_id');
    $req->execute(array('pro_id' => $pro_id));

    $item = $req->fetch();
    if (isset($item['pro_id'])) {
      return new User($item['pro_id'], $item['pro_name'], $item['pro_desc'], $item['pro_price'], $item['pro_image'], $item['pro_quantity'], $item['pro_status']);
    }
    return null;
  }

  static function insert($pro_name ,$pro_desc ,$pro_price ,$pro_image ,$pro_quantity)
  {
    $db = DBConnection::getInstance();
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["pro_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }
    // Check file size
    if ($_FILES["pro_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
        $pro_name = $_POST['pro_name'];
        $pro_desc = $_POST['pro_desc'];
        $pro_price = $_POST['pro_price'];
        $pro_image = $target_file;
        $pro_quantity = $_POST['pro_quantity'];
        echo 'img : '.$pro_image;
        // set default status to product
        $pro_status =1;
        //Make and prepare the query
        $query = "INSERT INTO products(pro_name,pro_desc,pro_price,pro_image,pro_quantity,pro_status) VALUES(:pro_name,:pro_desc,:pro_price,:pro_image,:pro_quantity,:pro_status)";
        $stmt = $db->prepare($query);
        $re = $stmt->execute(array('pro_name' => $pro_name, 'pro_desc' => $pro_desc, 'pro_price' => $pro_price, 'pro_quantity' => $pro_quantity));
        if ($re) {
          return "Insert Ok!";
        }
        return "Insert Not Ok!";
        // run and check the query's result
        // if ($stmt->execute()) {// one record inserted
        //     echo "Inset product Ok!" ;
        // }else {//if it did not run Ok.
        //     echo $db->errno .' '. $db->error;
        //     echo "Insert product not OK!" ;
        // }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  }

}


?>