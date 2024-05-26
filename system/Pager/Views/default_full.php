<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>" class='pagination-box'>
	<ul class="pagination">
		<?php if ($pager->hasPrevious()) { ?>
			<li>
				<a href="<?= $pager->getFirst() ?>" class='custom-pager-width' aria-label="<?= lang('Pager.first') ?>">
				<i class='pl-2 pr-2 fa fa-angle-double-left'></i><span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>
			<li>
				<a href="<?= $pager->getPrevious() ?>" class='custom-pager-width' aria-label="<?= lang('Pager.previous') ?>">
				<i class='pl-2 pr-2 fa fa-angle-left'></i><span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php }else{ ?>
			<li>
				<a class='custom-pager-width' aria-label="<?= lang('Pager.first') ?>">
				<i class='pl-2 pr-2 fa fa-angle-double-left'></i><span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>
			<li>
				<a class='custom-pager-width' aria-label="<?= lang('Pager.previous') ?>">
				<i class='pl-2 pr-2 fa fa-angle-left'></i><span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php } ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="active"' : '' ?>>
				<a href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) { ?>
			<li>
				<a href="<?= $pager->getNext() ?>" class='custom-pager-width' aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span><i class='pl-2 fa fa-angle-right'></i>
				</a>
			</li>
			<li>
				<a href="<?= $pager->getLast() ?>" class='custom-pager-width' aria-label="<?= lang('Pager.last') ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span><i class='pl-2 fa fa-angle-double-right'></i>
				</a>
			</li>
		<?php }else{ ?>
			<li>
				<a class='custom-pager-width' aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span><i class='pl-2 fa fa-angle-right'></i>
				</a>
			</li>
			<li>
				<a class='custom-pager-width' aria-label="<?= lang('Pager.last') ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span><i class='pl-2 fa fa-angle-double-right'></i>
				</a>
			</li>
		<?php } ?>
	</ul>
</nav>
