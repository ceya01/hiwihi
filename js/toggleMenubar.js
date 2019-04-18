//モバイル表示時のヘッダーメニュー表示切り替え
$(function () {
   $('.menubar').click(function () {
       $('.nav').slideToggle('fast');
   }) ;
});