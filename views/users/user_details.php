


<!-- <?php
if(session_id() ===''){
    session_start();
}
?> -->

<div style="display:flex;    width: 484px;
    max-width: 100%;
    display: flex;
    justify-content: center;
    margin: auto;flex-direction: column;
    text-align: center;">
    <h1 >
 Thông Tin Cá Nhân
</h1>
<div class="fill_show" style=""></div>
<div class="show">Name :<?php echo $user->cust_name?></div>
<div class="show">Email :<?php echo $user->cust_email?></div>
<div class="show">Address :<?php echo $user->cust_address?></div>


</div>


