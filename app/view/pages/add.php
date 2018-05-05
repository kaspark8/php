<div class="row row-padding">
    <h3>Add new page</h3>
</div>
<div class="row row-padding">
    <form action="<?php echo URL; ?>pages/addPage" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="page_name" placeholder="Page title" id="nameField">
            <label for="contentField">Content</label>
            <textarea name="page_content" placeholder="Page content ..." id="contentField"></textarea>
            <br />
            <input class="button-primary" name="add_page" type="submit" value="Submit">
        </fieldset>
    </form>
</div>