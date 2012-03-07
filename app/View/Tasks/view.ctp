<div class="tasks view">
<h2><?php  echo __('TASK');?></h2>

<table class="table table-bordered table-striped table-condensed">
<tr>
    <th>依頼人</th>
    <th>やってほしいこと</th>
    <th>おかえし</th>
    <th>やる人</th>
    <th>状況</th>
</tr>
<tr>
    <td><?php echo h($task['User']['username']); ?></td>
    <td style="width:350px; text-align:left;"><?php echo h($task['Task']['body']); ?>&nbsp;</td>
    <td style="width:350px; text-align:left;"><?php echo h($task['Task']['pay']); ?>&nbsp;</td>
    <td><?php 
            if (is_null($task['CommitUser']['username'])) {
                echo '（未定）';
            } else {
                echo h($task['CommitUser']['username']); 
            }
    ?></td>
    <td><?php
        if ($task['Task']['status'] == 0) {
            echo '募集中';
        } else if ($task['Task']['status'] == 1) {
            echo '実施中';
        } else if ($task['Task']['status'] == 2) {
            echo '完了';
        }
    ?></td>
</tr>
</table>

<table class="table table-bordered table-striped table-condensed" style="width: 20%;" align="center">
<tr>
<th style="text-align: center;">参加表明している人</th>
</tr>
<?php if ($commit_users) { ?>
<?php foreach ($commit_users as $cuser): ?>
<tr>
<td style="text-align: center;"><?php echo h($cuser['User']['username']); ?></td>
</tr>
<?php endforeach ?>
<?php } else { ?>
<td style="text-align: center;">なし</td>
<?php } ?>
</table>
<?php echo $this->Form->create('CommitUser'); ?>
<?php echo $this->Form->end(__('参加する！')); ?>

<?php echo $this->Html->link(__('一覧に戻る'), array('controller' => 'Tasks', 'action' => 'index'));?> 

</div>
