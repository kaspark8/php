<div class="row row-padding">
    <h3>Products</h3>
</div>
<?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) { ?>
<div class="row row-padding">
    <div class="button button-green"><a href="<?php echo URL; ?>products/add">Add new</a></div>
</div>
<?php } ?>
<div class="row row-padding">
    <table>
        <thead>
            <tr>
            <th>Product #</th>
            <th>Name</th>
            <th>Price</th>
            <th>Owner</th>
            <th>Created</th>
            <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) { ?>
            <th>Delete</th>
            <th>Edit</th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
    <?php 
    if(!empty($products)) {
    foreach ($products as $product) { ?>
        <tr>
            <td><?php if (isset($product->product_id)) echo htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($product->product_name)) echo htmlspecialchars($product->product_name, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($product->product_price)) echo htmlspecialchars($product->product_price, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php 
            if (isset($product->product_owner_id) && array_key_exists($product->product_owner_id, $owner)) {
                    echo $owner[$product->product_owner_id];
            } else {
                echo "-";
            }   
            ?></td>
            <td><?php if (isset($product->product_created)) echo date('Y-m-d H:i', htmlspecialchars($product->product_created, ENT_QUOTES, 'UTF-8')); ?></td>
            <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) { ?>
            <td><a href="<?php echo URL . 'products/delete/' . htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
            <td><a href="<?php echo URL . 'products/edit/' . htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
            <?php } ?>
        </tr>
    <?php } } else {?>
        <tr><td colspan="7"> No results </td></tr>
    <?php } ?>
        </tbody>
    </table>
</div>