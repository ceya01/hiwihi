
<?php
    //var_dump($tweetRecord);
    global $tweetRecord;
    //ajax呼び出し用
    if(isset($_POST['newTweet'])){
        $tweetRecord = $_POST['newTweet'];
    }
    $text = $tweetRecord['text'];
    $name = $tweetRecord['name'];
    $charID = $tweetRecord['char_id'];
    $time = $tweetRecord['post_time'];
    $icon = $tweetRecord['icon'];
    if(isset($icon)){
        $icon = 'uploads/'.$icon;
    }else{
        $icon = 'img/avatar_default_50x.png';
    }
    //$user = UserTable::getUser($tweetRecord['id']);
?>

<div class="tweetBox">
    <div class="iconWrap"><img class="sq50px" src="<?php echo $icon ?>" alt="<?php echo $name ?>のアイコン"></div>
    <div class="tweetContent">
        <div class="tweetBody"><?php echo $text ?></div>
        <div class="tweetFooter leftBubble">
            <span class="fll"><?php echo $name.' @'.$charID.' '.$time ?></span>
<!--            リプライ、リツイート、ふぁぼ等は未実装のため現在非表示-->
            <span class="flr" style="display: none;">
                <i class="fas fa-at">1234</i>
                <i class="fas fa-retweet">5678</i>
                <i class="fas fa-star">9012</i>
                <i class="fas fa-ellipsis-h"></i>
            </span>
        </div>
    </div>
</div>