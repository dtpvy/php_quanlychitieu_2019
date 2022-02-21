<?php 
	$connect = new mysqli('localhost', 'id9108704_wp_a8e1df01de11983b9c9b22f5d3e9c2fe', 'khongbiet123', 'id9108704_wp_a8e1df01de11983b9c9b22f5d3e9c2fe');
	if ($connect -> connect_error) {
		echo $connect->connect_error;
	}
?>