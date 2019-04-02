<?php
    require_once("core/db/table/UserTable.php");
    $loginID = Session::getLoginUserID();
    $name = UserTable::getUserNameByID($loginID);
    $charID = UserTable::getUserCharIDByID($loginID);
    $bio = UserTable::getUserBioByID($loginID);
    $iconUrl = UserTable::getUserBioByID($loginID);
    //
?>
<div class="userBox">
    <div class="userIcon">
        <img class="avatar" src="img/avatar_default_150x.png" alt="アバター画像">
        <div class="avatarEditor hiddenEditor">
            <div class="guide"><div class="guide-text">プロフィール画像を変更<br>（クリックorドラッグ&ドロップ）</div></div>
            <form class="avatarForm" action=""><input class="avatarInput" type="file" accept="image/*"></form>
        </div>
    </div>
    <div class="userName"><span class="editableText"><?php echo $name; ?></span><input class="hiddenEditor" type="text" placeholder="ユーザー名を入力" value="<?php echo $name; ?>"></div>
    <div class="userId">@<?php echo $charID ?></div>
    <div class="userBio"><span class="editableText"><?php echo $bio ?></span><textarea class="hiddenEditor" placeholder="bioを入力（最大140文字まで）" rows="8" maxlength="140"><?php echo $bio; ?></textarea></div>
<!--    <div class="userResidence"><i class="fas fa-map-marker-alt"></i>(居住地未設定)</div>-->
<!--    <div class="userSite"><i class="fas fa-link"></i>(notset.site)</div>-->
    <div class="userStatsWrap">
        <div class="statsBlock">
            <div class="statsHead">ついーと</div>
            <div class="statsValue">12345</div>
        </div>
        <div class="statsBlock">
            <div class="statsHead">ふぉろう</div>
            <div class="statsValue">12345</div>
        </div>
        <div class="statsBlock">
            <div class="statsHead">ふぉろわ</div>
            <div class="statsValue">12345</div>
        </div>
        <div class="statsBlock">
            <div class="statsHead">ふぁぼり</div>
            <div class="statsValue">12345</div>
        </div>
    </div>
    <div class="userEdit btn-rr btnColor-bgWhite js-editProfile">プロフィールを編集</div>
    <script src="js/editProfile.js"></script>
</div>