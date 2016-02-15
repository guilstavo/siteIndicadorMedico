<h1>Login</h1>
<?php
echo form_open("login/autenticar");

echo form_label("Email", "email");
echo form_input(array(
	"name" => "email",
	"id" => "email",
	"class" => "form-control",
	"maxlenght" => "255"

));

echo form_label("Senha", "senha");
echo form_password(array(
	"name" => "senha",
	"id" => "senha",
	"class" => "form-control",
	"maxlenght" => "255"

));

echo form_button(array(
	"class" => "btn btn-primary",
	"content" => "Login",
	"type" => "submit"
));

echo form_close();
?>