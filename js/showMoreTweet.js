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
            let $hiddenInput = $(data).filter('#isRemainTweets');
   //         console.log(hi,hi.val());
  //          console.log('isRemainTweets1',$('#isRemainTweets').html());
  //          console.log('isRemainTweets2',$(data).find('#isRemainTweets').val());

            let isRemainTweets = $hiddenInput.val() === "1";
 //           let numAddedTweet =$(data).find('.tweetContent').length;
            if(isRemainTweets){
                $showMoreTweet.data('offset',offset+limit);
            }else{
                $showMoreTweet.hide();
            }
            $(data).appendTo('.tweetList').hide().fadeIn(1000);
//            console.log(numAddedTweet);
  //          $showMoreTweet.attr('data-offset',offset+limit);
        }).fail(function (msg) {
            console.log('Ajax Error:', msg);
        });
    });

});