<!DOCTYPE html>
<!--
Trang cá nhân của người dùng sau khi đăng nhập vào hệ thống

-->
<html>
    <head>
        <title>Trang chủ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Thêm thư viện jquery và bootstrap -->
        <?php echo $this->Html->script('jquery-2.1.1.min'); ?>
        <?php echo $this->Html->script('bootstrap'); ?>
        <?php echo $this->Html->script('bootstrap.min'); ?>

        <!--Thêm định dạng css bootstrap -->
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('user_page'); ?>
    </head>
    <body>

        <div class="container wapper">

            <!--Navigabar-->
            <div class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Diary</a>
                </div>
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Active</a></li>
                        <li><a href="#">Link</a></li>
                        <li>

                        </li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <input type="text" class="form-control col-lg-8" placeholder="Tìm bạn bè">
                    </form>
                    <ul class="nav navbar-nav navbar-right avatar">
                        <li><?php echo $this->Html->image('doankhoi.jpg', array('class' => 'img-circle')); ?></li>

                        <!-- Liên kết tới trang profile của người dùng -->
                        <li>
                            <?php
                            echo $this->Html->link('doankhoi', array(
                                'controller' => 'users',
                                'action' => 'profile',
                                    ), array('alt' => 'Thông tin cá nhân')
                            );
                            ?>

                        </li>

                        <li><a>Thông báo<span class="badge">2</span></a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
            <!--End Navigabar -->

            <!--Danh sách các bài nhật ký -->
            <div class="row">

                <div class="col-lg-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">14</span>
                            Cras justo odio
                        </li>
                        <li class="list-group-item">
                            <span class="badge">2</span>
                            Dapibus ac facilisis in
                        </li>
                        <li class="list-group-item">
                            <span class="badge">1</span>
                            Morbi leo risus
                        </li>
                    </ul>
                </div><!--Danh sách các bài nhật ký chia theo tháng-->

                <div class="col-lg-6">
                    <?php echo $this->fetch('content'); ?>
                </div> <!--Nội dung chính-->

                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        </a>
                    </div>
                </div><!--Hoat động gần nhất-->
                
            </div><!--End row-->

        </div><!--End wrapper-->

    </body>
</html>
