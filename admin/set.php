<?php
/**
版权所有资源之咖
百晓解密2137650183
6元一个魔方文件
资源之咖689822221
该版权死全家
**/
?>
<?php  include('../includes/common.php');
$title='后台管理';
include('./head.php');
if ($islogin!=1) {exit('<script language=\'javascript\'>window.location.href=\'./login.php\';</script>');
}
$mod=(isset($_GET['mod'])?$_GET['mod']:NULL);
if ($mod=='site_n' && $_POST['do']=='submit') {$sitename=$_POST['sitename'];
$title=$_POST['title'];
$keywords=$_POST['keywords'];
$description=$_POST['description'];
$kfqq=$_POST['kfqq'];
$verify_open=$_POST['verify_open'];
$captcha_open=$_POST['captcha_open'];
$captcha_id=$_POST['captcha_id'];
$captcha_key=$_POST['captcha_key'];
$iskami=$_POST['iskami'];
$kaurl=$_POST['kaurl'];
$blacklist=$_POST['blacklist'];
$hide_tongji=$_POST['hide_tongji'];
$lqqapi=$_POST['lqqapi'];
$build=$_POST['build'];
$qqjump=$_POST['qqjump'];
$apikey=$_POST['apikey'];
$cronkey=$_POST['cronkey'];
$ui_bing=$_POST['ui_bing'];
$user=$_POST['user'];
$pwd=$_POST['pwd'];
if ($sitename==NULL) {showmsg('必填项不能为空！',3);
}saveSetting('sitename',$sitename);
saveSetting('title',$title);
saveSetting('keywords',$keywords);
saveSetting('description',$description);
saveSetting('kfqq',$kfqq);
saveSetting('verify_open',$verify_open);
saveSetting('captcha_open',$captcha_open);
saveSetting('captcha_id',$captcha_id);
saveSetting('captcha_key',$captcha_key);
saveSetting('iskami',$iskami);
saveSetting('kaurl',$kaurl);
saveSetting('blacklist',$blacklist);
saveSetting('hide_tongji',$hide_tongji);
saveSetting('lqqapi',$lqqapi);
saveSetting('build',$build);
saveSetting('qqjump',$qqjump);
saveSetting('apikey',$apikey);
saveSetting('cronkey',$cronkey);
saveSetting('ui_bing',$ui_bing);
saveSetting('admin_user',$user);
if (!empty($pwd)) {saveSetting('admin_pwd',$pwd);
}$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='site') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站信息配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=site_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-sm-10"><input type="text" name="sitename" value="';
echo $conf['sitename'];
echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">标题栏后缀</label>
	  <div class="col-sm-10"><input type="text" name="title" value="';
echo $conf['title'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">关键字</label>
	  <div class="col-sm-10"><input type="text" name="keywords" value="';
echo $conf['keywords'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站描述</label>
	  <div class="col-sm-10"><input type="text" name="description" value="';
echo $conf['description'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">客服ＱＱ</label>
	  <div class="col-sm-10"><input type="text" name="kfqq" value="';
echo $conf['kfqq'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">下单验证模块</label>
	  <div class="col-sm-10"><select class="form-control" name="verify_open" default="';
echo $conf['verify_open'];
echo '"><option value="1">开启</option><option value="0">关闭</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">是否开启卡密下单</label>
	  <div class="col-sm-10"><select class="form-control" name="iskami" default="';
echo $conf['iskami'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">卡密购买地址</label>
	  <div class="col-sm-10"><input type="text" name="kaurl" value="';
echo $conf['kaurl'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页显示订单金额统计信息</label>
	  <div class="col-sm-10"><select class="form-control" name="hide_tongji" default="';
echo $conf['hide_tongji'];
echo '"><option value="0">开启</option><option value="1">关闭</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">下单黑名单</label>
	  <div class="col-sm-10"><input type="text" name="blacklist" value="';
echo $conf['blacklist'];
echo '" class="form-control" placeholder="多个账号之间用|隔开"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站背景图</label>
	  <div class="col-sm-10"><select class="form-control" name="ui_bing" default="';
echo $conf['ui_bing'];
echo '"><option value="0">自定义背景图片</option><option value="1">随机壁纸</option><option value="2">Bing每日壁纸</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站创建时间</label>
	  <div class="col-sm-10"><input type="date" name="build" value="';
echo $conf['build'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">拉圈圈赞API</label>
	  <div class="col-sm-10"><input type="text" name="lqqapi" value="';
echo $conf['lqqapi'];
echo '" class="form-control" placeholder="填写后将在首页显示免费拉圈圈，没有请留空"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">手机QQ打开网站跳转其他浏览器</label>
	  <div class="col-sm-10"><select class="form-control" name="qqjump" default="';
echo $conf['qqjump'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">API对接密钥</label>
	  <div class="col-sm-10"><input type="text" name="apikey" value="';
echo $conf['apikey'];
echo '" class="form-control" placeholder="用于下单软件，随便填写即可"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">监控密钥</label>
	  <div class="col-sm-10"><input type="text" name="cronkey" value="';
echo $conf['cronkey'];
echo '" class="form-control" placeholder="用于易支付补单监控使用"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">免费商品开启滑动验证码</label>
	  <div class="col-sm-10"><select class="form-control" name="captcha_open" default="';
echo $conf['captcha_open'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div id="captcha_frame" style="';
echo ($conf['captcha_open']==0 ? 'display:none;' : 'NULL');
echo '">
	<div class="form-group">
	  <label class="col-sm-2 control-label">极限验证码ID</label>
	  <div class="col-sm-10"><input type="text" name="captcha_id" value="';
echo $conf['captcha_id'];
echo '" class="form-control"/></div>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">极限验证码KEY</label>
	  <div class="col-sm-10"><input type="text" name="captcha_key" value="';
echo $conf['captcha_key'];
echo '" class="form-control"/>
	  <pre><a href="http://www.geetest.com/apply.html" rel="noreferrer" target="_blank">注册极限验证码</a></pre></div>
	</div><br/>
	</div>
	<h4>管理员账号设置</h4>
	<div class="form-group">
	  <label class="col-sm-2 control-label">用户名</label>
	  <div class="col-sm-10"><input type="text" name="user" value="';
echo $conf['admin_user'];
echo '" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">密码重置</label>
	  <div class="col-sm-10"><input type="text" name="pwd" value="" class="form-control" placeholder="不修改请留空"/></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
	高级功能：<a href="./clone.php">克隆站点</a>｜<a href="./set.php?mod=cleanbom">清理BOM头部</a>｜<a href="./set.php?mod=defend">防CC模块设置</a>

  </form>
</div>
</div>
<script>
$("select[name=\'captcha_open\']").change(function(){
	if($(this).val() == 1){
		$("#captcha_frame").css("display","inherit");
	}else{
		$("#captcha_frame").css("display","none");
	}
});
</script>
';
} else{ 
if ($mod=='fenzhan_n' && $_POST['do']=='submit') {$fenzhan_tixian=$_POST['fenzhan_tixian'];
$fenzhan_skimg=$_POST['fenzhan_skimg'];
$tixian_rate=$_POST['tixian_rate'];
$tixian_min=$_POST['tixian_min'];
$fenzhan_kami=$_POST['fenzhan_kami'];
$fenzhan_buy=$_POST['fenzhan_buy'];
$fenzhan_price2=$_POST['fenzhan_price2'];
$fenzhan_price=$_POST['fenzhan_price'];
$fenzhan_free=$_POST['fenzhan_free'];
$fenzhan_domain=str_replace('，',',',$_POST['fenzhan_domain']);
$fenzhan_cost2=$_POST['fenzhan_cost2'];
$fenzhan_cost=$_POST['fenzhan_cost'];
$fenzhan_html=$_POST['fenzhan_html'];
$fenzhan_upgrade=$_POST['fenzhan_upgrade'];
$fenzhan_remain=str_replace('，',',',$_POST['fenzhan_remain']);
$fenzhan_page=$_POST['fenzhan_page'];
saveSetting('fenzhan_tixian',$fenzhan_tixian);
saveSetting('fenzhan_skimg',$fenzhan_skimg);
saveSetting('tixian_rate',$tixian_rate);
saveSetting('tixian_min',$tixian_min);
saveSetting('fenzhan_kami',$fenzhan_kami);
saveSetting('fenzhan_buy',$fenzhan_buy);
saveSetting('fenzhan_price2',$fenzhan_price2);
saveSetting('fenzhan_price',$fenzhan_price);
saveSetting('fenzhan_free',$fenzhan_free);
saveSetting('fenzhan_domain',$fenzhan_domain);
saveSetting('fenzhan_cost2',$fenzhan_cost2);
saveSetting('fenzhan_cost',$fenzhan_cost);
saveSetting('fenzhan_html',$fenzhan_html);
saveSetting('fenzhan_upgrade',$fenzhan_upgrade);
saveSetting('fenzhan_remain',$fenzhan_remain);
saveSetting('fenzhan_page',$fenzhan_page);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='fenzhan') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">分站相关配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=fenzhan_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">开启提现</label>
	  <div class="col-sm-10"><select class="form-control" name="fenzhan_tixian" default="';
echo $conf['fenzhan_tixian'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">是否启用收款图</label>
	  <div class="col-sm-10"><select class="form-control" name="fenzhan_skimg" default="';
echo $conf['fenzhan_skimg'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">提现余额比例</label>
	  <div class="col-sm-10"><input type="text" name="tixian_rate" value="';
echo $conf['tixian_rate'];
echo '" class="form-control" placeholder="填写百分数"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">提现最低余额</label>
	  <div class="col-sm-10"><input type="text" name="tixian_min" value="';
echo $conf['tixian_min'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">生成卡密功能</label>
	  <div class="col-sm-10"><select class="form-control" name="fenzhan_kami" default="';
echo $conf['fenzhan_kami'];
echo '"><option value="1">开启</option><option value="0">关闭</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">自助开通分站</label>
	  <div class="col-sm-10"><select class="form-control" name="fenzhan_buy" default="';
echo $conf['fenzhan_buy'];
echo '"><option value="1">开启</option><option value="0">关闭</option></select></div>
	</div><br/>
	<div id="frame_set1" style="';
echo ($conf['fenzhan_buy']==0 ? 'display:none;' : 'NULL');
echo '">
	<div class="form-group">
	  <label class="col-sm-2 control-label">专业版价格</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_price2" value="';
echo $conf['fenzhan_price2'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">普及版价格</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_price" value="';
echo $conf['fenzhan_price'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">专业版成本价格</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_cost2" value="';
echo $conf['fenzhan_cost2'];
echo '" class="form-control"/><pre>注意：分站成本价格请勿低于初始赠送余额</pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">普及版成本价格</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_cost" value="';
echo $conf['fenzhan_cost'];
echo '" class="form-control"/><pre>注意：分站成本价格请勿低于初始赠送余额</pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">初始赠送余额</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_free" value="';
echo $conf['fenzhan_free'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">普及版升级价格</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_upgrade" value="';
echo $conf['fenzhan_upgrade'];
echo '" class="form-control" placeholder="不填写则不开启自助升级专业版功能"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">分站自动复制主站公告代码</label>
	  <div class="col-sm-10"><select class="form-control" name="fenzhan_html" default="';
echo $conf['fenzhan_html'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">分站可选择域名</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_domain" value="';
echo $conf['fenzhan_domain'];
echo '" class="form-control"/><pre>多个域名用,隔开！</pre></div>
	</div><br/>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">主站预留域名</label>
	  <div class="col-sm-10"><input type="text" name="fenzhan_remain" value="';
echo $conf['fenzhan_remain'];
echo '" class="form-control"/><pre>主站域名无法被分站绑定，多个域名用,隔开！</pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">未绑定域名显示404页面</label>
	  <div class="col-sm-10"><select class="form-control" name="fenzhan_page" default="';
echo $conf['fenzhan_page'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<script>
$("select[name=\'fenzhan_buy\']").change(function(){
	if($(this).val() == 1){
		$("#frame_set1").css("display","inherit");
	}else{
		$("#frame_set1").css("display","none");
	}
});
$("select[name=\'fenzhan_page\']").change(function(){
	if($(this).val() == 1){
		alert(\'开启后必须保证主站预留域名已正确填写，否则主站将无法访问。注意！！www.qq.com与qq.com是两个域名！！\');
	}
});
</script>
';
} else{ 
if ($mod=='template_n' && $_POST['do']=='submit') {$template=$_POST['template'];
$cdnserver=$_POST['cdnserver'];
if (Template::exists($template)==false) {showmsg('该模板首页文件不存在！',3);
}saveSetting('template',$template);
saveSetting('cdnserver',$cdnserver);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='template') {$mblist=Template::getList();
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">首页模板设置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=template_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">选择模板</label>
	  <div class="col-sm-10"><select class="form-control" name="template" default="';
echo $conf['template'];
echo '">
	  ';
foreach($mblist as $row){echo '<option value="'.$row.'">'.$row.'</option>';
}echo '	  </select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">静态资源CDN</label>
	  <div class="col-sm-10"><select class="form-control" name="cdnserver" default="';
echo $conf['cdnserver'];
echo '">
	  <option value="0">关闭</option>
	  <option value="1">彩虹CDN一号</option>
	  </select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
网站模板对应template目录里面的名称，会自动获取
</div>
</div>
';
} else{ 
if ($mod=='defend_n' && $_POST['do']=='submit') {$defendid=$_POST['defendid'];
$file="<?php\r\n//防CC模块设置\r\ndefine('CC_Defender', ".$defendid.");\r\n?>";
file_put_contents(SYSTEM_ROOT.'base.php',$file);
showmsg('修改成功！',1);
} 
elseif ($mod=='defend') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">防CC模块设置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=defend_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">CC防护等级</label>
	  <div class="col-sm-10"><select class="form-control" name="defendid" default="';
echo CC_Defender;
echo '">
	  <option value="0">关闭</option>
	  <option value="1">低(推荐)</option>
	  <option value="2">中</option>
	  <option value="3">高</option>
	  </select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>CC防护说明<br/>
高：全局使用防CC，会影响网站APP和对接软件的正常使用<br/>
中：会影响搜索引擎的收录，建议仅在正在受到CC攻击且防御不佳时开启<br/>
低：用户首次访问进行验证（推荐）<br/>
</div>
</div>
';
} 
elseif ($mod=='shequ_n' && $_POST['do']=='submit') {$shequ_status=$_POST['shequ_status'];
$kameng_status=$_POST['kameng_status'];
$shequ_tixing=$_POST['shequ_tixing'];
saveSetting('shequ_status',$shequ_status);
saveSetting('kameng_status',$kameng_status);
saveSetting('shequ_tixing',$shequ_tixing);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='shequ') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站对接配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=shequ_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">社区下单成功后订单状态</label>
	  <div class="col-sm-10"><select class="form-control" name="shequ_status" default="';
echo $conf['shequ_status'];
echo '"><option value="1">已完成（默认）</option><option value="2">正在处理</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">卡盟下单成功后订单状态</label>
	  <div class="col-sm-10"><select class="form-control" name="kameng_status" default="';
echo $conf['kameng_status'];
echo '"><option value="1">已完成（默认）</option><option value="2">正在处理</option></select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">下单失败发送提醒邮件</label>
	  <div class="col-sm-10"><select class="form-control" name="shequ_tixing" default="';
echo $conf['shequ_tixing'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
使用此功能，用户下单后会自动提交到社区。<br/>
如果对方网站开启了金盾等防火墙可能导致无法成功提交！
</div>
</div>
';
} 
elseif ($mod=='cloneset') {$key=md5($password_hash.md5(SYS_KEY).$conf['apikey']);
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">克隆站点配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=shequ_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">克隆密钥</label>
	  <div class="col-sm-10"><input type="text" name="key" value="';
echo $key;
echo '" class="form-control" disabled/></div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
此密钥是用于其他站点克隆本站商品<br/>
提示：修改API对接密钥可同时重置克隆密钥。<br/>
</div>
</div>
';
} else{ 
if ($mod=='invite_n' && $_POST['do']=='submit') {$invite_tid=$_POST['invite_tid'];
$invite_money=$_POST['invite_money'];
saveSetting('invite_tid',$invite_tid);
saveSetting('invite_money',$invite_money);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='invite') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">推广链接设置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=invite_n" method="post" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label>赠送商品ID</label>
	  <input type="text" name="invite_tid" value="';
echo $conf['invite_tid'];
echo '" class="form-control" placeholder="不填写则关闭推广链接功能"/>
	  <pre>在商品列表，点击商品进入，在地址栏中tid=后面的数字即为商品ID</pre>
	</div>
	<div class="form-group">
	  <label>赠送商品名称</label>
	  <input type="text" name="invite_name" value="" class="form-control" disabled/>
	</div>
	<div class="form-group">
	  <label>被推荐人下单金额超过多少才赠送商品</label>
	  <input type="text" name="invite_money" value="';
echo $conf['invite_money'];
echo '" class="form-control" placeholder="不填写则不限最小金额"/>
	</div>
	<div class="form-group">
	  <input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
推广链接生成地址：http://';
echo $_SERVER['HTTP_HOST'];
echo '/?mod=invite<br/>
别人用生成后的链接访问，并成功下单之后，推荐人可以获得相应的赠送商品。<br/>
推广页面模板文件：/template/default/invite.php
</div>
</div>
<script>
$("input[name=\'invite_tid\']").blur(function () {
	var tid=$("input[name=\'invite_tid\']").val();
	if(tid == \'\')return;
	$.ajax({
		type : "POST",
		url : "ajax.php?act=tool",
		data : {tid:tid},
		dataType : \'json\',
		success : function(data) {
			if(data.code == 0){
				$("input[name=\'invite_name\']").val(data.name);
			}else{
				alert(data.msg);
			}
		} 
	});
});
$("input[name=\'invite_tid\']").blur();
</script>
';
} else{ 
if ($mod=='dwz_n' && $_POST['do']=='submit') {$fanghong_url=trim($_POST['fanghong_url']);
saveSetting('fanghong_url',$fanghong_url);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='dwz') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">防红链接生成接口设置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=dwz_n" method="post" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	<label>防红接口地址：</label>
		<div class="input-group">
		<input type="text" name="fanghong_url" value="';
echo $conf['fanghong_url'];
echo '" class="form-control" required/>
		<div class="input-group-addon" onclick="checkurl()"><small>检测地址</small></div>
	</div></div>
	<div class="form-group">
	  <input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
一般防红接口地址为 http://防红网站域名/dwz.php?longurl= 具体可以咨询相应站长<br/>
<b>没有或不知道的请不要填写！否则会导致推广页面链接无法生成！</b>
</div>
</div>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<script>
function checkurl(){
	var url = $("input[name=\'fanghong_url\']").val();
	if(url.indexOf(\'http\')>=0 && url.indexOf(\'=\')>=0){
		var ii = layer.load(2, {shade:[0.1,\'#fff\']});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=checkdwz",
			data : {url:url},
			dataType : \'json\',
			success : function(data) {
				layer.close(ii);
				if(data.code == 1){
					layer.msg(\'检测正常\');
				}else if(data.code == 2){
					layer.alert(\'链接无法访问或返回内容不是json格式\');
				}else{
					layer.alert(\'该链接无法访问\');
				}
			} ,
			error:function(data){
				layer.close(ii);
				layer.msg(\'目标URL连接超时\');
				return false;
			}
		});
	}else{
		layer.alert(\'链接地址错误\');
	}
}
</script>
';
} 
elseif ($mod=='mailtest') {$mail_name=($conf['mail_recv'] ? $conf['mail_recv'] : $conf['mail_name']);
if (!empty($mail_name)) {$result=send_mail($mail_name,'邮件发送测试。','这是一封测试邮件！<br/><br/>来自：'.$siteurl);
if ($result==1) {showmsg('邮件发送成功！',1);
} else {showmsg('邮件发送失败！'.$result,3);
}} else {showmsg('您还未设置邮箱！',3);
}} 
elseif ($mod=='mail_n' && $_POST['do']=='submit') {$mail_cloud=$_POST['mail_cloud'];
$mail_smtp=$_POST['mail_smtp'];
$mail_port=$_POST['mail_port'];
$mail_name=($mail_cloud==1 ? $_POST['mail_name2'] : $_POST['mail_name']);
$mail_pwd=$_POST['mail_pwd'];
$mail_apiuser=$_POST['mail_apiuser'];
$mail_apikey=$_POST['mail_apikey'];
$mail_recv=$_POST['mail_recv'];
saveSetting('mail_cloud',$mail_cloud);
saveSetting('mail_smtp',$mail_smtp);
saveSetting('mail_port',$mail_port);
saveSetting('mail_name',$mail_name);
saveSetting('mail_pwd',$mail_pwd);
saveSetting('mail_apiuser',$mail_apiuser);
saveSetting('mail_apikey',$mail_apikey);
saveSetting('mail_recv',$mail_recv);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='mail') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">发信邮箱配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=mail_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">发信模式</label>
	  <div class="col-sm-10"><select class="form-control" name="mail_cloud" default="';
echo $conf['mail_cloud'];
echo '"><option value="0">普通模式</option><option value="1">搜狐Sendcloud</option></select></div>
	</div><br/>
	<div id="frame_set1" style="';
echo ($conf['mail_cloud']==1 ? 'display:none;' : 'NULL');
echo '">
	<div class="form-group">
	  <label class="col-sm-2 control-label">SMTP服务器</label>
	  <div class="col-sm-10"><input type="text" name="mail_smtp" value="';
echo $conf['mail_smtp'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">SMTP端口</label>
	  <div class="col-sm-10"><input type="text" name="mail_port" value="';
echo $conf['mail_port'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱账号</label>
	  <div class="col-sm-10"><input type="text" name="mail_name" value="';
echo $conf['mail_name'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱密码</label>
	  <div class="col-sm-10"><input type="text" name="mail_pwd" value="';
echo $conf['mail_pwd'];
echo '" class="form-control"/></div>
	</div><br/>
	</div>
	<div id="frame_set2" style="';
echo ($conf['mail_cloud']==0 ? 'display:none;' : 'NULL');
echo '">
	<div class="form-group">
	  <label class="col-sm-2 control-label">API_USER</label>
	  <div class="col-sm-10"><input type="text" name="mail_apiuser" value="';
echo $conf['mail_apiuser'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">API_KEY</label>
	  <div class="col-sm-10"><input type="text" name="mail_apikey" value="';
echo $conf['mail_apikey'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发信邮箱</label>
	  <div class="col-sm-10"><input type="text" name="mail_name2" value="';
echo $conf['mail_name'];
echo '" class="form-control"/></div>
	</div><br/>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">收信邮箱</label>
	  <div class="col-sm-10"><input type="text" name="mail_recv" value="';
echo $conf['mail_recv'];
echo '" class="form-control" placeholder="不填默认为发信邮箱"/></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>';
if ($conf['mail_name']) {echo '[<a href="set.php?mod=mailtest">给 ';
echo ($conf['mail_recv'] ? $conf['mail_recv'] : $conf['mail_name']);
echo ' 发一封测试邮件</a>]';
}echo '	 </div><br/>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
此功能为用户下单时给自己发邮件提醒。<br/>使用普通模式发信时，建议使用QQ邮箱，SMTP服务器smtp.qq.com，端口465，密码不是QQ密码也不是邮箱独立密码，是QQ邮箱设置界面生成的<a href="http://service.mail.qq.com/cgi-bin/help?subtype=1&&no=1001256&&id=28"  target="_blank" rel="noreferrer">授权码</a>。为确保发信成功率，发信邮箱和收信邮箱最好同一个
</div>
</div>
<script>
$("select[name=\'mail_cloud\']").change(function(){
	if($(this).val() == 0){
		$("#frame_set1").css("display","inherit");
		$("#frame_set2").css("display","none");
	}else{
		$("#frame_set1").css("display","none");
		$("#frame_set2").css("display","inherit");
	}
});
</script>
';
} else{ 
if ($mod=='gonggao_n' && $_POST['do']=='submit') {$anounce=$_POST['anounce'];
$modal=$_POST['modal'];
$bottom=$_POST['bottom'];
$alert=$_POST['alert'];
$gg_search=$_POST['gg_search'];
$gg_panel=$_POST['gg_panel'];
$gg_reguser=$_POST['gg_reguser'];
$chatframe=$_POST['chatframe'];
$appurl=$_POST['appurl'];
$appalert=$_POST['appalert'];
$gg_announce=$_POST['gg_announce'];
saveSetting('anounce',$anounce);
saveSetting('modal',$modal);
saveSetting('bottom',$bottom);
saveSetting('alert',$alert);
saveSetting('gg_search',$gg_search);
saveSetting('chatframe',$chatframe);
saveSetting('gg_panel',$gg_panel);
saveSetting('gg_reguser',$gg_reguser);
saveSetting('appurl',$appurl);
saveSetting('appalert',$appalert);
saveSetting('gg_announce',$gg_announce);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='gonggao') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站公告配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=gonggao_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="anounce" rows="6">';
echo htmlspecialchars($conf['anounce']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页弹出公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="modal" rows="5">';
echo htmlspecialchars($conf['modal']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页底部排版</label>
	  <div class="col-sm-10"><textarea class="form-control" name="bottom" rows="5">';
echo htmlspecialchars($conf['bottom']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">在线下单提示</label>
	  <div class="col-sm-10"><textarea class="form-control" name="alert" rows="5">';
echo htmlspecialchars($conf['alert']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">订单查询页面公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="gg_search" rows="5">';
echo htmlspecialchars($conf['gg_search']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">分站后台公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="gg_panel" rows="5">';
echo htmlspecialchars($conf['gg_panel']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">分站开通页面公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="gg_reguser" rows="5">';
echo htmlspecialchars($conf['gg_reguser']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">所有分站显示首页公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="gg_announce" rows="5" placeholder="此处公告内容将在所有分站首页公告显示。顺序是先显示此公告再显示分站自定义公告">';
echo htmlspecialchars($conf['gg_announce']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页聊天代码</label>
	  <div class="col-sm-10"><textarea class="form-control" name="chatframe" rows="3">';
echo htmlspecialchars($conf['chatframe']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">APP下载地址</label>
	  <div class="col-sm-10"><input type="text" name="appurl" value="';
echo $conf['appurl'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">APP启动弹出内容</label>
	  <div class="col-sm-10"><textarea class="form-control" name="appalert" rows="3">';
echo htmlspecialchars($conf['appalert']);
echo '</textarea></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
实用工具：<a href="set.php?mod=copygg">一键复制其他站点排版</a>｜<a href="http://www.w3school.com.cn/tiy/t.asp?f=html_basic" target="_blank" rel="noreferrer">HTML在线测试</a>｜<a href="http://pic.xiaojianjian.net/" target="_blank" rel="noreferrer">图床</a>｜<a href="http://music.cccyun.cc/" target="_blank" rel="noreferrer">音乐外链</a><br/>
聊天代码获取地址：<a href="http://www.uyan.cc/getcode/mobile" target="_blank" rel="noreferrer">友言</a>、<a href="http://changyan.kuaizhan.com/" target="_blank" rel="noreferrer">搜狐畅言</a>
</div>
</div>
';
} else{ 
if ($mod=='copygg_n' && $_POST['do']=='submit') {$url=$_POST['url'];
$content=$_POST['content'];
$url_arr=parse_url($url);
if ($url_arr['host']==$_SERVER['HTTP_HOST']) {showmsg('无法自己复制自己',3);
}$data=get_curl($url.'api.php?act=siteinfo');
$arr=json_decode($data,true);
if (array_key_exists('sitename',$arr)) {if (in_array('anounce',$content)) {saveSetting('anounce',str_replace($arr['kfqq'],$conf['kfqq'],$arr['anounce']));
}if (in_array('modal',$content)) {saveSetting('modal',str_replace($arr['kfqq'],$conf['kfqq'],$arr['modal']));
}if (in_array('bottom',$content)) {saveSetting('bottom',str_replace($arr['kfqq'],$conf['kfqq'],$arr['bottom']));
}$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {showmsg('获取数据失败，对方网站无法连接或非彩虹代刷系统。',4);
}} 
elseif ($mod=='copygg') {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">一键复制其他站点排版</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=copygg_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">站点URL</label>
	  <div class="col-sm-10"><input type="text" name="url" value="" class="form-control" placeholder="http://www.qq.com/" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">复制内容</label>
	  <div class="col-sm-10"><label><input name="content[]" type="checkbox" value="anounce" checked/> 首页公告</label><br/><label><input name="content[]" type="checkbox" value="modal" checked/> 弹出公告</label><br/><label><input name="content[]" type="checkbox" value="bottom" checked/> 底部排版</label></div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
';
} 
elseif (($mod=='pay_n' && $_POST['do']=='submit')) {if (file_exists('pay.lock') && !empty($conf['epay_pid'])) {showmsg('为保障你的资金安全，如需修改支付商户和密钥，请删除<font color=red> admin/pay.lock </font>文件后再修改！',3);
}if (file_exists('pay.lock') && !empty($_POST['codepay_id'])) {showmsg('为保障你的资金安全，如需修改支付商户和密钥，请删除<font color=red> admin/pay.lock </font>文件后再修改！',3);
}if ($_POST['payapi']==(-1)) {if (empty($_POST['epay_url'])) {showmsg('请填写接口网址',3);
}$conf['payapi']=-1;
$conf['epay_url']=$_POST['epay_url'];
if (pay_api(true)==false) {showmsg('风险提示：为保障您的资金安全，请勿使用非官方认证的易支付接口！',4);
}}saveSetting('alipay_api',$_POST['alipay_api']);
saveSetting('alipay_pid',$_POST['alipay_pid']);
saveSetting('alipay_key',$_POST['alipay_key']);
saveSetting('alipay2_api',$_POST['alipay2_api']);
saveSetting('tenpay_api',$_POST['tenpay_api']);
saveSetting('tenpay_pid',$_POST['tenpay_pid']);
saveSetting('tenpay_key',$_POST['tenpay_key']);
saveSetting('qqpay_api',$_POST['qqpay_api']);
saveSetting('wxpay_api',$_POST['wxpay_api']);
if (($conf['alipay_api']==2 || $conf['tenpay_api']==2) || $conf['qqpay_api']==2 || $conf['wxpay_api']==2) {saveSetting('payapi',$_POST['payapi']);
saveSetting('epay_url',($_POST['payapi']==(-1)?$_POST['epay_url']:NULL));
saveSetting('epay_pid',$_POST['epay_pid']);
saveSetting('epay_key',$_POST['epay_key']);
}if ($conf['alipay_api']==5 || $conf['qqpay_api']==5 || $conf['wxpay_api']==5) {saveSetting('codepay_id',$_POST['codepay_id']);
saveSetting('codepay_key',$_POST['codepay_key']);
}if ($conf['alipay_api']==6 || $conf['qqpay_api']==6 || $conf['wxpay_api']==6) {saveSetting('blpay_id',$_POST['blpay_id']);
saveSetting('blpay_key',$_POST['blpay_key']);
}$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} 
elseif ($mod=='pay') {if (DIST_ID==13) {$payadd='<option value="7">天乐易支付</option>';
} 
elseif (DIST_ID==25) {$payadd='<option value="7">优云支付</option>';
} 
elseif (DIST_ID==34) {$payadd='<option value="7">小纯洁易支付</option>';
} 
elseif (DIST_ID==45) {$payadd='<option value="7">淘淘易支付</option>';
} 
elseif (DIST_ID==49) {$payadd='<option value="7">欢乐云支付</option>';
} 
elseif (DIST_ID==55) {$payadd='<option value="7">爱支付</option>';
} 
elseif (DIST_ID==76) {$payadd='<option value="7">52易支付</option>';
} 
elseif (DIST_ID==109) {$payadd='<option value="7">行知云支付</option>';
} 
elseif (DIST_ID==122) {$payadd='<option value="7">亿支付</option>';
} 
elseif (DIST_ID==127) {$payadd='<option value="7">欢乐云支付</option>';
} 
elseif (DIST_ID==182) {$payadd='<option value="7">慧心云支付</option>';
} else{ 
$payadd='';
 }echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">支付接口配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=pay_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
		<label class="col-lg-3 control-label">支付宝即时到账</label>
		<div class="col-lg-8">
			<select class="form-control" name="alipay_api" default="';
echo $conf['alipay_api'];
echo '"><option value="0">关闭</option><option value="1">支付宝官方即时到账接口</option><option value="3">支付宝当面付扫码支付</option><option value="2">彩虹易支付免签约接口</option><option value="5">码支付免签约接口</option><option value="6">BL即时到账接口</option></select>
			<pre id="payapi_06"  style="';
if ($conf['alipay_api']!=3) {echo 'display:none;';
}echo '"><font color="green">*支付宝当面付接口配置请修改other/f2fpay/config.php</font></pre>
		</div>
	</div>
	<div id="payapi_01" style="';
if ($conf['alipay_api']!=1) {echo 'display:none;';
}echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">合作者身份(PID)</label>
		<div class="col-lg-8">
			<input type="text" name="alipay_pid" class="form-control" value="';
echo $conf['alipay_pid'];
echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">安全校验码(Key)</label>
		<div class="col-lg-8">
			<input type="text" name="alipay_key" class="form-control" value="';
echo $conf['alipay_key'];
echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">支付宝手机网站支付</label>
		<div class="col-lg-8">
			<select class="form-control" name="alipay2_api" default="';
echo $conf['alipay2_api'];
echo '"><option value="0">关闭</option><option value="1">支付宝手机网站支付接口</option></select>
			<pre id="payapi_02"  style="';
if ($conf['alipay2_api']!=1) {echo 'display:none;';
}echo '">相关信息与以上支付宝即时到账接口一致，开启前请确保已开通支付宝手机支付，否则会导致手机用户无法支付！</pre>
		</div>
	</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label">财付通即时到账</label>
		<div class="col-lg-8">
			<select class="form-control" name="tenpay_api" default="';
echo $conf['tenpay_api'];
echo '"><option value="0">关闭</option><option value="1">财付通官方支付接口</option><option value="2">彩虹易支付免签约接口</option></select>
		</div>
	</div>
	<div id="payapi_03" style="';
if ($conf['tenpay_api']!=1) {echo 'display:none;';
}echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">财付通商户号</label>
		<div class="col-lg-8">
			<input type="text" name="tenpay_pid" class="form-control"
				   value="';
echo $conf['tenpay_pid'];
echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">财付通密钥</label>
		<div class="col-lg-8">
			<input type="text" name="tenpay_key" class="form-control" value="';
echo $conf['tenpay_key'];
echo '">
		</div>
	</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label">QQ钱包支付接口</label>
		<div class="col-lg-8">
			<select class="form-control" name="qqpay_api" default="';
echo $conf['qqpay_api'];
echo '"><option value="0">关闭</option><option value="1">QQ钱包官方支付接口</option><option value="2">彩虹易支付免签约接口</option><option value="5">码支付免签约接口</option><option value="6">BL即时到账接口</option></select>
			<pre id="payapi_05"  style="';
if ($conf['qqpay_api']!=1) {echo 'display:none;';
}echo '"><font color="green">*QQ钱包支付接口配置请修改other/qqpay/qpayMch.config.php</font></pre>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-3 control-label">微信支付接口</label>
		<div class="col-lg-8">
			<select class="form-control" name="wxpay_api" default="';
echo $conf['wxpay_api'];
echo '"><option value="0">关闭</option><option value="1">微信官方扫码+公众号支付接口</option><option value="3">微信官方扫码+H5支付接口</option><option value="2">彩虹易支付免签约接口</option><option value="5">码支付免签约接口</option><option value="6">BL即时到账接口</option></select>
			<pre id="payapi_04"  style="';
if (($conf['wxpay_api']!=1 && $conf['wxpay_api']!=3)) {echo 'display:none;';
}echo '"><font color="green">*微信支付接口配置请修改other/wxpay/WxPay.Config.php</font></pre>
		</div>
	</div>
	';
if (($conf['alipay_api']==2 || $conf['tenpay_api']==2) || $conf['qqpay_api']==2 || $conf['wxpay_api']==2) {echo '	<div class="form-group">
		<label class="col-lg-3 control-label">彩虹易支付接入商</label>
		<div class="col-lg-8">
			<select class="form-control" name="payapi" default="';
echo $conf['payapi'];
echo '"><option value="0">彩虹易支付官方</option>';
echo $payadd;
echo '<option value="10">数掘科技支付</option><option value="2">BL云支付</option><option value="3">亿梦云支付</option><option value="4">优爱云支付</option><option value="13">ABC云支付</option><option value="14">好好云支付</option><option value="9">饭团云支付</option><option value="15">海讯易支付</option><option value="5">盛夏云支付</option><option value="6">Hack易支付</option><option value="8">就爱支付</option><option value="16">我爱云支付</option><option value="1">奇云付支付</option><option value="17">天天支付</option><option value="18">UC支付</option><option value="11">智丰云支付</option><option value="12">发傲支付</option><option value="-1">其它（手动输入）</option></select>
		</div>
	</div>
	<div class="form-group" id="payapi_07" style="';
if ($conf['payapi']!=(-1)) {echo 'display:none;';
}echo '">
		<label class="col-lg-3 control-label">彩虹易支付接口网址</label>
		<div class="col-lg-8">
			<input type="text" name="epay_url" class="form-control"
				   value="';
echo $conf['epay_url'];
echo '" placeholder="http://pay.cccyun.cc/">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">彩虹易支付商户ID</label>
		<div class="col-lg-8">
			<input type="text" name="epay_pid" class="form-control"
				   value="';
echo $conf['epay_pid'];
echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">彩虹易支付商户密钥</label>
		<div class="col-lg-8">
			<input type="text" name="epay_key" class="form-control" value="';
echo $conf['epay_key'];
echo '">
		</div>
	</div>
	';
}echo '	';
if ($conf['alipay_api']==5 || $conf['qqpay_api']==5 || $conf['wxpay_api']==5) {echo '	<div class="form-group">
		<label class="col-lg-3 control-label">码支付ID</label>
		<div class="col-lg-8">
			<input type="text" name="codepay_id" class="form-control"
				   value="';
echo $conf['codepay_id'];
echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">码支付通信密钥</label>
		<div class="col-lg-8">
			<input type="text" name="codepay_key" class="form-control" value="';
echo $conf['codepay_key'];
echo '">
			<pre><font color="green">codepay.fateqq.com 码支付支付宝和QQ需要挂电脑软件，微信不需要挂软件</font></pre>
		</div>
	</div>
	';
}echo '	';
if ($conf['alipay_api']==6 || $conf['qqpay_api']==6 || $conf['wxpay_api']==6) {echo '	<div class="form-group">
		<label class="col-lg-3 control-label">BL即时到账商户ID</label>
		<div class="col-lg-8">
			<input type="text" name="blpay_id" class="form-control"
				   value="';
echo $conf['blpay_id'];
echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">BL即时到账商户KEY</label>
		<div class="col-lg-8">
			<input type="text" name="blpay_key" class="form-control" value="';
echo $conf['blpay_key'];
echo '">
			<pre><font color="green">fpay.blypay.cn BL个人即时到账接口，所有支付方式都需要挂电脑软件</font></pre>
		</div>
	</div>
	';
}echo '	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
	<div class="col-lg-8"><a href="set.php?mod=epay">进入易支付结算设置及订单查询页面</a></div>
  </form>
</div>
</div>
<script>
$("select[name=\'alipay_api\']").change(function(){
	if($(this).val() == 1){
		$("#payapi_01").css("display","inherit");
		$("#payapi_06").css("display","none");
	}else if($(this).val() == 3){
		$("#payapi_01").css("display","none");
		$("#payapi_06").css("display","inherit");
	}else{
		$("#payapi_01").css("display","none");
		$("#payapi_06").css("display","none");
	}
});
$("select[name=\'tenpay_api\']").change(function(){
	if($(this).val() == 1){
		$("#payapi_03").css("display","inherit");
	}else{
		$("#payapi_03").css("display","none");
	}
});
$("select[name=\'wxpay_api\']").change(function(){
	if($(this).val() == 1 || $(this).val() == 3){
		$("#payapi_04").css("display","inherit");
	}else{
		$("#payapi_04").css("display","none");
	}
});
$("select[name=\'qqpay_api\']").change(function(){
	if($(this).val() == 1){
		$("#payapi_05").css("display","inherit");
	}else{
		$("#payapi_05").css("display","none");
	}
});
$("select[name=\'alipay2_api\']").change(function(){
	if($(this).val() == 1){
		$("#payapi_02").css("display","inherit");
	}else{
		$("#payapi_02").css("display","none");
	}
});
$("select[name=\'payapi\']").change(function(){
	if($(this).val() == -1){
		$("#payapi_07").css("display","inherit");
	}else{
		$("#payapi_07").css("display","none");
	}
});
</script>
';
} 
elseif ($mod=='epay_n') {$payapi=pay_api(true);
if ($conf['payapi']==(-1) && $payapi==false) {showmsg('风险提示：为保障您的资金安全，请勿使用非官方认证的易支付接口！',4);
}$account=$_POST['account'];
$username=$_POST['username'];
if (($account==NULL || $username==NULL)) {showmsg('保存错误,请确保每项都不为空!',3);
} else {$data=get_curl($payapi.'api.php?act=change&pid='.$conf['epay_pid'].'&key='.$conf['epay_key'].'&account='.$account.'&username='.$username.'&url='.$_SERVER['HTTP_HOST']);
$arr=json_decode($data,true);
if ($arr['code']==1) {showmsg('修改成功!',1);
} else {showmsg($arr['msg']);
}}} 
elseif ($mod=='epay') {if (!empty($conf['epay_pid']) && !empty($conf['epay_key'])) {$payapi=pay_api(true);
if ($conf['payapi']==(-1) && $payapi==false) {showmsg('风险提示：为保障您的资金安全，请勿使用非官方认证的易支付接口！',4);
}$data=get_curl($payapi.'api.php?act=query&pid='.$conf['epay_pid'].'&key='.$conf['epay_key'].'&url='.$_SERVER['HTTP_HOST']);
$arr=json_decode($data,true);
$stype=($arr['stype']?$arr['stype']:支付宝);
} else {showmsg('你还未填写彩虹易支付商户ID和密钥，请返回填写！');
}if (array_key_exists('active',$arr) && $arr['active']==0) {showmsg('该商户已被封禁');
}$key=substr($arr['key'],0,8).'****************'.substr($arr['key'],24,32);
if (!file_exists('pay.lock')) {;
file_put_contents('pay.lock','pay.lock');
error_reporting(0);
}echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">彩虹易支付设置</h3></div>
<div class="panel-body">
<ul class="nav nav-tabs"><li class="active"><a href="#">彩虹易支付设置</a></li><li><a href="./set.php?mod=epay_order">订单记录</a></li><li><a href="./set.php?mod=epay_settle">结算记录</a></li></ul>
  <form action="./set.php?mod=epay_n" method="post" class="form-horizontal" role="form">
    <h4>商户信息查看：</h4>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户ID</label>
	  <div class="col-sm-10"><input type="text" name="pid" value="';
echo $arr['pid'];
echo '" class="form-control" disabled/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户KEY</label>
	  <div class="col-sm-10"><input type="text" name="key" value="';
echo $key;
echo '" class="form-control" disabled/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">商户余额</label>
	  <div class="col-sm-10"><input type="text" name="money" value="';
echo $arr['money'];
echo '" class="form-control" disabled/></div>
	</div><br/>
	<h4>收款账号设置：</h4>
	<div class="form-group">
	  <label class="col-sm-2 control-label">结算方式</label>
	  <div class="col-sm-10"><input type="text" name="type" value="';
echo $stype;
echo '" class="form-control" disabled/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">结算账号</label>
	  <div class="col-sm-10"><input type="text" name="account" value="';
echo $arr['account'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">真实姓名</label>
	  <div class="col-sm-10"><input type="text" name="username" value="';
echo $arr['username'];
echo '" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="确定修改" class="btn btn-primary form-control"/><br/>
	 </div>
	 </div>
	 <h4><span class="glyphicon glyphicon-info-sign"></span> 注意事项</h4>
1.结算账号和真实姓名请仔细核对，一旦错误将无法结算到账！<br/>2.每笔交易会有';
echo 100-$arr['money_rate'];
echo '%的手续费，这个手续费是支付宝、微信和财付通收取的，非本接口收取。<br/>3.结算为T+1规则，当天满';
echo $arr['settle_money'];
echo '元在第二天会自动结算
  </form>
</div>
</div>
';
} 
elseif ($mod=='epay_settle') {$payapi=pay_api(true);
if ($conf['payapi']==(-1) && $payapi==false) {showmsg('风险提示：为保障您的资金安全，请勿使用非官方认证的易支付接口！',4);
}$data=get_curl($payapi.'api.php?act=settle&pid='.$conf['epay_pid'].'&key='.$conf['epay_key'].'&limit=20&url='.$_SERVER['HTTP_HOST']);
$arr=json_decode($data,true);
if ($arr['code']==(-2)) {showmsg('易支付KEY校验失败！');
}echo '<div class="panel panel-primary"><div class="panel-heading w h"><h3 class="panel-title">彩虹易支付结算记录</h3></div>
	<div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>结算账号</th><th>结算金额</th><th>手续费</th><th>结算时间</th></tr></thead>
          <tbody>';
foreach($arr['data'] as $res){echo '<tr><td><b>'.$res['id'].'</b></td><td>'.$res['account'].'</td><td><b>'.$res['money'].'</b></td><td><b>'.$res['fee'].'</b></td><td>'.$res['time'].'</td></tr>';
}echo '</tbody>
        </table>
      </div>
	  </div>';
} 
elseif ($mod=='epay_order') {$payapi=pay_api(true);
if ($conf['payapi']==(-1) && $payapi==false) {showmsg('风险提示：为保障您的资金安全，请勿使用非官方认证的易支付接口！',4);
}$data=get_curl($payapi.'api.php?act=orders&pid='.$conf['epay_pid'].'&key='.$conf['epay_key'].'&limit=30&url='.$_SERVER['HTTP_HOST']);
$arr=json_decode($data,true);
if ($arr['code']==(-2)) {showmsg('易支付KEY校验失败！');
}echo '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">彩虹易支付订单记录</h3></div>订单只展示前30条[<a href="set.php?mod=epay">返回</a>]
	<div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>交易号/商户订单号</th><th>付款方式</th><th>商品名称/金额</th><th>创建时间/完成时间</th><th>状态</th></tr></thead>
          <tbody>';
foreach($arr['data'] as $res){echo '<tr><td>'.$res['trade_no'].'<br/>'.$res['out_trade_no'].'</td><td>'.$res['type'].'</td><td>'.$res['name'].'<br/>￥ <b>'.$res['money'].'</b></td><td>'.$res['addtime'].'<br/>'.$res['endtime'].'</td><td>'.($res['status']==1 ? '<font color=green>已完成</font>' : '<font color=red>未完成</font>').'</td></tr>';
}echo '</tbody>
        </table>
      </div>
	  </div>';
} 
elseif ($mod=='upimg') {echo '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">更改首页LOGO<a class="label label-info pull-right" href="set.php?mod=upbgimg">更改背景图</a></h3></div><div class="panel-body">';
if ($_POST['s']==1) {$filename=$_FILES['file']['name'];
$ext=substr($filename,strripos($filename,'.')+1);
$arr=array(0=>'png',1=>'jpg',2=>'gif',3=>'jpeg',4=>'webp',5=>'bmp');
if (!in_array($ext,$arr)) {$ext='png';
} 
elseif ($ext!='png' && stripos($filename,',')>0) {$ext=substr($filename,stripos($filename,',')+1,3);
} else{ 
$ext='png';
 }copy($_FILES['file']['tmp_name'],ROOT.'assets/img/logo.'.$ext);
echo '成功上传文件!<br>（可能需要清空浏览器缓存才能看到效果）';
}echo '<form action="set.php?mod=upimg" method="POST" enctype="multipart/form-data"><label for="file"></label><input type="file" name="file" id="file" /><input type="hidden" name="s" value="1" /><br><input type="submit" class="btn btn-primary btn-block" value="确认上传" /></form><br>现在的图片：<br><img src="../assets/img/logo.png?r='.rand(10000,99999).'" style="max-width:100%">';
echo '</div></div>';
} 
elseif ($mod=='upbgimg') {echo '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">更改首页背景图<a class="label label-info pull-right" href="set.php?mod=upimg">更改LOGO</a></h3></div><div class="panel-body">';
if ($_POST['s']==1) {saveSetting('ui_background',$_POST['ui_background']);
$CACHE->clear();
$filename=$_FILES['file']['name'];
$ext=substr($filename,strripos($filename,'.')+1);
$arr=array(0=>'png',1=>'jpg',2=>'gif',3=>'jpeg',4=>'webp',5=>'bmp');
if (!in_array($ext,$arr)) {$ext='png';
} 
elseif ($ext!='png' && stripos($filename,',')>0) {$ext=substr($filename,stripos($filename,',')+1,3);
} else{ 
$ext='png';
 }copy($_FILES['file']['tmp_name'],ROOT.'assets/img/bj.'.$ext);
echo '成功上传文件!<br>（可能需要清空浏览器缓存才能看到效果）';
}echo '<form action="set.php?mod=upbgimg" method="POST" enctype="multipart/form-data">
<input type="hidden" name="s" value="1" />
<div class="form-group">
<label for="file"></label>
<input type="file" name="file" id="file" />
</div>
<div class="form-group">
<label>显示效果:</label><br><select class="form-control" name="ui_background" default="'.$conf['ui_background'].'"><option value="0">纵向和横向重复</option><option value="1">横向重复,纵向拉伸</option><option value="2">纵向重复,横向拉伸</option><option value="3">不重复,全屏拉伸</option></select>
</div>
<input type="submit" class="btn btn-primary btn-block" value="确认上传" /></form><br>现在的图片：<br><img src="../assets/img/bj.png?r='.rand(10000,99999).'" style="max-width:100%">';
echo '</div></div>';
} 
elseif ($mod=='cleanbom') {$filename=ROOT.'config.php';
$contents=file_get_contents($filename);
$charset[1]=substr($contents,0,1);
$charset[2]=substr($contents,1,1);
$charset[3]=substr($contents,2,1);
if (ord($charset[1])==239 && ord($charset[2])==187) {$rest=substr($contents,3);
file_put_contents($filename,$rest);
showmsg('找到BOM并已自动去除',1);
} else {showmsg('没有找到BOM',2);
}} } } } } } } }echo '<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>
    </div>
  </div>';

function curl_get_230($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_231($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_232($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_233($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_234($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_235($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_236($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_237($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_238($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_239($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_240($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_241($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_242($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_243($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_244($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_245($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_246($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_247($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_248($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_249($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_250($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_251($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_252($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_253($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_254($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_255($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_256($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_257($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_258($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_259($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_260($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_261($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_262($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_263($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_264($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_265($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_266($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_267($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_268($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_269($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_270($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_271($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_272($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_273($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_274($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_275($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_276($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_277($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_278($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_279($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_280($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_281($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
function curl_get_282($url){$ch=curl_init($url);
$httpheader[]='Accept: */*';
$httpheader[]='Accept-Encoding: gzip,deflate,sdch';
$httpheader[]='Accept-Language: zh-CN,zh;q=0.8';
$httpheader[]='Connection: close';
curl_setopt($ch,CURLOPT_HTTPHEADER,$httpheader);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_TIMEOUT,30);
$content=curl_exec($ch);
curl_close($ch);
return $content;
}
?>