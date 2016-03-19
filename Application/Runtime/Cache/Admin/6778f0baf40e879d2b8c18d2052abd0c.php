<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link href="/thinkphp/Application/Admin/Public/css/admin.css" type="text/css" rel="stylesheet">
        <script language="javascript">
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <table width="170" height="800" cellspacing="0" cellpadding="0" border="0" background="/thinkphp/Application/Admin/Public/img/menu_bg.jpg">
               <tbody><tr>
                <td valign="top" align="center">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">

                        <tbody><tr>
                            <td height="10"></td></tr></tbody></table>
                    <table width="150" cellspacing="0" cellpadding="0" border="0">

                        <tbody><tr height="22">
                            <td background="/thinkphp/Application/Admin/Public/img/menu_bt.jpg" style="padding-left: 30px"><a class="menuparent" onclick="expand(1)" href="javascript:void(0);">关于我们</a></td></tr>
                        <tr height="4">
                            <td></td></tr></tbody></table>
                    <table width="150" cellspacing="0" cellpadding="0" border="0" id="child1" style="display: block;">
                        <tbody><tr height="20">
                            <td width="30" align="center"><img width="9" height="9" src="/thinkphp/Application/Admin/Public/img/menu_icon.gif"></td>
                            <td><a class="menuchild" href="/thinkphp/index.php/Admin/Type/showtype" target="main">栏目管理</a></td></tr>
                        <tr height="20">
                            <td width="30" align="center"><img width="9" height="9" src="/thinkphp/Application/Admin/Public/img/menu_icon.gif"></td>
                            <td><a class="menuchild" href="/thinkphp/index.php/Admin/Type/showlist" target="main">文章管理</a></td></tr>
                        <tr height="20">
                            <td width="30" align="center"><img width="9" height="9" src="/thinkphp/Application/Admin/Public/img/menu_icon.gif"></td>
                            <td><a class="menuchild" href="/thinkphp/index.php/Admin/Type/showlist" target="main">管理员管理</a></td></tr>
                        <tr height="20">
                            <td width="30" align="center"><img width="9" height="9" src="/thinkphp/Application/Admin/Public/img/menu_icon.gif"></td>
                            <td><a class="menuchild" href="/thinkphp/index.php/Admin/Type/showlist" target="main">子类管理</a></td></tr>
                        <tr height="4">
                            <td colspan="2"></td></tr></tbody></table>
                    </td>
                <td width="1" bgcolor="#d1e6f7"></td>
            </tr>
        </tbody></table>
    
</body></html>