<?php
include('../includes/common.php');
$title = '网站对接配置';
include('./head.php');
if ($islogin!=1) {
    exit('<script language=\'javascript\'>window.location.href=\'./login.php\';</script>');
}
echo '  <div class="container" style="padding-top:70px;">
    <div class="col-sm-12 col-md-10 center-block" style="float: none;">
';
$my = (isset($_GET['my']) ? $_GET['my'] : NULL);
if ($my=='add') {
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">添加一个社区/卡盟网站对接</h3></div><a href="./set.php?mod=shequ" class="btn btn-info">其他设置</a>&nbsp;<a href="./log.php" class="btn btn-warning">对接日志</a>&nbsp;<a href="./pricejk.php" class="btn btn-success">社区价格监控</a></div></div>';
    echo '<div class="panel-body">';
    echo '<form action="./shequlist.php?my=add_submit" method="POST">
<div class="form-group">
<label>网站类型:</label><br>
<select class="form-control" name="type"><option value="0">玖伍系统(点数下单)</option><option value="2">玖伍系统(余额下单)</option><option value="1">亿乐系统</option><option value="3">星墨系统(点数下单)</option><option value="5">星墨系统(余额下单)</option><option value="4">九流社区</option><option value="6">卡易信</option><option value="7">卡乐购</option><option value="8">卡慧卡</option><option value="9">卡商网</option></select>
</div>
<div class="form-group">
<label id="shequ_url">网站域名:</label><br>
<input type="text" class="form-control" name="url" value="" required>
</div>
<div class="form-group">
<label id="username">登录账号:</label><br>
<input type="text" class="form-control" name="username" value="" required>
</div>
<div class="form-group">
<label id="password">登录密码:</label><br>
<input type="text" class="form-control" name="password" value="" required>
</div>
<div class="form-group" id="paypwd" style="display:none;">
<label>支付密码:</label><br>
<input type="text" class="form-control" name="paypwd" value="" placeholder="没有请留空">
</div>
<input type="button" class="btn btn-default btn-block" onclick="checkurl()" value="检测目标网站连通性">
<input type="submit" class="btn btn-primary btn-block" value="确定添加"></form>';
    echo '<br/><a href="./shequlist.php">>>返回对接列表</a>';
    echo '</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
社区类型是指该社区使用的网站程序，并不代表具体的社区网站！
</div>
</div>';
} elseif ($my=='edit') {
    $id = $_GET['id'];
    $row = $DB->get_row('select * from shua_shequ where id=\'' . $id . '\' limit 1');
    echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">修改对接网站信息</h3></div>';
    echo '<div class="panel-body">';
    echo '<form action="./shequlist.php?my=edit_submit&id=' . $id . '" method="POST">
<div class="form-group">
<label>网站类型:</label><br>
<select class="form-control" name="type" default="' . $row['type'] . '"><option value="0">玖伍系统(点数下单)</option><option value="2">玖伍系统(余额下单)</option><option value="1">亿乐系统</option><option value="3">星墨系统(点数下单)</option><option value="5">星墨系统(余额下单)</option><option value="4">九流社区</option><option value="6">卡易信</option><option value="7">卡乐购</option><option value="8">卡慧卡</option><option value="9">卡商网</option></select>
</div>
<div class="form-group">
<label id="shequ_url">网站域名:</label><br>
<input type="text" class="form-control" name="url" value="' . $row['url'] . '" required>
</div>
<div class="form-group">
<label id="username">登录账号:</label><br>
<input type="text" class="form-control" name="username" value="' . $row['username'] . '" required>
</div>
<div class="form-group">
<label id="password">登录密码:</label><br>
<input type="text" class="form-control" name="password" value="' . $row['password'] . "\" required>\r\n</div>\r\n<div class=\"form-group\" id=\"paypwd\" style=\"" . ($row['type']!=6 ? 'display:none;' : 'NULL') . "\">\r\n<label>支付密码:</label><br>\r\n<input type=\"text\" class=\"form-control\" name=\"paypwd\" value=\"" . $row['paypwd'] . '" placeholder="没有请留空">
</div>
<input type="button" class="btn btn-default btn-block" onclick="checkurl()" value="检测目标网站连通性">
<input type="submit" class="btn btn-primary btn-block" value="确定修改"></form>';
    echo '<br/><a href="./shequlist.php">>>返回对接列表</a>';
    echo '</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
网站类型是指该社区使用的网站程序，并不代表具体的社区网站！
</div>
</div>';
    echo '<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>
';
} elseif ($my=='add_submit') {
    $type = $_POST['type'];
    $url = $_POST['url'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $paypwd = $_POST['paypwd'];
    if ($type==NULL || $url==NULL || $username==NULL || $password==NULL) {
        showmsg('保存错误,请确保每项都不为空!', 3);
    } else {
        if ($url=='38.87sq.cn' || $url=='38mao.95jw.cn' || $url=='38mao.nb.95jw.cn' || $url=='38mao.ssgnb.95jw.cn' || $url=='www.38mao.cn') {
            showmsg('该社区域名处于黑名单中，请勿对接', 3);
        }
        if (strpos($url, '/')!==false) {
            showmsg('仅填写域名，不要带有/等符号', 1);
        }
        $rows = $DB->get_row('select * from shua_shequ where url=\'' . $url . '\' and username=\'' . $username . '\' limit 1');
        if ($rows) {
            showmsg('你所添加的记录已存在！', 3);
        }
        $sql = 'insert into `shua_shequ` (`url`,`username`,`password`,`paypwd`,`type`) values (\'' . $url . '\',\'' . $username . '\',\'' . $password . '\',\'' . $paypwd . '\',\'' . $type . '\')';
        if ($DB->query($sql)) {
            showmsg('添加对接网站成功！<br/><br/><a href="./shequlist.php">>>返回对接网站列表</a>', 1);
        } else {
            showmsg('添加对接网站失败！' . $DB->error(), 4);
        }
    }
} elseif ($my=='edit_submit') {
    $id = $_GET['id'];
    $rows = $DB->get_row('select * from shua_shequ where id=\'' . $id . '\' limit 1');
    if (!$rows) {
        showmsg('当前记录不存在！', 3);
    }
    $type = $_POST['type'];
    $url = $_POST['url'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $paypwd = $_POST['paypwd'];
    if (($type==NULL || $url==NULL) || $username==NULL || $password==NULL) {
        showmsg('保存错误,请确保每项都不为空!', 3);
    } else {
        if ($url=='38.87sq.cn' || $url=='38mao.95jw.cn' || $url=='38mao.nb.95jw.cn' || $url=='38mao.ssgnb.95jw.cn' || $url=='www.38mao.cn') {
            showmsg('该社区域名处于黑名单中，请勿对接', 3);
        }
        if ($DB->query('update shua_shequ set url=\'' . $url . '\',username=\'' . $username . '\',password=\'' . $password . '\',paypwd=\'' . $paypwd . '\',type=\'' . $type . '\',status=\'0\' where id=\'' . $id . '\'')) {
            showmsg('修改对接网站成功！<br/><br/><a href="./shequlist.php">>>返回对接网站列表</a>', 1);
        } else {
            showmsg('修改对接网站失败！' . $DB->error(), 4);
        }
    }
} elseif ($my=='delete') {
    $id = $_GET['id'];
    $sql = 'DELETE FROM shua_shequ WHERE id=\'' . $id . '\'';
    if ($DB->query($sql)) {
        showmsg('删除成功！<br/><br/><a href="./shequlist.php">>>返回对接网站列表</a>', 1);
    } else {
        showmsg('删除失败！' . $DB->error(), 4);
    }
} else {
    $numrows = $DB->count('SELECT count(*) from shua_shequ');
    $sql = ' 1';
    $con = '系统共有 <b>' . $numrows . '</b> 个对接网站<br/><a href="./shequlist.php?my=add" class="btn btn-primary">添加一个社区/卡盟</a>&nbsp;<a href="./set.php?mod=shequ" class="btn btn-info">其他设置</a>&nbsp;<a href="./log.php" class="btn btn-warning">对接日志</a>';
    echo '<div class="alert alert-info">';
    echo $con;
    echo '</div>';
    echo '      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>网站域名</th><th>类型</th><th>用户名</th><th>密码</th><th>操作</th></tr></thead>
          <tbody>
';
    $pagesize = 30;
    $pages = intval($numrows / $pagesize);
    if ($numrows % $pagesize) {
    }
    if (isset($_GET['page'])) {
        $page = intval($_GET['page']);
    } else {
        $page = 1;
    }
    $offset = $pagesize * ($page - 1);
    $rs = $DB->query('SELECT * FROM shua_shequ WHERE' . $sql . ' order by id asc');
    while ($res = $DB->fetch($rs)) {
        echo '<tr><td><b>' . $res['id'] . '</b></td><td><a href="http://' . $res['url'] . '/" target="_blank" rel="noreferrer">' . $res['url'] . '</a></td><td>' . display_sq($res['type']) . '</td><td>' . $res['username'] . '</td><td>******</td><td><a href="./shequlist.php?my=edit&id=' . $res['id'] . '" class="btn btn-info btn-xs">编辑</a>&nbsp;<a href="./shequlist.php?my=delete&id=' . $res['id'] . '" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此记录吗？\');">删除</a></td></tr>';
    }
}
echo '          </tbody>
        </table>
      </div>
';
echo '    </div>
  </div>
<script src="//cdn.cccyun.cc/layer/3.0.1/layer.js"></script>
<script>
function checkurl(){
	var url = $("input[name=\'url\']").val();
	if(url == \'\'){layer.alert(\'请先填写网站域名！\');return false;}
	if(url.indexOf(\'http\')<0 && url.substr(-1) != \'/\'){
		var ii = layer.load(2, {shade:[0.1,\'#fff\']});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=checkshequ",
			data : {url:url},
			dataType : \'json\',
			success : function(data) {
				layer.close(ii);
				if(data.code == 1){
					layer.msg(\'连通性良好\');
				}else{
					layer.alert(\'该网站由于防火墙原因国外主机无法连接，请使用国内主机\');
				}
			} ,
			error:function(data){
				layer.close(ii);
				layer.msg(\'目标社区连接超时\');
				return false;
			}
		});
	}else{
		layer.alert(\'网站域名不能带http和/符号，只填写域名\');
	}
}
$("select[name=\'type\']").change(function(){
	if($(this).val() == 4){
		$("#shequ_url").html("业务名称(仅用于标记)：");
		$("#username").html("卡号：");
		$("#password").html("密码：");
	}else if($(this).val() == 9){
		$("#shequ_url").html("网站域名：");
		$("#username").html("商家编号：");
		$("#password").html("接口密钥(联系客服获取)：");
	}else{
		$("#shequ_url").html("网站域名：");
		$("#username").html("登录账号：");
		$("#password").html("登录密码：");
	}
	if($(this).val() >= 6 && $(this).val() <= 8){
		$("#paypwd").show();
	}else{
		$("#paypwd").hide();
	}
});
window.onload=$("select[name=\'type\']").change();
</script>';

function display_sq($type)
{
    if ($type==1) {
        return '<font color=blue>亿乐系统</font>';
    }
    if ($type==3) {
        return '<font color=blue>星墨系统</font>';
    }
    if ($type==4) {
        return '<font color=blue>九流社区</font>';
    }
    if ($type==5) {
        return '<font color=blue>星墨系统</font>';
    }
    if ($type==6) {
        return '<font color=green>卡易信</font>';
    }
    if ($type==7) {
        return '<font color=green>卡乐购</font>';
    }
    if ($type==8) {
        return '<font color=green>卡慧卡</font>';
    }
    if ($type==9) {
        return '<font color=green>卡商网</font>';
    }
    return '<font color=blue>玖伍系统</font>';
}
