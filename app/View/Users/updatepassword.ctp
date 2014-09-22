<h1 style="color: #009999; font-size: 2em; font-weight: bold">Xác nhận mật khẩu</h1>
<?php 
echo $this->Form->create('User',array('action'=>'updatepassword'));
echo $this->Form->input('password', array('type' => 'hidden'));
echo $this->Form->input('repassword', array('type' => 'hidden'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Xác nhận')
?>