<?php if ($id) { ?>
<a href="/Tasks/add" class="btn btn-primary btn-large" style="width:30%">タスクを追加</a>
<?php } ?>
<div class="tasks index">
    <h2>TASKS</h2>
    <?php
    echo $this->Paginator->numbers();
    ?>
    <table class="table table-bordered table-striped table-condensed">
    <tr>
        <th>依頼人</th>
        <th>やってほしいこと</th>
        <th>おかえし</th>
        <th>やる人</th>
        <th>状況</th>
        <th>アクション</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
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
        <td class="actions">
        <?php echo $this->Html->link(__('詳細'), array('action' => 'view', $task['Task']['id'])); ?>
        <?PHP if (isset($id) && $task['Task']['user_id'] == $id) { ?>
        <?php echo $this->Html->link(__('編集'), array('action' => 'edit', $task['Task']['id'])); ?>
        <?php echo $this->Html->link(__('やる人'), array('action' => 'commit', $task['Task']['id'])); ?>
        <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $task['Task']['id']), null, __('このタスクを削除します。よろしいですか？')); ?>
        <?php } ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </table>
    <?php
    echo $this->Paginator->numbers();
    ?>
</div>
<br />


