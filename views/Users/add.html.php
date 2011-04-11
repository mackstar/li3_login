<?php $this->title($t('Create your account', array('scope'=>'login'))); ?>
<?=$this->form->create($user, array('url'=>'/auth/users/create', 'method'=>'post'))?>
	<?=$this->form->field('name', array('label' => $t('Full Name', array('scope'=>'login'))))?>
	<?=$this->form->field('email', array('label' => $t('email address', array('scope'=>'login'))))?>
	<?=
		$this->form->field('password', array('type' => 'password', 
			'label'=>$t('Choose your password', array('scope'=>'login'))
		))
	?>
	<?=$this->form->submit($t('Submit'))?>
<?=$this->form->end()?>