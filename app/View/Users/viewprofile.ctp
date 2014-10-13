 <?php echo $this->Html->script('jquery.filedrop'); ?>
 <?php echo $this->Html->script('bootstrap-datepicker'); ?>
 <?php echo $this->Html->css('datepicker'); ?>
 <?php echo $this->Html->script('viewprofile'); ?>

<h3>Thông tin cá nhân</h3>
<hr/>

<!--Lấy thông tin nguwoif dùng hiện tại-->
<?php
    $user = $this->Session->read('Auth.User'); 
?>

<div class="row">
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Username
        </div>
        <div id="username" class="col-lg-8">
            <?php echo $user['username']; ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_username" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Password
        </div>
        <div id="password" class="col-lg-8">
            <?php echo "********";?>
        </div>
        <div class="col-lg-1">
            <button id="bt_password" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Ảnh đại diện
        </div>
        <div id="editavatar" class="col-lg-8">
            <?php echo $this->Html->image($user['Profile']['avatar'], array('class' => 'icon_avatar', 'title' => 'Ảnh đại diện')); ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editavatar" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Name
        </div>
        <div id="editname" class="col-lg-8">
            <?php echo $user['Profile']['name']; ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editname" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Email
        </div>
        <div id="editemail" class="col-lg-8">
            <?php echo $user['email']; ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editemail" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Address
        </div>
        <div id="editaddress" class="col-lg-8">
            <?php
            if ($user['Profile']['address'] == null) {
                echo "Thông tin chưa cập nhật";
            } else {
                echo $user['Profile']['address'];
            }
            ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editaddress" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Phone
        </div>
        <div id="editphone" class="col-lg-8">
            <?php echo $user['Profile']['phone']; ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editphone" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Giới tính
        </div>
        <div id="editsex" class="col-lg-8">
            <?php echo $user['Profile']['sex']; ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editsex" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Ngày sinh
        </div>
        <div id="editbirthday" class="col-lg-8">
            <?php echo $user['Profile']['birthday']; ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editbirthday" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Giới thiệu
        </div>
        <div id="editintroducted" class="col-lg-8">
            <?php
            if ($user['Profile']['introducted'] == null) {
                echo "Thông tin chưa cập nhật";
            } else {
                echo $user['Profile']['introducted'];
            }
            ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_editintroducted" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Sở thích
        </div>
        <div id="edithobby" class="col-lg-8">
            <?php
            if ($user['Profile']['hobby'] == null) {
                echo "Thông tin chưa cập nhật";
            } else {
                echo $user['Profile']['hobby'];
            }
            ?>
        </div>
        <div class="col-lg-1">
            <button id="bt_edithobby" title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

</div>

