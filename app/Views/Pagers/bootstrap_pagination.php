<?php $pager->setSurroundCount(2); ?>

<nav aria-label="Page navigation">
    <ul class="pagination pagination-sm mb-0">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
                    Previous
                </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Next">
                    Next
                </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        <?php endif ?>
    </ul>
</nav>
