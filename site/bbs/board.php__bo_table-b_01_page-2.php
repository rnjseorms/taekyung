<!DOCTYPE html>

<html lang="ko">
<head>
<meta charset="utf-8"/>
<meta content="no" http-equiv="imagetoolbar"/>
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<title>갤러리 2 페이지 | 태경산업</title>
<link href="../theme/basic/css/default.css__ver-2303229.css" rel="stylesheet"/>
<link href="../js/font-awesome/css/font-awesome.min.css__ver-2303229.css" rel="stylesheet"/>
<link href="../skin/board/gallery/style.css__ver-2303229.css" rel="stylesheet"/>
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
<link href="../_css/main_c.css" rel="stylesheet" type="text/css"/>
<!-- 전체 DIV -->
<link href="../_css/menu.css" rel="stylesheet" type="text/css"/>
<script src="../js/url.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function () {
		$(function () {
				$('#main_visual').jBanner({ width: '100%', height: 420 });
			});
    });
</script>
<script type="text/javascript">
	    $(document).ready(function() {	
		$('#nav li').hover(function() {
			$('ul', this).slideDown(200);
			$(this).children('a:first').addClass("hov");
		}, function() {
			$('ul', this).slideUp(100);
			$(this).children('a:first').removeClass("hov");		
		});
	});		// sub_menu slide
	
	
</script>
<div class="menubg">
<div id="top_wrap">
<!--div id="top_menu">
        	<ul>
        		<li><a href="javascript:top1();">HOME</a></li>
        		<li><a href="javascript:top2();">CONTACT US</a></li>
        	</ul>
        </div -->
</div><!-- top_wrap -->
<div id="header">
<h1><a href="../index.html"><img src="../images/logo2.png" style="height:60px;"/></a></h1>
<div class="nav_wrap">
<ul id="nav">
<li class="menu_bar"><a href="board.php__bo_table-a_01.php"><p>회사소개</p></a>
<ul class="menu1">
<li class="mbd"><a href="board.php__bo_table-a_01.php">인사말</a></li>
<li><a href="board.php__bo_table-a_02.php">오시는 길</a></li>
</ul>
</li>
<li class="menu_bar"><a href="board.php__bo_table-b_01.php"><p> 갤러리</p></a>
<ul class="menu1">
</ul>
</li>
<li class="menu_bar"><a href="board.php__bo_table-e_01.php"><p> 인증현황</p></a>
<ul class="menu1">
</ul>
</li>
<li class="menu_bar"><a href="board.php__bo_table-c_01.php"><p>온라인문의</p></a>
<ul class="menu1">
</ul>
</li>
<li class="menu_bar"><a href="board.php__bo_table-d_01.php"><p>자료실</p></a>
<ul class="menu1">
<!-- <li class="mbd"><a href="/bbs/board.php?bo_table=cu01">자료실</a></li>
                       <li><a href="/bbs/board.php?bo_table=cu02">자료실</a></li>-->
</ul>
</li>
</ul>
</div><!-- nav_wrap -->
</div><!-- header -->
</div>
<div id="wrap">
<div class="subtop">
<div class="subfla">
<div class="smove_img">
<!--h2>제목 </h2><hr>
		<p>내용부분</p--></div>
<div class="smove_txt"></div>
</div>
</div>
<!-- Contents -->
<div id="contents_m">
<div class="contents_s">
<!-- start :: lnb -->
<div class="lnb">
<h3>갤러리</h3>
<ul>
<li class="mbd"><a href="board.php__bo_table-b_01.php">갤러리</a></li>
</ul>
<div class="lnb_common">
<dl>
<dt>CUSTOMER CENTER</dt>
<dd style="font-size:13px; padding-bottom:9px;">고객의 소리에 귀기울이겠습니다</dd>
<dd class="tel">T : 031-297-1249 </dd>
<dd class="fax">F : 031-227-4715 </dd>
<dd class="fax">H.P : 010-2204-7586</dd>
<dd class="mailto">E : <a href="mailto:tk8108@naver.com">tk8108@naver.com</a></dd>
</dl>
</div> </div>
<!-- end :: lnb -->
<div class="subcontent">
<div class="page-title">
<span class="page-title-text">갤러리</span>
<div class="page-navi">
<span class="icon-navi-home"><span class="blind">HOME</span></span>
<!--<span class="icon-navi-arrow"><span class="none">&gt;</span></span>
				<span class="">회사소개</span>-->
<span class="icon-navi-arrow"><span class="none">&gt;</span></span>
<span class="">갤러리</span>
</div>
</div><!--//subcontent-->
<div class="sub_com">
<!-- 게시판 목록 시작 { -->
<div id="bo_gall" style="width:100%">
<form action="board_list_update.php" id="fboardlist" method="post" name="fboardlist" onsubmit="return fboardlist_submit(this);">
<input name="bo_table" type="hidden" value="b_01"/>
<input name="sfl" type="hidden" value=""/>
<input name="stx" type="hidden" value=""/>
<input name="spt" type="hidden" value=""/>
<input name="sst" type="hidden" value="wr_num, wr_reply"/>
<input name="sod" type="hidden" value=""/>
<input name="page" type="hidden" value="2"/>
<input name="sw" type="hidden" value=""/>
<!-- 게시판 페이지 정보 및 버튼 시작 { -->
<div id="bo_btn_top">
<div id="bo_list_total">
<span>Total 26건</span>
            2 페이지
        </div>
<ul class="btn_bo_user">
<li>
<button class="btn_bo_sch btn_b01 btn" title="게시판 검색" type="button"><i aria-hidden="true" class="fa fa-search"></i><span class="sound_only">게시판 검색</span></button>
</li>
</ul>
</div>
<!-- } 게시판 페이지 정보 및 버튼 끝 -->
<ul class="gall_row" id="gall_ul">
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        11                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-16.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_opPvsFqr_fb680b48537ffdf5b799a779981b7ca16c673068_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-16.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 86</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        10                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-15.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_SJVQe8jB_47d6c195d886b753f170025c1ded0076ffdaff7f_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-15.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 50</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        9                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-14.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_Wd53smAY_218f10491be6446c790c003e3a1ee54286c2154b_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-14.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 54</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3 box_clear">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        8                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-10.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_ONaWZgwB_1093a533fa2f738de670573c908f31aa0a72b684_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-10.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 57</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        7                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-8.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_LsHE6TUO_4291e7c9023284a5f066e6f88cd9bee79707a3eb_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-8.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 52</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        6                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-7.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_QYHteiup_a6dbd89e345610594d7e112ede621247fef85f5a_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-7.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 62</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3 box_clear">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        5                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-5.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_pHe2UmGO_e15371b292ba9301115be3b7e077027bc9c816e2_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-5.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 53</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        4                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-4.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_RUJIhtrw_b3688ea4067a66926a27a4058634458a55bd48a6_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-4.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 49</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        3                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-3.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_2B7x5uNw_db1f56f928207a378f858b3d3f4892b769d89a91_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-3.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 사진   </center>
</a>
<!--                         <span class="bo_cnt">&nbsp; &nbsp;</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 82</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3 box_clear">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        2                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-2.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_YVTBcdH0_8b0dd1c744447e9f22735c635fbcfc281b2ad8e0_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-2.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 운전 콘트롤박스및 운전선   </center>
</a>
<!--                         <span class="bo_cnt">운전 콘트롤박스및 운전선</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 63</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
<li class="gall_li col-gn-3">
<div class="gall_box">
<div class="gall_chk chk_box">
<span class="sound_only">
                        1                    </span>
</div>
<div class="gall_con">
<div class="gall_img" style="height:280px;max-height:280px">
<a href="board.php__bo_table-b_01_page-2_wr_id-1.php">
<img alt="" src="../data/file/b_01/thumb-30d254022a30fd641d7568a874612d3f_9caWnvij_f4371dc59edbc8a1e717194c505bb1dc36dc230e_200x280.jpg"/> </a>
</div>
<div class="gall_text_href">
<a class="bo_tit" href="board.php__bo_table-b_01_page-2_wr_id-1.php">
<!-- 갤러리 댓글기능 사용시 주석을 제거하세요. -->
<center> 운전 콘트롤박스및 운전선   </center>
</a>
<!--                         <span class="bo_cnt">운전 콘트롤박스및 운전선</span>-->
</div>
<!--
                    <div class="gall_info">
                        <span class="sound_only">작성자 </span><span class="sv_member">최고관리자</span>                        <span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> 04-26</span>
                        <span class="gall_view"><span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> 45</span>
                    </div>
                    <div class="gall_option">
                                                         
                    </div>
-->
</div>
</div>
</li>
</ul>
<!-- 페이지 -->
<nav class="pg_wrap"><span class="pg"><a class="pg_page pg_start" href="board.php__bo_table-b_01_page-1.php">처음</a>
<a class="pg_page" href="board.php__bo_table-b_01_page-1.php">1<span class="sound_only">페이지</span></a>
<span class="sound_only">열린</span><strong class="pg_current">2</strong><span class="sound_only">페이지</span>
</span></nav> <!-- 페이지 -->
</form>
<!-- 게시판 검색 시작 { -->
<div class="bo_sch_wrap">
<fieldset class="bo_sch">
<h3>검색</h3>
<form method="get" name="fsearch">
<input name="bo_table" type="hidden" value="b_01"/>
<input name="sca" type="hidden" value=""/>
<input name="sop" type="hidden" value="and"/>
<label class="sound_only" for="sfl">검색대상</label>
<select id="sfl" name="sfl">
<option value="wr_subject">제목</option><option value="wr_content">내용</option><option value="wr_subject||wr_content">제목+내용</option><option value="wr_name,1">글쓴이</option><option value="wr_name,0">글쓴이(코)</option> </select>
<label class="sound_only" for="stx">검색어<strong class="sound_only"> 필수</strong></label>
<div class="sch_bar">
<input class="sch_input" id="stx" maxlength="20" name="stx" placeholder="검색어를 입력해주세요" required="" size="25" type="text" value=""/>
<button class="sch_btn" type="submit" value="검색"><i aria-hidden="true" class="fa fa-search"></i><span class="sound_only">검색</span></button>
</div>
<button class="bo_sch_cls" type="button"><i aria-hidden="true" class="fa fa-times"></i><span class="sound_only">닫기</span></button>
</form>
</fieldset>
<div class="bo_sch_bg"></div>
</div>
<script>
        // 게시판 검색
        $(".btn_bo_sch").on("click", function() {
            $(".bo_sch_wrap").toggle();
        })
        $('.bo_sch_bg, .bo_sch_cls').click(function(){
            $('.bo_sch_wrap').hide();
        });
    </script>
<!-- } 게시판 검색 끝 -->
</div>
<!-- } 게시판 목록 끝 -->
</div>
</div>
</div>
</div>
<!--//contents_m -->
<button id="top_btn" type="button"><i aria-hidden="true" class="fa fa-arrow-up"></i><span class="sound_only">상단으로</span></button>
<script>

	$(function() {
		$("#top_btn").on("click", function() {
			$("html, body").animate({scrollTop:0}, '500');
			return false;
		});
	});
	</script>
<div id="foot">
<div class="footer">
<h2><img src="../images/logo2.png"/></h2>
<ul>
<li>주소: 경기도 화성시 봉담읍 왕림리 532</li>
<li>TEL : 031-297-1249  l  H.P : 010-2204-7586  l  FAX: 031-227-4715  l  E-mail: tk8108@naver.com</li>
<li class="copy">COPYRIGHTⓒ<b> 태경산업 </b>ALL RIGHTS RESERVED.</li>
</ul>
</div>
</div>
</div>

<!-- 전체 DIV 끝-->
<script>
$(document).ready(function(){
	//$('.mvisual .move_img').delay(500).fadeIn(1500);
	$('.subfla .smove_img').delay(500).animate({'margin-top':'0','opacity':'1'},1300);
	$('.subfla .smove_txt').delay(1000).animate({'margin-left':'0','opacity':'1'},1300);
	$('.subfla2 .smove_txt').delay(1000).animate({'margin-left':'0','opacity':'1'},1300);
	$('.subfla3 .smove_txt').delay(1000).animate({'margin-left':'0','opacity':'1'},1300);

}); 
</script>
</body>
</html>
<!-- 사용스킨 : gallery -->


