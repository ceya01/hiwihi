

$(function () {
    //プロフィール編集ボタン処理
    let $editBtn = $('.js-editProfile');
    let $cancelEditBtn = $('.js-cancelEditProfile');
    let $hiddenEditor = $('.hiddenEditor');

    let $avatarImg = $('.userIcon .avatar');
    let $avatarInput = $('.avatarInput');

    let $userName = $('.userName');
    let $userBio = $('.userBio');

    //初期化
    let isEditing = false;
    let isTextChanged = false;
    let isImgChanged = false;

    let btInitText = $editBtn.text();
    let prevImgSrc = $avatarImg.attr('src');

    $cancelEditBtn.hide();

    $editBtn.click(function () {
        if(!isEditing){
            isEditing =true;

            //編集中でない場合　編集モードに移行
            $hiddenEditor.show();
            $hiddenEditor.prev('.editableText').hide();
            prevImgSrc = $avatarImg.attr('src');
            $editBtn.text('完了');
            $editBtn.removeClass('btnColor-bgWhite');
            $editBtn.addClass('btnColor-bghiwihi');

            //入力欄初期化　キャンセル後に再度編集した場合にリセット
            $userName.children('.hiddenEditor').val($userName.children('.editableText').text());
            $userBio.children('.hiddenEditor').val($userBio.children('.editableText').text());


            //)キャンセルボタン 表示
            $cancelEditBtn.show();

        }else{
            //編集中の場合　ボタン押したら編集完了して終了

//          let $userID = $('.userId');   //userIDは重バリデ必須なので保留

            let newUserName = $userName.children('.hiddenEditor').val();
            let oldUserName = $userName.children('.editableText').text();
            let newUserBio  = $userBio.children('.hiddenEditor').val();
            let oldUserBio  = $userBio.children('.editableText').text();

//          let newUserID   = $userID.children('.hiddenEditor').val();
//          let oldUserID   = $userID.children('.editableText').text();

            isTextChanged = !(
            oldUserName===newUserName &&
//                   oldUserID === newUserID &&
            oldUserBio === newUserBio);

            if(isTextChanged) {
                //表示を反映

                $userName.children('.editableText').text(newUserName);
                $userBio.children('.editableText').text(newUserBio);
//                   $userID.children('.editableText').text(newUserID);

                //ajax db反映
                $.ajax({
                    url: 'ajax/profileEdit.php',
                    type: 'POST',
                    data: {
                        userName: newUserName,
//                           userID: newUserID,
                        userBio: newUserBio
                    }
                }).done(function (data) {
                    console.log('ajax success');
                    console.log('data:\n', data);
                    $('.debugArea').prepend(data);
                }).fail(function (msg) {
                    console.log('Ajax Error:', msg);
                });
            }

            if(isImgChanged){
                ajaxUploadImg();
            }

            //初期化
//            revertEditDisplay();
            init();
            // isTextChanged = false;
            // isImgChanged = false;
            // isEditing = false;
            // $cancelEditBtn.hide();
        }

    });

    //画像変更
    $avatarInput.on('change', function () {
        isImgChanged = true;
        let file = this.files[0];
        let fileRender = new FileReader();
        fileRender.onload = function (evt) {
            //画像表示
            $avatarImg.attr('src',evt.target.result).show();
        };
        fileRender.readAsDataURL(file);
    });

    $cancelEditBtn.click(function () {
//        revertEditDisplay();
        $avatarImg.attr('src',prevImgSrc).show();
        init();
    });

    //
    // function revertEditDisplay(){
    //     $hiddenEditor.hide();
    //     $hiddenEditor.prev('.editableText').show();
    //     $editBtn.text(btInitText);
    //     $editBtn.addClass('btnColor-bgWhite');
    //     $editBtn.removeClass('btnColor-bghiwihi');
    // }

    function init() {
        //初期化
        isTextChanged = false;
        isImgChanged = false;
        isEditing = false;

        $cancelEditBtn.hide();
        $hiddenEditor.hide();
        $hiddenEditor.prev('.editableText').show();
        $editBtn.text(btInitText);
        $editBtn.addClass('btnColor-bgWhite');
        $editBtn.removeClass('btnColor-bghiwihi');
    }
});



function ajaxUploadImg(evt=null){
    if(evt){evt.preventDefault();}

    let imgData = new FormData($('.avatarForm').get(0));
    console.log(imgData);
    // Ajaxで送信
    $.ajax({
        url:'ajax/uploadImg.php',
        method: 'post',
        dataType: 'html',   // dataに FormDataを指定
        data: imgData,      // Ajaxがdataを整形しない指定
        processData: false, // contentTypeもfalseに指定
        contentType: false
    }).done(function( data ) {
        // 送信せいこう！
        console.log('imgUpload ajax success');
        console.log('data:\n',data);
        $('.debugArea').prepend(data);
    }).fail(function( jqXHR, textStatus, errorThrown ) {
        // しっぱい！
        console.log( 'ERROR', jqXHR, textStatus, errorThrown );
    });
}
