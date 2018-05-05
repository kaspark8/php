<div class="row row-padding">
    <h3>You are editing your profile "<?php echo htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8'); ?>"</h3>
</div>
<div class="row row-padding">
    <form action="<?php echo URL; ?>users/updateprofile" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="user_name" value="<?php echo htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8'); ?>" id="nameField">
            <label for="passField">Password</label>
            <input type="password" name="user_pass" value="" id="passField">
            <label for="emailField">E-mail</label>
            <input type="text" name="user_email" value="<?php echo htmlspecialchars($user->user_email, ENT_QUOTES, 'UTF-8'); ?>" id="emailField">
            <br />
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input class="button-primary" name="update_profile" type="submit" value="Submit">
        </fieldset>
    </form>
</div>