jQuery(document).ready(function($) {
    $('#tracking-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var trackingNumber = $('#tracking_number').val();

        // Simulate an API request or any processing
        $('#tracking-result').html('<p>Tracking number submitted: ' + trackingNumber + '</p>');
        
        // You can add AJAX request to process the tracking number if needed
        /*
        $.ajax({
            url: ajaxurl, // WordPress AJAX URL
            type: 'POST',
            data: {
                action: 'tfp_process_tracking',
                tracking_number: trackingNumber
            },
            success: function(response) {
                $('#tracking-result').html(response);
            }
        });
        */
    });
});
