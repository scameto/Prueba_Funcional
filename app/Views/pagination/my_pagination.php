<?php
$pager->setSurroundCount(2);
?>
<nav aria-label="Pagination">
    <ul class="flex list-reset border border-grey-light rounded">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" class="block py-2 px-3 border-r rounded-l text-blue-700 hover:bg-blue-100">Primera</a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" class="block py-2 px-3 border-r text-blue-700 hover:bg-blue-100">&laquo;</a>
            </li>
        <?php endif ?>
        
        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="active"' : '' ?>>
                <a href="<?= $link['uri'] ?>" class="py-2 px-3 border-r <?= $link['active'] ? 'bg-blue-500 text-white' : 'text-blue-700 hover:bg-blue-100' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>
        
        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" class="block py-2 px-3 border-r text-blue-700 hover:bg-blue-100">&raquo;</a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" class="block py-2 px-3 rounded-r text-blue-700 hover:bg-blue-100">Última</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
