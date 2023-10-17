jQuery(document).ready(function($){
    $('.mytheme_image_button').on('click',function(e){
        e.preventDefault();

        let image_field=$(this);
        
        var frame=wp.media({
            title:"Select or Upload Image",
            button:{
                text:"Use this image"
            },
            multiple:false
        });

        frame.on('select', function(){
            var attachment=frame.state().get('selection').first().toJSON();
            image_field.closest('.image-div').find('.image_field').val(attachment.url);
        });
        frame.open();
    })
})