<!DOCTYPE html>
<!--
Trang cá nhân của người dùng sau khi đăng nhập vào hệ thống

-->
<html>
    <head>
        <title>Trang chủ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Thêm định dạng css bootstrap -->
        <?php // echo $this->Html->css('bootstrap'); ?>
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('user_page'); ?>
        <?php echo $this->Html->css('view_profile');?>


        <!-- Thêm thư viện jquery và bootstrap -->
        <?php echo $this->Html->script('jquery-2.1.1.min'); ?>
        <?php echo $this->Html->script('bootstrap.min'); ?>


    </head>
    <body>
        <!--Lấy thông tin về người dùng đăng nhập-->
        <?php $userId = $this->Session->read('Auth.User');?>
        
        <div class="container-fluid wapper">

            <!--Navigabar-->

            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php
                    echo $this->Html->link('Diary', array(
                        'controller' => 'users',
                        'action' => 'index'
                            ), array('class' => 'navbar-brand')
                    );
                    ?>
                </div>
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Lịch làm việc</a></li>
                        <li><a href="#">Tìm bạn bè</a></li>

                    </ul>
                    <form class="navbar-form navbar-left">
                        <input type="text" class="form-control col-lg-8" placeholder="Tìm bài viết">
                    </form>
                    <ul class="nav navbar-nav navbar-right avatar">
                        <li><?php echo $this->Html->image($userId['Profile']['avatar'], array('class' => 'img-circle')); ?></li>

                        <!-- Liên kết tới trang profile của người dùng -->
                        <li>
                            <?php
                            echo $this->Html->link($userId['username'], array(
                                'controller' => 'users',
                                'action' => 'viewprofile',
                                    ), array(
                                'title' => 'Profile'
                                    )
                            );
                            ?>

                        </li>

                        <li><a href="#">Thông báo<span class="badge">2</span></a></li>

                        <li>
                            <?php
                            echo $this->Html->link('Logout', array(
                                'controller' => 'users',
                                'action' => 'logout'
                            ));
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End Navigabar -->

            <!--Thêm đường dẫn trang-->
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Library</li>
                </ul>
            </div>

            <!--Danh sách các bài nhật ký -->
            <div class="row">

                <div class="col-lg-3">


                    <div class=" row title_nav_left">
                        Bài viết theo tháng
                    </div>
                    <div>
                        <a href="#" class="list-group-item active">
                            Tháng 1
                            <span class="badge">12</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Tháng 2
                            <span class="badge">10</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Tháng 3
                            <span class="badge">3</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Tháng 4
                            <span class="badge">2</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Tháng 5
                            <span class="badge">2</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Tháng 6
                            <span class="badge">2</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="navbar-right">
                            <span style="color: red" id="list_month">Xem thêm >></span>
                        </a>
                    </div>



                    <div class="row title_nav_left">
                        Bài viết theo chủ đề
                    </div>
                    <div>
                        <a href="#" class="list-group-item active">
                            Lớp học
                            <span class="badge">12</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Công việc
                            <span class="badge">10</span>
                        </a>
                        <a href="#" class="list-group-item">
                            Gia đình
                            <span class="badge">3</span>
                        </a>                       
                    </div>
                    <div>
                        <a href="#" class="navbar-right">
                            <span style="color: red" id="list_month">Xem thêm >></span>
                        </a>
                    </div>  

                    <!--Danh sách bạn bè-->
                    <div class="row title_nav_left">
                        Bạn bè
                    </div>
                    <div class="list-group friend">
                        <a href="#" class="list-group-item item-friend">
                            <div class="row">
                                <div class="col-lg-2">
                                    <?php echo $this->Html->image('doankhoi.jpg', array('class' => 'icon_friend')); ?>
                                </div>
                                <div class="col-lg-8">
                                    <p class="list-group-item-text item-friend-name">duccuong</p>
                                </div>
                                <div class="col-lg-1">
                                    <?php echo $this->Html->image('online.jpg', array('class' => 'icon_status navbar-right')); ?>
                                </div>
                            </div>
                        </a>               
                        <a href="#" class="list-group-item item-friend">
                            <div class="row">
                                <div class="col-lg-2">
                                    <?php echo $this->Html->image('doankhoi.jpg', array('class' => 'icon_friend')); ?>
                                </div>
                                <div class="col-lg-8">
                                    <p class="list-group-item-text item-friend-name">duccuong</p>
                                </div>
                                <div class="col-lg-1">
                                    <?php echo $this->Html->image('offline.jpg', array('class' => 'icon_status navbar-right')); ?>
                                </div>
                            </div>
                        </a>               
                        <a href="#" class="list-group-item item-friend">
                            <div class="row">
                                <div class="col-lg-2">
                                    <?php echo $this->Html->image('doankhoi.jpg', array('class' => 'icon_friend')); ?>
                                </div>
                                <div class="col-lg-8">
                                    <p class="list-group-item-text item-friend-name">duccuong</p>
                                </div>
                                <div class="col-lg-1">
                                    <?php echo $this->Html->image('online.jpg', array('class' => 'icon_status navbar-right')); ?>
                                </div>
                            </div>
                        </a>               
                    </div>
                    <!--Tìm kiếm bạn bè-->
                    <div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm bạn bè">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </div>
                    </div><!--End tìm bạn bè-->
                </div><!--Danh sách các bài nhật ký chia theo tháng, thể loại bài viết-->


                <!--Nội dung chính -->
                <div class="col-lg-6">
                    <?php echo $this->fetch('content'); ?>
                </div> <!--Nội dung chính-->

                <!--Hoạt động gần nhất-->
                <div class="col-lg-3">
                    <div class="row title_nav_left">
                        Lịch làm việc
                    </div>
                    <!--Danh sách lịch làm việc-->
                    <div class="list-group recent">

                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('schule.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('schule.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('schule.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('schule.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>
                        </a>

                    </div><!--End danh sách lịch làm việc-->

                    <div class="row title_nav_left">
                        Recent
                    </div>               
                    <div class="list-group recent">

                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Html->image('doankhoi.jpg'); ?>
                                </div>
                                <div class="col-lg-9">
                                    <h5 class="list-group-item-heading">List group item heading</h5>
                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                </div>
                            </div>

                        </a>


                    </div>
                </div><!--Hoat động gần nhất-->

            </div><!--End row-->

            <!--Footer -->
            <?php echo $this->element('footer'); ?>
        </div><!--End wrapper-->

    </body>
</html>
