<div class="row row-padding">
    <h3>Pages</h3>
</div>
<?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) { ?>
<div class="row row-padding">
    <div class="button button-green"><a href="<?php echo URL; ?>pages/add">Add new</a></div>
</div>
<?php } ?>
<div class="row row-padding">
    <table>
        <thead>
            <tr>
            <th>Page #</th>
            <th>Name</th>
            <th>Created</th>
            <th>Modified</th>
            <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) { ?>
            <th>Delete</th>
            <th>Edit</th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
    <?php 
    if(!empty($pages)) {
    foreach ($pages as $page) { ?>
        <tr>
            <td><?php if (isset($page->page_id)) echo htmlspecialchars($page->page_id, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><a href="<?php echo URL . 'pages/view/' . htmlspecialchars($page->page_id, ENT_QUOTES, 'UTF-8'); ?>"><?php if (isset($page->page_name)) echo htmlspecialchars($page->page_name, ENT_QUOTES, 'UTF-8'); ?></a></td>
            <td><?php if (isset($page->page_created)) echo date('Y-m-d H:i', htmlspecialchars($page->page_created, ENT_QUOTES, 'UTF-8')); ?></td>
            <td><?php if (isset($page->page_modified)) echo date('Y-m-d H:i', htmlspecialchars($page->page_modified, ENT_QUOTES, 'UTF-8')); ?></td>
            <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) { ?>
            <td><a href="<?php echo URL . 'pages/delete/' . htmlspecialchars($page->page_id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
            <td><a href="<?php echo URL . 'pages/edit/' . htmlspecialchars($page->page_id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
            <?php } ?>
        </tr>
    <?php } } else {?>
        <tr><td colspan="6"> No results </td></tr>
    <?php } ?>
        </tbody>
    </table>
</div>