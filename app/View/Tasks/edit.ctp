<div class="tasks form">
<?php echo $this->Form->create('Task');?>
	<fieldset>
		<legend><?php echo __('タスクを編集'); ?></legend>
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
            echo $this->Form->input('status', array(
                'label' => '状況',
                'options' => array('募集中','実施中','終了'),
                'values' => array(0,1,2),
            ));

	?>
	</fieldset>
<?php echo $this->Form->end(__('修正'));?>
</div>
