<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="<?=$this->parametro_model->get('utils_address')?>css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?=$this->parametro_model->get('utils_address')?>css/admin-layout.css" />
		<link rel="stylesheet" type="text/css" href="<?=$this->parametro_model->get('utils_address')?>css/admin-menu.css" />
		<title><?=$title?></title>
	</head>
	<body>
		<?php $this->load->view('common/menu');?>
		
		<div id="container">
			