<div class="row row-padding">
    <h3>Register new user</h3>
</div>
<div class="row row-padding">
    <form action="<?php echo URL; ?>users/addUser" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="user_name" placeholder="Your name..." id="nameField">
            <label for="emailField">E-mail</label>
            <input type="text" name="user_email" placeholder="Your e-mail..." id="emailField">
            <label for="passField">Password</label>
            <input type="password" name="user_pass" placeholder="Your pass..." id="passField">
            <br />
            <input class="button-primary" name="add_user" type="submit" value="Submit">
        </fieldset>
    </form>
</div>