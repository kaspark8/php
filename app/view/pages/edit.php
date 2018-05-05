<div class="row row-padding">
    <h3>You are editing page "<?php echo htmlspecialchars($page->page_name, ENT_QUOTES, 'UTF-8'); ?>"</h3>
</div>
<div class="row row-padding">
    <form action="<?php echo URL; ?>pages/updatePage" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="page_name" value="<?php echo htmlspecialchars($page->page_name, ENT_QUOTES, 'UTF-8'); ?>" id="nameField">
            <label for="contentField">Content</label>
            <textarea name="page_content"  id="contentField"><?php echo htmlspecialchars($page->page_content, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <br />
            <input type="hidden" name="page_id" value="<?php echo htmlspecialchars($page->page_id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input class="button-primary" name="update_page" type="submit" value="Submit">
        </fieldset>
    </form>
</div>