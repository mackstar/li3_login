<?php $this->title('Edit Account Details'); ?>
<?=$this->form->create($user, array('url' => '/users', 'method'=>'post'))?>
	<?=$this->form->field('name', array('label' => 'name'))?>
	<?=$this->form->field('email', array('label' => 'email address'))?>
	<?=$this->form->field('password', array('type' => 'password'))?>
	<?=$this->form->submit('submit')?>
<?=$this->form->end()?>