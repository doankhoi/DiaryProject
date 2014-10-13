<?php $this->requestAction(array('controller'=>'UsersLikes', 'action'=>'getAllLikeNotRead'));?>


<div>
    <a href="#" class="btn btn-primary btn-lg btn-block q_write">Viết gì hôm nay ?</a>
</div>

<div class="list-group item_write">
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    </a>
    <div>
        <div>          
            <?php 
                echo $this->Html->link(
                        $this->Html->tag('span','', array('class'=>'glyphicon glyphicon-thumbs-up')),
                        array(
                            'controller'=>'users',
                            'action'=>'index'
                            ),
                        array(
                            'class'=>'btn btn-default btn-xs',
                            'title'=>'Thích',
                            'escape' => false
                        )
                      );
            ?>
            <a href="#" class="btn btn-default btn-xs" title="Bình luận">
                <span class="glyphicon glyphicon-comment"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs" title="Chỉnh sửa">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs" title="Xóa">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </div>
    </div>
</div>
<div class="list-group item_write">
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    </a>
    <div>
        <div>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-thumbs-up"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-comment"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </div>
    </div>
</div>
<div class="list-group item_write">
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    </a>
    <div>
        <div>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-thumbs-up"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-comment"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </div>
    </div>
</div>
<div class="list-group item_write">
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    </a>
    <div>
        <div>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-thumbs-up"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-comment"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="#" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </div>
    </div>
</div>