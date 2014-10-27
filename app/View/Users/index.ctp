 <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script type="text/javascript">
    function mucMoi(){
        $('#mucmoi').slideToggle("slow");
        }
    function baiMoi(){
        $('#baimoi').slideToggle("slow");
        $('#taobai').css('display','none');
    }
    function taoMuc(){
        if($('#tenMuc').val()=="") alert('Vui lòng điền đầy đủ thông tin');
        var muc ={
            url:"<?php echo Router::Url(array('controller'=>'Users','action'=>'addsubject')); ?>",
            type:"post",
            dataType:"json",
            data:{
                description:$('#tenMuc').val()
                 },
            success:function(result){
               var html='<select  class="form-control" id="subject" style="width: auto;margin-left:12px;">';
                $.each(result,function(key,item){
                    html+="<option value='"+item['Subject']['id']+"'>"+item['Subject']['description']+"</option>";
                });
                html+='</select>';
                html+='';
                $('#selectSubject').html(html);
                $('#mucmoi').hide();
            }            
        };
        $.ajax(muc);
        
    }
    function taoBai(){
        tinymce.triggerSave();
        if($('#title').val()==""||$('#title').val()==" ") alert("Bạn chưa viết tiêu đề cho bài viết"); 
        else if($('#content').val()==""||$('#content').val()==" ") alert("Bạn chưa viết nội dung cho bài viết");
            else {
            
        var bai ={
            url:"<?php echo Router::Url(array('controller'=>'Users','action'=>'addarticle'));?>",
            type:"post",
            dataType:"json",
            data:{
              title:$('#title').val(),
              content:$('#content').val(),
              privileges_id:$('#privilege').val(),
              subjects_id :$('#selectSubject').val()
            },
            success:function(result){
                var html="";
                html+='<div class="list-group item_write">';
                html+='<a href="#" class="list-group-item">';
                html+='<h4 class="list-group-item-heading">'+result.title+"</h4>";
                html+='<p class="list-group-item-text">'+result.content+'</p>';
                html+='</a>';
                html+='<div>';
                html+='<div>';
                html+='<a href="#" class="btn btn-default btn-xs">';
                html+='<span class="glyphicon glyphicon-thumbs-up"></span></a>';
                html+='<a href="#" class="btn btn-default btn-xs">';
                html+=' <span class="glyphicon glyphicon-comment"></span></a>';
                html+='<a href="#" class="btn btn-default btn-xs">';
                html+='<span class="glyphicon glyphicon-pencil"></span></a>';
                html+='<a href="#" class="btn btn-default btn-xs">';
                html+='<span class="glyphicon glyphicon-trash"></span></a>';
                html+='</div></div></div>';
                $('#baiviet').prepend(html);
                $('#baimoi').hide(300);
                $('#taobai').css('display','block');
                
            }
            
        };
        $.ajax(bai);}
    }
    function back(){
        $('#taobai').css('display','block');
        $('#baimoi').hide(300);
    }

</script>
<div>
    <a href="#" class="btn btn-primary btn-lg btn-block q_write" onclick="baiMoi()" id="taobai">Viết gì hôm nay ?</a>
</div>
<div class="list-group item_write" style="padding: 5px;display: none;" id="baimoi">
<form class="form-horizontal">
  <fieldset>
    <legend style="font-size: xx-large;font-style: oblique;">Bài viết mới</legend>
    <div class="form-group">
      <p style="font-size:large;" class="col-lg-2 control-label">Tiêu đề</p>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="title" placeholder="Tiêu đề"/>
      </div>
    </div>
    <div class="form-group">
      <p style="font-size: large;"class="col-lg-2 control-label">Nội dung</p>
      <div class="col-lg-10">
        <textarea class="form-control" id="content" style="resize: horizontal;width: 100%;height: 400px;"></textarea>
        <span class="help-block">Hãy viết lại những chuyện xảy ra</span>
      </div>
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
    <div class="form-group">
      <p style="font-size: large;"class="col-lg-2 control-label">Quyền</p>
      <div class="col-lg-10">
        <select class="form-control" id="privilege" style="width: auto;">
          <?php foreach($privilege as $pri){?>
          <option value="<?php echo $pri['Privilege']['id']; ?>"><?php echo $pri['Privilege']['description']; ?></option>
            
          <?php }?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <p style="font-size: large;"class="col-lg-2 control-label">Mục</p>
      <div class="input-group" >
      <?php if($subject==null){ ?>
        <select  class="form-control" id="selectSubject" style="width: auto;margin-left:12px;">
        </select>
            <?php } else {?>
        <select  class="form-control" id="selectSubject" style="width: auto;margin-left:12px;">
      
          <?php foreach($subject as $sub){?>
          <option value="<?php echo $sub['Subject']['id']; ?>"><?php echo $sub['Subject']['description']; ?></option>
          <?php }?>
           </select>
           <?php }?>
      <button class="btn btn-default" type="button" onclick="mucMoi()" style="margin-left: 10px;">Tạo mục mới</button>
      <div class="list-group item_write" style="display: none;" id="mucmoi">
         <p style="font-size: large;"class="col-lg-2 control-label">Tạo</p>
         <div class="col-lg-10">
             <input type="text" class="form-control" id="tenMuc" placeholder="Tạo mới"/>
         </div>
         <p class="btn btn-default" onclick="taoMuc()" style="margin: 10px;">Tạo mới</p>
      </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <span class="btn btn-primary" onclick="taoBai()">Xong</span>
        <span class="btn btn-primary" onclick="back()">Trở lại</span>
      </div>
    </div>

  </fieldset>
</form>
</div>
<div id="baiviet">
<?php  if($article==null) echo "<h4>Chưa có bài viết nào</p>"; 
else{ foreach($article as $art){?>
<div class="list-group item_write">
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading"><?php echo $art['Article']['title'];?></h4>
        <p class="list-group-item-text"><?php echo $art['Article']['content']; ?></p>
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
<?php }} ?>
</div>