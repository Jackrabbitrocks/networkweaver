jQuery(document).ready(function($){
    if($('#tribe-events').length > 0){
        let headerheight = $('#main-header').outerHeight();

        $('#tribe-events').css("paddingTop", headerheight);

    }

    if($('.category-blog').length > 0) {
    	$('#main-wrap > h1').remove();
    }

    // insert banner at top of page
    	// $('body').prepend('<a href="https://leadershiplearning.wedid.it/campaigns/8360" class="donate-header"><h1>Help Network Weaver stay online! - Donate to support the site.</h1></a>');
});