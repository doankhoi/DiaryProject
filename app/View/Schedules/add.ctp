<?php echo $this->Html->script('add_schedule');?>
<div id="form-add-schedule">
    
    <?php 
        echo $this->Form->create('Schedule',array('class'=>'form-horizontal'));
        $arr_priority = array(0=>'Cao nhất', 1=>'Trung bình', 2=>'Thấp nhất');
    ?>
    <fieldset>
        <legend>Thêm lịch làm việc mới</legend>
        <div class="form-group">
            <label for="scheduleTitle" class="col-lg-2 control-label">Tiêu đề</label>
            <div class="col-lg-10">
                <?php echo $this->Form->input('Schedule.title', array(
                    'class'=>'form-control',
                    'label'=>FALSE,
                    'placeholder'=>'Tiêu đề'
                    ))
                ;?>
            </div>         
        </div>
        <div class="form-group">
                <label for="scheduleNotes" class="col-lg-2 control-label">Nội dung</label>
                <div class="col-lg-10">
                    <?php
                    echo $this->Form->input('Schedule.notes', array(
                        'class'=>'form-control',
                        'type'=>'textarea',
                        'label'=>FALSE,                       
                    ));
                    ?>                   
                    <span class="help-block">Miêu tả chi tiết lịch trình của bạn.</span>
                </div>
        </div>
        
        <div class="form-group">
                <label for="schedulePriority" class="col-lg-2 control-label">Mức ưu tiên</label>
                <div class="col-lg-10">
                    <?php echo $this->Form->input('Schedule.priority', array('id'=>'schedulePriority','label'=>FALSE,'multiple' => 'combobox', 'options' => $arr_priority));?>
                    <br>                   
                </div>
        </div>
        <div class="form-group">
                <label for="scheduleTime" class="col-lg-2 control-label">Thời gian</label>
                <div class="col-lg-10">
                    <?php echo $this->Form->input(
                            'Schedule.time', array(
                                'id'=>'scheduleTime',
                                'label'=>FALSE,
                                'dateFormat' => 'DMY',
                                'minYear' => date('Y') - 100,
                                'maxYear' => date('Y') + 100
                                ));
                    ?>
                    <br>                   
                </div>
        </div>
     </fieldset>
    <div id="bt-add-schedule">
        <?php
        echo $this->Form->end('Hoàn tất');
        ?>
    </div>
    
</div>