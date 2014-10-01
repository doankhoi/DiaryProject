<!-- Footer-->
<hr/>

<div class="row">
    <div class="col-lg-3">
        <ul class="nav navbar-nav">
            <li><?php echo $this->Html->link('Trang chủ', array('controller'=>'users', 'action'=>'index'));?></li>
            <li><?php echo $this->Html->link('Profile', array('controller'=>'users', 'action'=>'viewprofile'));?></li>
        </ul>
    </div>
    <div class="col-lg-6">

    </div>
    <div class="col-lg-3">
        <blockquote class="pull-right">
            <p>Ghi lại tâm sự của bạn.</p>
            <small>Chia sẻ với bạn bè qua <cite title="Source Title">Diary</cite></small>
        </blockquote>
    </div>
</div><!--End footer-->