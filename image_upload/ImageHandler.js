var wp;
var target;
var custom_uploader;

jQuery(document).on("click", ".upload-image-background", (e) => {
        handleFileSelection(e)
    });
jQuery(document).on("click", ".upload-image-foreground", (e) => {
        handleFileSelection(e)
    });

function addNewImage(data) {

    if(target === 'background') {
        jQuery(".moments-background-image").val(data.url);
    }
    if(target === 'foreground') {
        jQuery(".moments-foreground-image").val(data.url);
    }
}
function handleFileSelection(e) {
    e.preventDefault();
    if(jQuery(e.currentTarget).attr("class").indexOf('background') !== -1) {
        target = "background";
        }
    else {
        target = "foreground";
    }
    if(this.custom_uploader) {
        this.custom_uploader.open();
        return;
    }
    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Select image',
        button: {
        text: 'Select image'
        },
        multiple: false
    });
    this.custom_uploader.on('select', () => {
        let attachments = this.custom_uploader.state().get('selection').toJSON();
        addNewImage(attachments[0]);
    });
    this.custom_uploader.open();
}