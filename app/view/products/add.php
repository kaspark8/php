<div class="row row-padding">
    <h3>Add new product</h3>
</div>
<div class="row row-padding">
    <form action="<?php echo URL; ?>products/addProduct" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="product_name" placeholder="Product title..." id="nameField">
            <label for="priceField">Price</label>
            <input type="text" name="product_price" placeholder="Product price..." id="priceField">
            <label for="owneridField">Owner</label>
            <select id="owneridField" name="product_owner_id">
                <option value="">------</option>
            <?php
            if(!empty($users)) {
            foreach ($users as $user) { ?>
                <option value="<?php if (isset($user->user_id)) echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>"><?php if (isset($user->user_name)) echo htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php } } ?>
            </select>
            <br />
            <input class="button-primary" name="add_product" type="submit" value="Submit">
        </fieldset>
    </form>
</div>