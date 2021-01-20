<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product_form</title>
    <link rel="stylesheet" href="/assets/css/form_pro.css">
</head>
<body>



<h3>Insert Product </h3>
<div class="form__container">
    <form action="insert_product.php" method="post" id="pro_form" enctype="multipart/form-data">
    <div class="form__group">
    <input type="text" id="pro_name" name="product_name" placeholder="Name">
    <span class="errormsg"></span>
    </div>
    <div class="form__group">
    <input type="text" id="pro_desc" name="product_desc" placeholder="Description">
    <span class="errormsg"></span>
    </div>
    <div class="form__group">
    <input type="text" id="pro_price" name="product_price" placeholder="Price">
    <span class="errormsg"></span>
    </div>
    <div class="form__group">
    <input type="file" id="pro_img" name="product_image" placeholder="Image">
    <span class="errormsg"></span>
    </div>
    <div class="form__group">
    <input type="text" id="pro_quantity" name="product_quantity" placeholder="Quantity">
    <span class="errormsg"></span>

    </div>
     <div class="form-button-group">
                    <button type="submit" class="form-button" name="submit">Insert</button>
                    <button type="reset"class="form-button" name="reset">Reset</button>
                    
                </div>
    </form>
    </div>

    
    
</body>
</html>