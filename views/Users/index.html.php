<?php $this->title($t('Users List', array('scope'=>'login'))); ?>
<?php foreach ($users as $user): ?>
	<p>
		<?=$this->html->link($user->name, array('Users::edit', 'library' => 'li3_login', 'id' => $user->_id)); ?>
	</p>
<?php endforeach ?>