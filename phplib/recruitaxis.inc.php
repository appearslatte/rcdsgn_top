<?php
//////////////////////////////////////////////////////////////////////
//
//  recruitaxis.inc.php
//
//  recruit-axis.net 送信機能 Ver1.2.0
//
//////////////////////////////////////////////////////////////////////

define("SERVER_URL", 'https://recruit-axis.net/api/send?');
// define("SERVER_URL", 'http://192.168.30.12/api/send?');

// デフォルト送信設定（追加・変更が必要な場合は各サイトで上書きをする）
$_conf['send_info'] = [
	'name' => '{sei} {mei}',
	'name_kana' => '{sei_kana} {mei_kana}',
	'age' => '{age}',
	'tel' => '{tel}',
	'email' => '{email}',
	'shugyo' => '{status}',
	'gyoshu' => '{job}',
	'keitai' => '{employment}',
	'area' => '{area}',
];

// 送信任意項目
$_conf['send_info_optional'] = ['shugyo', 'gyoshu', 'keitai', 'area'];

// recruit-axis.net へ送信
function send_rcaxis() {
	global $_conf, $libForm;

	// 送信用データを作成
	$send_datas  = [];
	foreach($_conf['send_info'] as $key => $value) {
		$ret = replace_definition_value($value);
		if(in_array($key, $_conf['send_info_optional']) && $ret == $value) {
			// 変更なしの場合は送信不要とみなして削除
			continue;
		}
		$send_datas[$key] = $ret;
	}

	// 固定値を設定
	if(function_exists('get_addsend_value')) {
		// 固定値で値を上書きする
		$add_datas = get_addsend_value();
		foreach($add_datas as $key => $value) {
			$send_datas[$key] = $value;
		}
	}

	// サイトキーを設定
	$send_datas['site_key'] = $_conf['site_key'];

	// 就業中を置換
	if(isset($send_datas['shugyo'])) {
		$send_datas['shugyo'] = $send_datas['shugyo'] == 'はい' ? '就業中' : '離職中';
	}

	// その他置換
	if(function_exists('get_replace_value')) {
		// 置換処理を呼び出す
		$send_datas = get_replace_value($send_datas);
	}

	// IPアドレス等の設定
	$send_datas['ipaddr'] = $_SERVER['REMOTE_ADDR'];
	$send_datas['hostname'] = $libForm->getHostName();
	$send_datas['useragent'] = $_SERVER['HTTP_USER_AGENT'];

	// エラーハンドリング解除（送信エラー時にエラーにさせないため）
	set_error_handler(null);

	// 送信
	$json = send($send_datas);

	// エラーハンドリング戻し
	set_error_handler("errorHandler");

	$ret = json_decode($json, true);
	if(!$ret) return false;

	return $ret['status'] == 'success';
}

// post送信
function send($send_datas) {

	$data = http_build_query($send_datas, '', '&');

	$header = [
		"Content-Type: application/x-www-form-urlencoded",
		"Content-Length: ".strlen($data)
	];

	$context = [
		"http" => [
			"method"  => "POST",
			"header"  => implode("\r\n", $header),
			"content" => $data
		]
	];

	$ret = @file_get_contents(SERVER_URL, false, stream_context_create($context));

	return $ret;
}

