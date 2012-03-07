<div class="posts form">
<?php echo $this->Form->create('Task');?>
	<fieldset>
		<legend><?php echo __('タスクを追加'); ?></legend>
	<?php
		echo $this->Form->input('body', array(
            'label' => 'やってほしいこと',
            ));
		echo $this->Form->input('body_type', array(
            'label' => 'やってほしいことの種類',
            'options' => $category_name,
            'values' => $category_id,
            'empty' => '',
            ));
		echo $this->Form->input('pay', array(
            'label' => 'おかえし',
            ));
		echo $this->Form->input('pay_type', array(
            'label' => 'おかえしの種類',
            'options' => $category_name,
            'values' => $category_id,
            'empty' => '',
            ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('登録'));?>
</div>
<div class="actions">

		<?php echo $this->Html->link(__('一覧に戻る'), array('controller' => 'Tasks', 'action' => 'index'));?>
</div>
