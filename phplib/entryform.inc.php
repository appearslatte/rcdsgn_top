<?php
//////////////////////////////////////////////////////////////////////
//
//  entryform.inc.php
//
//  応募フォーム共通機能 Ver1.1.0
//
//////////////////////////////////////////////////////////////////////

$age_vals = [];
for($i=18;$i<=80;$i++) {
	$age_vals[] = (string)$i;
}

//##### ページ項目設定
$_conf['page_datas'] = [
	// 就業中
	'status' => [
		'label' => '現在就業していますか？',
		'form_datas' => [
			'status' => [
				'radio_vals' => ['はい', 'いいえ'],
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'status_error',
			],
		],
		'templete_file' => $_this_path . 'index.blade.html',
		// 'templete_file' => $_this_path . 'form_status.blade.html',	// トップページ以外の場合
		'confirm_value' => '<p class="ex">{status}</p>',
		'mail_value' => '{status}',
		'step_title' => '就業状況',
	],

	// 職種
	'job' => [
		'label' => 'ご希望の職種をお選びください',
		'form_datas' => [
			'job' => [
				'check_vals' => [],
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'job_error',
			],
		],
		'templete_file' => $_this_path . 'form_job.blade.html',
		'confirm_value' => '<p class="ex">{job}</p>',
		'mail_value' => '{job}',
		'step_title' => '希望職種',
	],

	// 勤務形態
	'employment' => [
		'label' => 'ご希望の勤務形態をお選びください',
		'form_datas' => [
			'employment' => [
				'check_vals' => [],
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'employment_error',
			],
		],
		'templete_file' => $_this_path . 'form_employment.blade.html',
		'confirm_value' => '<p class="ex">{employment}</p>',
		'mail_value' => '{employment}',
		'step_title' => '勤務形態',
	],

	// エリア
	'area' => [
		'label' => 'ご希望のエリアをお選びください',
		'form_datas' => [
			'area' => [
				'check_vals' => [],
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'area_error',
			],
		],
		'templete_file' => $_this_path . 'form_area.blade.html',
		'confirm_value' => '<p class="ex">{area}</p>',
		'mail_value' => '{area}',
		'step_title' => '希望エリア',
	],

	// 年齢
	'age' => [
		'label' => '年齢を入力してください',
		'form_datas' => [
			'age' => [
				'select_vals' => $age_vals,
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'age_error',
			],
		],
		'templete_file' => $_this_path . 'form_age.blade.html',
		'confirm_value' => '<p class="ex">{age}歳</p>',
		'mail_value' => '{age}歳',
		'step_title' => '年齢',
	],

	// 名前（姓＋名＋姓カナ＋名カナ）
	'name' => [
		'label' => 'お名前とフリガナを教えてください',
		'form_datas' => [
			'sei' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'maxlength' => [
						'rule' => '10',
						'mes' => '入力内容が長すぎます',
					],
				],
			],
			'mei' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'maxlength' => [
						'rule' => '10',
						'mes' => '入力内容が長すぎます',
					],
				],
			],
			'sei_kana' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'katakana' => [
						'rule' => 'true',
						'mes' => '全角カナで入力してください',
					],
					'maxlength' => [
						'rule' => '10',
						'mes' => '入力内容が長すぎます',
					],
				],
			],
			'mei_kana' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'katakana' => [
						'rule' => 'true',
						'mes' => '全角カナで入力してください',
					],
					'maxlength' => [
						'rule' => '10',
						'mes' => '入力内容が長すぎます',
					],
				],
			],
		],
		'form_groups' => [
			'gname' => [
				'members' => ['sei', 'mei'],
				'messege_id' => 'name_error',
			],
			'gkana' => [
				'members' => ['sei_kana', 'mei_kana'],
				'messege_id' => 'kana_error',
			],
		],
		'templete_file' => $_this_path . 'form_name.blade.html',
		'confirm_value' => '<p class="ex">{sei} {mei}（{sei_kana} {mei_kana}）</p>',
		'mail_value' => '{sei} {mei}（{sei_kana} {mei_kana}）',
		'step_title' => '氏名',
	],

	// 電話番号
	'tel' => [
		'label' => '電話番号を教えてください',
		'form_datas' => [
			'tel' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'tel' => [
						'rule' => 'true',
						'mes' => '電話番号が正しくありません',
					],
					'maxlength' => [
						'rule' => '13',
						'mes' => '入力内容が長すぎます',
					],
				],
				'messege_id' => 'tel_error',
			],
		],
		'templete_file' => $_this_path . 'form_tel.blade.html',
		'confirm_value' => '<p class="ex">{tel}</p>',
		'mail_value' => '{tel}',
		'step_title' => '連絡先',
	],

	// メールアドレス
	'email' => [
		'label' => 'メールアドレスを教えてください',
		'form_datas' => [
			'email' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'email' => [
						'rule' => 'true',
						'mes' => 'メールアドレスの形式が正しくありません',
					],
					'maxlength' => [
						'rule' => '200',
						'mes' => '入力内容が長すぎます',
					],
				],
				'messege_id' => 'email_error',
			],
		],
		'templete_file' => $_this_path . 'form_email.blade.html',
		'confirm_value' => '<p class="ex">{email}</p>',
		'mail_value' => '{email}',
		'step_title' => 'メール',
	],

	// 連絡先（電話番号＋メールアドレス）
	'contact' => [
		'label' => 'ご連絡先を教えてください',
		'form_datas' => [
			'tel' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'tel' => [
						'rule' => 'true',
						'mes' => '電話番号が正しくありません',
					],
					'maxlength' => [
						'rule' => '13',
						'mes' => '入力内容が長すぎます',
					],
				],
				'messege_id' => 'tel_error',
			],
			'email' => [
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
					'email' => [
						'rule' => 'true',
						'mes' => 'メールアドレスの形式が正しくありません',
					],
					'maxlength' => [
						'rule' => '200',
						'mes' => '入力内容が長すぎます',
					],
				],
				'messege_id' => 'email_error',
			],
		],
		'templete_file' => $_this_path . 'form_contact.blade.html',
		'confirm_value' => '<p class="ex">{tel}</p><p class="ex">{email}</p>',
		'mail_value' => "{tel}\r\n{email}",
		'step_title' => '連絡先',
	],

	// 承諾（固定文言送信）
	'consent' => [
		'label' => '以下の内容をご確認ください',
		'form_datas' => [
			'job' => [
				'validate' => [],
			],
		],
		'templete_file' => $_this_path . 'form_consent.blade.html',
		'confirm_value' => '<p class="ex">{job}</p>',
		'mail_value' => '{job}',
		'step_title' => '承諾',
	],

	// 都道府県（管理画面非デフォルト項目）
	'prefecture' => [
		'label' => 'お住みの都道府県をお選びください',
		'form_datas' => [
			'todoufuken' => [
				'select_vals' => ['北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県',
									'群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県',
									'山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府',
									'兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県',
									'香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県',
									'鹿児島県','沖縄県'],
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'todoufuken_error',
			],
		],
		'templete_file' => $_this_path . 'form_prefecture.blade.html',
		'confirm_value' => '<p class="ex">{todoufuken}</p>',
		'mail_value' => '{todoufuken}',
		'step_title' => '都道府県',
	],

	// 性別（管理画面非デフォルト項目）
	'sex' => [
		'label' => '性別を教えてください',
		'form_datas' => [
			'sex' => [
				'radio_vals' => ['男性', '女性', 'その他'],
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'sex_error',
			],
		],
		'templete_file' => $_this_path . 'form_sex.blade.html',
		'confirm_value' => '<p class="ex">{sex}</p>',
		'mail_value' => '{sex}',
		'step_title' => '性別',
	],

	// 資格有無（管理画面非デフォルト項目）
	'qualified' => [
		'label' => '資格をお持ちですか？',
		'form_datas' => [
			'qualified' => [
				'radio_vals' => ['はい', 'いいえ'],
				'validate' => [
					'required' => [
						'rule' => 'true',
						'mes' => '必須項目です',
					],
				],
				'messege_id' => 'qualified_error',
			],
		],
		'templete_file' => $_this_path . 'form_qualified.blade.html',
		'confirm_value' => '<p class="ex">{qualified}</p>',
		'mail_value' => '{qualified}',
		'step_title' => '資格有無',
	],

];

Use eftec\bladeone\BladeOne;
$libBrade = null;
$libForm = null;

// 処理開始
function form_start()
{
	global $_root_path, $_conf, $libForm, $libBrade;

	// フォーム項目設定
	$_conf['form_datas'] = [];
	$_conf['form_groups'] = [];
	foreach($_conf['use_page'] as $usepage) {
		foreach($_conf['page_datas'][$usepage]['form_datas'] as $key => $val) {
			$_conf['form_datas'][$key] = $val;
			$_conf['form_datas'][$key]['label'] = $_conf['page_datas'][$usepage]['label'];
		}
		if(isset($_conf['page_datas'][$usepage]['form_groups'])) {
			foreach($_conf['page_datas'][$usepage]['form_groups'] as $key => $val) {
				$_conf['form_groups'][$key] = $val;
			}
		}
	}
	
	// クラス初期化
	$libBrade = new BladeOne($_root_path, $_root_path . 'cache/');
	$libForm = new LibForm($_conf['form_datas'], $_conf['form_groups'], '、');

	if(!isset($_GET['p'])) $_GET['p'] = '1';
	if($_GET['p'] == 'e'){
		finish_page();
	}
	else if($_GET['p'] == 'c'){
		confirm_page();
	}
	else if($_GET['p'] == 'v'){
		validate_output();
	}
	else{
		if(!is_numeric($_GET['p']) || (int)$_GET['p'] > count($_conf['use_page'])) {
			redirect_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
		};
		input_page((int)$_GET['p']);
	}
}

// バリデーションJavaScript出力
function validate_output()
{
	global $_this_path, $libForm, $libBrade;
	
	header('Content-Type: application/javascript; charset=UTF-8');
	
	// js出力
	$context = [
		'rules' => $libForm->getValidateRules(),
		'messages' => $libForm->getValidateMessages(),
		'groups' => $libForm->getValidateGroups(),
		'group_messageid' => $libForm->getValidateErrorPlacement(),
	];
	echo $libBrade->run($_this_path . 'index_validate.blade.js', $context);
}

// フォーム画面出力
function input_page($page)
{
	global $_this_path, $libForm, $libBrade, $_conf;
	
	$page_data = $_conf['page_datas'][$_conf['use_page'][$page - 1]];

	// html出力
	$context = [
		'datas' => $libForm->formDatas,
		'next_url' => $page < count($_conf['use_page']) ? '?p=' . ($page + 1) . '#entry' : '?p=c',
		'back_url' => $page > 1 ? '?p=' . ($page - 1) .'#entry' : '',
		'errors' => [],
		'question_no' => $page,
		'header' => file_get_contents($_this_path . 'index_header.blade.html'),
		'footer' => file_get_contents($_this_path . 'index_footer.blade.html'),
		'steps' => get_steps_html($page),
	];
	echo $libBrade->run($page_data['templete_file'], $context);
}

// 確認画面出力
function confirm_page()
{
	global $_this_path, $libForm, $libBrade, $_conf;
	
	// ページ遷移が正しいかチェック
	if(!$libForm->isSessionStarted()) {
		redirect_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	}

	// サーバ側バリデーション
	$v = $libForm->initServerValidate();

	// カスタムバリデーション追加（あれば）
	// $v->rule('regex', 'xxxxx', '/^([ァ-ヶー 　]+)$/u');
	// 参考：https://github.com/vlucas/valitron

	if(!$v->validate()) {
		// html出力
		$page_data = $_conf['page_datas'][$_conf['use_page'][0]];
		$context = [
			'datas' => $libForm->formDatas,
			'next_url' => count($_conf['use_page']) > 1 ? '?p=2#entry' : '?p=c',
			'errors' => $libForm->valitronErrorsToArray($v->errors()),
		];
		echo $libBrade->run($page_data['templete_file'], $context);
		return;
	}
	
	// データチェック
	if(!$libForm->isDataSuccess()) {
		redirect_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	}

	// 改行を<br>に変更
	$libForm->changeValueBr();

	// html出力
	$context = [
		'pagedatas' => get_page_datas(),
		'csrf' => $libForm->csrfTag(),
		'next_url' => '?p=e',
		'back_url' => '?p=' . count($_conf['use_page']) . '#entry',
		'header' => file_get_contents($_this_path . 'index_header.blade.html'),
		'footer' => file_get_contents($_this_path . 'index_footer.blade.html'),
	];
	echo $libBrade->run($_this_path . 'index_confirm.blade.html', $context);
}

// 完了画面出力
function finish_page()
{
	global $_conf, $_this_path, $libForm, $libBrade;
	
	// CSRFチェック
	if(!$libForm->csrfValidate()) {
		redirect_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	}
	
	// データチェック
	if(!$libForm->isDataSuccess()) {
		redirect_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	}

	// メール初期化
	if(isset($_conf['smtp_host'])) {
		$libForm->initMail($_conf['smtp_host'], $_conf['smtp_user'], $_conf['smtp_pass'], $_conf['smtp_secure'], $_conf['smtp_port']);
	}
	else {
		$libForm->initMail();
	}

	// recruit-axis 送信
	$is_send = false;
	$send_result = "";
	if(function_exists('send_rcaxis')) {
		$is_send = true;
		$send_result = send_rcaxis();
	}

	// メール送信（管理者）
	if(!is_array($_conf['mail_admin'])) {
		$_conf['mail_admin'] = [$_conf['mail_admin']];
	}
	foreach($_conf['mail_admin'] as $admin) {
		$libForm->sendMail(
			$admin,									// to
			$_conf['mail_kakunin_from'],			// from
			'',										// fromname
			$_conf['mail_sub'],						// sub
			body_admin($is_send, $send_result)		// body
		);
	}

	// メール送信（確認メール）
	$libForm->sendMail(
		$libForm->formDatas->{$_conf['mail_email_col']}->value,		// to
		$_conf['mail_kakunin_from'],								// from
		$_conf['mail_kakunin_fromname'],							// fromname
		$_conf['mail_kakunin_sub'],									// sub
		body_kakunin()												// body
	);

	// セッションクリア
	$libForm->clearSession();

	// html出力
	$context = [
		'header' => file_get_contents($_this_path . 'index_header.blade.html'),
		'footer' => file_get_contents($_this_path . 'index_footer.blade.html'),
	];
	echo $libBrade->run($_this_path . 'index_finish.blade.html', $context);
}

// メール本文作成（管理者）
function body_admin($is_send, $send_result)
{
	global $_conf, $libForm;
	$body = sprintf($_conf['mail_body_admin'], $_conf['mail_sub'], get_body_input(), $libForm->sendTime, $libForm->getHostName());

	if($is_send) {
		$body .= sprintf('管理画面送信結果：%s', $send_result ? '成功' : '失敗');
	}

	return $body;
}

// メール本文作成（確認メール）
function body_kakunin()
{
	global $_conf, $libForm;
	return sprintf($_conf['mail_body_user'], get_body_input());
}

function get_body_input()
{
	global $_conf;

	$ret = '';
	foreach($_conf['use_page'] as $key => $usepage) {
		$question_no = $key + 1;
		$val = replace_definition_value($_conf['page_datas'][$usepage]['mail_value']);
		$ret .= <<<EOP
[Q{$question_no}：{$_conf['page_datas'][$usepage]['label']}]
{$val}


EOP;
	}

	return rtrim($ret, '\n\r');
}

function get_page_datas() {
	global $_conf;

	$pageDatas = [];
	foreach($_conf['use_page'] as $key => $usepage) {
		$pageDatas[$usepage] = [
			'question_no' => $key + 1,
			'label' => $_conf['page_datas'][$usepage]['label'],
			'confirm_value' => replace_definition_value($_conf['page_datas'][$usepage]['confirm_value']),
		];
	}

	return $pageDatas;
}

function replace_definition_value($str) {
	global $libForm;

	if(preg_match_all('/\{.+?\}/', $str, $matches)) {
		foreach($matches[0] as $match) {
			$key = str_replace(['{', '}'], ['', ''], $match);
			if(isset($libForm->formDatas->$key->valuestr)) {
				$str = str_replace($match, $libForm->formDatas->$key->valuestr, $str);
			}
			else if(isset($libForm->formDatas->$key->value)) {
				$str = str_replace($match, $libForm->formDatas->$key->value, $str);
			}
		}
	}

	return $str;
}

function get_steps_html($page)
{
	global $_conf;

	$ret = '';
	foreach($_conf['use_page'] as $key => $usepage) {
		$no = $key + 1;
		$val = $_conf['page_datas'][$usepage]['step_title'];
		$past = $no < $page ? ' past' : '';
		$now = $no == $page ? ' now' : '';

		$ret .= "<div class=\"step{$past}{$now}\"><p>{$no}</p><p>{$val}</p></div>\n";
	}

	$columns = 'column' . count($_conf['use_page']);

	return <<<EOP
<div class="steps {$columns}">
{$ret}
</div><!--steps-->

EOP;
}