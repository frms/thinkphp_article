<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/thinkphp/Application/Admin/Public/css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》添加商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/thinkphp/index.php/Admin/Type/updatetype" method="post">
            <table border="1" width="100%" class="table_a">
                 <tr>
                    <td>栏目序号</td>
                    <td><input type="text" name="id" value="<?php echo ($data["id"]); ?>" /></td>
                <tr>
                    <td>栏目名称</td>
                    <td><input type="text" name="type" value="<?php echo ($data["type"]); ?>" /></td>
                </tr>
                <tr>
                    <td>栏目名称2</td>
                    <td><input type="text" name="test" value="<?php echo ($data["test"]); ?>" /></td>
                </tr>
               
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>