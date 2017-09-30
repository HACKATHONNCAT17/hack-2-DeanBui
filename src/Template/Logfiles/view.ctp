<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Logfile $logfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Logfile'), ['action' => 'edit', $logfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Logfile'), ['action' => 'delete', $logfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Logfiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Logfile'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logfiles view large-9 medium-8 columns content">
    <h3><?= h($logfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($logfile->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Log') ?></h4>
        <?= $this->Text->autoParagraph(h($logfile->Log)); ?>
    </div>
</div>
