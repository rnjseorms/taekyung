<!DOCTYPE html>

<html lang="ko">
<head>
<meta charset="utf-8"/>
<meta content="no" http-equiv="imagetoolbar"/>
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<title>이미지 크게보기 | 태경산업</title>
<link href="../theme/basic/css/default.css__ver-2303229.css" rel="stylesheet"/>
<link href="../js/font-awesome/css/font-awesome.min.css__ver-2303229.css" rel="stylesheet"/>
<!--[if lte IE 8]>
<script src="http://www.tk114.co.kr/js/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "http://www.tk114.co.kr";
var g5_bbs_url   = "http://www.tk114.co.kr/bbs";
var g5_is_member = "";
var g5_is_admin  = "";
var g5_is_mobile = "";
var g5_bo_table  = "b_01";
var g5_sca       = "";
var g5_editor    = "smarteditor2";
var g5_cookie_domain = "";
var g5_theme_shop_url = "http://www.tk114.co.kr/theme/basic/shop";
var g5_shop_url = "http://www.tk114.co.kr/shop";
</script>
<script src="../js/jquery-1.12.4.min.js__ver-2304171.js"></script>
<script src="../js/jquery-migrate-1.4.1.min.js__ver-2304171.js"></script>
<script src="../js/jquery.menu.js__ver-2304171.js"></script>
<script src="../js/common.js__ver-2304171.js"></script>
<script src="../js/wrest.js__ver-2304171.js"></script>
<script src="../js/placeholders.min.js__ver-2304171.js"></script>
</head>
<body>
<div class="bbs-view-image"><img alt="" class="draggable" height="1400" src="../data/file/b_01/30d254022a30fd641d7568a874612d3f_ONaWZgwB_1093a533fa2f738de670573c908f31aa0a72b684.jpg" style="position:relative;top:0;left:0;cursor:move;" width="1050"/></div>
<script>

jQuery(function($){

$.fn.imgLoad = function(callback) {
    return this.each(function() {
        if (callback) {
            if (this.complete || /*for IE 10-*/ $(this).height() > 0) {
                callback.apply(this);
            }
            else {
                $(this).on('load', function(){
                    callback.apply(this);
                });
            }
        }
    });
};

    $(".bbs-view-image img").imgLoad(function(){

        var win_w = 1050;
        var win_h = 1400 + 70;

        if( !win_w || !win_h ){
            win_w = $(this).width();
            win_h = $(this).height();
        }

        var win_l = (screen.width - win_w) / 2;
        var win_t = (screen.height - win_h) / 2;

        if(win_w > screen.width) {
            win_l = 0;
            win_w = screen.width - 20;

            if(win_h > screen.height) {
                win_t = 0;
                win_h = screen.height - 40;
            }
        }

        if(win_h > screen.height) {
            win_t = 0;
            win_h = screen.height - 40;

            if(win_w > screen.width) {
                win_w = screen.width - 20;
                win_l = 0;
            }
        }

        if(win_w < screen.width) {
            if(window.outerWidth){
                win_w = win_w + (window.outerWidth - (document.documentElement.clientWidth || window.innerWidth));
            }
        }

        window.moveTo(win_l, win_t);
        window.resizeTo(win_w, win_h);
    });

    var is_draggable = false;
    var x = y = 0;
    var pos_x = pos_y = 0;

    $(".draggable").mousemove(function(e) {
        if(is_draggable) {
            x = parseInt($(this).css("left")) - (pos_x - e.pageX);
            y = parseInt($(this).css("top")) - (pos_y - e.pageY);

            pos_x = e.pageX;
            pos_y = e.pageY;

            $(this).css({ "left" : x, "top" : y });
        }

        return false;
    });

    $(".draggable").mousedown(function(e) {
        pos_x = e.pageX;
        pos_y = e.pageY;
        is_draggable = true;
        return false;
    });

    $(".draggable").mouseup(function() {
        is_draggable = false;
        return false;
    });

    $(".draggable").dblclick(function() {
        window.close();
    });
});
</script>
</body>
</html>
