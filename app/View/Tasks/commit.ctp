<?php echo $this->Form->create('Task');?>  
<table class="table table-bordered table-striped table-condensed" style="width: 20%;" align="center">
<tr>
<th colspan="3" style="text-align: center;">参加表明している人</th>
</tr>
<?php if ($commit_users) { ?>
<?php foreach ($commit_users as $cuser): ?>
<tr>
<td style="text-align: center;"><input type="radio" name="data[Task][commit_user_id]" value="<?php echo h($cuser['User']['id'])?>"></td>
<td style="text-align: center;"><?php echo h($cuser['User']['username']); ?></td>
<td style="text-align: center;"><?php echo h($cuser['User']['email']); ?></td>
</tr>
<?php endforeach ?>
<?php } else { ?>
<td colspan="3" style="text-align: center;">なし</td>
<?php } ?>
</table>
<?php echo $this->Form->end(__('この人に頼む'));?>
