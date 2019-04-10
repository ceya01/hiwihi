
$(function () {
    console.log('tweetAction');

    //
    $('.js-openSub').click(function(){
        //console.log('openSub');
        $(this).next('.subTweetAction').toggle();
    });

    $('.js-delete').click(function(){
        //console.log('delete');
        let $tweetBox = $(this).closest('.tweetBox');
        $tweetBox.fadeOut();
        let id = $tweetBox.data('id');
        $.ajax({
            url: 'include/deleteTweet.php',
            type: 'POST',
            data: { id: id }
        }).done(function (data) {
            console.log('ajax success');
            console.log('data:\n', data);
        }).fail(function (msg) {
            console.log('Ajax Error:', msg);
        });
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