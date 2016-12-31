<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL && ~E_NOTICE);


require_once 'db.php';
require_once 'register.php';
require_once 'changePassword.php';

 ?>

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/jquery.toastmessage.css">
	  <link rel="stylesheet" href="css/styles.css">
	  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	 
	  <title>Restaurant menu</title>
	</head>
	<body>
		<form action="login.php" method="POST" id="login-form">
		<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal">
		  <div class="modal-dialog modal-md" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h1 class="login-title">Autentificare</h1>
		      </div>
		      <div class="modal-body">
		      	<div class="input">
							<label class="login-label">
								<p class="login-paragraf">Adresa de e-mail</p>
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-envelope"></span>
									</div>
									<input class="form-control" type="email" name="email" placeholder = "customer@example.com">
								</div>
				 			</label>	
						</div>
						<div class="input">
							<p class="login-paragraf">Parola</p>
							<label class="login-label">
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-lock"></span>
									</div>
									<input class="form-control" type="password" name="password" placeholder="parola">
								</div>
							</label>
						</div>
						<div class="row">
							<div class="col-xs-6"></div>
							<div class="col-xs-6">
								<a class = "parola-uitata" href="" data-toggle="modal" data-target=".change-modal">Parolă uitată?</a>
							</div>
							<div class="col-xs-4"></div>
							<div class="col-xs-4">
								<input class="login-button form-control" type="submit" name="login-submit" value="Intră în cont!">
							</div>
							<div class="col-xs-4"></div>
						</div>
		      </div>
		    </div>
		  </div>
		</div>	
	</form>
	<form action="index.php" method="POST" id="register-form">
		<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal">
		  <div class="modal-dialog modal-md" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h1 class="login-title">Creează un cont!</h1>
		      </div>
		      <div class="modal-body">
		      	<div class="input">
							<label class="login-label">
								<p class="login-paragraf">Adresa de e-mail</p>
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-envelope"></span>
									</div>
									<input class="form-control" type="email" name="register_email" placeholder = "customer@example.com">
								</div>
				 			</label>	
						</div>
						<div class="input">
							<label class="login-label">
								<p class="login-paragraf">Nume utilizator</p>
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-user"></span>
									</div>
									<input class="form-control" name="register_nume" placeholder = "nume">
								</div>
				 			</label>	
						</div>
						<div class="input">
							<p class="login-paragraf">Parola</p>
							<label class="login-label">
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-lock"></span>
									</div>
									<input class="form-control" type="password" name="register_password" placeholder="parola">
								</div>
							</label>
						</div>
						<div class="row">
							<div class="col-xs-4"></div>
							<div class="col-xs-4">
								<input class="login-button form-control" type="submit" name="register-submit" value="Înregistrează-te!">
							</div>
							<div class="col-xs-4"></div>
						</div>
		      </div>
		    </div>
		  </div>
		</div>	
	</form>
	<form action="index.php" method="POST" id="change-form">
		<div class="modal fade change-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal">
		  <div class="modal-dialog modal-md" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h1 class="login-title">Schimbă parola</h1>
		      </div>
		      <div class="modal-body">
		      	<div class="input">
							<label class="login-label">
								<p class="login-paragraf">Adresa de e-mail</p>
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-envelope"></span>
									</div>
									<input class="form-control" type="email" name="change_email" placeholder = "customer@example.com">
								</div>
				 			</label>	
						</div>
						<div class="input">
							<p class="login-paragraf">Parola nouă</p>
							<label class="login-label">
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-lock"></span>
									</div>
									<input class="form-control" type="password" name="change_password" placeholder="parola">
								</div>
							</label>
						</div>
						<div class="row">
							<div class="col-xs-4"></div>
							<div class="col-xs-4">
								<input class="login-button form-control" type="submit" name="change-submit" value="Schimbă parola!">
							</div>
							<div class="col-xs-4"></div>
						</div>
		      </div>
		    </div>
		  </div>
		</div>	
	</form>
	
