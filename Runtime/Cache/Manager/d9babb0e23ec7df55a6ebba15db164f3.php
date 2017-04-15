<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php echo C('COMM_TITLE');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- STYLESHEETS --><!--[if lt IE 9]>
    <script src="/Public/admin/js/flot/excanvas.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/cloud-admin.css" >
    <link rel="stylesheet" type="text/css"  href="/Public/admin/css/themes/default.css" id="skin-switcher" >
    <link rel="stylesheet" type="text/css"  href="/Public/admin/css/responsive.css" >

    <link href="/Public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" type="text/css" href="/Public/admin/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- TABLE CLOTH -->

    <link rel="stylesheet" type="text/css" href="/Public/admin/js/typeahead/typeahead.css"/>
    <!-- FILE UPLOAD -->
    <link rel="stylesheet" type="text/css" href="/Public/admin/js/bootstrap-fileupload/bootstrap-fileupload.min.css"/>
    <!-- SELECT2 -->
    <link rel="stylesheet" type="text/css" href="/Public/admin/js/select2/select2.min.css"/>
    <!-- UNIFORM -->
    <link rel="stylesheet" type="text/css" href="/Public/admin/js/uniform/css/uniform.default.min.css"/>
       <link href="/Public/admin/js/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/admin/js/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script src="/Public/kindeditor/kindeditor.js"></script>
    <script>

        KindEditor.ready(function(K) {
            window.editor = K.create('#desc',{
                    width : '700px',
                    height : '350px'
                }
            );
        });
    </script>
   

    <!-- FONTS -->

</head>
<body>
<!-- HEADER -->
<header class="navbar clearfix" id="header">
    <div class="container">
        <div class="navbar-brand">
            <!-- COMPANY LOGO -->
            <a href="index.html" style="text-decoration:none">
                <span style="color: white;padding-left: 64px;">rookieCMS</span>
            </a>
            <!-- /COMPANY LOGO -->
            <!-- TEAM STATUS FOR MOBILE -->
            <div class="visible-xs">
                <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
                    <i class="fa fa-users"></i>
                </a>
            </div>
            <!-- /TEAM STATUS FOR MOBILE -->
            <!-- SIDEBAR COLLAPSE -->
            <div id="sidebar-collapse" class="sidebar-collapse btn">
                <i class="fa fa-bars"
                        data-icon1="fa fa-bars"
                        data-icon2="fa fa-bars" ></i>
            </div>
            <!-- /SIDEBAR COLLAPSE -->
        </div>
        <!-- NAVBAR LEFT -->
        <ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">


        </ul>
        <!-- /NAVBAR LEFT -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <li class="dropdown" id="header-notification">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="badge"></span>

                </a>

            </li>
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
            <li class="dropdown" id="header-message">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope"></i>
                    <span class="badge"></span>
                </a>

            </li>
            <!-- END INBOX DROPDOWN -->
            <!-- BEGIN TODO DROPDOWN -->
            <li class="dropdown" id="header-tasks">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-tasks"></i>
                    <span class="badge"></span>
                </a>

            </li>
            <!-- END TODO DROPDOWN -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user" id="header-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="/Public/admin/img/avatars/avatar3.jpg" />
                    <span class="username"><?php echo (session('name')); ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> 修改资料</a></li>
                    <li><a href="<?php echo U('Login/logout');?>"><i class="fa fa-power-off"></i> 退出登录</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>

    <!-- TEAM STATUS -->

    <!-- /TEAM STATUS -->
</header>
<section id="page"><!--/HEADER -->
<!--/HEADER -->
<style type="text/css">

    .wminimize:hover {
        text-decoration: none;
    }

    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
        padding: 8px;
        line-height: 1.428571429;
        vertical-align: top;
        border-top: 0px solid #DDD;
    }
    .collapsed .expander{
        background-image:url('/Public/admin/img/toggle-collapse-dark.png');
    }
    .expander .expander{
        background-image:url('/Public/admin/img/toggle-expand-dark.png');
    }

</style>
<!-- PAGE -->

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <!-- SEARCH BAR -->
        <div id="search-bar">
            <input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
        </div>
        <!-- /SEARCH BAR -->

        <!-- SIDEBAR QUICK-LAUNCH -->
        <!-- <div id="quicklaunch">
        <!-- /SIDEBAR QUICK-LAUNCH -->

        <!-- SIDEBAR MENU -->
        <ul>
            <li <?php if( CONTROLLER_NAME == 'Index'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo U('Index/index');?>">
                    <i class="fa fa-home"></i> <span class="menu-text">首页</span> <span class="selected"></span>
                </a>
            </li>
            <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($openFirstId == $vo['id']): ?>class="has-sub active" <?php else: ?> class="has-sub"<?php endif; ?>>
                    <a href="javascript:;" class=""> <i class="fa <?php echo ($vo["icon"]); ?>"></i> <span class="menu-text"><?php echo ($vo["title"]); ?></span>
                        <span <?php if($openFirstId == $vo['id']): ?>class="arrow open"<?php else: ?>class="arrow"<?php endif; ?>></span>
                    </a>
                <ul class="sub">
                    <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if($v['id'] == $open): ?>class="current"<?php endif; ?> >
                         <a class="" href="<?php echo ($v["urls"]); ?>"><span class="sub-menu-text"><?php echo ($v["title"]); ?></span></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div><!--/HEADER -->
<!-- /SIDEBAR -->
<div id="main-content">
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->

    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <!-- PAGE HEADER-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header">
                            <!-- STYLER -->

                            <!-- /STYLER -->
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="<?php echo U('Index/index');?>">首页</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">权限管理</a>
                                </li>
                                <li>节点管理</li>
                                <a href="<?php echo U('Node/add');?>" class="btn btn-primary pull-right ">增加节点 <i class="fa fa-arrow-right"></i></a>
                            </ul>
                            <div class="clearfix">

                            </div>
                            <!-- /BREADCRUMBS -->

                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->
                <!-- SIMPLE STRIPED -->
                <div class="row">

                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border primary">
                            <div class="box-title">
                                <h4><i class="fa fa-table"></i>节点列表</h4>
                                <div class="tools">

                                    <a href="javascript:;" class="collapse">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="1" rowspan="1">编号</th>
                                        <th >Name</th>
                                        <th >Title</th>
                                        <th >状态</th>
                                        <th >操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr  class="initialized parent collapsed expander" id="tr<?php echo ($val["id"]); ?>">
                                            <td><span style="padding-left: 20px" <?php if($val["show"] == 1): ?>class="expander"<?php endif; ?>   onclick="tr_show(<?php echo ($val["id"]); ?>)"></span><span><?php echo ($val["id"]); ?></span></td>
                                            <td ><?php echo ($val["name"]); ?></td>
                                            <td ><?php echo ($val["title"]); ?></td>
                                            <td >
                                                <?php if($val["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><span class="label label-primary arrow-in adminstatus"><?php echo ($val["nodeStatus"]); ?></span>
                                                <?php else: ?>
                                                    <span class="label label-danger arrow-in arrow-in-right adminstatus"><?php echo ($val["nodeStatus"]); ?></span><?php endif; ?>
                                            </td>
                                            <td >
                                                <a href="<?php echo U('Node/edit',array('id'=>$val['id']));?>" class="fa fa-pencil tip" data-original-title="修改" id="tr<?php echo ($val["id"]); ?>"></a>&nbsp;
                                                <?php if($val["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="禁用"></a>
                                                 <?php else: ?>
                                                    <a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="启用"></a><?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php if(is_array($val["child"])): $i = 0; $__LIST__ = $val["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr  class="initialized parent collapsed expander show<?php echo ($val["id"]); ?>" style="margin-left: 20px; display:none" id="tr<?php echo ($vo["id"]); ?>">
                                                <td>
                                                    <span style="padding-left: 20px;margin-left: 15px;" <?php if($vo["show"] == 1): ?>class="expander"<?php endif; ?>  onclick="tr_show(<?php echo ($vo["id"]); ?>)"></span><span><?php echo ($vo["id"]); ?></span>
                                                </td>
                                                <td >&nbsp;&nbsp;├─<?php echo ($vo["name"]); ?></td>
                                                <td >&nbsp;&nbsp;├─<?php echo ($vo["title"]); ?></td>
                                                <td >
                                                    <?php if($vo["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><span class="label label-primary arrow-in adminstatus"><?php echo ($vo["nodeStatus"]); ?></span>
                                                     <?php else: ?>
                                                        <span class="label label-danger arrow-in arrow-in-right adminstatus"><?php echo ($vo["nodeStatus"]); ?></span><?php endif; ?>
                                                </td>
                                                <td >
                                                    <a href="<?php echo U('Node/edit',array('id'=>$vo['id']));?>" class="fa fa-pencil tip" data-original-title="修改" id="tr<?php echo ($vo["id"]); ?>"></a>&nbsp;
                                                    <?php if($vo["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="禁用"></a>
                                                    <?php else: ?>
                                                        <a style="cursor: pointer;" class="fa fa-trash-o tip status" href="javascript:void(0);" data-original-title="启用"></a><?php endif; ?>

                                                </td>
                                            </tr>
                                            <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr  class="initialized parent collapsed expander show<?php echo ($vo["id"]); ?>" style="margin-left: 20px; display:none" id="tr<?php echo ($v["id"]); ?>">
                                                    <td><span style="padding-left: 20px;margin-left: 15px;" <?php if($v["show"] == 1): ?>class="expander"<?php endif; ?> onclick="tr_show(<?php echo ($v["id"]); ?>)""></span><span><?php echo ($v["id"]); ?></span></td>
                                                    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  └─ <?php echo ($v["name"]); ?></td>
                                                    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  └─ <?php echo ($v["title"]); ?></td>
                                                    <td >
                                                        <?php if($v["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><span class="label label-primary arrow-in adminstatus"><?php echo ($v["nodeStatus"]); ?></span>
                                                        <?php else: ?>
                                                            <span class="label label-danger arrow-in arrow-in-right adminstatus"><?php echo ($v["nodeStatus"]); ?></span><?php endif; ?>
                                                    </td>
                                                    <td ><a href="<?php echo U('Node/edit',array('id'=>$v['id']));?>"
                                                            class="fa fa-pencil tip" data-original-title="修改" id="tr<?php echo ($v["id"]); ?>"></a>&nbsp;
                                                        <?php if($v["status"] == Manager\Model\AuthRuleModel::STATUS_ENABLE): ?><a href="javascript:void(0);" style="cursor: pointer;" class="fa fa-trash-o tip status" data-original-title="禁用"></a>
                                                         <?php else: ?>
                                                            <a href="javascript:void(0);" style="cursor: pointer;" class="fa fa-trash-o tip status" data-original-title="启用"></a><?php endif; ?>

                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /BOX -->
                    </div>
                </div>

                <!-- /BORDERED HOVER -->
            </div>
            <!--/HEADER -->
            <div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
</div>
</div><!-- /CONTENT-->
<div class="separator"></div>
</div>
</div>
</section>
<!--/PAGE -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="/Public/admin/js/jquery/jquery-2.0.3.min.js"></script>
<!-- JQUERY UI-->
<script src="/Public/admin/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- BOOTSTRAP -->
<script src="/Public/admin/bootstrap-dist/js/bootstrap.min.js"></script>


<!-- DATE RANGE PICKER -->
<script src="/Public/admin/js/bootstrap-daterangepicker/moment.min.js"></script>

<script src="/Public/admin/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<!-- SLIMSCROLL -->
<script type="text/javascript" src="/Public/admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/Public/admin/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="/Public/admin/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
<!-- TABLE CLOTH -->
<script type="text/javascript" src="/Public/admin/js/tablecloth/js/jquery.tablecloth.js"></script>
<script type="text/javascript" src="/Public/admin/js/tablecloth/js/jquery.tablesorter.min.js"></script>
<!-- COOKIE -->
<script type="text/javascript" src="/Public/admin/js/jQuery-Cookie/jquery.cookie.min.js"></script>
<!-- CUSTOM SCRIPT -->
<script src="/Public/admin/js/script.js"></script>
<script src="/Public/layer/layer.js"></script>
<script src="/Public/kindeditor/kindeditor.js"></script>

    <script type="text/javascript" src="/Public/admin/js/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/Public/admin/js/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" ></script>
<script>
    jQuery(document).ready(function() {
        App.setPage("simple_table");  //Set current page
        App.init(); //Initialise plugins and elements
    });
</script>
<!-- /JAVASCRIPTS -->
</body>
</html>
            <script type="text/javascript">
                $(function(){
                    $(".status").click(function(){
                        var parent=$(this).parent().parent()
                        var id=parent.find('td:first span').eq(1).html();
                        var msg=$(this).attr("data-original-title");
                        if(msg=="启用") {
                            status="<?=Manager\Model\AuthRuleModel::STATUS_DISABLE?>";
                        }else {
                            status="<?=Manager\Model\AuthRuleModel::STATUS_ENABLE?>";
                        }
                        layer.confirm('你确定要'+msg+"吗？",{
                            btn:[ '确认','取消' ] //按钮
                        },function(){
                            $.post("<?php echo U('Node/del');?>",{ "id":id,"status":status },function( response ){
                                if(response.error==100) {
                                    throwExc(response.message);
                                    return false;
                                }else if(response.error==200) {
                                    showSucc(response.message);
                                    setTimeout("location.reload()",1000);
                                }else {
                                    throwExc(response.info);
                                    return false;
                                }
                            },"json");

                        },function(){
                            layer.msg('取消成功',{
                                time:800, //20s后自动关闭
                            });
                        });

                    });
                })
                function load(){
                    location.reload() ;
                }


                function tr_show(data){
                    var show= $('.show'+data);
                    $("#tr"+data).toggleClass('expander');
                    show.toggle();
                }
            </script>