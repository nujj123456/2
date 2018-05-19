<?php
include('../includes/common.php');
$title = '分类管理';
include('./head.php');
if ($islogin!=1) {
    exit('<script language=\'javascript\'>window.location.href=\'./login.php\';</script>');
}
echo '<link href="//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container" style="padding-top:70px;">
    <div class="col-sm-12 col-md-10 center-block" style="float: none;">
';
$my = (isset($_GET['my']) ? $_GET['my'] : NULL);
if ($my=='add_submit') {
    $name = $_POST['name'];
    if ($name==NULL) {
        exit('<script language=\'javascript\'>alert(\'保存错误,请确保每项都不为空!\');history.go(-1);</script>');
    } else {
        $sql = 'insert into `shua_class` (`name`,`active`) values (\'' . $name . '\',\'1\')';
        if ($cid = $DB->insert($sql)) {
            $DB->query('UPDATE `shua_class` SET `sort`=\'' . $cid . '\' WHERE `cid`=\'' . $cid . '\'');
            exit('<script language=\'javascript\'>alert(\'添加分类成功！\');window.location.href=\'classlist.php\';</script>');
        } else {
            exit('<script language=\'javascript\'>alert(\'添加商品失败！' . $DB->error() . '\');history.go(-1);</script>');
        }
    }
} elseif ($my=='edit_submit') {
    $cid = $_GET['cid'];
    $rows = $DB->get_row('select * from shua_class where cid=\'' . $cid . '\' limit 1');
    if (!$rows) {
        exit('<script language=\'javascript\'>alert(\'当前记录不存在！\');history.go(-1);</script>');
    }
    $name = $_POST['name'];
    if ($name==NULL) {
        exit('<script language=\'javascript\'>alert(\'保存错误,请确保每项都不为空!\');history.go(-1);</script>');
    } elseif ($DB->query('update shua_class set name=\'' . $name . '\' where cid=\'' . $cid . '\'')) {
        exit('<script language=\'javascript\'>alert(\'修改分类成功！\');window.location.href=\'classlist.php\';</script>');
    } else {
        exit('<script language=\'javascript\'>alert(\'修改商品失败！' . $DB->error() . '\');history.go(-1);</script>');
    }
} elseif ($my=='delete') {
    $cid = $_GET['cid'];
    $sql = 'DELETE FROM shua_class WHERE cid=\'' . $cid . '\'';
    if ($DB->query($sql)) {
        exit('<script language=\'javascript\'>alert(\'删除成功！\');window.location.href=\'classlist.php\';</script>');
    } else {
        exit('<script language=\'javascript\'>alert(\'删除失败！' . $DB->error() . '\');history.go(-1);</script>');
    }
} else {
    $numrows = $DB->count('SELECT count(*) from shua_class');
    $sql = ' 1';
    echo $con;
    echo '<div class="panel panel-primary">
	<div class="panel-heading">
		商品分类
	</div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>排序操作</th><th>名称（';
    echo $numrows;
    echo '）</th><th>操作</th></tr></thead>
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
    $rs = $DB->query('SELECT * FROM shua_class WHERE' . $sql . ' order by sort asc');
    while ($res = $DB->fetch($rs)) {
        echo '<form action="classlist.php?my=edit_submit&cid=' . $res['cid'] . '" method="POST" class="form-inline"><tr><td>
	<a class="btn btn-xs sort_btn" title="移到顶部" onclick="sort(' . $res['cid'] . ',0)"><i class="fa fa-long-arrow-up"></i></a><a class="btn btn-xs sort_btn" title="移到上一行" onclick="sort(' . $res['cid'] . ',1)"><i class="fa fa-chevron-circle-up"></i></a><a class="btn btn-xs sort_btn" title="移到下一行" onclick="sort(' . $res['cid'] . ',2)"><i class="fa fa-chevron-circle-down"></i></a><a class="btn btn-xs sort_btn" title="移到底部" onclick="sort(' . $res['cid'] . ',3)"><i class="fa fa-long-arrow-down"></i></a>
	</td><td><input type="text" class="form-control input-sm" name="name" value="' . $res['name'] . '" placeholder="分类名称" required></td><td><button type="submit" class="btn btn-primary btn-sm">修改</button>&nbsp;' . ($res['active']==1 ? '<span class="btn btn-sm btn-success" onclick="setActive(' . $res['cid'] . ',0)">上架中</span>' : '<span class="btn btn-sm btn-warning" onclick="setActive(' . $res['cid'] . ',1)">已下架</span>') . '&nbsp;<a href="./shoplist.php?cid=' . $res['cid'] . '" class="btn btn-warning btn-sm">商品</a>&nbsp;<a href="./classlist.php?my=delete&cid=' . $res['cid'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'你确实要删除此商品吗？\');">删除</a></td></tr></form>';
    }
}
echo '<form action="classlist.php?my=add_submit" method="POST" class="form-inline" id="addclass"><tr><td></td><td><input type="text" class="form-control input-sm" name="name" placeholder="分类名称" required></td><td colspan="3"><button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> 添加分类</button></td></tr></form>';
echo '          </tbody>
        </table>
      </div>
';
echo "    </div>
  </div>
</div>
<script src=\"//lib.baomitu.com/layer/2.3/layer.js\"></script>
<script>
function setActive(cid,active) {
	\$.ajax({
		type : 'GET',
		url : 'ajax.php?act=setClass&cid='+cid+'&active='+active,
		dataType : 'json',
		success : function(data) {
			window.location.reload();
		},
		error:function(data){
			layer.msg('服务器错误');
			return false;
		}
	});
}
function sort(cid,sort) {
	\$.ajax({
		type : 'GET',
		url : 'ajax.php?act=setClassSort&cid='+cid+'&sort='+sort,
		dataType : 'json',
		success : function(data) {
			window.location.reload();
		},
		error:function(data){
			layer.msg('服务器错误');
			return false;
		}
	});
}
</script>";
