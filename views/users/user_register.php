<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Successfull</title>
</head>

<body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<div style="height:250px;background-image: url(assets/img/bgrcm.jpg);background-repeat: no-repeat;background-size: cover;">';

         echo '<div style="    text-align: center;
         display: flex;
         justify-content: center;
         align-items: center;
         font-size: 32px;
         color: #f20e74;
         height: 100px;">'.$result.'</div>';
         echo '<a href="index.php"style="    text-align: center;
         display: flex;
         justify-content: center;
         align-items: center;
         font-size: 32px;
         color: blue;
         text-decoration: underline;
         " >Back to Home?</a>';
         echo '</div>';
    }
    ?>
    
</body>

</html>