<div class="row row-padding">
    <h3>Login</h3>
</div>
<?php if (isset($_GET["error"])) { ?>
    <div class="row row-padding">
        <br><b>Something went wrong. Try again!</b>
        </div>
    <?php }?>
<div class="row row-padding">
    <form action="<?php echo URL; ?>users/login" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="user_name" placeholder="Your name..." id="nameField">
            <label for="passField">Password</label>
            <input type="password" name="user_pass" placeholder="Your pass..." id="passField">
            <br />
            <input class="button-primary" name="logmein" type="submit" value="Submit">
        </fieldset>
    </form>
</div>