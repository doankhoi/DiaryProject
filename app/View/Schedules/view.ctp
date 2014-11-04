<?php echo $this->Html->css('view_schedule'); ?>

<?php 
    $today = date(time());                            
    $schedule_time = strtotime($schedule['Schedule']['time']);
?>
<div class="row">
    <div class="col-lg-11">
        <?php
        $path_image = 'schedule_done.jpg';
        $priority = $schedule['Schedule']['priority'];
        if($today< $schedule_time){
            $path_image = 'schedule_imp.jpg';
        }
        echo $this->Html->image($path_image, array('class' => 'img-schedule'));
        ?>
        <span class="title-schedule"> <?php echo $schedule['Schedule']['title']; ?></span>
    </div>
    <div class="col-lg-1">
        <button ><span class="glyphicon glyphicon-edit" title="Chỉnh sửa"></span></button>
    </div>
</div>

<span class="date-schedule"> Thời gian xảy ra: <?php echo date('d/m/Y H:i:s', $schedule_time); ?></span><br>
<span class="date-schedule">Mức ưu tiên: 
    <?php 
        if($priority==0){
            echo "Cao nhất";
        }else if($priority==1){
            echo "Trung bình";
        }else{
            echo "Thấp";
        }
    ?>
</span>
<hr>

<div id="content-schedule">
    <?php echo $schedule['Schedule']['notes']; ?>
</div>

<script type="text/javascript">
    tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image|print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>