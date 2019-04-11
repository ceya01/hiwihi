<?php
    require_once("core/db/table/UserTable.php");
    require_once("core/db/table/TweetTable.php");
    //todo: 何度も似たようなSQL叩いててよくないので要改善
    global $userID;
    if(!isset($userID)){
        $userID = (int)Session::getLoginUserID();
    }
    $name = sanitize(UserTable::getUserNameByID($userID));
    $charID = sanitize(UserTable::getUserCharIDByID($userID));
    $bio = sanitize(UserTable::getUserBioByID($userID));
    $iconUrl = sanitize(UserTable::getUserIconByID($userID));
    $numTweet = (int)TweetTable::getNumTweetOfUser($userID);

    //
?>
<div class="userBox" data-userid="<?php echo $userID ?>">
    <div class="userIcon">
        <img class="avatar sq200px" src="<?php echo $iconUrl; ?>" alt="アバター画像">
        <div class="avatarEditor hiddenEditor">
            <div class="guide"><div class="guide-text">プロフィール画像を変更<br>（クリックorドラッグ&ドロップ）</div></div>

            <form class="avatarForm">
                <input class="avatarInput" name="img" type="file" accept="image/*"><br>
            </form>

        </div>
    </div>
    <div class="userName"><span class="editableText"><?php echo $name; ?></span>
        <input class="hiddenEditor" type="text" placeholder="ユーザー名を入力" value="<?php echo $name; ?>"></div>
    <div class="userId"><span class="editableText preAtSign"><?php echo $charID ?></span>
<!--        <input class="hiddenEditor preAtSign" type="text" placeholder="IDを入力" value="--><?php //echo $charID; ?><!--">-->
    </div>
    <div class="userBio"><span class="editableText"><?php echo $bio ?></span><textarea class="hiddenEditor" placeholder="bioを入力（最大140文字まで）" rows="8" maxlength="140"><?php echo $bio; ?></textarea></div>
<!--    <div class="userResidence"><i class="fas fa-map-marker-alt"></i>(居住地未設定)</div>-->
<!--    <div class="userSite"><i class="fas fa-link"></i>(notset.site)</div>-->
    <div class="userStatsWrap">
        <div class="statsBlock">
            <div class="statsHead">ついーと</div>
            <div class="statsValue"><?php echo $numTweet; ?></div>
        </div>
<!--    未実装のため非表示　-->
<!--        <div class="statsBlock">-->
<!--            <div class="statsHead">ふぉろう</div>-->
<!--            <div class="statsValue">12345</div>-->
<!--        </div>-->
<!--        <div class="statsBlock">-->
<!--            <div class="statsHead">ふぉろわ</div>-->
<!--            <div class="statsValue">12345</div>-->
<!--        </div>-->
<!--        <div class="statsBlock">-->
<!--            <div class="statsHead">ふぁぼり</div>-->
<!--            <div class="statsValue">12345</div>-->
<!--        </div>-->

    </div>
    <?php if($userID === Session::getLoginUserID()): ?>
        <div class="btn-rr btnColor-bgWhite js-editProfile">プロフィールを編集</div>
        <div class="btn-rr btnColor-bgWhite js-cancelEditProfile">キャンセル</div>
    <?php endif; ?>
</div>

<script src="js/editProfile.js"></script>