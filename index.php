<?php
//////////////////////////////////////////////////////////////////////
//
//  index.php
//
//   概要  :      トップページ & 応募フォーム
//   作成日:      2024/05/xx
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
$_conf['mail_admin'] = ["xxxxxx@xxxxxx.com", "secretary@rc-group.co.jp"];	// 管理者メールto
$_conf['mail_sub'] = "株式会社xxxx：応募フォーム";		// 管理者メールsub
$_conf['mail_kakunin_from'] = "support@recruit-axis.jp";		// 確認メールfrom
$_conf['mail_kakunin_fromname'] = "株式会社xxxx";		// 確認メールfromname
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
株式会社xxxx
〒xxx-xxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
TEL：xxxxxxxxxxxxx
=======================================

EOP;
// メール本文（送信者への返信メール）ここまで

//##### ページ項目設定
// ページ設定
$_conf['use_page'] = ['status', 'job', 'employment', 'area', 'age', 'name', 'tel', 'email'];	// 追加可能 'contact', 'consent'
																								// 追加可能（管理画面非デフォルト項目） 'prefecture', 'sex', 'qualified'

// フォーム設定 上書き項目
$_conf['page_datas']['job']['form_datas']['job']['check_vals'] = ['職種1', '職種2', '職種3'];
$_conf['page_datas']['employment']['form_datas']['employment']['check_vals'] = ['勤務形態1', '勤務形態2', '勤務形態3'];
$_conf['page_datas']['area']['form_datas']['area']['check_vals'] = ['エリア1', 'エリア2', 'エリア3'];

//##### recruit-axis 送信設定
if(true) {		// ※送信しない場合はif内削除
	require_once($_root_path . 'phplib/recruitaxis.inc.php');

	// サイトキー
	$_conf['site_key'] = 'xxxxxxxxxxxxxxxx';

	// （追加項目がある場合）送信項目追加（postするキー = '{フォームのname}'）
	// $_conf['send_info']['add_info1'] = '{todoufuken}';
	// $_conf['send_info']['add_info2'] = '{sex}';

	// （送信時用）固定値設定 ※不要な場合は関数ごと削除
	// function get_addsend_value() {
	// 	// 上書き設定する固定値（postするキー => 値）
	// 	return [
	// 		'gyoshu' => 'ほげ1',
	// 		'keitai' => 'ほげ2',
	// 		'area' => 'ほげ3',
	// 	];
	// }

	// （送信時用）追加置換 ※不要な場合は関数ごと削除
	// function get_replace_value($send_datas) {
	// 	// 値の置換
	// 	$send_datas['add_info1'] = $send_datas['add_info1'] == 'はい' ? '資格あり' : '資格なし';

	// 	// 値を戻す（必ず記載すること）
	// 	return $send_datas;
	// }
}

form_start();
