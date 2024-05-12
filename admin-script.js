jQuery(document).ready(function($) {
    // Media uploader script
    $('.media-upload-button').click(function(e) {
        e.preventDefault();
        var field = $(this).data('field');
        var mediaUploader;

        // If the mediaUploader object already exists, open the media library
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        // Create a new mediaUploader object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Media',
            button: {
                text: 'Select'
            },
            multiple: false
        });

        // When a file is selected, get the URL and populate the text field
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#' + field).val(attachment.url);
        });

        // Open the media library
        mediaUploader.open();
    });
});