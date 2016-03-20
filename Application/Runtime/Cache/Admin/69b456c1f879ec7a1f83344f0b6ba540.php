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
            <form action="/thinkphp_article/admin.php/Article/updateArticle" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"  />
                <tr>
                    <td>标题</td>
                    <td><input type="text" name="title" value="<?php echo ($data["title"]); ?>" /></td>
                </tr>
                <tr>
                    <td>作者</td>
                    <td><input type="text" name="author" value="<?php echo ($data["author"]); ?>" /></td>
                </tr>
                <tr>
                    <td>热门</td>
                    <td><input type="checkbox" name="hot" value="1" <?php if($data['hot'] == 1): ?>checked="checked"<?php endif; ?> /></td>
                </tr>
                <tr>
                    <td>最新</td>
                    <td><input type="checkbox" name="new" value="1" <?php if($data['new'] == 1): ?>checked="checked"<?php endif; ?> /></td>
                </tr>
                <tr>
                    <td>商品分类</td>
                    <td>
                        <select name="typeid">
                            <option value="0">请选择</option>
                           
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($data['typeid2'] == $vo['typeid']): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo["typeid"]); ?>"><?php echo ($vo["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
               
               
                <tr>
                    <td>文章图片</td>
                    <td><input type="file" name="pic" />
                    <?php if($data[pic] != '' ): ?><img src="/thinkphp_article<?php echo ($data["pic"]); ?>"  height="40"></td>
                    <?php else: ?>
                        暂无缩略图<?php endif; ?>
                    
                </tr>
                <tr>
                    <td>文章内容</td>
                    <td>
                        <textarea name="des" >
                            <?php echo ($data["des"]); ?>

                        </textarea>
                        
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