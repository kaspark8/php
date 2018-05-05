<div class="row row-padding">
    <h3>Users</h3>
</div>
<div class="row row-padding">
    <table>
        <thead>
            <tr>
            <th>User #</th>
            <th>Name</th>
            <th>Created</th>
            <?php 
            if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODUSERS)) { ?>
            <th>Delete</th>
            <th>Edit</th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
    <?php 
    if(!empty($users)) {
    foreach ($users as $user) { ?>
        <tr>
            <td><?php if (isset($user->user_id)) echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($user->user_name)) echo htmlspecialchars($user->user_name, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($user->user_created)) echo date('Y-m-d H:i', htmlspecialchars($user->user_created, ENT_QUOTES, 'UTF-8')); ?></td>
            <?php if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODUSERS)) { ?>
            <td><a href="<?php echo URL . 'users/delete/' . htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
            <td><a href="<?php echo URL . 'users/edit/' . htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
            <?php } ?>
        </tr>
    <?php } } else {?>
        <tr><td colspan="5"> No results </td></tr>
    <?php } ?>
        </tbody>
    </table>
</div>