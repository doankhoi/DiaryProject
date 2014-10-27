<?php echo $this->Html->script('add_schedule');?>
<div>
    
    <?php 
        echo $this->Form->create('Schedule', array('class'=>'form-horizontal'));
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
     </fieldset>
    
        <?php
        echo $this->Form->end('Hoàn tất', array('class'=>'btn btn-primary'));
    ?>
    
<!--    <form class="form-horizontal">
        <fieldset>
            <legend>Thêm lịch làm việc mới</legend>
            <div class="form-group">
                <label for="scheduleTitle" class="col-lg-2 control-label">Tiêu đề</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="scheduleTitle" placeholder="Tiêu đề">
                </div>
            </div>          
            <div class="form-group">
                <label for="scheduleNotes" class="col-lg-2 control-label">Nội dung</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="scheduleNotes"></textarea>
                    <span class="help-block">Miêu tả chi tiết lịch trình của bạn.</span>
                </div>
            </div>          
            <div class="form-group">
                <label for="schedulePriority" class="col-lg-2 control-label">Mức ưu tiên</label>
                <div class="col-lg-10">
                    <select class="form-control" id="schedulePriority">
                        <option>Cao nhất</option>
                        <option>Trung bình</option>
                        <option>Thấp</option>                        
                    </select>
                    <br>                   
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default">Hủy</button>
                    <button type="submit" class="btn btn-primary">Hoàn tất</button>
                </div>
            </div>
        </fieldset>
    </form>-->
</div>