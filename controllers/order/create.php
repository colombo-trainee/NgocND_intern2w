<?php 
	require_once('../../app/lib/change_name.php');
 	require_once('../../models/m_orders.php');
	$id= "";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $party_number = $_POST['party_number'];
    $created_at = gmdate('Y/m/d H:i:s',time()); 
    $update_at = gmdate('Y/m/d H:i:s',time());
    $orders =  new M_orders;
    $orders->create_orders($id,$name,$email,$date,$party_number,$created_at,$update_at);
    header('location:http://localhost:8888/NguyenDaiNgoc_inter2w/views/user/#content5');
?>