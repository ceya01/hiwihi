

console.log('postTweet');
$(function () {
    const MAX_TWEET_LENGTH = 140;

    let $btnPostTweet = $('.btnPostTweet');
    $btnPostTweet.click(function () {
        let tweet = $('.tweetInput').val();
        //140文字以内でのみ投稿処理
        if(tweet.length > MAX_TWEET_LENGTH || tweet.length == 0){
            console.log(tweet);
        }else{
            //ajax db反映
            $.ajax({
                url: 'ajax/postTweet.php',
                type: 'POST',
                data: {
                    tweet: tweet
                }
            }).done(function (data) {
                console.log('ajax success');
                console.log('data:\n', data);
                //$('.debugArea').prepend(data);

                //投稿後の処理
                $('.tweetInput').val('');
                $(data).prependTo('.tweetList').hide().fadeIn(1000);

            }).fail(function (msg) {
                console.log('Ajax Error:', msg);
            });
        }
    });

});