<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ips'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ips form large-9 medium-8 columns content">
    <?= $this->Form->create($ip) ?>
    <fieldset>
        <legend><?= __('Add Ip') ?></legend>
        <?php
            echo $this->Form->control('text');
            echo $this->Form->control('lv');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
