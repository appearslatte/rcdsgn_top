$(function () {
	var opt = {
		rules: {
			{!! $rules !!}
		},
		messages: {
			{!! $messages !!}
		},
		groups: {
			{!! $groups !!}
		},

		// 挙動関連
		onkeyup: false,
		onfocusout: function onfocusout(element) {
			this.element(element);
		},
		
		// エラーメッセージ設定
		errorElement: "span",		// エラーメッセージのタグ
		errorClass: "error block",		// エラーメッセージにつけるclass ##block追加
		// wrapper: 'p',			// エラーメッセージを囲むタグ

		// エラーをまとめて表示の場合
		// errorLabelContainer: $('#errors'),		// 表示位置
		// wrapper: "li",							// エラーメッセージを囲むタグ

		// エラー表示位置
		errorPlacement: function (error, element) {
			{!! $group_messageid !!}

			// デフォルト
			error.appendTo(element.parents().children(".warning"));

			// classにblockを追加
			element.parents().children(".warning").addClass("block");
		},

		// エラー箇所にスクロールさせる
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				$("html, body").animate({ scrollTop: $(validator.errorList[0].element.parentNode).offset().top - 150 });
			}
		},

		// // 成功メッセージを表示させる
		// success: function success(label, element) {
		// 	$(label).addClass("success").text("OK");
		// },
		// highlight: function highlight(element, errorClass) {
		// 	$(element).parents("div").find("label").removeClass("success");
		// },

	};
	$("form").validate(opt);
});

// カスタムバリデータ
jQuery.validator.addMethod("katakana", function (value, element) {
	return this.optional(element) || /^([ァ-ヶー 　]+)$/.test(value);
}, "全角カタカナで入力してください");

jQuery.validator.addMethod("hiragana", function (value, element) {
	return this.optional(element) || /^([ぁ-んー 　]+)$/.test(value);
}, "全角ひらがなで入力してください");

jQuery.validator.addMethod("katahira", function (value, element) {
	return this.optional(element) || /^([ぁ-んァ-ヶー 　]+)$/.test(value);
}, "全角ひらがな・カタカナで入力してください");

jQuery.validator.addMethod("tel", function (value, element) {
	return this.optional(element) || /^([0-9\-]+)$/.test(value);
}, "半角数字で入力して下さい");

jQuery.validator.addMethod("select", function (value, element, origin) {
	return null != value && origin != value;
}, "選択してください");
