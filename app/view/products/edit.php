<div class="row row-padding">
    <h3>You are editing product "<?php echo htmlspecialchars($product->product_name, ENT_QUOTES, 'UTF-8'); ?>"</h3>
</div>
<div class="row row-padding">
    <form action="<?php echo URL; ?>products/updateProduct" method="POST">
        <fieldset>
            <label for="nameField">Name</label>
            <input type="text" name="product_name" value="<?php echo htmlspecialchars($product->product_name, ENT_QUOTES, 'UTF-8'); ?>" id="nameField">
            <label for="priceField">Price</label>
            <input type="text" name="product_price" value="<?php echo htmlspecialchars($product->product_price, ENT_QUOTES, 'UTF-8'); ?>" id="priceField">
            <label for="ownerField">Owner</label>
            <select id="ownerField" name="product_owner_id">
                <option value="">------</option>
                <?php
                if(!empty($users)) {
                foreach ($users as $user) { ?>
                    <option value="<?php if (isset($user->user_id)) echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($user->user_id == $product->product_owner_id ? "selected" : "") ?>><?php if (isset($user->user_name)) echo htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php } } ?>
            </select>
            <br />
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input class="button-primary" name="update_product" type="submit" value="Submit">
        </fieldset>
    </form>
</div>