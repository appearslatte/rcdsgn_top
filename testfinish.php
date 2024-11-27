<?php
//////////////////////////////////////////////////////////////////////
//
//  完了画面確認用
//
//////////////////////////////////////////////////////////////////////

$_root_path = './';
$_this_path = './';		// ex) 'contact/' or './'

require_once($_root_path . 'phplib/common.inc.php');
require_once($_root_path . 'phplib/BladeOne.php');

// クラス初期化
Use eftec\bladeone\BladeOne;
$libBrade = new BladeOne($_root_path, $_root_path . 'cache/');

// html出力
$context = [
	'header' => file_get_contents($_this_path . 'index_header.blade.html'),
	'footer' => file_get_contents($_this_path . 'index_footer.blade.html'),
];
echo $libBrade->run($_this_path . 'index_finish.blade.html', $context);
