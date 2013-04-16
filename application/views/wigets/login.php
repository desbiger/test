<?=Form::open('user/login')?>
<?=Form::input('user','',array('placeholder'=>'Логин'))?><br>
<?=Form::password('password','',array('placeholder'=>'Пароль'))?><br>
<?=Form::submit('submit','Войти')?>
<?=Form::close()?>
