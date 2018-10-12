<?php 
require_once'../functions.php';
/*根据客户端攒递过来的ID删除对应数据*/
if(empty($_GET['id'])){
	exit('缺少必要参数');
}

//$id =(int) $_GET['id'];
$id = $_GET['id'];

$rows = xiu_execute('delete from categories where id in('.$id.');');
header('Location:/baixiu-dev/admin/categories.php');