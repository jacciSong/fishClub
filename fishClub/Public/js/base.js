
//封装ajax 
$(function() {

	/**
	 * ajax封装
	 * url 发送请求的地址
	 * data 发送到服务器的数据，数组存储
	 * type 请求方式("POST" 或 "GET")， 默认为 "GET"
	 * dataType 预期服务器返回的数据类型，常用的如：xml、html、json、text
	 * successfn 成功回调函数
	 * errorfn 失败回调函数
	 */
	$.s_ajax = function(url, data, type, successfn, errorfn) {
		type = (type == null || type == "" || typeof(type) == "undefined") ? "post" : type;
		data = (data == null || data == "" || typeof(data) == "undefined") ? {
			"date": new Date().getTime()
		} : data;
		$.ajax({
			type: type,
			async: true,
			data: data,
			url: url,
			dataType: 'json',
			success: function(d) {
				successfn(d);
			},
			error: function(e) {
				errorfn(e);
			}
		});
	};

});


//用于生成uuid
function S4() {
	return(((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
}

function getUUID() {
	return(S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4());
}

function getCusID() {
	var sys = window.YDUI.util.localStorage.get('sys');
	if(StringUtils.isEmpty(sys)) {
		return 0;
	}
	return sys.customer_id;
}

function getShareInfo() {
	var sys = window.YDUI.util.localStorage.get('sys');
	if(StringUtils.isEmpty(sys)) {
		return 0;
	}
	return sys.share;
}

/**
 * {'lang':en,'currency':SGD,customer_id:'',}
 */
function getCusInfo() {
	var sys = window.YDUI.util.localStorage.get('sys');
	return sys;
}

/*
 * 先调用getCusInfo 再使用这个方法
 */
function updateCusInfo(data) {
	//处理  数据
	window.YDUI.util.localStorage.set('sys', data);
}

/**
 * 选择语言
 * @returns
 */
function ChooseLanguageType() {
	var sys = getCusInfo(),
		lang = $('#chooseLanguage').find('span').attr('data-id');
	if(StringUtils.isEmpty(lang)) {
		oneLineTip({
			'msg': '请选择语言'
		});
	} else {
		sys.lang = lang;
		window.YDUI.util.localStorage.set('sys', sys);
		$('#lang_setting_pop').remove();
		showMoneyPop();
	}

}

/**
 * 选择币种
 * @returns
 */
function ChooseMoneyType() {
	var sys = getCusInfo();
	var currency = $('#chooseMoneyType').find('span').attr('data-id');
	if(StringUtils.isEmpty(currency)) {
		oneLineTip({
			'msg': '请选择币种'
		});
	} else {
		sys.currency = currency;
		updateNetCusInfo(sys); //调用网络接口 
	}

}

function updateNetCusInfo(data) {
	baseDialog.loading.open('loading……');
	$.s_ajax(u_i_url, data, "POST", function(result) {
		baseDialog.loading.close();
		if(!result.status) {
			oneLineTip({
				'msg': result.msg
			});
		} else {
			oneLineTip({
				'msg': result.msg
			});
			data.customer_id = result.data;
			updateCusInfo(data); //更新本地
			$('#money_setting_pop').remove();
			isChangeCustomerId();
		}
	}, function(error) {
		$is_ajax = false;
		baseDialog.loading.close();
		oneLineTip(error.statusText);
	});
}

//弹出选择语言的框子
function showLangPop() {
	$('#lang_setting_pop').show();
}

//弹出选择币种的框子
function showMoneyPop() {
	$('#money_setting_pop').show();
}

/**
 * 下拉框
 */
function DropDown(el) {
	this.dd = el;
	this.span = this.dd.children('span');
	this.li = this.dd.find('ul.dropdown li');
	this.val = '';
}

function jquerySubmit2(url, formId, callback1, callback2) {
	var options = {
		success: callback1,
		error: callback2,
		url: url,
		formId: formId,
		type: 'post',
		dataType: 'json'
	};
	$("#" + formId).ajaxForm(options);
	$("#" + formId).submit();
}

/**
 * @param url
 *            请求地址
 * @param params
 *            请求参数:key/value形式(可选)
 * @param callback
 *            请求成功后的回调函数(可选)
 */
function getJson(url, params, callback) {
	$.getJSON(url, params, callback);
}

//获取url中的某个参数：
(function($) {
	$.getUrlParam = function(name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
		var r = window.location.search.substr(1).match(reg);
		if(r != null) return unescape(r[2]);
		return null;
	}
})(jQuery);

/**
 *
 * 获得语言和币种
 */
function getLanguageAndCurrency() {
	if(YDUI.device.isMobile) {
		getJson(l_c_url, {}, function(data) {
			setLangPop(data.l);
			setCurrencyPop(data.c);
			var sys = window.YDUI.util.localStorage.get('sys');
			if(!StringUtils.isEmpty(sys.customer_id)) {
				getJson(c_i_url, {
					customer_id: sys.customer_id
				}, function(data) {
					if(data.data == 1 || data.data == 2 || data.data == 3) {
						if(data.data == 1 || data.data == 3) {
							showLangPop();
						} else if(data.data == 2) {
							showMoneyPop();
						}
					} else {
						isChangeCustomerId();
					}
				});
			}
		});
	}
}

function isChangeCustomerId() {
	//判断是否参数包含customer_id & customer_id 是否重复
	var tag = false;
	var url = window.location.pathname,
		param = window.location.search,
		p1 = 'customer_id',
		ccid = getCusID();
	if(param.indexOf(p1) == -1) {
		if(url == '/CCMall/index.php/Home/MobileProduct/home') {
			var changeUrl = window.location.href + '?customer_id=' + ccid;
			history.replaceState(null, null, changeUrl);
			tag = true;
		}
		getShareData();
	} else {
		var p2 = $.getUrlParam('customer_id');
		//本地和网址不一致
		if(p2 !== ccid) {
			var changeUrl = changeURLArg(window.location.href, 'customer_id', ccid);
			//window.location.href = changeUrl;
			history.replaceState(null, null, changeUrl);
			tag = true;
		}
		getShareData();
	}
	getShopCartNum(ccid);
	if(tag) {
		window.location.reload();
	}
}

function getShareData() {

	var url = window.location.pathname,
		param = window.location.search,
		p1 = 'customer_id',
		p2 = 'share';
	if(param.indexOf(p2) == -1) {
		var sparam = {
			'a': getCusID(),
			'b': 0,
			'c': 0
		};
		var sys = getCusInfo();
		if(sys.share == 0) {
			var json_str = JSON.stringify(sparam);
		} else {
			var nowCid = $.getUrlParam('customer_id');
			var share_param = JSON.parse(sys.share);
			if(nowCid == share_param['a']) {
				var json_str = sys.share;
			} else {
				sparam['a'] = nowCid;
				var json_str = JSON.stringify(sparam);
			}
		}
		shortURL = window.location.href + '&share=' + json_str;
		history.replaceState(null, null, shortURL);
		sys.share = json_str;
		updateCusInfo(sys);
	} else {
		//存在
		var sys = getCusInfo();
		var json_str = $.getUrlParam('share');
		var sparam = JSON.parse(json_str),
			customerId = getCusID();
		if(customerId == sparam['a']) {
			var json_str = sparam;
			sys.share = JSON.stringify(json_str);
			updateCusInfo(sys);
			history.replaceState(null, null, window.location.href);
		} else {
			//sparam = JSON.parse(sparam);
			sparam['c'] = sparam['b'];
			sparam['b'] = sparam['a'];
			sparam['a'] = getCusID();
			//对象转字符串
			var sys = getCusInfo(),
				json_str = JSON.stringify(sparam);
			sys.share = json_str;
			updateCusInfo(sys);
			shortURL = changeURLArg(window.location.href, 'share', json_str);
			history.replaceState(null, null, shortURL);
		}
	}
}

/**
 * 获得用户购物车数量
 * @param cid 用户id
 */
function getShopCartNum(cid) {
	$.ajax({
		url: '/CCMall/index.php/Home/MobileProduct/getShopCartNum',
		data: {
			customer_id: cid
		},
		dataType: 'json',
		type: 'post',
		success: function(data) {
			$('.shopcart-num').html(data);
		}

	})
}

/*
 * url 目标url
 * arg 需要替换的参数名称
 * arg_val 替换后的参数的值
 * return url 参数替换后的url
 */
function changeURLArg(url, arg, arg_val) {
	var pattern = arg + '=([^&]*)';
	var replaceText = arg + '=' + arg_val;
	if(url.match(pattern)) {
		var tmp = '/(' + arg + '=)([^&]*)/gi';
		tmp = url.replace(eval(tmp), replaceText);
		return tmp;
	} else {
		if(url.match('[\?]')) {
			return url + '&' + replaceText;
		} else {
			return url + '?' + replaceText;
		}
	}
	return url + '\n' + arg + '\n' + arg_val;
}

function setLangPop(data) {
	var content = '';
	content += '<div class="lang-setting-pop white-bg hidden" id="lang_setting_pop">';
	content += '<p class="f-s-4">Set Your Language</p>';
	content += '<p class="f-s-4">语言设置</p>';
	content += '<div style="padding:15px 1rem;">';
	content += '	<div id="chooseLanguage" class="my-select">';
	content += '		<span data-id="">选择语言 Language</span>';
	content += '		<ul class="dropdown">';
	$(data).each(function(index, item) {
		content += '		<li data-id="' + item.language_id + '">' + item.language_name + ' ' + item.language_abbreviation + '</li>';
	});
	content += '		</ul>';
	content += '	</div>';
	content += '	<div style="clear:both;"></div> ';
	content += '</div>';
	content += '<p class="f-s-34 text-purple">You can modify it in the settings</p>';
	content += '<p class="f-s-34 m-t-10 text-purple">选择后可在设置中修改</p>';
	content += '<button class="common-btn btn-gradient text-white m-t-20" onclick="ChooseLanguageType()">NEXT(下一步)</button>';
	content += '</div>';
	$('body').append(content);
	var chooseLanguage = new DropDown($('#chooseLanguage'));
	chooseLanguage.initEvents();
}

function setCurrencyPop(data) {
	var content = '';
	content += '<div class="lang-setting-pop white-bg hidden" id="money_setting_pop">';
	content += '<p class="f-s-4">Set Your Currency</p>';
	content += '<p class="f-s-4">币种设置</p>';
	content += '<div style="padding:15px 1rem;">';
	content += '	<div id="chooseMoneyType" class="my-select">';
	content += '		<span data-id="">选择币种 Currency</span>';
	content += '		<ul class="dropdown">';
	$(data).each(function(index, item) {
		content += '		<li data-id="' + item.currency_id + '">' + item.currency_name + ' ' + item.currency_abbreviation + '</li>';
	});
	content += '		</ul>';
	content += '	</div>';
	content += '	<div style="clear:both;"></div> ';
	content += '</div>';
	content += '<p class="f-s-34 text-purple"> Not modifiable after selection</p>';
	content += '<p class="f-s-34 text-purple">选择后不可修改</p>';
	content += '<button class="common-btn btn-gradient text-white m-t-20" onclick="ChooseMoneyType()">确定 Confirm</button>';
	content += '</div>';
	$('body').append(content);
	var chooseMoneyType = new DropDown($('#chooseMoneyType'));
	chooseMoneyType.initEvents();
}

//获得当前时间
function getNowFormatDate() {
	var date = new Date();
	var seperator1 = "-";
	var seperator2 = ":";
	var month = date.getMonth() + 1;
	var strDate = date.getDate();
	if(month >= 1 && month <= 9) {
		month = "0" + month;
	}
	if(strDate >= 0 && strDate <= 9) {
		strDate = "0" + strDate;
	}
	var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate +
		" " + date.getHours() + seperator2 + date.getMinutes() +
		seperator2 + date.getSeconds();
	return currentdate;
}

//单选框  复选框
function check(el, cl) {
	$(el).each(function() {
		$(this).parent('i').removeClass(cl);
		var checked = $(this).prop('checked');
		if(checked) {
			$(this).parent('i').addClass(cl);
		}
	});
}

/**
 * g.loading.show();
 * g.loading.hide();
 */
g = {
	loading: $('#wxloading'),
}

function extend(a, b) {
	for(var i in b) {
		if(b.hasOwnProperty(i)) {
			a[i] = b[i];
		}
	}
	return a;
}

/**
 * oneLineTip({'msg':'信息提示'})
 * @param opts
 */
function oneLineTip(opts) {
	var option = {
			msg: '',
			time: 2000
		},
		el,
		container = document.querySelector('.wx_wrap') || document.body,
		opts = opts || {};
	extend(option, opts);
	el = document.createElement('div');
	el.className = 'mod_alert one_line fixed show';
	el.innerHTML = '<p>' + option.msg + '</p>';
	container.appendChild(el);

	function clear() {
		el.style.display = 'none';
		container.removeChild(el);
	}

	window.setTimeout(function() {
			clear()
		},
		option.time);
}

$(document).on("click", 'textarea', function() {
	$(this).focus();
});


	//字符串工具类
	StringUtils = {
		isEmpty: function(input) {
			return input == null || input == '';
		},
		isNotEmpty: function(input) {
			return !this.isEmpty(input);
		},
		isBlank: function(input) {
			return input == null || /^\s*$/.test(input);
		},
		isNotBlank: function(input) {
			return !this.isBlank(input);
		},
		trim: function(input) {
			return input.replace(/^\s+|\s+$/, '');
		},
		trimToEmpty: function(input) {
			return input == null ? "" : this.trim(input);
		},
		startsWith: function(input, prefix) {
			return input.indexOf(prefix) === 0;
		},
		endsWith: function(input, suffix) {
			return input.lastIndexOf(suffix) === 0;
		},
		contains: function(input, searchSeq) {
			return input.indexOf(searchSeq) >= 0;
		},
		equals: function(input1, input2) {
			return input1 == input2;
		},
		equalsIgnoreCase: function(input1, input2) {
			return input1.toLocaleLowerCase() == input2.toLocaleLowerCase();
		},
		containsWhitespace: function(input) {
			return this.contains(input, ' ');
		},
		//生成指定个数的字符
		repeat: function(ch, repeatTimes) {
			var result = "";
			for(var i = 0; i < repeatTimes; i++) {
				result += ch;
			}
			return result;
		},
		deleteWhitespace: function(input) {
			return input.replace(/\s+/g, '');
		},
		rightPad: function(input, size, padStr) {
			return input + this.repeat(padStr, size);
		},
		leftPad: function(input, size, padStr) {
			return this.repeat(padStr, size) + input;
		},
		//首小写字母转大写
		capitalize: function(input) {
			var strLen = 0;
			if(input == null || (strLen = input.length) == 0) {
				return input;
			}
			return input.replace(/^[a-z]/, function(matchStr) {
				return matchStr.toLocaleUpperCase();
			});
		},
		//首大写字母转小写
		uncapitalize: function(input) {
			var strLen = 0;
			if(input == null || (strLen = input.length) == 0) {
				return input;
			}
			return input.replace(/^[A-Z]/, function(matchStr) {
				return matchStr.toLocaleLowerCase();
			});
		},
		//大写转小写，小写转大写
		swapCase: function(input) {
			return input.replace(/[a-z]/ig, function(matchStr) {
				if(matchStr >= 'A' && matchStr <= 'Z') {
					return matchStr.toLocaleLowerCase();
				} else if(matchStr >= 'a' && matchStr <= 'z') {
					return matchStr.toLocaleUpperCase();
				}
			});
		},
		//统计含有的子字符串的个数
		countMatches: function(input, sub) {
			if(this.isEmpty(input) || this.isEmpty(sub)) {
				return 0;
			}
			var count = 0;
			var index = 0;
			while((index = input.indexOf(sub, index)) != -1) {
				index += sub.length;
				count++;
			}
			return count;
		},
		//只包含字母
		isAlpha: function(input) {
			return /^[a-z]+$/i.test(input);
		},
		//只包含字母、空格
		isAlphaSpace: function(input) {
			return /^[a-z\s]*$/i.test(input);
		},
		//只包含字母、数字
		isAlphanumeric: function(input) {
			return /^[a-z0-9]+$/i.test(input);
		},
		//只包含字母、数字和空格
		isAlphanumericSpace: function(input) {
			return /^[a-z0-9\s]*$/i.test(input);
		},
		//数字
		isNumeric: function(input) {
			return /^(?:[1-9]\d*|0)(?:\.\d+)?$/.test(input);
		},
		//小数
		isDecimal: function(input) {
			return /^[-+]?(?:0|[1-9]\d*)\.\d+$/.test(input);
		},
		//负小数
		isNegativeDecimal: function(input) {
			return /^\-?(?:0|[1-9]\d*)\.\d+$/.test(input);
		},
		//正小数
		isPositiveDecimal: function(input) {
			return /^\+?(?:0|[1-9]\d*)\.\d+$/.test(input);
		},
		//整数
		isInteger: function(input) {
			return /^[-+]?(?:0|[1-9]\d*)$/.test(input);
		},
		//正整数
		isPositiveInteger: function(input) {
			return /^\+?(?:0|[1-9]\d*)$/.test(input);
		},
		//负整数
		isNegativeInteger: function(input) {
			return /^\-?(?:0|[1-9]\d*)$/.test(input);
		},
		//只包含数字和空格
		isNumericSpace: function(input) {
			return /^[\d\s]*$/.test(input);
		},
		isWhitespace: function(input) {
			return /^\s*$/.test(input);
		},
		isAllLowerCase: function(input) {
			return /^[a-z]+$/.test(input);
		},
		isAllUpperCase: function(input) {
			return /^[A-Z]+$/.test(input);
		},
		defaultString: function(input, defaultStr) {
			return input == null ? defaultStr : input;
		},
		defaultIfBlank: function(input, defaultStr) {
			return this.isBlank(input) ? defaultStr : input;
		},
		defaultIfEmpty: function(input, defaultStr) {
			return this.isEmpty(input) ? defaultStr : input;
		},
		//字符串反转
		reverse: function(input) {
			if(this.isBlank(input)) {
				input;
			}
			return input.split("").reverse().join("");
		},
		//删掉特殊字符(英文状态下)
		removeSpecialCharacter: function(input) {
			return input.replace(/[!-/:-@\[-`{-~]/g, "");
		},
		//只包含特殊字符、数字和字母（不包括空格，若想包括空格，改为[ -~]）
		isSpecialCharacterAlphanumeric: function(input) {
			return /^[!-~]+$/.test(input);
		},
		/**
		 * 校验时排除某些字符串，即不能包含某些字符串
		 * @param {Object} conditions:里面有多个属性，如下：
		 *
		 * @param {String} matcherFlag 匹配标识
		 * 0:数字；1：字母；2：小写字母；3:大写字母；4：特殊字符,指英文状态下的标点符号及括号等；5:中文;
		 * 6:数字和字母；7：数字和小写字母；8：数字和大写字母；9：数字、字母和特殊字符；10：数字和中文；
		 * 11：小写字母和特殊字符；12：大写字母和特殊字符；13：字母和特殊字符；14：小写字母和中文；15：大写字母和中文；
		 * 16：字母和中文；17：特殊字符、和中文；18：特殊字符、字母和中文；19：特殊字符、小写字母和中文；20：特殊字符、大写字母和中文；
		 * 100：所有字符;
		 * @param {Array} excludeStrArr 排除的字符串，数组格式
		 * @param {String} length 长度，可为空。1,2表示长度1到2之间；10，表示10个以上字符；5表示长度为5
		 * @param {Boolean} ignoreCase 是否忽略大小写
		 * conditions={matcherFlag:"0",excludeStrArr:[],length:"",ignoreCase:true}
		 */
		isPatternMustExcludeSomeStr: function(input, conditions) {
			//参数
			var matcherFlag = conditions.matcherFlag;
			var excludeStrArr = conditions.excludeStrArr;
			var length = conditions.length;
			var ignoreCase = conditions.ignoreCase;
			//拼正则
			var size = excludeStrArr.length;
			var regex = (size == 0) ? "^" : "^(?!.*(?:{0}))";
			var subPattern = "";
			for(var i = 0; i < size; i++) {
				excludeStrArr[i] = Bee.StringUtils.escapeMetacharacterOfStr(excludeStrArr[i]);
				subPattern += excludeStrArr[i];
				if(i != size - 1) {
					subPattern += "|";
				}
			}
			regex = this.format(regex, [subPattern]);
			switch(matcherFlag) {
				case '0':
					regex += "\\d";
					break;
				case '1':
					regex += "[a-zA-Z]";
					break;
				case '2':
					regex += "[a-z]";
					break;
				case '3':
					regex += "[A-Z]";
					break;
				case '4':
					regex += "[!-/:-@\[-`{-~]";
					break;
				case '5':
					regex += "[\u4E00-\u9FA5]";
					break;
				case '6':
					regex += "[a-zA-Z0-9]";
					break;
				case '7':
					regex += "[a-z0-9]";
					break;
				case '8':
					regex += "[A-Z0-9]";
					break;
				case '9':
					regex += "[!-~]";
					break;
				case '10':
					regex += "[0-9\u4E00-\u9FA5]";
					break;
				case '11':
					regex += "[a-z!-/:-@\[-`{-~]";
					break;
				case '12':
					regex += "[A-Z!-/:-@\[-`{-~]";
					break;
				case '13':
					regex += "[a-zA-Z!-/:-@\[-`{-~]";
					break;
				case '14':
					regex += "[a-z\u4E00-\u9FA5]";
					break;
				case '15':
					regex += "[A-Z\u4E00-\u9FA5]";
					break;
				case '16':
					regex += "[a-zA-Z\u4E00-\u9FA5]";
					break;
				case '17':
					regex += "[\u4E00-\u9FA5!-/:-@\[-`{-~]";
					break;
				case '18':
					regex += "[\u4E00-\u9FA5!-~]";
					break;
				case '19':
					regex += "[a-z\u4E00-\u9FA5!-/:-@\[-`{-~]";
					break;
				case '20':
					regex += "[A-Z\u4E00-\u9FA5!-/:-@\[-`{-~]";
					break;
				case '100':
					regex += "[\s\S]";
					break;
				default:
					alert(matcherFlag + ":This type is not supported!");
			}
			regex += this.isNotBlank(length) ? "{" + length + "}" : "+";
			regex += "$";
			var pattern = new RegExp(regex, ignoreCase ? "i" : "");
			return pattern.test(input);
		},
		/**
		 * @param {String} message
		 * @param {Array} arr
		 * 消息格式化
		 */
		format: function(message, arr) {
			return message.replace(/{(\d+)}/g, function(matchStr, group1) {
				return arr[group1];
			});
		},
		/**
		 * 把连续出现多次的字母字符串进行压缩。如输入:aaabbbbcccccd  输出:3a4b5cd
		 * @param {String} input
		 * @param {Boolean} ignoreCase : true or false
		 */
		compressRepeatedStr: function(input, ignoreCase) {
			var pattern = new RegExp("([a-z])\\1+", ignoreCase ? "ig" : "g");
			return result = input.replace(pattern, function(matchStr, group1) {
				return matchStr.length + group1;
			});
		},
		/**
		 * 校验必须同时包含某些字符串
		 * @param {String} input
		 * @param {Object} conditions:里面有多个属性，如下：
		 *
		 * @param {String} matcherFlag 匹配标识
		 * 0:数字；1：字母；2：小写字母；3:大写字母；4：特殊字符,指英文状态下的标点符号及括号等；5:中文;
		 * 6:数字和字母；7：数字和小写字母；8：数字和大写字母；9：数字、字母和特殊字符；10：数字和中文；
		 * 11：小写字母和特殊字符；12：大写字母和特殊字符；13：字母和特殊字符；14：小写字母和中文；15：大写字母和中文；
		 * 16：字母和中文；17：特殊字符、和中文；18：特殊字符、字母和中文；19：特殊字符、小写字母和中文；20：特殊字符、大写字母和中文；
		 * 100：所有字符;
		 * @param {Array} excludeStrArr 排除的字符串，数组格式
		 * @param {String} length 长度，可为空。1,2表示长度1到2之间；10，表示10个以上字符；5表示长度为5
		 * @param {Boolean} ignoreCase 是否忽略大小写
		 * conditions={matcherFlag:"0",containStrArr:[],length:"",ignoreCase:true}
		 *
		 */
		isPatternMustContainSomeStr: function(input, conditions) {
			//参数
			var matcherFlag = conditions.matcherFlag;
			var containStrArr = conditions.containStrArr;
			var length = conditions.length;
			var ignoreCase = conditions.ignoreCase;
			//创建正则
			var size = containStrArr.length;
			var regex = "^";
			var subPattern = "";
			for(var i = 0; i < size; i++) {
				containStrArr[i] = Bee.StringUtils.escapeMetacharacterOfStr(containStrArr[i]);
				subPattern += "(?=.*" + containStrArr[i] + ")";
			}
			regex += subPattern;
			switch(matcherFlag) {
				case '0':
					regex += "\\d";
					break;
				case '1':
					regex += "[a-zA-Z]";
					break;
				case '2':
					regex += "[a-z]";
					break;
				case '3':
					regex += "[A-Z]";
					break;
				case '4':
					regex += "[!-/:-@\[-`{-~]";
					break;
				case '5':
					regex += "[\u4E00-\u9FA5]";
					break;
				case '6':
					regex += "[a-zA-Z0-9]";
					break;
				case '7':
					regex += "[a-z0-9]";
					break;
				case '8':
					regex += "[A-Z0-9]";
					break;
				case '9':
					regex += "[!-~]";
					break;
				case '10':
					regex += "[0-9\u4E00-\u9FA5]";
					break;
				case '11':
					regex += "[a-z!-/:-@\[-`{-~]";
					break;
				case '12':
					regex += "[A-Z!-/:-@\[-`{-~]";
					break;
				case '13':
					regex += "[a-zA-Z!-/:-@\[-`{-~]";
					break;
				case '14':
					regex += "[a-z\u4E00-\u9FA5]";
					break;
				case '15':
					regex += "[A-Z\u4E00-\u9FA5]";
					break;
				case '16':
					regex += "[a-zA-Z\u4E00-\u9FA5]";
					break;
				case '17':
					regex += "[\u4E00-\u9FA5!-/:-@\[-`{-~]";
					break;
				case '18':
					regex += "[\u4E00-\u9FA5!-~]";
					break;
				case '19':
					regex += "[a-z\u4E00-\u9FA5!-/:-@\[-`{-~]";
					break;
				case '20':
					regex += "[A-Z\u4E00-\u9FA5!-/:-@\[-`{-~]";
					break;
				case '100':
					regex += "[\s\S]";
					break;
				default:
					alert(matcherFlag + ":This type is not supported!");
			}
			regex += this.isNotBlank(length) ? "{" + length + "}" : "+";
			regex += "$";
			var pattern = new RegExp(regex, ignoreCase ? "i" : "");
			return pattern.test(input);
		},
		//中文校验
		isChinese: function(input) {
			return /^[\u4E00-\u9FA5]+$/.test(input);
		},
		//去掉中文字符
		removeChinese: function(input) {
			return input.replace(/[\u4E00-\u9FA5]+/gm, "");
		},
		//转义元字符
		escapeMetacharacter: function(input) {
			var metacharacter = "^$()*+.[]|\\-?{}|";
			if(metacharacter.indexOf(input) >= 0) {
				input = "\\" + input;
			}
			return input;
		},
		//转义字符串中的元字符
		escapeMetacharacterOfStr: function(input) {
			return input.replace(/[\^\$\*\+\.\|\\\-\?\{\}\|]/gm, "\\$&");
		}

	};