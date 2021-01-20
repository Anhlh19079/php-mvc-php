

<?php
include_once("models/user.php");
?>

<?php
if(session_id() ===''){
    session_start();
}
?>

<?php
$updateResult = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cust_email_login']) && isset($_POST['cust_password_login'])) {
       $loginacc= User::login($_POST['cust_email_login'], md5($_POST['cust_password_login']));
if ($loginacc == false) {

    echo '<script>alert("sai email hoac mat khau")</script>';
}
        // header("Location: " . $_SERVER['PHP_SELF']);
    } else if (isset($_POST['logout']) && $_POST['logout']) {
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - Hazomi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-5.15.1-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script src="./assets/javascript/jquery-3.5.1.min.js"></script>
</head>

<body>

    <div class="web">
        <div class="modal__layout" id="modal">
            <div class="modal__layout-overlay" id="overlay"></div>
            <div class="modal__container" id="containermd">
                <div class="form__header">
                    <button class="form__header-button" id="register">Đăng Ký</button>
                    <button class="form__header-button" id="login">Đăng Nhập</button>
                </div>                    
                <!-- <p name="result"><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo $result;}?></p> -->

                <div class="form-container sign-up-container" name="" id="signup_form">
                    <form class="form-content" id="form_register" action="<?php $_SERVER["PHP_SELF"]?>?controller=users&action=insertUser" method="POST">
                        <h1>Create Account</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span class="form__title-header">or use your email for registration</span>
                        <div class="form__group">
                            <input class="form__group-input" type="text" placeholder="Name" id="name_register" name="cust_name" onblur=" return( Checktendangnhap(event, 3, 10))" />
                            <span id="nameerror" name="nameerr"></span>

                        </div>
                        <div class="form__group">
                            <input class="form__group-input" type="email" placeholder="Email" id="email_register" class="cust_email" name="cust_email" onblur=" return ( checkemail(this.value))"  onblur=" return ( checkemail(event))" />
                            <span id="mailerror" name="mailerr">
                        </div>
                        <div class="form__group">
                            <input class="form__group-input" type="text" placeholder="Address" id="add_register" name="cust_address" />
                            <span id="adderror" name="adderr">
                        </div>
                        <div class="form__group">
                            <input class="form__group-input" type="password" placeholder="Password" id="pass_register" name="cust_password" onblur=" return( Checkpassword(event))"/>
                            <span id="passerror" name="passerr"></span>

                        </div>
                        <div class="form__group">
                            <input class="form__group-input" type="password" placeholder="Re-Password" id="re_pass_register" onblur=" return( Checkrepassword(event))" />
                            <span id="repasserror" name="repasserr"></span>

                        </div>
                        <div class="form__group form__group-button">
                            <button type="submit" class="form__button form__button-sign-up"  id="registerbtn">SignUp</button>
                            <input type="reset" class="form__button form__button-reset" value="Reset">
                        </div>
                    </form>
                </div>
                <div class="form-container sign-in-container" id="signin_form">
                    <form class="form-content" action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
                        <h1>Sign In</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span class="form__title-header">or use your account</span>
                        <div class="form__group">
                        <span class="" id="login-message"></span>
                            <input class="form__group-input" type="email" placeholder="Email" onblur="login(this.value)" name="cust_email_login" />
                            <span id="email_login_error"></span>

                        </div>
                        <div class="form__group">
                            <input class="form__group-input" type="password" placeholder="Password" onblur="login(this.value)" name="cust_password_login" />
                            <span id="pass_login_error"></span>

                        </div>
                        <div class="form__group form__group-button">
                            <button type="submit" id="signinbtn" class="form__button form__button-sign-in">Sign In</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
        <header class="header">
            <div class="grid">
                <nav class="header__logo-search row ">

                    <button class="navbar-toggler wcol-4" type="button" data-toggle="collapse"
                        data-target=".header__navbar" aria-controls="header__navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i id="show" class="header__category-icon bar-icon fas fa-bars"></i>
                    </button>
                    <div class="header__navbar-top-item logo wcol-4">
                        <a href="index.php"><div class="header__navbar-logo--width">
                            
                                <img src="./assets/img//nonicon/logo-1-1-1.png" class="header__navbar-logo-img" alt="">
                            
                        </div></a>
                    </div>
                    <div class="header__navbar-top-item  header-search-block">
                        <div class="header__navbar-top-item-block block-select">
                            <select name="" id="" class="header__navbar-select--size select">
                                <option class="option-name" value="" selected="selected">All</option>
                                <option class="option-name" value="bach-hoa-online">Bách Hoá Online</option>
                                <option class="option-name" value="cham-soc-thu-cung">Chăm sóc thú cưng</option>
                                <option class="option-name" value="do-choi">Đồ Chơi</option>
                                <option class="option-name" value="giat-giu-cham-soc-nha-cua">Giặt giũ & Chăm sóc nhà
                                    cửa</option>
                                <option class="option-name" value="nha-sach-online">Nhà Sách Online</option>
                                <option class="option-name" value="o-to-xe-may-xe-dap">Ô tô - xe máy - xe đạp</option>
                                <option class="option-name" value="san-pham-ban-chay">Sản phẩm bán chạy</option>
                                <option class="option-name" value="the-thao-du-lich">Thể Thao & Du Lịch</option>
                                <option class="option-name" value="thiet-bi-dien-gia-dung">Thiết Bị Điện Gia Dụng
                                </option>
                                <option class="option-name" value="thoi-trang-tre-em">Thời Trang Trẻ Em</option>
                                <option class="option-name" value="phu-kien-thoi-trang">Phụ Kiện Thời Trang</option>
                                <option class="option-name" value="khuyen-mai-goc">Khuyến mãi lớn</option>
                                <option class="option-name" value="thoi-trang-nam">Thời Trang Nam</option>
                                <option class="option-name" value="giay-dep-nam">Giày Dép Nam</option>
                                <option class="option-name" value="thoi-trang-nu">Thời trang nữ</option>
                                <option class="option-name" value="dien-thoai-phu-kien">Điện Thoại & Phụ Kiện</option>
                                <option class="option-name" value="me-va-be">Mẹ và Bé</option>
                                <option class="option-name" value="thiet-bi-dien-tu">Thiết Bị Điện Tử</option>
                                <option class="option-name" value="nha-cua-doi-song">Nhà Cửa & Đời Sống</option>
                                <option class="option-name" value="may-tinh-laptop">Máy tính & Laptop</option>
                                <option class="option-name" value="suc-khoe-sac-dep">Sức Khỏe & Sắc Đẹp</option>
                                <option class="option-name" value="may-anh-may-quay-phim">Máy ảnh - Máy quay phim
                                </option>
                                <option class="option-name" value="giay-dep-nu">Giày Dép Nữ</option>
                                <option class="option-name" value="dong-ho">Đồng Hồ</option>
                                <option class="option-name" value="tui-vi">Túi Ví</option>
                            </select>
                        </div>
                        <div class="header__navbar-top-item-block block-search">
                            <input type="text" class="header__navbar-item-input" placeholder="Tìm kiếm sản phẩm...">
                        </div>
                        <div class="header__navbar-top-item-block block-button">
                            <button type="submit" class="header__navbar-item-button">
                                <i class="icon-search fas fa-search"></i> </button>
                        </div>
                    </div>
                    <div class="header__navbar-top-item block-hidden wcol-4">
                        <?php
                        if (!isset($_SESSION['cust_email'])) {
                        ?>
                        <div id="formlayout" onclick="appear()" class="header__navbar-list header__navbar-main-link">

                            <div class="header__navbar-item ">
                                <button class="header__navbar-item-link header__navbar-item-btn">
                                    <span id="linkform-login" class="title-auth">Đăng Nhập</span>
                                </button>
                            </div>
                            <div class="navbar__link-separator"></div>
                            <div class=" header__navbar-item ">
                                <button class="header__navbar-item-link header__navbar-item-btn">
                                    <span id="linkform-rgt" class="title-auth">Đăng ký</span>
                                </button>
                            </div>
                           
                        </div>
                        <?php
                            } else {
                        ?>
                     <li id="flagElement" class="header__navbar-item max-height header__navbar-item--has-child">
                        <a href="" class="header__navbar-item-link max-height">
                            <div class="header__avatar">
                                <img src="../assets/img/fe-male/7.jpg" alt="" class="header__avatar-img">
                            </div>
                            <span class="header__user">
                                <?php echo $_SESSION['cust_name'] ?>
                            </span>
                        </a>
                        <ul class="user__action-list triangle">
                            <li class="user_action-item">
                                <a href="#" class="user__action-item-link">
                                    Tài khoản của tôi
                                </a>
                            </li>
                            <li class="user_action-item">
                                <a href="index.php?controller=users&action=update&id=<?php echo $_SESSION['cust_id']; ?>" class="user__action-item-link">
                                    Chỉnh sửa thông tin
                                </a>
                            </li>
                            <li class="user_action-item">
                                <form action="" method="post">
                                    <button type="submit" value="true" name="logout" class="b-0 user__action-item-link">
                                        Đăng Xuất
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                 <?php
                } 
                ?> 
                        <img src="./assets/img/icon/icons8-basket-64 (1).png" alt=""
                            class="header__navbar-item header__cart-img">
                    </div>
                </nav>

            </div>
        </header>
        <div class="headerfake">
            <div class="gridfake">
                <div class="header__navbar">

                    <div id="header__navbar-show" class="header__navbar-2">
                        <div class="header__navbar-category-left">
                            <div class="header__navbar-item header__navbar-category header__navbar-category-item">
                                <i class="header__category-icon bar-icon fas fa-bars"></i>
                                <span class="header__category">DANH MỤC SẢN PHẨM</span>
                            </div>
                            <ul id="dropul" class="header__navbar-list header__category-list">
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fire-icon fa fa-fire"></i>
                                        <span class="header__category-name">Thời Trang Nam</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fas fa-female"></i>
                                        <span class="header__category-name">Thời Trang Nữ</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fa fa-shopping-bag"></i>
                                        <span class="header__category-name">Túi Ví</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fa fa-cart-plus"></i>
                                        <span class="header__category-name">Giày Dép Nam</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fa fa-universal-access"></i>
                                        <span class="header__category-name">Giày Dép Nữ</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fa fa-heartbeat"></i>
                                        <span class="header__category-name ">Mẹ Và Bé</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon far fa-clock"></i>
                                        <span class="header__category-name">Đông Hồ</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fa fa-eye"></i>
                                        <span class="header__category-name">Phụ Kiện Thời Trang</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon fa fa-headphones"></i>
                                        <span class="header__category-name">Sức Khỏe Và Sắc Đẹp</span>
                                    </a>

                                </li>
                                <li class="header__category-item">
                                    <a href="#" class="header__category-item-link">
                                        <i class="header__category-icon far fa-gem"></i>
                                        <span class="header__category-name">Nhà Cửa & Đời Sống</span>
                                    </a>

                                </li>
                            </ul>
                        </div>

                        <ul class="header__navbar-list header__navbar-main-link">
                            <li class="header__navbar-item header__navbar-item--nonspace">
                                <a href="#" class="header__navbar-item-link">Trang Chủ</a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="#" class="header__navbar-item-link">Tất Cả Sản Phẩm</a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="#" class="header__navbar-item-link">Giới Thiệu</a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="#" class="header__navbar-item-link">Nhập Sỉ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__navbar-list header__navbar-2">
                        <div class="header__navbar-item header__navbar-cart">
                            <span class="header__cart">Giỏ hàng</span>
                            <img src="./assets/img/icon/icons8-basket-64 (1).png" alt=""
                                class="header__navbar-item header__cart-img">
                        </div>
                    </div>


                </div>
            </div>
        </div>
        