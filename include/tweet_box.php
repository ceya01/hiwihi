
<?php
    //var_dump($tweetRecord);
    global $tweetRecord;
    //新規ツイート投稿ajaxで呼び出した場合
    if(isset($_POST['newTweet'])){
        $tweetRecord = $_POST['newTweet'];
    }
    $tID = $tweetRecord['tid'];
    $text = sanitize($tweetRecord['text']);
    $name =  sanitize($tweetRecord['name']);
    $charID = sanitize($tweetRecord['char_id']);
    $time = sanitize($tweetRecord['post_time']);
    $icon = sanitize($tweetRecord['icon']);
    if(isset($icon)){
        $icon = 'uploads/'.$icon;
    }else{
        $icon = 'img/avatar_default_50x.png';
    }
    //自分以外のツイートの表示順番を反転 & 自分のツイートにownTweetクラスをつける
    $reverseClass = '';
    $ownTweet = '';
    $uID = (int)$tweetRecord['uid'];
    $lID = (int)Session::getLoginUserID();
    if( $uID !== $lID && strpos($_SERVER['REQUEST_URI'],'timeline.php')){
        $reverseClass ='reverse';
    }else{
        $ownTweet = 'ownTweet';
    }
    //$user = UserTable::getUser($tweetRecord['id']);
?>

<div class="tweetBox <?php echo $reverseClass.' '.$ownTweet ?>" data-id="<?php echo $tID ?>">
    <div class="iconWrap">
        <a href="user.php?u=<?php echo $charID ?>">
        <img class="sq50px" src="<?php echo $icon ?>" alt="<?php echo $name ?>のアイコン"></a>
    </div>
    <div class="tweetContent">
        <div class="tweetBody"><?php echo $text ?></div>
        <div class="tweetFooter">
            <div class="tweetMeta">
                    <span class="name"><?php echo $name ?></span>
                <a href="user.php?u=<?php echo $charID ?>"><span class="charID">@<?php echo $charID ?></span></a>
                    <span class="time"><?php echo $time ?></span>
            </div>
            <div class="tweetActionWrap">
                <span class="tweetAction js-reply"><i class="fas fa-at"></i><span class="numReply">0</span></span>
                <span class="tweetAction js-retweet"><i class="fas fa-retweet"></i><span class="numRetweet">0</span></span>
                <span class="tweetAction js-favorite"><i class="fas fa-star"></i><span class="numFavorite">0</span></span>
                <?php if($ownTweet !==''): ?>
                <span class="tweetAction js-openSub"><i class="fas fa-ellipsis-h"></i></span>
                <div class="subTweetAction">
                    <div class="subTweetAction-bt js-edit">編集</div>
                    <div class="subTweetAction-bt js-delete">削除</div>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>