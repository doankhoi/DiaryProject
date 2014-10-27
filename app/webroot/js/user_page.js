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

    //Gợi ý người dùng tìm bài viết

    $("#search").focus(function() {
        //Lấy đữ liệu các bài viết về
        $.ajax({
            type: 'POST',
            url: "users/getAllArticlesUsers",
            dataType: 'json',
            data: {
            },
            success: function(data, textStatus, jqXHR) {
                if (data) {

                    var arr = new Array();
                    var k = 0;
                    for (var i in data) {
                        for (var j in data[i]) {
                            if (j == 'Article') {
                                arr[k++] = data[i][j].title;
                                break;
                            }
                        }
                    }

                    $("#search").autocomplete({
                        source: arr
                    });
                }
            }
        });
    });

    //Gọi tìm kiếm bài viết
    $("#bt_search").click(function() {
        var key = $("#search").val();
        $.ajax({
            type: 'POST',
            url: "articles/search",
            dataType: 'json',
            data: {
                key: key
            },
            success: function(data, textStatus, jqXHR) {
                if (data) {
                    $("#wrap_content").empty();
                    displayResult(data);
                }
            }
        });
    });

    function displayResult(data) {
        var isData = false;
        var key = $("#search").val();
        if (jQuery.isEmptyObject(data)) {
            $("#wrap_content").html("<div class=\"alert alert-dismissable alert-danger\">"+
                                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>"+
                                        "<strong>Không có kết quả nào với từ khóa \""+ key+"\"</strong></div>");
            return;
        }
        var text = '';
        var num = 0;
        for (var item in data) {
            text = '<div class="row">' +
                    '<a href="/DiaryProject/articles/view/' + data[item]['id'] + '"><h4>' + data[item]['title'] + '</h4></a>' +
                    '<p>' + data[item]['content'] + '</p>' +
                    '</div> <hr/>';
            $("#wrap_content").append(text);
            num++;
        }
        
        $("#wrap_content").prepend("<div class=\"alert alert-dismissable alert-success\">"+
                                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>"+
                                        "<strong>Có "+ num+" kết quả được tìm thấy.</strong></div>");        
       
    }
});


