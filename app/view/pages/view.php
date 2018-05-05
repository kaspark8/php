<div class="row row-padding">
    <h3><?php echo htmlspecialchars($page->page_name, ENT_QUOTES, 'UTF-8'); ?></h3>
</div>
<div class="row row-padding">
Created: <?php if (isset($page->page_created)) echo date('Y-m-d H:i', htmlspecialchars($page->page_created, ENT_QUOTES, 'UTF-8')); ?><br>
Last modified: <?php if (isset($page->page_modified)) echo date('Y-m-d H:i', htmlspecialchars($page->page_modified, ENT_QUOTES, 'UTF-8')); ?>
</div>
<div class="row row-padding">
    <?php echo htmlspecialchars($page->page_content, ENT_QUOTES, 'UTF-8'); ?>
</div>