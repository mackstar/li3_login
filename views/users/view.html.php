<?php $this->title($t('View User', array('scope'=>'login'))); ?>
<p>
	<?=$t('Name:', array('scope'=>'login')); ?>
	<?=$user->name?>
</p>
<p>
	<?=$t('Email:', array('scope'=>'login')); ?>
	<?=$user->email?>
</p>
<p>
	<?=$t('Mobile:', array('scope'=>'login')); ?>
	<?=$user->mobile?>
</p>
<p>
	<?=$t('Birthday:', array('scope'=>'login')); ?>
	<?=$user->birthday?>
</p>