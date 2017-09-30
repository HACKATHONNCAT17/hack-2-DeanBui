<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $logfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $logfile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Logfiles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="logfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($logfile) ?>
    <fieldset>
        <legend><?= __('Edit Logfile') ?></legend>
        <?php
            echo $this->Form->control('Log');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
