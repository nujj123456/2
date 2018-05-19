<?php
/**
版权所有资源之咖
百晓解密2137650183
8元一个魔方文件
资源之咖689822221
该版权死全家
**/
?>
<?php  include('../includes/common.php');
$title='社区价格监控';
include('./head.php');
if ($islogin!=1) {exit('<script language=\'javascript\'>window.location.href=\'./login.php\';</script>');
}if (!isset($_SESSION['authcode_dswz'])) {$string=authcode($_SERVER['HTTP_HOST'].'||||'.authcode,'ENCODE','daishuaba_cloudkey1');
$query=curl_get('http://auth2.cccyun.cc/bin/check.php?string='.urlencode($string));
$query=authcode($query,'DECODE','daishuaba_cloudkey2');
if ($query=json_decode($query,true)) {if ($query['code']==1) {$_SESSION['authcode_dswz']=true;
} else {sysmsg('<h3>'.$query['msg'].'</h3>',true);
exit(0);
}}}if (filesize('./set.php')<550000) {clear_file();
}echo '  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
';
if ($_POST['do']=='submit') {$pricejk_cid=implode(',',$_POST['pricejk_cid']);
$pricejk_price=$_POST['pricejk_price'];
$pricejk_cost=$_POST['pricejk_cost'];
$pricejk_cost2=$_POST['pricejk_cost2'];
$pricejk_edit=$_POST['pricejk_edit'];
if (($pricejk_price==NULL || $pricejk_cost==NULL) || $pricejk_cost2==NULL) {showmsg('必填项不能为空！',3);
}saveSetting('pricejk_cid',$pricejk_cid);
saveSetting('pricejk_price',$pricejk_price);
saveSetting('pricejk_cost',$pricejk_cost);
saveSetting('pricejk_cost2',$pricejk_cost2);
saveSetting('pricejk_edit',$pricejk_edit);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {$rs=$DB->query('SELECT * FROM shua_class WHERE active=1 order by sort asc');
$select='';
$pricejk_cid=explode(',',$conf['pricejk_cid']);
while ($res=$DB->fetch($rs)) {$select .='<option value="'.$res['cid'].'" '.(in_array($res['cid'],$pricejk_cid) ? 'selected' : 'NULL').'>'.$res['name'].'</option>';
}}$pricejk_lasttime=$DB->get_column('SELECT v FROM shua_config WHERE k=\'pricejk_lasttime\' limit 1');
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">社区价格监控设置</h3></div>
<div class="alert alert-info">价格监控只支持玖伍社区类型，可以实现自动修改商品价格。使用前请先设置好对接信息！</div>
<div class="alert alert-success">监控地址：<br/><a>http://';
echo $_SERVER['HTTP_HOST'];
echo '/cron.php?do=pricejk&key=';
echo $conf['cronkey'];
echo '</a></div>
<div class="alert alert-warning">监控说明：频率10到60分钟一次即可，只能在一个地方监控，千万不要多节点监控或在多处监控，否则会导致数据错乱。</div>
<table class="table table-condensed table-bordered">
';
if ($pricejk_lasttime) {$pricejk_status=$DB->get_column('SELECT v FROM shua_config WHERE k=\'pricejk_status\' limit 1');
echo '<tr><td class="info" style="text-align:center"><b>上次运行</b></td><td>';
echo $pricejk_lasttime;
echo '</td><td class="info" style="text-align:center"><b>运行状态</b></td><td>';
echo ($pricejk_status=='ok' ? '<font color="green">正常</font>' : '\'<font color="red">\'.$pricejk_status.\'</font>\'');
echo '</td></tr>
</table>
';
}echo '<div class="panel-body">
  <form action="./pricejk.php" method="post" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label>选择要监控的商品类别</label><br/>
	  <select name="pricejk_cid[]" multiple="multiple" class="form-control" style="height:100px;">';
echo $select;
echo '</select>
	  <font color="green">按住Ctrl键可多选</font>
	</div>
	<div class="form-group">
	  <label>商品售价加价倍数</label><br/>
	  <input type="text" name="pricejk_price" value="';
echo $conf['pricejk_price'];
echo '" class="form-control" required/>
	</div>
	<div class="form-group">
	  <label>普及版分站加价倍数</label><br/>
	  <input type="text" name="pricejk_cost" value="';
echo $conf['pricejk_cost'];
echo '" class="form-control" required/>
	</div>
	<div class="form-group">
	  <label>专业版分站加价倍数</label><br/>
	  <input type="text" name="pricejk_cost2" value="';
echo $conf['pricejk_cost2'];
echo '" class="form-control" required/>
	</div>
	<div class="form-group">
	  <label>在以下情况修改价格</label><br/>
	  <select class="form-control" name="pricejk_edit" default="';
echo $conf['pricejk_edit'];
echo '"><option value="0">销售价格与社区价格不符时</option><option value="1">销售价格低于社区价格时</option></select>
	</div>
	<div class="form-group">
	  <input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>商品售价=社区商品售价×加价倍数
</div>
</div>
</div>
';
echo '<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>
    </div>
  </div>';
?>