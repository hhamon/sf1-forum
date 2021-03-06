<?php slot('title', $category->getName()) ?>

<?php include_partial('breadcrumb', array(
    'current_item' => $category->getName(),
    'categories'   => $category->getParents(),
)) ?>

<?php if ($category->getDescription()) : ?>
    <?php echo simple_format_text($category->getDescription()) ?>
<?php endif ?>

<?php if ($category->hasChildren()) : ?>
    <?php include_partial('categories', array(
        'categories' => $category->getNearestChildren(),
    )) ?>
<?php endif ?>

<h2><?php echo __('Current threads') ?></h2>

<p>
    <?php echo link_to(
        __('Open new thread'),
        'forum_new_thread',
        array('board' => $category->getSlug()),
        array('class' => 'btn btn-default')
    ) ?>
</p>

<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th><?php echo __('Status') ?></th>
            <th><?php echo __('Solved') ?></th>
            <th><?php echo __('Discussion title') ?></th>
            <th><?php echo __('Author') ?></th>
            <th><?php echo __('Answers') ?></th>
            <th><?php echo __('Last update') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($threads as $thread) : ?>
        <tr>
            <td>
                <span title="<?php echo $thread->isClosed() ? 'Closed' : 'Open' ?>" 
                      class="glyphicon glyphicon-<?php echo $thread->isClosed() ? 'lock' : 'bullhorn' ?>"></span>
            </td>
            <td>
                <span title="<?php echo $thread->isSolved() ? 'Solved' : 'Unsolved' ?>" 
                      class="glyphicon glyphicon-<?php echo $thread->isSolved() ? 'ok' : 'remove' ?>"></span>
            </td>
            <td><?php echo link_to($thread->getTitle(), 'forum_thread', array('thread' => $thread->getSlug())) ?></td>
            <td><?php echo $thread->getAuthor() ?></td>
            <td><?php echo format_number($thread->getAnswerCount()) ?></td>
            <td><?php echo format_datetime($thread->getUpdatedAt()) ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?php if ($pager->haveToPaginate()) : ?>
    <?php include_partial('global/pagination', array(
        'pager'  => $pager,
        'route'  => 'forum_category',
        'params' => array('category' => $category->getSlug()),
    )) ?>
<?php endif ?>
