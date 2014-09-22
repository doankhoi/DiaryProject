
<style>
    .user {
        /*background-color: #E9E9E9;*/
        margin: 0px;
        padding: 0px;

    }

    .pass {
        /*background-color: #E9E9E9;*/	
        padding: 0px;
        margin: 0px;
    }
</style>
<div style="background: #E9E9E9; padding-top: 90px; height:auto;height: 790px;">
    <div id='header1' style="width: 40%; height: 100px; margin: 0px auto 50px;">
        <h4 style="color: red; padding-top: 10px; text-align: center; font-family: Comic Sans MS; font-size: 50px;">Welcome to Diary</h4>
    </div>
    <div style=" width: 40%;padding: 20px 30px;margin: 0px auto;
         margin-bottom: 10%;padding-bottom: 10px;
         box-shadow: 5px 3px 10px gray;border-radius: 30px;
         background: #FFF;">
        <h4 style="font-family: serif;font-size: xx-large; text-align:center; ">Đăng nhập</h4>
        <?php
        echo $this->Form->create('User');
        ?>
        <div class="user"><?php echo $this->Form->input('username'); ?></div>
        <div class="pass"><?php echo $this->Form->input('password'); ?></div>
        <?php
        echo $this->Form->end(__('Login'));
        echo $this->Html->link("Register", array('action' => 'register'));
        echo "   ";
        echo $this->Html->link('Lấy lại mật khẩu', array('action' => 'sendpassword'));
        ?>
    </div>
</div>