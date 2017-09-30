<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ip $ip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ip'), ['action' => 'edit', $ip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ip'), ['action' => 'delete', $ip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ip'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ips view large-9 medium-8 columns content">
    <h3><?= h($ip->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lv') ?></th>
            <td><?= $this->Number->format($ip->lv) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($ip->text)); ?>
    </div>
</div>
