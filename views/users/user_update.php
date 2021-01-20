
<?php
if(session_id() ===''){
    session_start();
}
?>
<div class="style_form_update"style="width: 484px;
    max-width: 100%;
    display: flex;
    justify-content: center;
    margin: auto;">
    <form class="form-content" action='' method="post" >
        <h1 >
            Cập Nhật Thông Tin Cá Nhân
        </h1>
        
        <span class="form__title-header">Thông Tin Cá Nhân</span>
        <span class="form__title-header" style="margin-top: 20px; color:#ff4b2b;font-size:18px">
            <?php
            echo $update;
            ?>
        </span>
        <!-- <div class="form__group">
            <input value="<?php echo $_SESSION['cust_name']?>" type="text" class="form__group-input" placeholder="Enter Name" id="name_register" name="update-name" onblur=" return( Checktendangnhap(event, 3, 10))">
            <span class="form-message">
            </span>
        </div>
        <div class="form__group">
            <input value="<?php echo $_SESSION['cust_address']?>" type="text" class="form__group-input" placeholder="Enter Address"  name="update-address" autocomplete="on">
            <span class="form-message">
            </span>
        </div> -->
        
        <div class="form__group">
            <input class="form__group-input" value="<?php echo $_SESSION['cust_name']?>"type="text" placeholder="Name" id="name_register" name="update-name" onblur=" return( Checktendangnhap(event, 3, 10))" />
              <span id="nameerror" name="nameerr"></span>
        </div>

        <div class="form__group">
            <input class="form__group-input" value="<?php echo $_SESSION['cust_address']?>" type="text" placeholder="Address" id="add_register" name="update-address"  />
              <span id="adderror" name="adderr"></span>
        </div>

        <div class="form__group">
            <input value="<?php echo $_SESSION['cust_email']?>" disabled="true" type="text" class="form__group-input" placeholder="" name="email">
            <span id="emailerror" name="emailerr"></span>
            </span>
        </div>
        <div class="form__group form__group-button">
                            <button type="submit" class="form__button form__button-sign-up"  id="registerbtn">Update</button>
                            <!-- <input type="" class="form__button form__button-reset" value="Reset"> -->
                            <a class="form__button form__button-reset" value="Back to home?" style="font-size: 12px;"href="index.php">Back home?</a>
                        </div>
       
        <?php

        // User::register();

        ?>
    </form>
    
</div>