<?php if (!defined('THINK_PATH')) exit();?><form id="edit_form" method="post" style="padding:10px">
<table class="editTable">
	<tr><th>题库标题</th><td><input type="text" id="title" name="title" value="<?php echo ($res['title']); ?>" style="width:200px;"/><em>*</em><input type="hidden" name="id" value="<?php echo ($res['id']); ?>"/></td></tr>	
	<tr><th>课程ID</th><td><input type="text" id="courseId" name="courseId" value="<?php echo ($res['courseId']); ?>" style="width:200px;"/><em>*</em></td></tr>	
	<tr><th>课时ID</th><td><textarea name="sectionId" id="sectionId" cols="50" rows="5"><?php echo ($res['sectionId']); ?></textarea><a href="#" id="upContent" style="display:none;" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="upfileDialog('<?php echo ($currProduct['id']); ?>',1,'','资源图集图片：<?php echo ($res[title]); ?>',1,1,'#content','\r\n')"></a><br>注：海南地区有多个值，换行符(回车键)分隔，第一行中兴平台code，第二行华为平台code（带有rtsp的播放地址）。</td></tr>
	<tr><th>所属资源商</th><td><?php echo ($rpHtml); ?><em>*</em></td></tr>	
	<tr><th>价格</th><td><input type="text" id="price" name="price" value="<?php echo ($res['price']); ?>"/> (权限为1时且产品为单资源购买类型有效)</td></tr>
	<tr><th>权限</th><td><input type="text" id="auth" name="auth" value="<?php echo ($res['auth']); ?>"/><em>*</em> (0－免费,1-收费(也可按产品会员等级编号填写))</td></tr>
	<tr><th>题库路径：</th><td><input type="text" id="libUrl" name="libUrl" value="<?php echo ($res['libUrl']); ?>" style="width:250px" /><em>*</em></td></tr>
	<tr><th>题库导航图片</th><td><input type="text" id="imgUrl" name="imgUrl" value="<?php echo ($res['imgUrl']); ?>" style="width:250px" /><a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="upfileDialog(1,'<?php echo ($thumb); ?>','资源导航图片：<?php echo ($res['imgUrl']); ?>',0,0,'#imgUrl')"></a></td></tr>	
	<tr><th>题库描述</th><td><textarea name="description" id="description" cols="50" rows=5><?php echo ($res['description']); ?></textarea>	
	<tr><th>排序</th><td><input type="text" id="sort" name="sort" value="<?php echo ($res['sort']); ?>"/></td></tr>	
    <tr><th>状态</th><td><?php echo ($statusHtml); ?> <em>*</em></td></tr>
	</table>
</form>