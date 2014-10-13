/* 
 * Dùng tạo hiệu ứng cho trang user_page
 */

$(function() {
    //Người dùng click vào thông báo trên navibar
    $("#showmessage").click(function() {
        $("#notify-container").toggle();
    });

    $(".readcomment").click(function() {
        var users_id = $(this).attr("users_id");
        var articles_id = $(this).attr("articles_id");
        $.ajax({
            type: 'POST',
            url: "updateReadComment",
            data: {
                users_id: users_id,
                articles_id: articles_id
            }
        });

        //Cập nhật lại số thông báo
        var num = $("#showmessage span").text();
        if (num == 0) {
            $("#showmessage span").empty();
        } else {
            $("#showmessage span").text(num - 1);
        }
    });

    $(".readinvite").click(function() {
        var users_id = $(this).attr("users_id");
        var articles_id = $(this).attr("articles_id");
        $.ajax({
            type: 'POST',
            url: "updateReadInvite",
            data: {
                users_id: users_id,
                articles_id: articles_id
            }
        });

        //Cập nhật lại số thông báo
        var num = $("#showmessage span").text();
        if (num == 0) {
            $("#showmessage span").empty();
        } else {
            $("#showmessage span").text(num - 1);
        }
    });

    $(".readlike").click(function() {
        var users_id = $(this).attr("users_id");
        var articles_id = $(this).attr("articles_id");
        $.ajax({
            type: 'POST',
            url: "updateReadLike",
            data: {
                users_id: users_id,
                articles_id: articles_id
            }
        });

        //Cập nhật lại số thông báo
        var num = $("#showmessage span").text();
        if (num == 0) {
            $("#showmessage span").empty();
        } else {
            $("#showmessage span").text(num - 1);
        }
    });

});
