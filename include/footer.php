<div class="serapation-ctn-ft "
    style="height: 4.4rem;width: 100%;background-image: url(./assets/img/redbg\ \(1\).png); ">
</div>
<footer class="footer ">
    <div class="grid ">
        <div class="footer__wrap ">
            <div class="col ">
                <div class="col-inner ">
                    <div class="grow-to-pad gird__row ">
                        <div class="footer__block-item col-3 ">
                            <h4 class="footer__block-header ">Giới thiệu</h4>
                            <ul class="footer__block-list ">
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Về Hazomi</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Chính sách đại lý</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Blog Hazomi</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer__block-item col-3 ">
                            <h4 class="footer__block-header ">Chính sách công ty</h4>
                            <ul class="footer__block-list ">
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Hình thức thanh toán</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Chính Sách Bảo Mật</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Chính sách đổi trả hàng</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Qui Trình Đổi Trả</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Chính sách bảo hành</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Chính sách giao hàng</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer__block-item col-3 ">
                            <h4 class="footer__block-header ">Chấp nhận thanh toán:</h4>
                            <ul class="footer__block-list deactive ">
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Thanh toán khi nhận hàng</a>
                                </li>
                                <li class="block-item ">
                                    <a href=" " class="item-link ">Thanh toán bằng hình thức chuyển khoản</a>
                                </li>
                            </ul>
                            <div class="footer__block-connect ">
                                <h4 class="footer__block-header ">Kết nối với chúng tôi</h4>
                                <div class="lc-connect ">
                                    <a href="#" class="connect-link-facebook ">
                                        <i class="connect-icon fab fa-facebook "></i>
                                    </a>
                                    <a href="#" class="connect-link-email ">
                                        <i class="connect-icon circle fas fa-envelope "></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="footer__block-item col-3 ">
                            <h4 class="footer__block-header ">Hệ thống cửa hàng</h4>
                            <strong>Hồ Chí Minh</strong>
                            <ul class="lc-list ">
                                <li class="local ">
                                    <span>Tầng 12 Vincom Center, Lê Thánh Tôn, Phường Bến Nghé, Quận 1, Hồ Chí
                                        Minh</span>
                                </li>
                            </ul>
                            <strong>Hà Nội</strong>
                            <ul class="lc-list ">
                                <li class="local ">
                                    <span>203 LOTTE Center, Minh Khai, Hai Bà Trưng, Hà Nội</span>
                                </li>
                            </ul>
                            <strong>Đà nẵng</strong>
                            <ul class="lc-list ">
                                <li class="local ">
                                    <span>910A Indochina Riverside Mall, Ngô Quyền, An Hải Bắc, Sơn Trà, Đà
                                        Nẵng</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="black-line grid__full-withs "></div>

</footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
    integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ=="
    crossorigin="anonymous"></script>

<script src="./assets/javascript/forform.js"></script>
<script src="./assets/javascript/form_register.js"></script>
<script src="./assets/javascript/jquery-3.5.1.min.js"></script>
    <script>
function checkemail(cust_email) {
    $.post('checkemail_exits_only.php', {
        'cust_email': cust_email
    }, function(data) {
        if (data == "true") {

            $("#mailerror").text("Email already exists!");
            $("#registerbtn").attr({
                "disabled": ''
            });
        } else {
            $("#mailerror").text("");
            $("#registerbtn").removeAttr("disabled");
        }
    });

    // 
}

function acc_login() {
    

    // 
}


        
        
            



//validate register form

//

    </script>
</body>

</html>