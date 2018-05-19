<?php
include('../includes/common.php');
$title = '商品管理';
include('./head.php');
if ($islogin!=1) {
    exit('<script language=\'javascript\'>window.location.href=\'./login.php\';</script>');
}
echo '<link href="//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
';
$rs = $DB->query('SELECT * FROM shua_class WHERE active=1 order by sort asc');
$select = '<option value="0">未分类</option>';
$shua_class[0] = '未分类';
while ($res = $DB->fetch($rs)) {
    $shua_class[$res['cid']] = $res['name'];
    $select .= '<option value="' . $res['cid'] . '">' . $res['name'] . '</option>';
}
$rs = $DB->query('SELECT * FROM shua_shequ order by id asc');
$shequselect = '';
while ($res = $DB->fetch($rs)) {
    $shequselect .= '<option value="' . $res['id'] . '" type="' . $res['type'] . '">' . $res['url'] . '</option>';
}
$my = (isset($_GET['my']) ? $_GET['my'] : NULL);
if ($my=='move') {
    $cid = $_POST['cid'];
    if (!$cid) {
        exit('<script language=\'javascript\'>alert(\'请选择分类\');history.go(-1);</script>');
    }
    $checkbox = $_POST['checkbox'];
    $i = 0;
    foreach ($checkbox as $tid) {
        if ($cid==(-1)) {
            $DB->query('update shua_tools set active=1 where tid=\'' . $tid . '\' limit 1');
        } elseif ($cid==(-2)) {
            $DB->query('update shua_tools set active=0 where tid=\'' . $tid . '\' limit 1');
        } elseif ($cid==(-3)) {
            $DB->query('DELETE FROM shua_tools WHERE tid=\'' . $tid . '\' limit 1');
        } else {
            $DB->query('update shua_tools set cid=\'' . $cid . '\' where tid=\'' . $tid . '\' limit 1');
        }
    }
    exit('<script language=\'javascript\'>alert(\'成功移动' . $i . '个商品\');history.go(-1);</script>');
} else {
    if (isset($_GET['cid'])) {
        $cid = intval($_GET['cid']);
        $numrows = $DB->count('SELECT count(*) from shua_tools where cid=\'' . $cid . '\'');
        $sql = ' cid=\'' . $cid . '\'';
        $con = '分类 <a href="../?cid=' . $cid . '" target="_blank">' . $shua_class[$cid] . '</a> 共有 <b>' . $numrows . '</b> 个商品<br/><a href="./shopedit.php?my=add&cid=' . $cid . '" class="btn btn-primary">添加商品</a>';
        $link = '&cid=' . $cid;
    } else {
        $numrows = $DB->count('SELECT count(*) from shua_tools');
        $sql = ' 1';
        $con = '系统共有 <b>' . $numrows . '</b> 个商品<br/><a href="./shopedit.php?my=add" class="btn btn-primary">添加商品</a>';
    }
    echo '<div class="alert alert-info">';
    echo $con;
    echo '</div>';
    echo '	  <form name="form1" method="post" action="shoplist.php?my=move">
	  <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>商品名称</th><th>商品售价</th><th>普及版价格</th><th>专业版价格</th><th>商品类型</th><th class="';
    echo (isset($_GET['cid']) ? '' : 'hide');
    echo '">排序操作</th><th>状态</th><th>操作</th></tr></thead>
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
    $rs = $DB->query('SELECT * FROM shua_tools WHERE' . $sql . ' order by sort asc limit ' . $offset . ',' . $pagesize);
    while ($res = $DB->fetch($rs)) {
        echo '<tr><td><input type="checkbox" name="checkbox[]" id="list1" value="' . $res['tid'] . '" onClick="unselectall1()"><b>' . $res['tid'] . '</b></td><td><a href="../?cid=' . $res['cid'] . '&tid=' . $res['tid'] . '" target="_blank">' . $res['name'] . '</a></td><td>' . $res['price'] . '</td><td>' . ($res['cost']!=0 ? $res['cost'] : $res['price']) . '</td><td>' . ($res['cost2']!=0 ? $res['cost2'] : $res['cost']) . '</td><td>' . display_shoptype($res['is_curl']) . "\r\n</td><td class=\"" . (isset($_GET['cid']) ? '' : 'hide') . '"><a class="btn btn-xs sort_btn" title="移到顶部" onclick="sort(' . $res['cid'] . ',' . $res['tid'] . ',0)"><i class="fa fa-long-arrow-up"></i></a><a class="btn btn-xs sort_btn" title="移到上一行" onclick="sort(' . $res['cid'] . ',' . $res['tid'] . ',1)"><i class="fa fa-chevron-circle-up"></i></a><a class="btn btn-xs sort_btn" title="移到下一行" onclick="sort(' . $res['cid'] . ',' . $res['tid'] . ',2)"><i class="fa fa-chevron-circle-down"></i></a><a class="btn btn-xs sort_btn" title="移到底部" onclick="sort(' . $res['cid'] . ',' . $res['tid'] . ",3)\"><i class=\"fa fa-long-arrow-down\"></i></a></td>\r\n<td>" . ($res['active']==1 ? '<span class="btn btn-xs btn-success" onclick="setActive(' . $res['tid'] . ',0)">上架中</span>' : '<span class="btn btn-xs btn-warning" onclick="setActive(' . $res['tid'] . ',1)">已下架</span>') . '</td><td><a href="./shopedit.php?my=edit&tid=' . $res['tid'] . '" class="btn btn-info btn-xs">编辑</a>&nbsp;<a href="./list.php?tid=' . $res['tid'] . '" class="btn btn-warning btn-xs">订单</a>&nbsp;<a href="./shopedit.php?my=delete&tid=' . $res['tid'] . '" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此商品吗？\');">删除</a></td></tr>
';
    }
}
echo '          </tbody>
        </table>
<input name="chkAll1" type="checkbox" id="chkAll1" onClick="this.value=check1(this.form.list1)" value="checkbox">&nbsp;全选&nbsp;
<select name="cid"><option selected>将选定商品移动到分类</option>';
echo $select;
echo '<option value="-1">&gt;改为上架中</option><option value="-2">&gt;改为已下架</option><option value="-3">&gt;删除选中</option></select>
<input type="submit" name="Submit" value="确定移动">
</div>
</form>
      
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<script>
var checkflag1 = "false";
function check1(field) {
if (checkflag1 == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag1 = "true";
return "false"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag1 = "false";
return "true"; }
}

function unselectall1()
{
    if(document.form1.chkAll1.checked){
	document.form1.chkAll1.checked = document.form1.chkAll1.checked&0;
	checkflag1 = "false";
    } 	
}

function setActive(tid,active) {
	$.ajax({
		type : \'GET\',
		url : \'ajax.php?act=setTools&tid=\'+tid+\'&active=\'+active,
		dataType : \'json\',
		success : function(data) {
			window.location.reload();
		},
		error:function(data){
			layer.msg(\'服务器错误\');
			return false;
		}
	});
}
function sort(cid,tid,sort) {
	$.ajax({
		type : \'GET\',
		url : \'ajax.php?act=setToolSort&cid=\'+cid+\'&tid=\'+tid+\'&sort=\'+sort,
		dataType : \'json\',
		success : function(data) {
			window.location.reload();
		},
		error:function(data){
			layer.msg(\'服务器错误\');
			return false;
		}
	});
}
</script>

';
echo '<ul class="pagination">';
$first = 1;
$prev = $page - 1;
$next = $page + 1;
$last = $pages;
if ($page > 1) {
    echo '<li><a href="shoplist.php?page=' . $first . $link . '">首页</a></li>';
    echo '<li><a href="shoplist.php?page=' . $prev . $link . '">&laquo;</a></li>';
} else {
    echo '<li class="disabled"><a>首页</a></li>';
    echo '<li class="disabled"><a>&laquo;</a></li>';
}
$i = 1;
while ($i < $page) {
    echo '<li><a href="shoplist.php?page=' . $i . $link . '">' . $i . '</a></li>';
}
echo '<li class="disabled"><a>' . $page . '</a></li>';
$i = $page + 1;
while ($i <= $pages) {
    echo '<li><a href="shoplist.php?page=' . $i . $link . '">' . $i . '</a></li>';
}
echo '';
if ($page < $pages) {
    echo '<li><a href="shoplist.php?page=' . $next . $link . '">&raquo;</a></li>';
    echo '<li><a href="shoplist.php?page=' . $last . $link . '">尾页</a></li>';
} else {
    echo '<li class="disabled"><a>&raquo;</a></li>';
    echo '<li class="disabled"><a>尾页</a></li>';
}
echo '</ul>';
echo '    </div>
';
if (!isset($_GET['cid'])) {
    echo '<font color="grey">提示：查看单个分类的商品列表可进行商品排序操作';
}
echo '  </div>';

function display_shoptype($type)
{
    if ($type!=1) {
        if ($type==2) {
            return '<span class="btn-warning btn-xs">对接</span>';
        }
    }
    if ($type==4) {
        return '<span class="btn-success btn-xs">发卡</span>';
    }
    return '<span class="btn-info btn-xs">自营</span>';
}
