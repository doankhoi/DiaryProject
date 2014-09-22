<style >
    .wrapper_register{

        background-color: #E9E9E9;
        margin: 0px auto;
    }
    .form_user{
        width: 1200px;
        margin: 0px auto;
    }

    .button {
        width: 300px;
        margin: 0px auto;
        height: 50px;
    }

    .button button{
        background: -moz-linear-gradient(center top , #76bf6b, #3b8230) repeat scroll 0 0 #62af56;
        border-color: #2d6324;
        color: #fff;
        padding: 8px 10px;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.5);
        width: 80px;
        height: 42px;
        float: right;
        border-radius: 5px;
    }

    .button .submit{
        width: 200px;
        height: 100px;
        float: left;
        margin: 0px;padding: 0px;
    }
    body{
        margin-top: 100px;
    }

</style>
<div class="wrapper_board" style="margin-top: 100px; width:1200px; margin:0px auto 50px;">
    <h1 style="color: #009999">Lấy lại mật khẩu</h1>
    <?php
    echo $this->Form->create('User', array('action' => 'sendpassword'));
    echo $this->Form->input('email');
    ?>
    <div class="button">
        <?php echo $this->Form->end('Send'); ?>
        <a href="/DiaryProject/Users/login"><button style="background: #5BA150;" onclick="(window.location.href = '/DiaryProject/Users/login')">Back</button></a>
    </div>
</div>