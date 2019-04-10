
$(function () {
    console.log('tweetAction');
    //
    $('.js-openSub').click(function(){
        //console.log('openSub');
        $(this).next('.subTweetAction').toggle();
    });
    $('.js-delete').click(function(){
        //console.log('delete');
        $(this).closest('.tweetBox').fadeOut();
    });

    $(document).click(function(event){
        if(!$(event.target).closest('.js-openSub').length) {
            //console.log('外側がクリックされました。');
            $('.subTweetAction').hide();
        }else{
            //console.log('内側がクリックされました。');
        }
    });

});