<?php $this->title($t('Login Here', array('scope'=>'login')))?>
<?php $this->security->sign();?>
	<?=$this->form->create(null, array('url' => ['Authenticate::register', 'library'=>'li3_login']))?>
	<?=$this->form->field('name', array('label'=>$t('Name', array('scope'=>'login'))))?>
	<?=$this->form->field('email', array('label'=>$t('E-mail Address', array('scope'=>'login'))))?>
	<?=$this->form->field('mobile', array('label'=>$t('Mobile Number', array('scope'=>'login'))))?>
	<?=$this->form->field('birthday', array('type'=>'date','label'=>$t('Birthday', array('scope'=>'login'))))?>
	<?=$this->form->field('password', array('type' => 'password', 'label'=>$t('Password', array('scope'=>'login'))))?>
	<?=$this->form->field('confirm_password', array('type' => 'password', 'label'=>$t('Confirm Password ', array('scope'=>'login'))))?>
	<?=$this->form->submit($t('Submit', array('scope'=>'login')))?>
<?=$this->form->end()?>