<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/thinkphp_article/Application/Admin/Public/css/mine.css" type="text/css" rel="stylesheet">
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
            <form action="/thinkphp_article/admin.php/Article/addArticle" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>标题</td>
                    <td><input type="text" name="title" /></td>
                </tr>
                <tr>
                    <td>作者</td>
                    <td><input type="text" name="author" /></td>
                </tr>
                <tr>
                    <td>热门</td>
                    <td><input type="checkbox" name="hot" value="1" /></td>
                </tr>
                <tr>
                    <td>最新</td>
                    <td><input type="checkbox" name="new" value="1" /></td>
                </tr>
                <tr>
                    <td>商品分类</td>
                    <td>
                        <select name="typeid">
                            <option value="0">请选择</option>
                           
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["typeid"]); ?>"><?php echo ($vo["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
               
               
                <tr>
                    <td>文章图片</td>
                    <td><input type="file" name="pic" /></td>
                </tr>
                <tr>
                    <td>文章内容</td>
                    <td>
                        <textarea name="des"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>