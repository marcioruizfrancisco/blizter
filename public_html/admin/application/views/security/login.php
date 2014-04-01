<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="<?=$this->parametro_model->get('utils_address')?>css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?=$this->parametro_model->get('utils_address')?>css/security.css" />
		<title><?=$title?></title>
	</head>
	<body>
		<div id="container">
			<div id="login">
				<form method="post">
					<div id="login_form">
						<div class="box">
							<label for="email">
								<div class="label">Email:</div>
								<input type="text" name="email" id="email" />
							</label>
							
							<label for="password">
								<div class="label">Senha:</div>
								<input type="password" name="password" id="password" />
							</label>
							
							<div id="confirm_box">
								<input type="submit" value="Entrar" />
							</div>
						</div>
						
						<div>
							<?php if($this->parametro_model->get('enable_forgot_pass') == 1){ ?>
								<?=anchor('/recuperar_senha','Esqueceu sua Senha?');?>
							<? } ?>
							
							<?php if($this->parametro_model->get('enable_user_register') == 1){ ?>
								<?=anchor('/cadastro','Ainda não tem cadastro?');?>
							<? } ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>