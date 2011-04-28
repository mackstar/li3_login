<?php $this->title($t('Login Here', array('scope'=>'login')))?>
	<?=$this->form->create(null, array('url' => array('Authenticate::add', 'library'=>'li3_login')))?>
	<?=$this->form->field('email', array('label'=>$t('E-mail Address', array('scope'=>'login'))))?>
	<?=$this->form->field('password', array('type' => 'password', 'label'=>$t('Password', array('scope'=>'login'))))?>
	<?=$this->form->submit($t('Submit', array('scope'=>'login')))?>
<?=$this->form->end()?>