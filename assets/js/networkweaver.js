jQuery(document).ready(function($){
    if($('#tribe-events').length > 0){
        let headerheight = $('#main-header').outerHeight();

        $('#tribe-events').css("paddingTop", headerheight);

    }

    if($('.category-blog').length > 0) {
    	$('#main-wrap > h1').remove();
    }
});