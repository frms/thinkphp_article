<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>会员列表</title>

    <link href="/thinkphp/Application/Admin/Public/css/mine.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <style>
        .tr_color{background-color: #9F88FF}
    </style>
    <div class="div_head">
        <span>
            <span style="float: left;">当前位置是：商品管理-》商品列表</span>
            <span style="float: right; margin-right: 8px; font-weight: bold;">
                <a style="text-decoration: none;" href="/thinkphp/index.php/Admin/Type/tianjia" target="main">【添加栏目】</a>
            </span>
        </span>
    </div>
    <div></div>

    <div style="font-size: 13px; margin: 10px 5px;">
        <table class="table_a" border="1" width="100%">
            <tbody>

            <tr style="font-weight: bold;">
                <td>序号</td>
                <td>栏目名称</td>
               
                <td align="center" colspan="10">操作</td>
            </tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="product1">
                <td><?php echo ($vo["id"]); ?></td>
                <td><a href="/thinkphp/index.php/Admin/Type/xiugai/id/<?php echo ($vo["id"]); ?>/type/<?php echo ($vo["type"]); ?>"><?php echo ($vo["type"]); ?></a></td>
              
                <td><a href="/thinkphp/index.php/Admin/Type/xiugai/id/<?php echo ($vo["id"]); ?>/type/<?php echo ($vo["type"]); ?>">修改</a></td>
                <td><a href="/thinkphp/index.php/Admin/Type/delete/id/<?php echo ($vo["id"]); ?>/" onclick="return confirm('你确定删除这个栏目吗？')">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td colspan="20" style="text-align: center;">
                   <?php echo ($page); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>