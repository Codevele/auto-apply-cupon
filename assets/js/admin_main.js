jQuery(document).ready(function($) {
    $('#remove-coupon-code').click(function(e) {
        e.preventDefault();


        var coupon = $(this).data('coupon');
        // Use AJAX to send a request to the server to remove the coupon code
        $.post(
            ajaxurl,
            {
                action: 'remove_auto_apply_coupon',
                coupon: coupon
            },
            function(response) {
                // Update the table to remove the row of the removed coupon code
                $('table tr').each(function() {
                    if ($(this).data('coupon') === coupon) {
                        $(this).remove();
                    }
                });
                location.reload()
            }
        );
    });
});