<?php include"config/dbOldWay.php";?>
<div class="profile clearfix">
    <div class="profile_pic">
        <?php while ($rowadmin = mysqli_fetch_array($admin))
                    {
                   ?>
        <img src="<?php echo $rowadmin ['profile_img']?>" alt="..." class="img-circle profile_img">
        <?php }?>
    </div>
    <div class="profile_info">
        <span>Welcome,</span><br>
        <h2 class="label label-default"><i class="fa fa-user"></i> <a href="index.php?modul=my-profile"><span id="admina"><?=ucwords($_SESSION['staffadmin'])?></span></a></h2>
    </div>
    <div class="clearfix"></div>
</div>
