# ﾋｩｨｯﾋﾋｰ （hiwihi）
====  

## Overview - 概要
hiwihi(ﾋｳｨｯﾋﾋｰ)とは、とある駆け出しエンジニアが練習のために作ったtwitterもどきのwebサービスです。

### 公開URL　
https://ce-ya.net/app/hiwihi

## Screenshot 
![トップページ](https://i.imgur.com/hhz71k0.png)
![タイムライン](https://i.imgur.com/MUlMc6C.png)

## Description - 詳細
php+MySQL+js+css+htmlの練習のためにTwitterの真似して作ったオモチャです。実用性はないです。

githubにアップしたのもあくまで練習のためです。
アンライセンス(CC0)で公開してるので、煮るなり焼くなり魔改造するなり好きにしてください。

MAMPなどのphpmyadminで dbExport_hiwihi.sql をインポートして、config.php でDBのユーザー名やパスワードを合わせればたぶん動くと思います。

## Feature - 機能
* ユーザー登録機能
  * メールアドレス登録はセキュリティやらプライバシーの観点でややこしくなりそうなので無効化中
* ログイン機能
* ツイート投稿・編集・削除機能
* 全体タイムラインに投稿されたすべてのツイートを10件ずつ表示
* プロフィール編集機能（ユーザー名、bio、アイコンのみ）
* ユーザーページで、そのユーザーの投稿したツイートのみを表示
* ユーザー登録しなくても、ゲストとしてログインしてツイートできます。

### 実装したかったけどまだ未実装の機能
 * パスワードリマインダー
 * フォロー機能
 * リプライ機能
 * リツイート機能
 * ふぁぼ機能


## License

These codes are licensed under CC0.

[![CC0](http://i.creativecommons.org/p/zero/1.0/88x31.png "CC0")](http://creativecommons.org/publicdomain/zero/1.0/deed.ja)
