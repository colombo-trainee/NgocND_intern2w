<?php 
	require_once('../../app/lib/change_name.php');
 	require_once('../../models/m_cates.php');
 	$cates = new m_cates;
	$name = $_POST['name'];
    $alias = changeTitle($name);
    $sort_oder = $_POST['sort_oder'];
    $link = $_POST['link'];
    $type = $_POST['type'];
 	$update_at = gmdate('Y/m/d H:i:s',time());
 	$id = $_POST['id'];
 	$cates->update_cates($name,$alias,$sort_oder,$link,$type,$update_at,$id);
 	header('location:http://localhost:8888/NguyenDaiNgoc_inter2w/views/admin/layouts/index.php?page=list_cates');
?>