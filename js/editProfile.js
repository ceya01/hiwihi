
$(function () {
    //プロフィール編集ボタン処理
    let $editBtn = $('.js-editProfile');
    let isEditing = false;
    let btInitText = $editBtn.text();
    if($editBtn){
        $editBtn.click(function () {
            let $hiddenEditor = $('.hiddenEditor');
            if(isEditing){
                //編集中の場合　ボタン押したら編集完了して終了
                let $userName = $('.userName');
                let $userBio = $('.userBio');
                let newUserName = $userName.children('.hiddenEditor').val();
                let newUserBio = $userBio.children('.hiddenEditor').val();

                $.ajax({
                    url:'include/profileEdit.php',
                    type:'POST',
                    data:{
                        userName:newUserName,
                        userBio:newUserBio
                    }
                }).done(function(data){
                    console.log('ajax success');
                    console.log('data:\n',data);
                    $('.debugArea').prepend(data);
                }).fail(function (msg){
                    console.log('Ajax Error:' ,msg);
                });


                //表示を反映
                $userName.children('.editableText').text(newUserName);
                $userBio.children('.editableText').text(newUserBio);

                //表示を戻す
                $hiddenEditor.hide();
                $hiddenEditor.prev('.editableText').show();
                $(this).text(btInitText);
                $(this).addClass('btnColor-bgWhite');
                $(this).removeClass('btnColor-bghiwihi');
                isEditing = false;
            }else{
                //編集中でない場合　編集モードに移行
                $hiddenEditor.show();
                $hiddenEditor.prev('.editableText').hide();
                $(this).text('完了');
                $(this).removeClass('btnColor-bgWhite');
                $(this).addClass('btnColor-bghiwihi');
                isEditing =true;
                //TODO: キャンセルボタンも表示したい

            }

        });
    }

    //画像変更
    let $avaterImg = $('.userIcon .avater');
    let $avaterInput = $('.avaterInput');
    $avaterInput.on('change',function(evt1){
        let file = this.files[0];
        let fileRender = new FileReader();
        fileRender.onload = function (evt2) {
            $avaterImg.attr('src',evt2.target.result).show();
        }
        fileRender.readAsDataURL(file);


    });


});