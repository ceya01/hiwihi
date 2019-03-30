<div class="userBox">
    <img class="avater" src="img/avater_default_150x.png" alt="アバター画像">
    <div class="userName"><?php echo UserTable::getUserNameByID($loginID); ?></div>
    <div class="userId">@<?php echo UserTable::getUserCharIDByID($loginID); ?></div>
    <div class="userDetail">プロフィール詳細テキスト３４５６７８９０</div>
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
    <div class="userEdit btn-rr bgColor-white color-hiwihi border-hiwihi">プロフィールを編集</div>
</div>