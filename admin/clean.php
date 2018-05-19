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
$title='系统数据清理';
include('./head.php');
if ($islogin!=1) {exit('<script language=\'javascript\'>window.location.href=\'./login.php\';</script>');
}echo '  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
';
$mod=(isset($_GET['mod'])?$_GET['mod']:NULL);
if ($mod=='cleancache') {$CACHE->clear();
showmsg('清理系统设置缓存成功！',1);
} 
elseif ($mod=='cleanlog') {$DB->query('TRUNCATE TABLE `shua_logs`');
showmsg('清空社区对接日志成功！',1);
} 
elseif ($mod=='cleanpay') {$DB->query('DELETE FROM `shua_pay` WHERE addtime<\''.date('Y-m-d H:i:s',strtotime('-7 days')).'\'');
$DB->query('OPTIMIZE TABLE `shua_pay`');
showmsg('删除7天前支付记录成功！',1);
} 
elseif ($mod=='cleanorders') {$DB->query('DELETE FROM `shua_orders` WHERE addtime<\''.date('Y-m-d H:i:s',strtotime('-30 days')).'\'');
$DB->query('OPTIMIZE TABLE `shua_orders`');
showmsg('删除30天前订单记录成功！',1);
} 
elseif ($mod=='cleanpoints') {$DB->query('DELETE FROM `shua_points` WHERE addtime<\''.date('Y-m-d H:i:s',strtotime('-7 days')).'\'');
$DB->query('OPTIMIZE TABLE `shua_points`');
showmsg('删除7天前收支明细成功！',1);
} 
elseif ($mod=='cleangift') {$DB->query('DELETE FROM `shua_giftlog` WHERE addtime<\''.date('Y-m-d H:i:s',strtotime('-1 days')).'\'');
$DB->query('OPTIMIZE TABLE `shua_giftlog`');
showmsg('删除1天前中奖记录成功！',1);
} 
elseif ($mod=='cleaninvite') {$DB->query('DELETE FROM `shua_invitelog` WHERE date<\''.date('Y-m-d H:i:s',strtotime('-1 days')).'\'');
$DB->query('OPTIMIZE TABLE `shua_invitelog`');
showmsg('删除1天前推广记录成功！',1);
} else{ 
if (($mod=='cleanpayi' && $_POST['do']=='submit')) {$days=intval($_POST['days']);
$money=daddslashes($_POST['money']);
if (($days<=0 || $money==NULL)) {showmsg('请确保每项不能为空',3);
}$DB->query('DELETE FROM `shua_pay` WHERE money<=\''.$money.'\' and addtime<\''.date('Y-m-d H:i:s',strtotime('-'.$days.' days')).'\'');
$DB->query('OPTIMIZE TABLE `shua_pay`');
showmsg('删除支付记录成功！',1);
} else {if (($mod=='cleanordersi' && $_POST['do']=='submit')) {$days=intval($_POST['days']);
$money=daddslashes($_POST['money']);
if (($days<=0 || $money==NULL)) {showmsg('请确保每项不能为空',3);
}$DB->query('DELETE FROM `shua_orders` WHERE money<=\''.$money.'\' and addtime<\''.date('Y-m-d H:i:s',strtotime('-'.$days.' days')).'\'');
$DB->query('OPTIMIZE TABLE `shua_orders`');
showmsg('删除订单记录成功！',1);
} else {echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">系统数据清理</h3></div>
<div class="panel-body">
<a href="./clean.php?mod=cleancache" class="btn btn-block btn-default">清理设置缓存</a><br/>
<a href="./clean.php?mod=cleanlog" onclick="return confirm(\'你确实要清空所有社区对接日志吗？\');" class="btn btn-block btn-default">清空社区对接日志</a><br/>
<a href="./clean.php?mod=cleanpay" onclick="return confirm(\'你确实要删除7天前的支付记录吗？\');" class="btn btn-block btn-default">删除7天前支付记录</a><br/>
<a href="./clean.php?mod=cleanorders" onclick="return confirm(\'你确实要删除30天前的订单记录吗？\');" class="btn btn-block btn-default">删除30天前订单记录</a><br/>
<a href="./clean.php?mod=cleanpoints" onclick="return confirm(\'你确实要删除7天前收支明细吗？\');" class="btn btn-block btn-default">删除7天前收支明细</a><br/>
<a href="./clean.php?mod=cleangift" onclick="return confirm(\'你确实要删除1天前的中奖记录吗？\');" class="btn btn-block btn-default">删除1天前中奖记录</a><br/>
<a href="./clean.php?mod=cleaninvite" onclick="return confirm(\'你确实要删除1天前的推广记录吗？\');" class="btn btn-block btn-default">删除1天前推广记录</a><br/>
<h4>自定义清理：</h4>
<form action="./clean.php?mod=cleanpayi" method="post" role="form"><input type="hidden" name="do" value="submit"/>
<b>支付记录</b>：<input type="text" name="days" value="" placeholder="天数"/>天前，小于等于<input type="text" name="money" value="" placeholder="金额"/>元的支付记录&nbsp;<input type="submit" name="submit" value="立即删除" class="btn btn-sm btn-danger" onclick="return confirm(\'删除后无法恢复，确定继续吗？\');"/>
</form><br/>
<form action="./clean.php?mod=cleanordersi" method="post" role="form"><input type="hidden" name="do" value="submit"/>
<b>订单记录</b>：<input type="text" name="days" value="" placeholder="天数"/>天前，小于等于<input type="text" name="money" value="" placeholder="金额"/>元的订单记录&nbsp;<input type="submit" name="submit" value="立即删除" class="btn btn-sm btn-danger" onclick="return confirm(\'删除后无法恢复，确定继续吗？\');"/>
</form><br/>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
定期清理数据有助于提升网站访问速度
</div>
</div>
';
}} }echo ' </div>
</div>';
?>