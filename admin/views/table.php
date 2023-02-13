<div class="wrap">
    <h2>Auto Apply Coupons</h2>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
        <tr>
            <th scope="col" id="title" class="manage-column column-title column-primary">Coupon Code</th>
            <th scope="col" id="auto-apply" class="manage-column column-auto-apply">Auto Apply</th>
            <th scope="col" id="actions" class="manage-column column-actions">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ( $coupons as $coupon ) : ?>
            <tr>
                <td class="title column-title has-row-actions column-primary page-title">
                    <strong><?php echo esc_html( $coupon->post_title ); ?></strong>
                </td>
                <td><?php echo ( $auto_apply_coupon === $coupon->post_title ) ? 'Yes' : 'No'; ?></td>
                <td class="actions column-actions">
                    <?php
                    if($auto_apply_coupon === $coupon->post_title){ ?>
                        <a href="#" id="remove-coupon-code" class="button button-remove" data-coupon="<?php echo $coupon->post_title; ?>">Remove</a>
                    <?php }else{ ?>
                        <form action="" method="post">
                            <input type="hidden" name="auto_apply_coupon" value="<?php echo esc_attr( $coupon->post_title ); ?>">
                            <input type="submit" value="Apply" class="button-primary">
                        </form>
                    <?php } ?>


                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>