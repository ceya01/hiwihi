$(function () {
    let $showMoreTweet = $('.showMoreTweet');
    $showMoreTweet.click(function () {
 //       $showMoreTweet = $('.showMoreTweet');
        let limit = $showMoreTweet.data('limit');
        let offset = $showMoreTweet.data('offset');
        let userID = $('.userBox').data('userid');
        //console.log('limit: ',limit,'  offset: ',offset)
        $.ajax({
            url: 'ajax/showMoreTweet.php',
            type: 'POST',
            data: {
                limit: limit , offset: offset, userID:userID
            }
        }).done(function (data) {
            console.log('ajax success');
            //console.log('data:\n', data);
            //console.log('data:\n', $(data).find('.tweetContent').html());

            //投稿後の処理
            let numAddedTweet =$(data).find('.tweetContent').length;
            if(numAddedTweet < limit){
                $showMoreTweet.hide();
            }else{
                $showMoreTweet.data('offset',offset+limit);
            }
            $(data).appendTo('.tweetList').hide().fadeIn(1000);
            console.log(numAddedTweet);
  //          $showMoreTweet.attr('data-offset',offset+limit);
        }).fail(function (msg) {
            console.log('Ajax Error:', msg);
        });
    });

});