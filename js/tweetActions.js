
$(function () {
    console.log('tweetAction');

    //サブアクションメニューを開く
    $('.js-openSub').click(function(){
        //console.log('openSub');
        if($tweetBox){
            return;
        }
        $('.subTweetAction').hide();
        $(this).next('.subTweetAction').show();
    });
    //サブアクションメニューを閉じる
    $(document).click(function(event){
        if(!$(event.target).closest('.js-openSub').length) {
            //console.log('外側がクリックされました。');
            $('.subTweetAction').hide();
        }else{
            //console.log('内側がクリックされました。');
        }
    });

    //削除
    $('.js-delete').click(function(){
        //console.log('delete');
        let $tweetBox = $(this).closest('.tweetBox');
        $tweetBox.fadeOut();
        let id = $tweetBox.data('id');
        $.ajax({
            url: 'include/deleteTweet.php',
            type: 'POST',
            data: { id: id }
        }).done(function (data) {
            console.log('ajax success');
            console.log('data:\n', data);
        }).fail(function (msg) {
            console.log('Ajax Error:', msg);
        });
    });

    //編集
    let $tweetBox;
    let $editor;
    let $tweetText;
    let $tweetContent;
    let $tweetEditorTextArea;
    let initText ='';
    $('.js-edit').click(function(){
        $tweetBox = $(this).closest('.tweetBox');
        $editor =$tweetBox.find('.tweetEditor');
        $tweetText =$tweetBox.find('.tweetText');
        $tweetContent =$tweetBox.find('.tweetContent');
        $tweetEditorTextArea = $tweetBox.find('.tweetEditorTextarea');
        initText = $tweetEditorTextArea.val();

        $editor.show();
        $tweetText.hide();
        $tweetContent.css('width','100%');

    });

    //編集完了
    $('.js-tweetEditComplete').click(function(){
        let id = $tweetBox.data('id');
        let editedText = $tweetEditorTextArea.val();
        $tweetText.html(editedText.replace(/\r?\n/g, '<br>'));;
        $.ajax({
            url: 'include/editTweet.php',
            type: 'POST',
            data: { id: id, text: editedText }
        }).done(function (data) {
            console.log('ajax success');
            console.log('data:\n', data);
        }).fail(function (msg) {
            console.log('Ajax Error:', msg);
        });

        initEditorState();
    });

    //編集キャンセル
    $('.js-tweetEditCancel').click(function(){
        $tweetBox.find('.tweetEditorText').val(initText);
        initEditorState();
    });

    function initEditorState() {
        $editor.hide();
        $tweetText.show();
        $tweetContent.css('width','');
        $tweetEditorTextArea.val(initText);
        initText = '';
        $tweetBox = null;
        $editor = null;
        $tweetText = null;
        $tweetContent = null;
    }




});