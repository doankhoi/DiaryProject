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

</style>

<div class="wrapper_board" style="width:1200px; margin:0px auto 50px;">
    <div class="form_user" >
        <h1 style="font-family: Comic Sans MS; font-size: xx-large; text-align: center; font-size: 50px; width: 1100px; margin: auto auto ; padding: 50px 0px;">Bảng đăng kí thông tin</h1>
        <?php
        $sex = array('Male' => 'Male', 'Female' => 'Female');
        
        echo $this->Form->create('User', array('type' => 'file'));
        echo $this->Form->input('User.username');
        echo $this->Form->input('User.password');
        echo $this->Form->input('User.repassword', array('type' => 'password'));
        echo $this->Form->input('User.email');

        echo $this->Form->input('Profile.name');
        echo $this->Form->input('Profile.birthday', array(
            'label' => 'Date of birth',
            'dateFormat' => 'DMY',
            'minYear' => date('Y') - 100,
            'maxYear' => date('Y') + 100,
        ));
        echo $this->Form->input('Profile.address');
        echo $this->Form->input('Profile.phone', array('type' => 'tel'));
        ?>
        <?php
        echo $this->Form->input('Profile.avatar', array('type' => 'file', 'label' => 'Avatar'));
        echo $this->Form->input('Profile.introduced');
        echo $this->Form->input('Profile.hobby');
        echo $this->Form->input('Profile.sex', array('multiple' => 'checkbox', 'options' => $sex));
        ?>

        <div class="button">
            <?php echo $this->Form->end('Register'); ?>
            <a href="/DiaryProject/Users/login"><button style="background: #5BA150;" onclick="(window.location.href = '/DiaryProject/Users/login')">Back</button></a>
        </div>
        
    </div>
    
</div>