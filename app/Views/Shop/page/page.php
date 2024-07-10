<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<div class="container text-center p-5">
    <?php if (isset($page) && !empty($page)) { print_r($page[0]->page_content); } ?>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>
<?= $this->endSection('scripts') ?>