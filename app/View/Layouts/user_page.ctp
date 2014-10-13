<!DOCTYPE html>
<!--
Trang cá nhân của người dùng sau khi đăng nhập vào hệ thống
-->
<html>
    <head>
        <title><?php echo $title_for_layout; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Thêm định dạng css bootstrap -->
        <?php // echo $this->Html->css('bootstrap'); ?>
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('user_page'); ?>
        <?php echo $this->Html->css('view_profile'); ?>


        <!-- Thêm thư viện jquery và bootstrap -->
        <?php echo $this->Html->script('jquery-2.1.1.min'); ?>
        <?php echo $this->Html->script('bootstrap.min'); ?>

        <!-- Chèn javascipt-->
        <?php echo $this->Html->script('user_page'); ?>

        <?php echo $this->Js->writeBuffer(array('cache' => true)); ?>

    </head>
    <body>
        <!--Lấy thông tin về người dùng đăng nhập-->
        <?php
        $userId = $this->Session->read('Auth.User');
        //Lấy thông tin các
        ?>

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

                        <li>                         
                            <?php
                            //Lấy số thông báo với người dùng hiện tại
                            //Lấy các lời mời chưa đọc tới người dùng hiện tại
                            $num_invitations = $this->requestAction(array('controller' => 'Invitations', 'action' => 'countInvitation'));
                            //Lấy ra các comment chưa đọc tới nguowid dùng hiện tại
                            $num_comments = $this->requestAction(array('controller' => 'Comments', 'action' => 'countCommentNotRead'));
                            //Lấy ra các bài viết được like chưa xác nhận của người dùng hiện tại
                            $num_likes = $this->requestAction(array('controller' => 'UsersLikes', 'action' => 'countLikeNotRead'));

                            $num_notification = $num_comments + $num_invitations + $num_likes;

                            echo $this->Html->link(
                                    'Thông báo' . $this->Html->tag('span', ($num_notification <= 0) ? '' : $num_notification, array('class' => 'badge')),'#', 
                                    array(
                                        'id' => 'showmessage',
                                        'escape' => false
                                    )
                            );
                            ?>
                        </li>

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

            <!--Show message-->
            <div id="notify-container" style="display: none">
                <div class="list-group notify">
                    
                    <?php 
                        //Lấy tất cả các comment chưa đọc
                        $commentNotRead = $this->requestAction(array(
                            'controller'=> 'Comments',
                            'action'=>'getAllCommentNotRead'
                        ));

                        //Lấy tất cả các lời mời chưa đọc
                        $invitationNotRead = $this->requestAction(array(
                            'controller'=>'Invitations',
                            'action'=>'getAllInvitationNotRead'
                        ));

                        //Lấy tất cả sự kiện like người dùng với bài viết người dùng hiện tại
                        $likeNotRead = $this->requestAction(array(
                            'controller'=>'UsersLikes',
                            'action'=>'getAllLikeNotRead'
                        ));
                        
                        //Hiển thị các thông báo comments
                        if(count($commentNotRead)> 0){
                            foreach ($commentNotRead as $item){
                                $title_article = $this->requestAction(
                                        array(
                                            'controller'=>'Articles', 
                                            'action'=>'getTitle', 
                                            $item['tb_comments']['articles_id']
                                        )
                                );
                                 $user_avatar_comment = $this->requestAction(array(                                
                                    'controller'=>'Profiles',
                                    'action'=> 'getProfileById',
                                    $item['tb_comments']['users_id']
                                
                                ));
                                 $username_comment = $this->requestAction(array(
                                    'controller'=>'Users',
                                    'action'=>'getUsername',
                                    $item['tb_comments']['users_id']
                                ));
                                 
                                 //Hiển thị thông báo
                                echo $this->Html->link(
                                        $this->Html->tag(
                                                'div', 
                                                $this->Html->tag(
                                                        'div', 
                                                        $this->Html->image($user_avatar_comment['Profile']['avatar']), 
                                                        array(
                                                            'class'=>'col-lg-2'
                                                        )).
                                                $this->Html->tag(
                                                        'div', 
                                                        $this->Html->tag(
                                                                'p', 
                                                                "<b>".$username_comment."</b> đã bình luận về bài viết <b>".$title_article['Article']['title']."</b> của bạn",
                                                                array(
                                                                    'class'=>'list-group-item-text'
                                                                )), 
                                                        array(
                                                            'class'=>'col-lg-10'
                                                        )), 
                                                array('class'=>'row')
                                                ),
                                        
                                        array(
                                            'controller'=>'Articles',
                                            'action'=>'view',
                                            $item['tb_comments']['articles_id']
                                        ),
                                        array(
                                            'class'=>'list-group-item readcomment',
                                            'users_id'=> $item['tb_comments']['users_id'],
                                            'articles_id'=> $item['tb_comments']['articles_id'],
                                            'escape' => false
                                        )
                                    );
                            }
                        }//End hiển thị thông báo comments
                        
                        //Hiển thị thông báo các lời mời
                        if(count($invitationNotRead)> 0){
                            foreach ($invitationNotRead as $item){
                                $title_article = $this->requestAction(
                                        array(
                                            'controller'=>'Articles', 
                                            'action'=>'getTitle', 
                                            $item['articles_id']
                                        )
                                );
                                 $user_avatar_comment = $this->requestAction(array(                                
                                    'controller'=>'Profiles',
                                    'action'=> 'getProfileById',
                                    $item['users_id']
                                
                                ));
                                 $username_comment = $this->requestAction(array(
                                    'controller'=>'Users',
                                    'action'=>'getUsername',
                                    $item['users_id']
                                ));
                                 
                                 //Hiển thị thông báo
                                echo $this->Html->link(
                                        $this->Html->tag(
                                                'div', 
                                                $this->Html->tag(
                                                        'div', 
                                                        $this->Html->image($user_avatar_comment['Profile']['avatar']), 
                                                        array(
                                                            'class'=>'col-lg-2'
                                                        )).
                                                $this->Html->tag(
                                                        'div', 
                                                        $this->Html->tag(
                                                                'p', 
                                                                "<b>".$username_comment."</b> đã mời bạn tham gia bài viết <b>".$title_article['Article']['title']."</b>",
                                                                array(
                                                                    'class'=>'list-group-item-text'
                                                                )), 
                                                        array(
                                                            'class'=>'col-lg-10'
                                                        )), 
                                                array('class'=>'row')
                                                ),
                                        
                                        array(
                                            'controller'=>'Articles',
                                            'action'=>'view',
                                            $item['tb_comments']['articles_id']
                                        ),
                                        array(
                                            'class'=>'list-group-item readinvite',
                                            'articles_id'=>$item['articles_id'],
                                            'users_id'=>$userId['id'],
                                            'escape' => false
                                        )
                                    );
                            }
                        }//End mời
                        
                        if(count($likeNotRead)> 0){
                            foreach ($likeNotRead as $item){
                                $title_article = $this->requestAction(
                                        array(
                                            'controller'=>'Articles', 
                                            'action'=>'getTitle', 
                                            $item['articles_id']
                                        )
                                );
                                 $user_avatar_comment = $this->requestAction(array(                                
                                    'controller'=>'Profiles',
                                    'action'=> 'getProfileById',
                                    $item['users_id']
                                
                                ));
                                 $username_comment = $this->requestAction(array(
                                    'controller'=>'Users',
                                    'action'=>'getUsername',
                                    $item['users_id']
                                ));
                                 
                                 //Hiển thị thông báo
                                echo $this->Html->link(
                                        $this->Html->tag(
                                                'div', 
                                                $this->Html->tag(
                                                        'div', 
                                                        $this->Html->image($user_avatar_comment['Profile']['avatar']), 
                                                        array(
                                                            'class'=>'col-lg-2'
                                                        )).
                                                $this->Html->tag(
                                                        'div', 
                                                        $this->Html->tag(
                                                                'p', 
                                                                "<b>".$username_comment."</b> thích bài viết <b>".$title_article['Article']['title']."</b> của bạn",
                                                                array(
                                                                    'class'=>'list-group-item-text'
                                                                )), 
                                                        array(
                                                            'class'=>'col-lg-10'
                                                        )), 
                                                array('class'=>'row')
                                                ),
                                        
                                        array(
                                            'controller'=>'Articles',
                                            'action'=>'view',
                                            $item['tb_comments']['articles_id']
                                        ),
                                        array(
                                            'class'=>'list-group-item readlike',
                                            'articles_id'=>$item['articles_id'],
                                            'users_id'=>$item['users_id'],
                                            'escape' => false
                                        )
                                    );
                            }
                        }
                    ?>
                                     
                </div>
            </div> <!--End showmessage-->


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
<?php
echo $this->element('footer');
?>
        </div><!--End wrapper-->

    </body>
</html>
