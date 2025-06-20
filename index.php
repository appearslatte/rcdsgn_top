<?php
//////////////////////////////////////////////////////////////////////
//
//  index.php
//
//   概要  :      トップページ & 応募フォーム
//   作成日:      2024/11/29
//   改定日:      
//   備考  :      
//
//////////////////////////////////////////////////////////////////////

$_root_path = './';
$_this_path = './';		// ex) 'contact/' or './'

require_once($_root_path . 'phplib/common.inc.php');
require_once($_root_path . 'phplib/LibForm.class.php');
require_once($_root_path . 'phplib/BladeOne.php');
require_once($_root_path . 'phplib/entryform.inc.php');

//##### 設定項目
$_conf['mail_email_col'] = "email";						// 管理者メールfromと確認メールtoに利用するinput項目
$_conf['mail_admin'] = ["y.k123k.y@gmail.com", "kyujin.2023.1227@gmail.com"];	// 管理者メールto
$_conf['mail_sub'] = "株式会社トップ：応募フォーム";		// 管理者メールsub
$_conf['mail_kakunin_from'] = "support@recruit-axis.jp";		// 確認メールfrom
$_conf['mail_kakunin_fromname'] = "株式会社トップ";		// 確認メールfromname
$_conf['mail_kakunin_sub'] = "応募を受け付けました";	// 確認メールsub

// メール本文（管理者へのメール）
$_conf['mail_body_admin'] = <<<EOP
%sからの送信です。
ご対応をお願いいたします。
----------------------------------------------------------------
%s
----------------------------------------------------------------
送信時刻　　　　：%s
送信者情報　　　：%s

EOP;
// メール本文（管理者へのメール）ここまで

// メール本文（送信者への返信メール）
$_conf['mail_body_user'] = <<<EOP
この度はお問い合わせを誠にありがとうございます。

下記の内容にて承りました。
追って担当者よりご連絡させていただきます。

■入力内容
----------------------------------------------------------------
%s
----------------------------------------------------------------

※ご返答までにお時間をいただく場合がございます。
予めご了承ください。

=======================================
株式会社トップ
〒220-0012
神奈川県横浜市西区みなとみらい5-3-3-2504
TEL：045-900-3617
=======================================

EOP;
// メール本文（送信者への返信メール）ここまで

//##### ページ項目設定
// ページ設定
$_conf['use_page'] = ['status', 'area', 'age', 'name', 'contact'];
$_conf['page_datas']['area']['form_datas']['area']['check_vals'] = ['一都三県', '愛知・岐阜・静岡', '広島', '九州'];

//##### recruit-axis 送信設定
if(true) {
	require_once($_root_path . 'phplib/recruitaxis.inc.php');
	$_conf['site_key'] = '0RIATt4jy3Ic1XiL';
}

form_start();
