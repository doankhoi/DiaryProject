<h3>Thông tin cá nhân</h3>
<hr/>

<!--Lấy thông tin nguwoif dùng hiện tại-->
<?php $user = $this->Session->read('Auth.User'); ?>

<div class="row">
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Username
        </div>
        <div class="col-lg-8">
            <?php echo $user['username']; ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Password
        </div>
        <div class="col-lg-8">

        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Ảnh đại diện
        </div>
        <div class="col-lg-8">
            <?php echo $this->Html->image($user['Profile']['avatar'], array('class' => 'icon_avatar', 'title' => 'Ảnh đại diện')); ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Name
        </div>
        <div class="col-lg-8">
            <?php echo $user['Profile']['name']; ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Email
        </div>
        <div class="col-lg-8">
            <?php echo $user['email']; ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Address
        </div>
        <div class="col-lg-8">
            <?php
            if ($user['Profile']['address'] == null) {
                echo "Thông tin chưa cập nhật";
            } else {
                echo $user['Profile']['address'];
            }
            ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Phone
        </div>
        <div class="col-lg-8">
            <?php echo $user['Profile']['phone']; ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Giới tính
        </div>
        <div class="col-lg-8">
            <?php echo $user['Profile']['sex']; ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Ngày sinh
        </div>
        <div class="col-lg-8">
            <?php echo $user['Profile']['birthday']; ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Giới thiệu
        </div>
        <div class="col-lg-8">
            <?php
            if ($user['Profile']['introducted'] == null) {
                echo "Thông tin chưa cập nhật";
            } else {
                echo $user['Profile']['introducted'];
            }
            ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>
    <div class="row item_profile">
        <div class="col-lg-3 label_profile">
            Sở thích
        </div>
        <div class="col-lg-8">
            <?php
            if ($user['Profile']['hobby'] == null) {
                echo "Thông tin chưa cập nhật";
            } else {
                echo $user['Profile']['hobby'];
            }
            ?>
        </div>
        <div class="col-lg-1">
            <button title="Chỉnh sửa"><span class="glyphicon glyphicon-edit"></span></button>
        </div>
    </div>

</div>

