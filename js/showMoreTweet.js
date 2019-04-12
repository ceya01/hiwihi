$(function () {
    let $showMoreTweet = $('.showMoreTweet');
    $showMoreTweet.click(function () {
        let limit = $showMoreTweet.data('limit');
        let offset = $showMoreTweet.data('offset');
        let userID = $('.userBox').data('userid');
        $.ajax({
            url: 'ajax/showMoreTweet.php',
            type: 'POST',
            data: {
                limit: limit , offset: offset, userID:userID
            }
        }).done(function (data) {
            let $hiddenInput = $(data).filter('#isRemainTweets');
            let isRemainTweets = $hiddenInput.val() === "1";
            if(isRemainTweets){
                $showMoreTweet.data('offset',offset+limit);
            }else{
                $showMoreTweet.hide();
            }
            $(data).appendTo('.tweetList').hide().fadeIn(1000);
            $('#isRemainTweets').remove();
        }).fail(function (msg) {
            console.log('Ajax Error:', msg);
        });
    });

});