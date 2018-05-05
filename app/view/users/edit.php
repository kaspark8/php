<div class="row row-padding">
    <h3>You are editing user "<?php echo htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8'); ?>"</h3>
</div>
<div class="row row-padding">
    <form action="<?php echo URL; ?>users/updateuser" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="user_name" value="<?php echo htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8'); ?>" id="nameField">
            <label for="emailField">E-mail</label>
            <input type="text" name="user_email" value="<?php echo htmlspecialchars($user->user_email, ENT_QUOTES, 'UTF-8'); ?>" id="emailField">
            <label for="typeField">Type</label>
            <select id="typeField" name="user_type">
                <option value="1" <?php echo ($user->user_type == 1 ? "selected" : "") ?>>A - Saab lisada tooteid ja sisulehti</option>
                <option value="2" <?php echo ($user->user_type == 2 ? "selected" : "") ?>>B - Saab lisada sisulehti</option>
                <option value="3" <?php echo ($user->user_type == 3 ? "selected" : "") ?>>C - Saab hallata kasutajaid</option>
            </select>
            <br />
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input class="button-primary" name="update_user" type="submit" value="Submit">
        </fieldset>
    </form>
</div>