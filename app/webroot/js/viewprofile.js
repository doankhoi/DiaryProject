$(function() {

    //Thay đổi tên người dùng
    $("#bt_username").click(function() {
        //Lấy lại tên người dùng hiện tại
        var current_name = $("#username").text().trim();
        $("#username").empty();
        var input_username = $("<input id=edit_username type=text></input>").val(current_name);
        $("#username").html(input_username);

        $("#edit_username").blur(function() {
            if (!$(this).val()) {
                $("#username").empty();
                $("#username").html(current_name);
            } else {
                var new_username = $(this).val().trim();
                $("#username").empty();
                $("#username").html(new_username);
            }
        });
    });

    //Thay đổi password
    $("#bt_password").click(function() {
        var label_password = $("<p></p>").text("Nhập password hiện tại");
        var label_repassword = $("<p></p>").text("Nhập pasword mới");
        var password = $("<input id=edit_password type=password></input>").val("********");
        var repassword = $("<input id=edit_repassword type=password></input>").val("********");

        $("#password").empty();
        $("#password").append(label_password);
        $("#password").append(password);
        $("#password").append(label_repassword);
        $("#password").append(repassword);

        var flag = false;

        $("#edit_password").blur(function() {
            flag = true;
        });

        $("#edit_repassword").blur(function() {
            if (flag) {
                alert("Thay đổi password");
                $("#password").html("********");
                //Cập nhật password cơ sở dữ liệu
            }
        });
    });

    //Thay đổi avatar
    $("#bt_editavatar").click(function() {

        //Lấy giá trị hiện tại của ảnh đại diện
        var current_avatar = $("#editavatar").html();

        //Load ảnh mới
        $("#editavatar").html('<div id="dropbox"><span class="message">Kéo ảnh vào để thay avatar </span></div>');

        //Lấy thông tin
        var dropbox = $('#dropbox');
        var message = $('.message', dropbox);

        dropbox.filedrop({
            // The name of the $_FILES entry:
            paramname: 'pic',
            maxfiles: 1,
            maxfilesize: 2, // in mb
            url: 'post_file',
            uploadFinished: function(i, file, response) {
                $.data(file).addClass('done');
                if (response['code'] == 1) {
                    alert("Lỗi! Bạn không thể tải file");
                } else {
                    $("#editavatar").html('<img src="/DiaryProject/img/' + file['name'] + '" class="icon_avatar" title="Ảnh đại diện" alt="">');
                }
            },
            error: function(err, file) {
                switch (err) {
                    case 'BrowserNotSupported':
                        showMessage('Trình duyệt của bạn không hỗ trợ !');
                        break;
                    case 'TooManyFiles':
                        alert('Có quá nhiều file!');
                        break;
                    case 'FileTooLarge':
                        alert(file.name + ' kích thước quá lớn ! Hãy chọn file dưới 2 Mb');
                        break;
                    default:
                        break;
                }
            },
            beforeEach: function(file) {
                if (!file.type.match(/^image\//)) {
                    alert('Only images are allowed!');
                    return false;
                }
            },
            uploadStarted: function(i, file, len) {
                createImage(file);
            },
            progressUpdated: function(i, file, progress) {
                $.data(file).find('.progress').width(progress);
            }

        });

        var template = '<div class="preview">' +
                '<span class="imageHolder">' +
                '<img />' +
                '<span class="uploaded"></span>' +
                '</span>' +
                '<div class="progressHolder">' +
                '<div class="progress"></div>' +
                '</div>' +
                '</div>';


        //Hàm tạo ảnh
        function createImage(file) {

            var preview = $(template),
                    image = $('img', preview);

            var reader = new FileReader();

            image.width = 100;
            image.height = 100;

            reader.onload = function(e) {
                image.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);

            message.hide();
            preview.appendTo(dropbox);


            $.data(file, preview);
        }

        //Hàm hiển thị thông báo
        function showMessage(msg) {
            message.html(msg);
        }
    });

    //Chỉnh sửa tên
    $("#bt_editname").click(function() {

        //Lấy lại tên người dùng hiện tại
        var current_name = $("#editname").text().trim();
        $("#editname").empty();
        var input_name = $("<input id=edit_name type=text></input>").val(current_name);
        $("#editname").html(input_name);

        $("#edit_name").blur(function() {
            if (!$(this).val()) {
                $("#editname").empty();
                $("#editname").html(current_name);
            } else {
                var new_name = $(this).val().trim();
                $("#editname").empty();
                $("#editname").html(new_name);
                //Cập nhật cơ sở dữ liệu

            }
        });
    });
    //Chỉnh sửa email
    $("#bt_editemail").click(function() {

        //Lấy lại tên người dùng hiện tại
        var current_email = $("#editemail").text().trim();
        $("#editemail").empty();
        var input_email = $("<input id=edit_email type=text></input>").val(current_email);
        $("#editemail").html(input_email);

        $("#edit_email").blur(function() {
            if (!$(this).val()) {
                $("#editemail").empty();
                $("#editemail").html(current_email);
            } else {
                var new_email = $(this).val().trim();
                $("#editemail").empty();
                $("#editemail").html(new_email);
                //Cập nhật cơ sở dữ liệu

            }
        });
    });
    //Chỉnh sửa address
    $("#bt_editaddress").click(function() {

        //Lấy lại tên người dùng hiện tại
        var current_address = $("#editaddress").text().trim();
        $("#editaddress").empty();
        var input_address = $("<input id=edit_address type=text></input>").val(current_address);
        $("#editaddress").html(input_address);

        $("#edit_address").blur(function() {
            if (!$(this).val()) {
                $("#editaddress").empty();
                $("#editaddress").html(current_address);
            } else {
                var new_address = $(this).val().trim();
                $("#editaddress").empty();
                $("#editaddress").html(new_address);
                //Cập nhật cơ sở dữ liệu

            }
        });
    });
    //Chỉnh sửa phone
    $("#bt_editphone").click(function() {

        //Lấy lại tên người dùng hiện tại
        var current_phone = $("#editphone").text().trim();
        $("#editphone").empty();
        var input_phone = $("<input id=edit_phone type=text></input>").val(current_phone);
        $("#editphone").html(input_phone);

        $("#edit_phone").blur(function() {
            if (!$(this).val()) {
                $("#editphone").empty();
                $("#editphone").html(current_phone);
            } else {
                var new_phone = $(this).val().trim();
                $("#editphone").empty();
                $("#editphone").html(new_phone);
                //Cập nhật cơ sở dữ liệu

            }
        });
    });
    //Chỉnh sửa giới tính
    $("#bt_editsex").click(function() {

        var current_sex = $("#editsex").text().trim();
        $("#editsex").empty();
        var input_sex = $("<input id=edit_sex type=text></input>").val(current_sex);
        $("#editsex").html(input_sex);

        $("#edit_sex").blur(function() {
            if (!$(this).val()) {
                $("#editsex").empty();
                $("#editsex").html(current_sex);
            } else {
                var new_sex = $(this).val().trim();
                $("#editsex").empty();
                $("#editsex").html(new_sex);
                //Cập nhật cơ sở dữ liệu

            }
        });
    });

    //Chỉnh sửa ngày sinh
    $("#bt_editbirthday").click(function() {

        var current_birthday = $("#editbirthday").text().trim();
        $("#editbirthday").empty();
        var input_birthday =
                '<div class="form-group">' +
                '<div class="input-group date" >' +
                '<input id=datetimepicker1 type="text" class="form-control" />' +
                '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>' +
                '</span>' +
                '</div>' +
                '</div>';

        $("#editbirthday").html(input_birthday);
        $("#datetimepicker1").datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function() {
            //Cập nhật cơ sở dữ liệu

        });
    });

    //Cập nhật giới thiệu
    $("#bt_editintroducted").click(function() {

        var current_intro = $("#editintroducted").text().trim();
        $("#editintroducted").empty();
        
        var input_intro = $('<textarea class="form-control" rows="3" id="edit_intro"></textarea>').val(current_intro);
        $("#editintroducted").html(input_intro);

        $("#edit_intro").blur(function() {
            if (!$(this).val()) {
                $("#editintroducted").empty();
                $("#editintroducted").html(current_intro);
            } else {
                var new_intro = $(this).val().trim();
                $("#editintroducted").empty();
                $("#editintroducted").html(new_intro);
                //Cập nhật cơ sở dữ liệu

            }
        });
    });
    //Cập nhật sở thích
    $("#bt_edithobby").click(function() {

        var current_intro = $("#edithobby").text().trim();
        $("#edithobby").empty();
        
        var input_intro = $('<textarea class="form-control" rows="3" id="edit_hobby"></textarea>').val(current_intro);
        $("#edithobby").html(input_intro);

        $("#edit_hobby").blur(function() {
            if (!$(this).val()) {
                $("#edithobby").empty();
                $("#edithobby").html(current_intro);
            } else {
                var new_intro = $(this).val().trim();
                $("#edithobby").empty();
                $("#edithobby").html(new_intro);
                //Cập nhật cơ sở dữ liệu
                
            }
        });
    });
});
