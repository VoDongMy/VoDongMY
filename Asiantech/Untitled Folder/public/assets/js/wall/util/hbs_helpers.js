/*
 * handlebars helpers
 */

'use strict';

(function() {

  var COND_OPERATORS = {
        '==' : function (l, r) { return l ==  r; },
        '===': function (l, r) { return l === r; },
        '!=' : function (l, r) { return l !=  r; },
        '!==': function (l, r) { return l !== r; },
        '<'  : function (l, r) { return l <   r; },
        '>'  : function (l, r) { return l >   r; },
        '<=' : function (l, r) { return l <=  r; },
        '>=' : function (l, r) { return l >=  r; },
        '%'  : function (l, r) { return l %   r; },
        '||' : function (l, r) {
          if( l || r ) {
            return true;
          } else {
            return false;
          }
        },
        'in' : function (l, r) {
          if (l.match(/^[0-9]+$/)) {
            l = parseInt(l, 10);
          }
          return r.indexOf(l) !== -1; },
        'typeof': function (l, r) {
          return typeof l == r;
        }
      };

  /**
   * if helper
   * {{#ifCond VALUE OPERATOR VALUE }} {{/ifCond}}
   */
  Handlebars.registerHelper('ifCond', function(lvalue, operator, rvalue, options) {

    var result;

    if (options === undefined) {
      options = rvalue;
      rvalue = operator;
      operator = '===';
    }

    if (arguments.length === 1) {
      if (lvalue) {
        return options.fn(this);
      } else {
        return options && options.inverse ? options.inverse(this) : '';
      }
    }

    if (!COND_OPERATORS[operator]) {
      throw new Error('Handlerbars Helper "ifCond" doesn\'t know the operator ' + operator);
    }

    result = COND_OPERATORS[operator](lvalue, rvalue);

    if (result) {
      return options.fn(this);
    } else {
      // TODO which case, why inverse is not defined?
      return options && options.inverse ? options.inverse(this) : '';
    }
  });

  /*
   * math
   */
  Handlebars.registerHelper('math', function(lvalue, operator, rvalue, options) {
    lvalue = parseFloat(lvalue);
    rvalue = parseFloat(rvalue);

    return {
      "+": lvalue + rvalue,
      "-": lvalue - rvalue,
      "*": lvalue * rvalue,
      "/": lvalue / rvalue,
      "%": lvalue % rvalue
    }[operator];
  });

  /*
   * format
   */
  Handlebars.registerHelper('format', function(type, value, options) {

    switch (type) {
      // 値段に「,」を挿入
      case 'number':
        if (isNaN(parseInt(value, 10))) {
            return value;
        }

        var parts = value.toString().split('.');
        parts[0] = parts[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
        value = parts.join('.');
        break;

      // キラー枠の倍率計算
      case 'magnification':
        value = Math.ceil(parseFloat(value) * 100);
        break;

      default:
        // noob
        break;
    }

    return value;
  });

  /*
   * simple date format
   *
   * "2014-10-30 08:34:58" を "%d年%d月%d日" でフォーマットすると "2014年10月30日" に。
   * 曜日とかlocaleとかは考慮されてないので必要あれば追加開発。
   */
  Handlebars.registerHelper('simpleDateFormat', function(format, date, options) {
    var regex = /(%d){1}/,
        args  = [],
        date  = new Date(date.replace(/-/g, '/'));

    args.push(
      date.getFullYear(),
      (date.getMonth() + 1),
      date.getDate(),
      date.getHours(),
      date.getMinutes(),
      date.getSeconds()
    );

    var value = format;

    for (var i = 0; i < args.length; i++) {
      value = value.replace(regex, args[i]);
    }

    return value;
  });

  /*
   * ミリ秒に変換する
   * "2099/01/01 00:00:00" を 4070876400000 に変換する
   * ★ iOS7 のDateオブジェクトが怪しい挙動なのでDateの引数に整数を入れてます
   */
  Handlebars.registerHelper('getDateAsMiliSecond', function(value, options) {

    var ymd     = value.split(' ')[0].split('-'),
        hms     = value.split(' ')[1].split(':'),
        year    = parseInt(ymd[0], 10),
        month   = (parseInt(ymd[1], 10) - 1),
        day     = parseInt(ymd[2], 10),
        hour    = parseInt(hms[0], 10),
        minute  = parseInt(hms[1], 10),
        second  = parseInt(hms[2], 10),
        date    = new Date(year,month,day,hour,minute,second);

    return date.getTime() / 1000;
  })
})();
