<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($f_siteName); ?>_帮助</title>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<style>
@charset "utf-8";
.btn{display:inline-block;margin-bottom:0;font-weight:normal;text-align:center;vertical-align:middle;cursor:pointer;background-image:none;border:1px solid transparent;white-space:nowrap;padding:6px 12px;font-size:14px;line-height:1.428571429;border-radius:3px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.btn:focus,.btn:active:focus,.btn.active:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}
.btn:hover,.btn:focus{color:#333;text-decoration:none}
.btn:active,.btn.active{outline:0;background-image:none;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,0.125);box-shadow:inset 0 3px 5px rgba(0,0,0,0.125)}
.btn.disabled,.btn[disabled],fieldset[disabled] .btn{cursor:not-allowed;pointer-events:none;opacity:.65;filter:alpha(opacity=65);-webkit-box-shadow:none;box-shadow:none}
.btn-default{color:#333;background-color:#f9f9f7;border-color:#e1e1e1}.btn-default:link,.btn-default:hover,.btn-default:focus,.btn-default:active,.btn-default.active,.open>.dropdown-toggle.btn-default{color:#333;background-color:#e3e3da;border-color:#c2c2c2}
.btn-default:active,.btn-default.active,.open>.dropdown-toggle.btn-default{background-image:none}
.btn-default.disabled,.btn-default[disabled],fieldset[disabled] .btn-default,.btn-default.disabled:hover,.btn-default[disabled]:hover,fieldset[disabled] .btn-default:hover,.btn-default.disabled:focus,.btn-default[disabled]:focus,fieldset[disabled] .btn-default:focus,.btn-default.disabled:active,.btn-default[disabled]:active,fieldset[disabled] .btn-default:active,.btn-default.disabled.active,.btn-default[disabled].active,fieldset[disabled] .btn-default.active{background-color:#f9f9f7;border-color:#e1e1e1}
.btn-default .badge{color:#f9f9f7;background-color:#333}
.btn-primary{color:#fff;background-color:#428bca;border-color:#357ebd}.btn-primary:link,.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.open>.dropdown-toggle.btn-primary{color:#fff;background-color:#3071a9;border-color:#285e8e}
.btn-primary:active,.btn-primary.active,.open>.dropdown-toggle.btn-primary{background-image:none}
.btn-primary.disabled,.btn-primary[disabled],fieldset[disabled] .btn-primary,.btn-primary.disabled:hover,.btn-primary[disabled]:hover,fieldset[disabled] .btn-primary:hover,.btn-primary.disabled:focus,.btn-primary[disabled]:focus,fieldset[disabled] .btn-primary:focus,.btn-primary.disabled:active,.btn-primary[disabled]:active,fieldset[disabled] .btn-primary:active,.btn-primary.disabled.active,.btn-primary[disabled].active,fieldset[disabled] .btn-primary.active{background-color:#428bca;border-color:#357ebd}
.btn-primary .badge{color:#428bca;background-color:#fff}
.btn-success{color:#fff;background-color:#4A90E2;border-color:#fff}.btn-success:link,.btn-success:hover,.btn-success:focus,.btn-success:active,.btn-success.active,.open>.dropdown-toggle.btn-success{color:#fff;background-color:#4281CA;border-color:#fff}
.btn-success:active,.btn-success.active,.open>.dropdown-toggle.btn-success{background-image:none}
.btn-success.disabled,.btn-success[disabled],fieldset[disabled] .btn-success,.btn-success.disabled:hover,.btn-success[disabled]:hover,fieldset[disabled] .btn-success:hover,.btn-success.disabled:focus,.btn-success[disabled]:focus,fieldset[disabled] .btn-success:focus,.btn-success.disabled:active,.btn-success[disabled]:active,fieldset[disabled] .btn-success:active,.btn-success.disabled.active,.btn-success[disabled].active,fieldset[disabled] .btn-success.active{background-color:#4A90E2;border-color:#fff}
.btn-success .badge{color:#4A90E2;background-color:#fff}
.btn-info{color:#fff;background-color:#5bc0de;border-color:#46b8da}.btn-info:link,.btn-info:hover,.btn-info:focus,.btn-info:active,.btn-info.active,.open>.dropdown-toggle.btn-info{color:#fff;background-color:#31b0d5;border-color:#269abc}
.btn-info:active,.btn-info.active,.open>.dropdown-toggle.btn-info{background-image:none}
.btn-info.disabled,.btn-info[disabled],fieldset[disabled] .btn-info,.btn-info.disabled:hover,.btn-info[disabled]:hover,fieldset[disabled] .btn-info:hover,.btn-info.disabled:focus,.btn-info[disabled]:focus,fieldset[disabled] .btn-info:focus,.btn-info.disabled:active,.btn-info[disabled]:active,fieldset[disabled] .btn-info:active,.btn-info.disabled.active,.btn-info[disabled].active,fieldset[disabled] .btn-info.active{background-color:#5bc0de;border-color:#46b8da}
.btn-info .badge{color:#5bc0de;background-color:#fff}
.btn-warning{color:#fff;background-color:#f0ad4e;border-color:#eea236}.btn-warning:link,.btn-warning:hover,.btn-warning:focus,.btn-warning:active,.btn-warning.active,.open>.dropdown-toggle.btn-warning{color:#fff;background-color:#ec971f;border-color:#d58512}
.btn-warning:active,.btn-warning.active,.open>.dropdown-toggle.btn-warning{background-image:none}
.btn-warning.disabled,.btn-warning[disabled],fieldset[disabled] .btn-warning,.btn-warning.disabled:hover,.btn-warning[disabled]:hover,fieldset[disabled] .btn-warning:hover,.btn-warning.disabled:focus,.btn-warning[disabled]:focus,fieldset[disabled] .btn-warning:focus,.btn-warning.disabled:active,.btn-warning[disabled]:active,fieldset[disabled] .btn-warning:active,.btn-warning.disabled.active,.btn-warning[disabled].active,fieldset[disabled] .btn-warning.active{background-color:#f0ad4e;border-color:#eea236}
.btn-warning .badge{color:#f0ad4e;background-color:#fff}
.btn-danger{color:#fff;background-color:#d84c31;border-color:#c94126}.btn-danger:link,.btn-danger:hover,.btn-danger:focus,.btn-danger:active,.btn-danger.active,.open>.dropdown-toggle.btn-danger{color:#fff;background-color:#b43a22;border-color:#96301c}
.btn-danger:active,.btn-danger.active,.open>.dropdown-toggle.btn-danger{background-image:none}
.btn-danger.disabled,.btn-danger[disabled],fieldset[disabled] .btn-danger,.btn-danger.disabled:hover,.btn-danger[disabled]:hover,fieldset[disabled] .btn-danger:hover,.btn-danger.disabled:focus,.btn-danger[disabled]:focus,fieldset[disabled] .btn-danger:focus,.btn-danger.disabled:active,.btn-danger[disabled]:active,fieldset[disabled] .btn-danger:active,.btn-danger.disabled.active,.btn-danger[disabled].active,fieldset[disabled] .btn-danger.active{background-color:#d84c31;border-color:#c94126}
.btn-danger .badge{color:#d84c31;background-color:#fff}
.btn-link{color:#428bca;font-weight:normal;cursor:pointer;border-radius:0}.btn-link,.btn-link:active,.btn-link[disabled],fieldset[disabled] .btn-link{background-color:transparent;-webkit-box-shadow:none;box-shadow:none}
.btn-link,.btn-link:hover,.btn-link:focus,.btn-link:active{border-color:transparent}
.btn-link:hover,.btn-link:focus{color:#2a6496;text-decoration:underline;background-color:transparent}
.btn-link[disabled]:hover,fieldset[disabled] .btn-link:hover,.btn-link[disabled]:focus,fieldset[disabled] .btn-link:focus{color:#999;text-decoration:none}
.btn-lg,.btn-group-lg>.btn{padding:10px 16px;font-size:18px;line-height:1.33;border-radius:4px}
.btn-sm,.btn-group-sm>.btn{padding:5px 10px;font-size:12px;line-height:1.5;border-radius:2px}
.btn-xs,.btn-group-xs>.btn{padding:1px 5px;font-size:12px;line-height:1.5;border-radius:2px}
.btn-block{display:block;width:100%}
.btn-block+.btn-block{margin-top:5px}
input[type="submit"].btn-block,input[type="reset"].btn-block,input[type="button"].btn-block{width:100%}
[ng\:cloak],[ng-cloak],.ng-cloak{display:none !important}
html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}
body{margin:0}
article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}
audio,canvas,progress,video{display:inline-block;vertical-align:baseline}
audio:not([controls]){display:none;height:0}
[hidden],template{display:none}
a{background:transparent}
a:active,a:hover{outline:0}
abbr[title]{border-bottom:1px dotted}
b,strong{font-weight:bold}
dfn{font-style:italic}
h1{font-size:2em;margin:.67em 0}
mark{background:#ff0;color:#000}
small{font-size:80%}
sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}
sup{top:-0.5em}
sub{bottom:-0.25em}
img{border:0}
svg:not(:root){overflow:hidden}
figure{margin:1em 40px}
hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}
pre{overflow:auto}
code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}
button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}
button{overflow:visible}
button,select{text-transform:none}
button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}
button[disabled],html input[disabled]{cursor:default}
button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}
input{line-height:normal}
input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}
input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}
input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}
input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}
fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:.35em .625em .75em}
legend{border:0;padding:0}
textarea{overflow:auto}
optgroup{font-weight:bold}
table{border-collapse:collapse;border-spacing:0}
td,th{padding:0}
*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
*:before,*:after{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
html{font-size:10px;-webkit-tap-highlight-color:rgba(0,0,0,0)}
body{font-family:"Helvetica Neue",Helvetica,"Hiragino Sans GB","Segoe UI","Microsoft Yahei",Tahoma,Arial,STHeiti,sans-serif;font-size:14px;line-height:1.428571429;color:#333;background-color:#fff}
input,button,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}
a{color:#428bca;text-decoration:none}a:hover,a:focus{color:#2a6496;text-decoration:underline}
a:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}
figure{margin:0}
img{vertical-align:middle}
.img-responsive,.carousel-inner>.item>img,.carousel-inner>.item>a>img{display:block;width:100% \9;max-width:100%;height:auto}
.img-rounded{border-radius:4px}
.img-thumbnail{padding:4px;line-height:1.428571429;background-color:#fff;border:1px solid #ddd;border-radius:3px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;display:inline-block;width:100% \9;max-width:100%;height:auto}
.img-circle{border-radius:50%}
hr{margin-top:20px;margin-bottom:20px;border:0;border-top:1px solid #eee}
.sr-only{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0}
.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}
h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{font-family:inherit;font-weight:500;line-height:1.1;color:inherit}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small,.h1 small,.h2 small,.h3 small,.h4 small,.h5 small,.h6 small,h1 .small,h2 .small,h3 .small,h4 .small,h5 .small,h6 .small,.h1 .small,.h2 .small,.h3 .small,.h4 .small,.h5 .small,.h6 .small{font-weight:normal;line-height:1;color:#999}
h1,.h1,h2,.h2,h3,.h3{margin-top:20px;margin-bottom:10px}h1 small,.h1 small,h2 small,.h2 small,h3 small,.h3 small,h1 .small,.h1 .small,h2 .small,.h2 .small,h3 .small,.h3 .small{font-size:65%}
h4,.h4,h5,.h5,h6,.h6{margin-top:10px;margin-bottom:10px}h4 small,.h4 small,h5 small,.h5 small,h6 small,.h6 small,h4 .small,.h4 .small,h5 .small,.h5 .small,h6 .small,.h6 .small{font-size:75%}
h1,.h1{font-size:36px}
h2,.h2{font-size:30px}
h3,.h3{font-size:24px}
h4,.h4{font-size:18px}
h5,.h5{font-size:14px}
h6,.h6{font-size:12px}
p{margin:0 0 10px}
.lead{margin-bottom:20px;font-size:16px;font-weight:300;line-height:1.4}@media (min-width:768px){.lead{font-size:21px}}
small,.small{font-size:85%}
cite{font-style:normal}
mark,.mark{background-color:#fcf8e3;padding:.2em}
.text-left{text-align:left}
.text-right{text-align:right}
.text-center{text-align:center}
.text-justify{text-align:justify}
.text-nowrap{white-space:nowrap}
.text-lowercase{text-transform:lowercase}
.text-uppercase{text-transform:uppercase}
.text-capitalize{text-transform:capitalize}
.text-muted{color:#999}
.text-primary{color:#428bca}a.text-primary:hover{color:#3071a9}
.text-success{color:#3c763d}a.text-success:hover{color:#2b542c}
.text-info{color:#31708f}a.text-info:hover{color:#245269}
.text-warning{color:#8a6d3b}a.text-warning:hover{color:#66512c}
.text-danger{color:#a94442}a.text-danger:hover{color:#843534}
.bg-primary{color:#fff;background-color:#428bca}a.bg-primary:hover{background-color:#3071a9}
.bg-success{background-color:#dff0d8}a.bg-success:hover{background-color:#c1e2b3}
.bg-info{background-color:#d9edf7}a.bg-info:hover{background-color:#afd9ee}
.bg-warning{background-color:#fcf8e3}a.bg-warning:hover{background-color:#f7ecb5}
.bg-danger{background-color:#f2dede}a.bg-danger:hover{background-color:#e4b9b9}
.page-header{padding-bottom:9px;margin:40px 0 20px;border-bottom:1px solid #eee}
ul,ol{margin-top:0;margin-bottom:10px}ul ul,ol ul,ul ol,ol ol{margin-bottom:0}
.list-unstyled{padding-left:0;list-style:none}
.list-inline{padding-left:0;list-style:none;margin-left:-5px}.list-inline>li{display:inline-block;padding-left:5px;padding-right:5px}
dl{margin-top:0;margin-bottom:20px}
dt,dd{line-height:1.428571429}
dt{font-weight:bold}
dd{margin-left:0}
@media (min-width:768px){.dl-horizontal dt{float:left;width:160px;clear:left;text-align:right;overflow:hidden;text-overflow:ellipsis;white-space:nowrap} .dl-horizontal dd{margin-left:180px}}
abbr[title],abbr[data-original-title]{cursor:help;border-bottom:1px dotted #999}
.initialism{font-size:90%;text-transform:uppercase}
blockquote{padding:10px 20px;margin:0 0 20px;font-size:17.5px;border-left:5px solid #eee}blockquote p:last-child,blockquote ul:last-child,blockquote ol:last-child{margin-bottom:0}
blockquote footer,blockquote small,blockquote .small{display:block;font-size:80%;line-height:1.428571429;color:#999}blockquote footer:before,blockquote small:before,blockquote .small:before{content:'\2014 \00A0'}
.blockquote-reverse,blockquote.pull-right{padding-right:15px;padding-left:0;border-right:5px solid #eee;border-left:0;text-align:right}.blockquote-reverse footer:before,blockquote.pull-right footer:before,.blockquote-reverse small:before,blockquote.pull-right small:before,.blockquote-reverse .small:before,blockquote.pull-right .small:before{content:''}
.blockquote-reverse footer:after,blockquote.pull-right footer:after,.blockquote-reverse small:after,blockquote.pull-right small:after,.blockquote-reverse .small:after,blockquote.pull-right .small:after{content:'\00A0 \2014'}
blockquote:before,blockquote:after{content:""}
address{margin-bottom:20px;font-style:normal;line-height:1.428571429}
code,kbd,pre,samp{font-family:Menlo,Monaco,Consolas,"Courier New",monospace}
code{padding:2px 4px;font-size:90%;color:#c7254e;background-color:#f9f2f4;border-radius:3px}
kbd{padding:2px 4px;font-size:90%;color:#fff;background-color:#333;border-radius:2px;box-shadow:inset 0 -1px 0 rgba(0,0,0,0.25)}kbd kbd{padding:0;font-size:100%;box-shadow:none}
pre{display:block;padding:9.5px;margin:0 0 10px;font-size:13px;line-height:1.428571429;word-break:break-all;word-wrap:break-word;color:#333;background-color:#f5f5f5;border:1px solid #ccc;border-radius:3px}pre code{padding:0;font-size:inherit;color:inherit;white-space:pre-wrap;background-color:transparent;border-radius:0}
.pre-scrollable{max-height:340px;overflow-y:scroll}
.container{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}
.container-fluid{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}
.row{margin-left:-15px;margin-right:-15px}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{position:relative;min-height:1px;padding-left:15px;padding-right:15px}
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12{float:left}
.col-xs-12{width:100%}
.col-xs-11{width:91.66666666666666%}
.col-xs-10{width:83.33333333333334%}
.col-xs-9{width:75%}
.col-xs-8{width:66.66666666666666%}
.col-xs-7{width:58.333333333333336%}
.col-xs-6{width:50%}
.col-xs-5{width:41.66666666666667%}
.col-xs-4{width:33.33333333333333%}
.col-xs-3{width:25%}
.col-xs-2{width:16.666666666666664%}
.col-xs-1{width:8.333333333333332%}
.col-xs-pull-12{right:100%}
.col-xs-pull-11{right:91.66666666666666%}
.col-xs-pull-10{right:83.33333333333334%}
.col-xs-pull-9{right:75%}
.col-xs-pull-8{right:66.66666666666666%}
.col-xs-pull-7{right:58.333333333333336%}
.col-xs-pull-6{right:50%}
.col-xs-pull-5{right:41.66666666666667%}
.col-xs-pull-4{right:33.33333333333333%}
.col-xs-pull-3{right:25%}
.col-xs-pull-2{right:16.666666666666664%}
.col-xs-pull-1{right:8.333333333333332%}
.col-xs-pull-0{right:auto}
.col-xs-push-12{left:100%}
.col-xs-push-11{left:91.66666666666666%}
.col-xs-push-10{left:83.33333333333334%}
.col-xs-push-9{left:75%}
.col-xs-push-8{left:66.66666666666666%}
.col-xs-push-7{left:58.333333333333336%}
.col-xs-push-6{left:50%}
.col-xs-push-5{left:41.66666666666667%}
.col-xs-push-4{left:33.33333333333333%}
.col-xs-push-3{left:25%}
.col-xs-push-2{left:16.666666666666664%}
.col-xs-push-1{left:8.333333333333332%}
.col-xs-push-0{left:auto}
.col-xs-offset-12{margin-left:100%}
.col-xs-offset-11{margin-left:91.66666666666666%}
.col-xs-offset-10{margin-left:83.33333333333334%}
.col-xs-offset-9{margin-left:75%}
.col-xs-offset-8{margin-left:66.66666666666666%}
.col-xs-offset-7{margin-left:58.333333333333336%}
.col-xs-offset-6{margin-left:50%}
.col-xs-offset-5{margin-left:41.66666666666667%}
.col-xs-offset-4{margin-left:33.33333333333333%}
.col-xs-offset-3{margin-left:25%}
.col-xs-offset-2{margin-left:16.666666666666664%}
.col-xs-offset-1{margin-left:8.333333333333332%}
.col-xs-offset-0{margin-left:0}
@media (min-width:768px){.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12{float:left} .col-sm-12{width:100%} .col-sm-11{width:91.66666666666666%} .col-sm-10{width:83.33333333333334%} .col-sm-9{width:75%} .col-sm-8{width:66.66666666666666%} .col-sm-7{width:58.333333333333336%} .col-sm-6{width:50%} .col-sm-5{width:41.66666666666667%} .col-sm-4{width:33.33333333333333%} .col-sm-3{width:25%} .col-sm-2{width:16.666666666666664%} .col-sm-1{width:8.333333333333332%} .col-sm-pull-12{right:100%} .col-sm-pull-11{right:91.66666666666666%} .col-sm-pull-10{right:83.33333333333334%} .col-sm-pull-9{right:75%} .col-sm-pull-8{right:66.66666666666666%} .col-sm-pull-7{right:58.333333333333336%} .col-sm-pull-6{right:50%} .col-sm-pull-5{right:41.66666666666667%} .col-sm-pull-4{right:33.33333333333333%} .col-sm-pull-3{right:25%} .col-sm-pull-2{right:16.666666666666664%} .col-sm-pull-1{right:8.333333333333332%} .col-sm-pull-0{right:auto} .col-sm-push-12{left:100%} .col-sm-push-11{left:91.66666666666666%} .col-sm-push-10{left:83.33333333333334%} .col-sm-push-9{left:75%} .col-sm-push-8{left:66.66666666666666%} .col-sm-push-7{left:58.333333333333336%} .col-sm-push-6{left:50%} .col-sm-push-5{left:41.66666666666667%} .col-sm-push-4{left:33.33333333333333%} .col-sm-push-3{left:25%} .col-sm-push-2{left:16.666666666666664%} .col-sm-push-1{left:8.333333333333332%} .col-sm-push-0{left:auto} .col-sm-offset-12{margin-left:100%} .col-sm-offset-11{margin-left:91.66666666666666%} .col-sm-offset-10{margin-left:83.33333333333334%} .col-sm-offset-9{margin-left:75%} .col-sm-offset-8{margin-left:66.66666666666666%} .col-sm-offset-7{margin-left:58.333333333333336%} .col-sm-offset-6{margin-left:50%} .col-sm-offset-5{margin-left:41.66666666666667%} .col-sm-offset-4{margin-left:33.33333333333333%} .col-sm-offset-3{margin-left:25%} .col-sm-offset-2{margin-left:16.666666666666664%} .col-sm-offset-1{margin-left:8.333333333333332%} .col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12{float:left} .col-md-12{width:100%} .col-md-11{width:91.66666666666666%} .col-md-10{width:83.33333333333334%} .col-md-9{width:75%} .col-md-8{width:66.66666666666666%} .col-md-7{width:58.333333333333336%} .col-md-6{width:50%} .col-md-5{width:41.66666666666667%} .col-md-4{width:33.33333333333333%} .col-md-3{width:25%} .col-md-2{width:16.666666666666664%} .col-md-1{width:8.333333333333332%} .col-md-pull-12{right:100%} .col-md-pull-11{right:91.66666666666666%} .col-md-pull-10{right:83.33333333333334%} .col-md-pull-9{right:75%} .col-md-pull-8{right:66.66666666666666%} .col-md-pull-7{right:58.333333333333336%} .col-md-pull-6{right:50%} .col-md-pull-5{right:41.66666666666667%} .col-md-pull-4{right:33.33333333333333%} .col-md-pull-3{right:25%} .col-md-pull-2{right:16.666666666666664%} .col-md-pull-1{right:8.333333333333332%} .col-md-pull-0{right:auto} .col-md-push-12{left:100%} .col-md-push-11{left:91.66666666666666%} .col-md-push-10{left:83.33333333333334%} .col-md-push-9{left:75%} .col-md-push-8{left:66.66666666666666%} .col-md-push-7{left:58.333333333333336%} .col-md-push-6{left:50%} .col-md-push-5{left:41.66666666666667%} .col-md-push-4{left:33.33333333333333%} .col-md-push-3{left:25%} .col-md-push-2{left:16.666666666666664%} .col-md-push-1{left:8.333333333333332%} .col-md-push-0{left:auto} .col-md-offset-12{margin-left:100%} .col-md-offset-11{margin-left:91.66666666666666%} .col-md-offset-10{margin-left:83.33333333333334%} .col-md-offset-9{margin-left:75%} .col-md-offset-8{margin-left:66.66666666666666%} .col-md-offset-7{margin-left:58.333333333333336%} .col-md-offset-6{margin-left:50%} .col-md-offset-5{margin-left:41.66666666666667%} .col-md-offset-4{margin-left:33.33333333333333%} .col-md-offset-3{margin-left:25%} .col-md-offset-2{margin-left:16.666666666666664%} .col-md-offset-1{margin-left:8.333333333333332%} .col-md-offset-0{margin-left:0}}@media (min-width:1200px){.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12{float:left} .col-lg-12{width:100%} .col-lg-11{width:91.66666666666666%} .col-lg-10{width:83.33333333333334%} .col-lg-9{width:75%} .col-lg-8{width:66.66666666666666%} .col-lg-7{width:58.333333333333336%} .col-lg-6{width:50%} .col-lg-5{width:41.66666666666667%} .col-lg-4{width:33.33333333333333%} .col-lg-3{width:25%} .col-lg-2{width:16.666666666666664%} .col-lg-1{width:8.333333333333332%} .col-lg-pull-12{right:100%} .col-lg-pull-11{right:91.66666666666666%} .col-lg-pull-10{right:83.33333333333334%} .col-lg-pull-9{right:75%} .col-lg-pull-8{right:66.66666666666666%} .col-lg-pull-7{right:58.333333333333336%} .col-lg-pull-6{right:50%} .col-lg-pull-5{right:41.66666666666667%} .col-lg-pull-4{right:33.33333333333333%} .col-lg-pull-3{right:25%} .col-lg-pull-2{right:16.666666666666664%} .col-lg-pull-1{right:8.333333333333332%} .col-lg-pull-0{right:auto} .col-lg-push-12{left:100%} .col-lg-push-11{left:91.66666666666666%} .col-lg-push-10{left:83.33333333333334%} .col-lg-push-9{left:75%} .col-lg-push-8{left:66.66666666666666%} .col-lg-push-7{left:58.333333333333336%} .col-lg-push-6{left:50%} .col-lg-push-5{left:41.66666666666667%} .col-lg-push-4{left:33.33333333333333%} .col-lg-push-3{left:25%} .col-lg-push-2{left:16.666666666666664%} .col-lg-push-1{left:8.333333333333332%} .col-lg-push-0{left:auto} .col-lg-offset-12{margin-left:100%} .col-lg-offset-11{margin-left:91.66666666666666%} .col-lg-offset-10{margin-left:83.33333333333334%} .col-lg-offset-9{margin-left:75%} .col-lg-offset-8{margin-left:66.66666666666666%} .col-lg-offset-7{margin-left:58.333333333333336%} .col-lg-offset-6{margin-left:50%} .col-lg-offset-5{margin-left:41.66666666666667%} .col-lg-offset-4{margin-left:33.33333333333333%} .col-lg-offset-3{margin-left:25%} .col-lg-offset-2{margin-left:16.666666666666664%} .col-lg-offset-1{margin-left:8.333333333333332%} .col-lg-offset-0{margin-left:0}}table{background-color:transparent}
th{text-align:left}
.table{width:100%;max-width:100%;margin-bottom:20px}.table>thead>tr>th,.table>tbody>tr>th,.table>tfoot>tr>th,.table>thead>tr>td,.table>tbody>tr>td,.table>tfoot>tr>td{padding:8px;line-height:1.428571429;vertical-align:top;border-top:1px solid #ddd}
.table>thead>tr>th{vertical-align:bottom;border-bottom:2px solid #ddd}
.table>caption+thead>tr:first-child>th,.table>colgroup+thead>tr:first-child>th,.table>thead:first-child>tr:first-child>th,.table>caption+thead>tr:first-child>td,.table>colgroup+thead>tr:first-child>td,.table>thead:first-child>tr:first-child>td{border-top:0}
.table>tbody+tbody{border-top:2px solid #ddd}
.table .table{background-color:#fff}
.table-condensed>thead>tr>th,.table-condensed>tbody>tr>th,.table-condensed>tfoot>tr>th,.table-condensed>thead>tr>td,.table-condensed>tbody>tr>td,.table-condensed>tfoot>tr>td{padding:5px}
.table-bordered{border:1px solid #ddd}.table-bordered>thead>tr>th,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>tbody>tr>td,.table-bordered>tfoot>tr>td{border:1px solid #ddd}
.table-bordered>thead>tr>th,.table-bordered>thead>tr>td{border-bottom-width:2px}
.table-striped>tbody>tr:nth-child(odd)>td,.table-striped>tbody>tr:nth-child(odd)>th{background-color:#f9f9f9}
.table-hover>tbody>tr:hover>td,.table-hover>tbody>tr:hover>th{background-color:#f5f5f5}
table col[class*="col-"]{position:static;float:none;display:table-column}
table td[class*="col-"],table th[class*="col-"]{position:static;float:none;display:table-cell}
.table>thead>tr>td.active,.table>tbody>tr>td.active,.table>tfoot>tr>td.active,.table>thead>tr>th.active,.table>tbody>tr>th.active,.table>tfoot>tr>th.active,.table>thead>tr.active>td,.table>tbody>tr.active>td,.table>tfoot>tr.active>td,.table>thead>tr.active>th,.table>tbody>tr.active>th,.table>tfoot>tr.active>th{background-color:#f5f5f5}
.table-hover>tbody>tr>td.active:hover,.table-hover>tbody>tr>th.active:hover,.table-hover>tbody>tr.active:hover>td,.table-hover>tbody>tr:hover>.active,.table-hover>tbody>tr.active:hover>th{background-color:#e8e8e8}
.table>thead>tr>td.success,.table>tbody>tr>td.success,.table>tfoot>tr>td.success,.table>thead>tr>th.success,.table>tbody>tr>th.success,.table>tfoot>tr>th.success,.table>thead>tr.success>td,.table>tbody>tr.success>td,.table>tfoot>tr.success>td,.table>thead>tr.success>th,.table>tbody>tr.success>th,.table>tfoot>tr.success>th{background-color:#dff0d8}
.table-hover>tbody>tr>td.success:hover,.table-hover>tbody>tr>th.success:hover,.table-hover>tbody>tr.success:hover>td,.table-hover>tbody>tr:hover>.success,.table-hover>tbody>tr.success:hover>th{background-color:#d0e9c6}
.table>thead>tr>td.info,.table>tbody>tr>td.info,.table>tfoot>tr>td.info,.table>thead>tr>th.info,.table>tbody>tr>th.info,.table>tfoot>tr>th.info,.table>thead>tr.info>td,.table>tbody>tr.info>td,.table>tfoot>tr.info>td,.table>thead>tr.info>th,.table>tbody>tr.info>th,.table>tfoot>tr.info>th{background-color:#d9edf7}
.table-hover>tbody>tr>td.info:hover,.table-hover>tbody>tr>th.info:hover,.table-hover>tbody>tr.info:hover>td,.table-hover>tbody>tr:hover>.info,.table-hover>tbody>tr.info:hover>th{background-color:#c4e3f3}
.table>thead>tr>td.warning,.table>tbody>tr>td.warning,.table>tfoot>tr>td.warning,.table>thead>tr>th.warning,.table>tbody>tr>th.warning,.table>tfoot>tr>th.warning,.table>thead>tr.warning>td,.table>tbody>tr.warning>td,.table>tfoot>tr.warning>td,.table>thead>tr.warning>th,.table>tbody>tr.warning>th,.table>tfoot>tr.warning>th{background-color:#fcf8e3}
.table-hover>tbody>tr>td.warning:hover,.table-hover>tbody>tr>th.warning:hover,.table-hover>tbody>tr.warning:hover>td,.table-hover>tbody>tr:hover>.warning,.table-hover>tbody>tr.warning:hover>th{background-color:#faf2cc}
.table>thead>tr>td.danger,.table>tbody>tr>td.danger,.table>tfoot>tr>td.danger,.table>thead>tr>th.danger,.table>tbody>tr>th.danger,.table>tfoot>tr>th.danger,.table>thead>tr.danger>td,.table>tbody>tr.danger>td,.table>tfoot>tr.danger>td,.table>thead>tr.danger>th,.table>tbody>tr.danger>th,.table>tfoot>tr.danger>th{background-color:#f2dede}
.table-hover>tbody>tr>td.danger:hover,.table-hover>tbody>tr>th.danger:hover,.table-hover>tbody>tr.danger:hover>td,.table-hover>tbody>tr:hover>.danger,.table-hover>tbody>tr.danger:hover>th{background-color:#ebcccc}
@media screen and (max-width:767px){.table-responsive{width:100%;margin-bottom:15px;overflow-y:hidden;overflow-x:auto;-ms-overflow-style:-ms-autohiding-scrollbar;border:1px solid #ddd;-webkit-overflow-scrolling:touch}.table-responsive>.table{margin-bottom:0}.table-responsive>.table>thead>tr>th,.table-responsive>.table>tbody>tr>th,.table-responsive>.table>tfoot>tr>th,.table-responsive>.table>thead>tr>td,.table-responsive>.table>tbody>tr>td,.table-responsive>.table>tfoot>tr>td{white-space:nowrap} .table-responsive>.table-bordered{border:0}.table-responsive>.table-bordered>thead>tr>th:first-child,.table-responsive>.table-bordered>tbody>tr>th:first-child,.table-responsive>.table-bordered>tfoot>tr>th:first-child,.table-responsive>.table-bordered>thead>tr>td:first-child,.table-responsive>.table-bordered>tbody>tr>td:first-child,.table-responsive>.table-bordered>tfoot>tr>td:first-child{border-left:0} .table-responsive>.table-bordered>thead>tr>th:last-child,.table-responsive>.table-bordered>tbody>tr>th:last-child,.table-responsive>.table-bordered>tfoot>tr>th:last-child,.table-responsive>.table-bordered>thead>tr>td:last-child,.table-responsive>.table-bordered>tbody>tr>td:last-child,.table-responsive>.table-bordered>tfoot>tr>td:last-child{border-right:0} .table-responsive>.table-bordered>tbody>tr:last-child>th,.table-responsive>.table-bordered>tfoot>tr:last-child>th,.table-responsive>.table-bordered>tbody>tr:last-child>td,.table-responsive>.table-bordered>tfoot>tr:last-child>td{border-bottom:0}}
fieldset{padding:0;margin:0;border:0;min-width:0}
legend{display:block;width:100%;padding:0;margin-bottom:20px;font-size:21px;line-height:inherit;color:#333;border:0;border-bottom:1px solid #e5e5e5}
label{display:inline-block;max-width:100%;margin-bottom:5px;font-weight:bold}
input[type="search"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
input[type="radio"],input[type="checkbox"]{margin:4px 0 0;margin-top:1px \9;line-height:normal}
input[type="file"]{display:block}
input[type="range"]{display:block;width:100%}
select[multiple],select[size]{height:auto}
input[type="file"]:focus,input[type="radio"]:focus,input[type="checkbox"]:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}
output{display:block;padding-top:7px;font-size:14px;line-height:1.428571429;color:#555}
.form-control{display:block;width:100%;height:34px;padding:6px 12px;font-size:14px;line-height:1.428571429;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:3px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);-webkit-transition:border-color ease-in-out .15s, box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s, box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s, box-shadow ease-in-out .15s}.form-control:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6)}
.form-control::-moz-placeholder{color:#999;opacity:1}
.form-control:-ms-input-placeholder{color:#999}
.form-control::-webkit-input-placeholder{color:#999}
.form-control[disabled],.form-control[readonly],fieldset[disabled] .form-control{cursor:not-allowed;background-color:#eee;opacity:1}
textarea.form-control{height:auto}
input[type="search"]{-webkit-appearance:none}
input[type="date"],input[type="time"],input[type="datetime-local"],input[type="month"]{line-height:34px;line-height:1.428571429 \0}input[type="date"].input-sm,input[type="time"].input-sm,input[type="datetime-local"].input-sm,input[type="month"].input-sm{line-height:30px}
input[type="date"].input-lg,input[type="time"].input-lg,input[type="datetime-local"].input-lg,input[type="month"].input-lg{line-height:46px}
.form-group{margin-bottom:15px}
.radio,.checkbox{position:relative;display:block;min-height:20px;margin-top:10px;margin-bottom:10px}.radio label,.checkbox label{padding-left:20px;margin-bottom:0;font-weight:normal;cursor:pointer}
.radio input[type="radio"],.radio-inline input[type="radio"],.checkbox input[type="checkbox"],.checkbox-inline input[type="checkbox"]{position:absolute;margin-left:-20px;margin-top:4px \9}
.radio+.radio,.checkbox+.checkbox{margin-top:-5px}
.radio-inline,.checkbox-inline{display:inline-block;padding-left:20px;margin-bottom:0;vertical-align:middle;font-weight:normal;cursor:pointer}
.radio-inline+.radio-inline,.checkbox-inline+.checkbox-inline{margin-top:0;margin-left:10px}
input[type="radio"][disabled],input[type="checkbox"][disabled],input[type="radio"].disabled,input[type="checkbox"].disabled,fieldset[disabled] input[type="radio"],fieldset[disabled] input[type="checkbox"]{cursor:not-allowed}
.radio-inline.disabled,.checkbox-inline.disabled,fieldset[disabled] .radio-inline,fieldset[disabled] .checkbox-inline{cursor:not-allowed}
.radio.disabled label,.checkbox.disabled label,fieldset[disabled] .radio label,fieldset[disabled] .checkbox label{cursor:not-allowed}
.form-control-static{padding-top:7px;padding-bottom:7px;margin-bottom:0}.form-control-static.input-lg,.form-control-static.input-sm{padding-left:0;padding-right:0}
.input-sm,.form-horizontal .form-group-sm .form-control{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:2px}select.input-sm{height:30px;line-height:30px}
textarea.input-sm,select[multiple].input-sm{height:auto}
.input-lg,.form-horizontal .form-group-lg .form-control{height:46px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:4px}select.input-lg{height:46px;line-height:46px}
textarea.input-lg,select[multiple].input-lg{height:auto}
.has-feedback{position:relative}.has-feedback .form-control{padding-right:42.5px}
.form-control-feedback{position:absolute;top:25px;right:0;z-index:2;display:block;width:34px;height:34px;line-height:34px;text-align:center}
.input-lg+.form-control-feedback{width:46px;height:46px;line-height:46px}
.input-sm+.form-control-feedback{width:30px;height:30px;line-height:30px}
.has-success .help-block,.has-success .control-label,.has-success .radio,.has-success .checkbox,.has-success .radio-inline,.has-success .checkbox-inline{color:#3c763d}
.has-success .form-control{border-color:#3c763d;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);box-shadow:inset 0 1px 1px rgba(0,0,0,0.075)}.has-success .form-control:focus{border-color:#2b542c;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #67b168;box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #67b168}
.has-success .input-group-addon{color:#3c763d;border-color:#3c763d;background-color:#dff0d8}
.has-success .form-control-feedback{color:#3c763d}
.has-warning .help-block,.has-warning .control-label,.has-warning .radio,.has-warning .checkbox,.has-warning .radio-inline,.has-warning .checkbox-inline{color:#8a6d3b}
.has-warning .form-control{border-color:#8a6d3b;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);box-shadow:inset 0 1px 1px rgba(0,0,0,0.075)}.has-warning .form-control:focus{border-color:#66512c;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #c0a16b;box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #c0a16b}
.has-warning .input-group-addon{color:#8a6d3b;border-color:#8a6d3b;background-color:#fcf8e3}
.has-warning .form-control-feedback{color:#8a6d3b}
.has-error .help-block,.has-error .control-label,.has-error .radio,.has-error .checkbox,.has-error .radio-inline,.has-error .checkbox-inline{color:#a94442}
.has-error .form-control{border-color:#a94442;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);box-shadow:inset 0 1px 1px rgba(0,0,0,0.075)}.has-error .form-control:focus{border-color:#843534;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #ce8483;box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #ce8483}
.has-error .input-group-addon{color:#a94442;border-color:#a94442;background-color:#f2dede}
.has-error .form-control-feedback{color:#a94442}
.has-feedback label.sr-only~.form-control-feedback{top:0}
.help-block{display:block;margin-top:5px;margin-bottom:10px;color:#737373}
@media (min-width:768px){.form-inline .form-group{display:inline-block;margin-bottom:0;vertical-align:middle} .form-inline .form-control{display:inline-block;width:auto;vertical-align:middle} .form-inline .input-group{display:inline-table;vertical-align:middle}.form-inline .input-group .input-group-addon,.form-inline .input-group .input-group-btn,.form-inline .input-group .form-control{width:auto} .form-inline .input-group>.form-control{width:100%} .form-inline .control-label{margin-bottom:0;vertical-align:middle} .form-inline .radio,.form-inline .checkbox{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.form-inline .radio label,.form-inline .checkbox label{padding-left:0} .form-inline .radio input[type="radio"],.form-inline .checkbox input[type="checkbox"]{position:relative;margin-left:0} .form-inline .has-feedback .form-control-feedback{top:0}}
.form-horizontal .radio,.form-horizontal .checkbox,.form-horizontal .radio-inline,.form-horizontal .checkbox-inline{margin-top:0;margin-bottom:0;padding-top:7px}
.form-horizontal .radio,.form-horizontal .checkbox{min-height:27px}
.form-horizontal .form-group{margin-left:-15px;margin-right:-15px}
@media (min-width:768px){.form-horizontal .control-label{text-align:right;margin-bottom:0;padding-top:7px}}.form-horizontal .has-feedback .form-control-feedback{top:0;right:15px}
@media (min-width:768px){.form-horizontal .form-group-lg .control-label{padding-top:14.3px}}
@media (min-width:768px){.form-horizontal .form-group-sm .control-label{padding-top:6px}}
.fade{opacity:0;-webkit-transition:opacity .15s linear;-o-transition:opacity .15s linear;transition:opacity .15s linear}.fade.in{opacity:1}
.collapse{display:none}.collapse.in{display:block}
tr.collapse.in{display:table-row}
tbody.collapse.in{display:table-row-group}
.collapsing{position:relative;height:0;overflow:hidden;-webkit-transition:height .35s ease;-o-transition:height .35s ease;transition:height .35s ease}
.caret{display:inline-block;width:0;height:0;margin-left:2px;vertical-align:middle;border-top:4px solid;border-right:4px solid transparent;border-left:4px solid transparent}
.dropdown{position:relative}
.dropdown-toggle:focus{outline:0}
.dropdown-menu{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:160px;padding:5px 0;margin:2px 0 0;list-style:none;font-size:14px;text-align:left;background-color:#fff;border:1px solid #ccc;border:1px solid rgba(0,0,0,0.15);border-radius:3px;-webkit-box-shadow:0 6px 12px rgba(0,0,0,0.175);box-shadow:0 6px 12px rgba(0,0,0,0.175);background-clip:padding-box}.dropdown-menu.pull-right{right:0;left:auto}
.dropdown-menu .divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}
.dropdown-menu>li>a{display:block;padding:3px 20px;clear:both;font-weight:normal;line-height:1.428571429;color:#333;white-space:nowrap}
.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus{text-decoration:none;color:#262626;background-color:#f5f5f5}
.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus{color:#fff;text-decoration:none;outline:0;background-color:#428bca}
.dropdown-menu>.disabled>a,.dropdown-menu>.disabled>a:hover,.dropdown-menu>.disabled>a:focus{color:#999}
.dropdown-menu>.disabled>a:hover,.dropdown-menu>.disabled>a:focus{text-decoration:none;background-color:transparent;background-image:none;filter:progid:DXImageTransform.Microsoft.gradient(enabled = false);cursor:not-allowed}
.open>.dropdown-menu{display:block}
.open>a{outline:0}
.dropdown-menu-right{left:auto;right:0}
.dropdown-menu-left{left:0;right:auto}
.dropdown-header{display:block;padding:3px 20px;font-size:12px;line-height:1.428571429;color:#999;white-space:nowrap}
.dropdown-backdrop{position:fixed;left:0;right:0;bottom:0;top:0;z-index:990}
.pull-right>.dropdown-menu{right:0;left:auto}
.dropup .caret,.navbar-fixed-bottom .dropdown .caret{border-top:0;border-bottom:4px solid;content:""}
.dropup .dropdown-menu,.navbar-fixed-bottom .dropdown .dropdown-menu{top:auto;bottom:100%;margin-bottom:1px}
@media (min-width:768px){.navbar-right .dropdown-menu{left:auto;right:0} .navbar-right .dropdown-menu-left{left:0;right:auto}}.btn-group,.btn-group-vertical{position:relative;display:inline-block;vertical-align:middle}.btn-group>.btn,.btn-group-vertical>.btn{position:relative;float:left}.btn-group>.btn:hover,.btn-group-vertical>.btn:hover,.btn-group>.btn:focus,.btn-group-vertical>.btn:focus,.btn-group>.btn:active,.btn-group-vertical>.btn:active,.btn-group>.btn.active,.btn-group-vertical>.btn.active{z-index:2}
.btn-group>.btn:focus,.btn-group-vertical>.btn:focus{outline:0}
.btn-group .btn+.btn,.btn-group .btn+.btn-group,.btn-group .btn-group+.btn,.btn-group .btn-group+.btn-group{margin-left:-1px}
.btn-toolbar{margin-left:-5px}.btn-toolbar .btn-group,.btn-toolbar .input-group{float:left}
.btn-toolbar>.btn,.btn-toolbar>.btn-group,.btn-toolbar>.input-group{margin-left:5px}
.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle){border-radius:0}
.btn-group>.btn:first-child{margin-left:0}.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle){border-bottom-right-radius:0;border-top-right-radius:0}
.btn-group>.btn:last-child:not(:first-child),.btn-group>.dropdown-toggle:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}
.btn-group>.btn-group{float:left}
.btn-group>.btn-group:not(:first-child):not(:last-child)>.btn{border-radius:0}
.btn-group>.btn-group:first-child>.btn:last-child,.btn-group>.btn-group:first-child>.dropdown-toggle{border-bottom-right-radius:0;border-top-right-radius:0}
.btn-group>.btn-group:last-child>.btn:first-child{border-bottom-left-radius:0;border-top-left-radius:0}
.btn-group .dropdown-toggle:active,.btn-group.open .dropdown-toggle{outline:0}
.btn-group>.btn+.dropdown-toggle{padding-left:8px;padding-right:8px}
.btn-group>.btn-lg+.dropdown-toggle{padding-left:12px;padding-right:12px}
.btn-group.open .dropdown-toggle{-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,0.125);box-shadow:inset 0 3px 5px rgba(0,0,0,0.125)}.btn-group.open .dropdown-toggle.btn-link{-webkit-box-shadow:none;box-shadow:none}
.btn .caret{margin-left:0}
.btn-lg .caret{border-width:5px 5px 0;border-bottom-width:0}
.dropup .btn-lg .caret{border-width:0 5px 5px}
.btn-group-vertical>.btn,.btn-group-vertical>.btn-group,.btn-group-vertical>.btn-group>.btn{display:block;float:none;width:100%;max-width:100%}
.btn-group-vertical>.btn-group>.btn{float:none}
.btn-group-vertical>.btn+.btn,.btn-group-vertical>.btn+.btn-group,.btn-group-vertical>.btn-group+.btn,.btn-group-vertical>.btn-group+.btn-group{margin-top:-1px;margin-left:0}
.btn-group-vertical>.btn:not(:first-child):not(:last-child){border-radius:0}
.btn-group-vertical>.btn:first-child:not(:last-child){border-top-right-radius:3px;border-bottom-right-radius:0;border-bottom-left-radius:0}
.btn-group-vertical>.btn:last-child:not(:first-child){border-bottom-left-radius:3px;border-top-right-radius:0;border-top-left-radius:0}
.btn-group-vertical>.btn-group:not(:first-child):not(:last-child)>.btn{border-radius:0}
.btn-group-vertical>.btn-group:first-child:not(:last-child)>.btn:last-child,.btn-group-vertical>.btn-group:first-child:not(:last-child)>.dropdown-toggle{border-bottom-right-radius:0;border-bottom-left-radius:0}
.btn-group-vertical>.btn-group:last-child:not(:first-child)>.btn:first-child{border-top-right-radius:0;border-top-left-radius:0}
.btn-group-justified{display:table;width:100%;table-layout:fixed;border-collapse:separate}.btn-group-justified>.btn,.btn-group-justified>.btn-group{float:none;display:table-cell;width:1%}
.btn-group-justified>.btn-group .btn{width:100%}
.btn-group-justified>.btn-group .dropdown-menu{left:auto}
[data-toggle="buttons"]>.btn>input[type="radio"],[data-toggle="buttons"]>.btn>input[type="checkbox"]{position:absolute;z-index:-1;opacity:0;filter:alpha(opacity=0)}
.input-group{position:relative;display:table;border-collapse:separate}.input-group[class*="col-"]{float:none;padding-left:0;padding-right:0}
.input-group .form-control{position:relative;z-index:2;float:left;width:100%;margin-bottom:0}
.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:46px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:4px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:46px;line-height:46px}
textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn,select[multiple].input-group-lg>.form-control,select[multiple].input-group-lg>.input-group-addon,select[multiple].input-group-lg>.input-group-btn>.btn{height:auto}
.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:2px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}
textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn,select[multiple].input-group-sm>.form-control,select[multiple].input-group-sm>.input-group-addon,select[multiple].input-group-sm>.input-group-btn>.btn{height:auto}
.input-group-addon,.input-group-btn,.input-group .form-control{display:table-cell}.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child),.input-group .form-control:not(:first-child):not(:last-child){border-radius:0}
.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}
.input-group-addon{padding:6px 12px;font-size:14px;font-weight:normal;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:3px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:2px}
.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:4px}
.input-group-addon input[type="radio"],.input-group-addon input[type="checkbox"]{margin-top:0}
.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.btn-group>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle),.input-group-btn:last-child>.btn-group:not(:last-child)>.btn{border-bottom-right-radius:0;border-top-right-radius:0}
.input-group-addon:first-child{border-right:0}
.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:last-child>.btn,.input-group-btn:last-child>.btn-group>.btn,.input-group-btn:last-child>.dropdown-toggle,.input-group-btn:first-child>.btn:not(:first-child),.input-group-btn:first-child>.btn-group:not(:first-child)>.btn{border-bottom-left-radius:0;border-top-left-radius:0}
.input-group-addon:last-child{border-left:0}
.input-group-btn{position:relative;font-size:0;white-space:nowrap}.input-group-btn>.btn{position:relative}.input-group-btn>.btn+.btn{margin-left:-1px}
.input-group-btn>.btn:hover,.input-group-btn>.btn:focus,.input-group-btn>.btn:active{z-index:2}
.input-group-btn:first-child>.btn,.input-group-btn:first-child>.btn-group{margin-right:-1px}
.input-group-btn:last-child>.btn,.input-group-btn:last-child>.btn-group{margin-left:-1px}
.nav{margin-bottom:0;padding-left:0;list-style:none}.nav>li{position:relative;display:block}.nav>li>a{position:relative;display:block;padding:10px 15px}.nav>li>a:hover,.nav>li>a:focus{text-decoration:none;background-color:#eee}
.nav>li.disabled>a{color:#999}.nav>li.disabled>a:hover,.nav>li.disabled>a:focus{color:#999;text-decoration:none;background-color:transparent;cursor:not-allowed}
.nav .open>a,.nav .open>a:hover,.nav .open>a:focus{background-color:#eee;border-color:#428bca}
.nav .nav-divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}
.nav>li>a>img{max-width:none}
.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs>li{float:left;margin-bottom:-1px}.nav-tabs>li>a{margin-right:2px;line-height:1.428571429;border:1px solid transparent;border-radius:3px 3px 0 0}.nav-tabs>li>a:hover{border-color:#eee #eee #ddd}
.nav-tabs>li.active>a,.nav-tabs>li.active>a:hover,.nav-tabs>li.active>a:focus{color:#555;background-color:#fff;border:1px solid #ddd;border-bottom-color:transparent;cursor:default}
.nav-tabs.nav-justified{width:100%;border-bottom:0}.nav-tabs.nav-justified>li{float:none}.nav-tabs.nav-justified>li>a{text-align:center;margin-bottom:5px}
.nav-tabs.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}
@media (min-width:768px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-right:0;border-radius:3px}
.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:hover,.nav-tabs.nav-justified>.active>a:focus{border:1px solid #ddd}
@media (min-width:768px){.nav-tabs.nav-justified>li>a{border-bottom:1px solid #ddd;border-radius:3px 3px 0 0} .nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:hover,.nav-tabs.nav-justified>.active>a:focus{border-bottom-color:#fff}}
.nav-pills>li{float:left}.nav-pills>li>a{border-radius:3px}
.nav-pills>li+li{margin-left:2px}
.nav-pills>li.active>a,.nav-pills>li.active>a:hover,.nav-pills>li.active>a:focus{color:#fff;background-color:#428bca}
.nav-stacked>li{float:none}.nav-stacked>li+li{margin-top:2px;margin-left:0}
.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{text-align:center;margin-bottom:5px}
.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}
@media (min-width:768px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}
.nav-tabs-justified{border-bottom:0}.nav-tabs-justified>li>a{margin-right:0;border-radius:3px}
.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:hover,.nav-tabs-justified>.active>a:focus{border:1px solid #ddd}
@media (min-width:768px){.nav-tabs-justified>li>a{border-bottom:1px solid #ddd;border-radius:3px 3px 0 0} .nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:hover,.nav-tabs-justified>.active>a:focus{border-bottom-color:#fff}}
.tab-content>.tab-pane{display:none}
.tab-content>.active{display:block}
.nav-tabs .dropdown-menu{margin-top:-1px;border-top-right-radius:0;border-top-left-radius:0}
.navbar{position:relative;min-height:50px;margin-bottom:20px;border:1px solid transparent}@media (min-width:768px){.navbar{border-radius:3px}}
@media (min-width:768px){.navbar-header{float:left}}
.navbar-collapse{overflow-x:visible;padding-right:15px;padding-left:15px;border-top:1px solid transparent;box-shadow:inset 0 1px 0 rgba(255,255,255,0.1);-webkit-overflow-scrolling:touch}.navbar-collapse.in{overflow-y:auto}
@media (min-width:768px){.navbar-collapse{width:auto;border-top:0;box-shadow:none}.navbar-collapse.collapse{display:block !important;height:auto !important;padding-bottom:0;overflow:visible !important} .navbar-collapse.in{overflow-y:visible} .navbar-fixed-top .navbar-collapse,.navbar-static-top .navbar-collapse,.navbar-fixed-bottom .navbar-collapse{padding-left:0;padding-right:0}}
.navbar-fixed-top .navbar-collapse,.navbar-fixed-bottom .navbar-collapse{max-height:340px}@media (max-width:480px) and (orientation:landscape){.navbar-fixed-top .navbar-collapse,.navbar-fixed-bottom .navbar-collapse{max-height:200px}}
.container>.navbar-header,.container-fluid>.navbar-header,.container>.navbar-collapse,.container-fluid>.navbar-collapse{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.container>.navbar-header,.container-fluid>.navbar-header,.container>.navbar-collapse,.container-fluid>.navbar-collapse{margin-right:0;margin-left:0}}
.navbar-static-top{z-index:1000;border-width:0 0 1px}@media (min-width:768px){.navbar-static-top{border-radius:0}}
.navbar-fixed-top,.navbar-fixed-bottom{position:fixed;right:0;left:0;z-index:1030;-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}@media (min-width:768px){.navbar-fixed-top,.navbar-fixed-bottom{border-radius:0}}
.navbar-fixed-top{top:0;border-width:0 0 1px}
.navbar-fixed-bottom{bottom:0;margin-bottom:0;border-width:1px 0 0}
.navbar-brand{float:left;padding:15px 15px;font-size:18px;line-height:20px;height:50px}.navbar-brand:hover,.navbar-brand:focus{text-decoration:none}
@media (min-width:768px){.navbar>.container .navbar-brand,.navbar>.container-fluid .navbar-brand{margin-left:-15px}}
.navbar-toggle{position:relative;float:right;margin-right:15px;padding:9px 10px;margin-top:8px;margin-bottom:8px;background-color:transparent;background-image:none;border:1px solid transparent;border-radius:3px}.navbar-toggle:focus{outline:0}
.navbar-toggle .icon-bar{display:block;width:22px;height:2px;border-radius:1px}
.navbar-toggle .icon-bar+.icon-bar{margin-top:4px}
@media (min-width:768px){.navbar-toggle{display:none}}
.navbar-nav{margin:7.5px -15px}.navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:20px}
@media (max-width:767px){.navbar-nav .open .dropdown-menu{position:static;float:none;width:auto;margin-top:0;background-color:transparent;border:0;box-shadow:none}.navbar-nav .open .dropdown-menu>li>a,.navbar-nav .open .dropdown-menu .dropdown-header{padding:5px 15px 5px 25px} .navbar-nav .open .dropdown-menu>li>a{line-height:20px}.navbar-nav .open .dropdown-menu>li>a:hover,.navbar-nav .open .dropdown-menu>li>a:focus{background-image:none}}@media (min-width:768px){.navbar-nav{float:left;margin:0}.navbar-nav>li{float:left}.navbar-nav>li>a{padding-top:15px;padding-bottom:15px} .navbar-nav.navbar-right:last-child{margin-right:-15px}}
@media (min-width:768px){.navbar-left{float:left !important;float:left} .navbar-right{float:right !important;float:right}}.navbar-form{margin-left:-15px;margin-right:-15px;padding:10px 15px;border-top:1px solid transparent;border-bottom:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,0.1),0 1px 0 rgba(255,255,255,0.1);box-shadow:inset 0 1px 0 rgba(255,255,255,0.1),0 1px 0 rgba(255,255,255,0.1);margin-top:8px;margin-bottom:8px}@media (min-width:768px){.navbar-form .form-group{display:inline-block;margin-bottom:0;vertical-align:middle} .navbar-form .form-control{display:inline-block;width:auto;vertical-align:middle} .navbar-form .input-group{display:inline-table;vertical-align:middle}.navbar-form .input-group .input-group-addon,.navbar-form .input-group .input-group-btn,.navbar-form .input-group .form-control{width:auto} .navbar-form .input-group>.form-control{width:100%} .navbar-form .control-label{margin-bottom:0;vertical-align:middle} .navbar-form .radio,.navbar-form .checkbox{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.navbar-form .radio label,.navbar-form .checkbox label{padding-left:0} .navbar-form .radio input[type="radio"],.navbar-form .checkbox input[type="checkbox"]{position:relative;margin-left:0} .navbar-form .has-feedback .form-control-feedback{top:0}}@media (max-width:767px){.navbar-form .form-group{margin-bottom:5px}}
@media (min-width:768px){.navbar-form{width:auto;border:0;margin-left:0;margin-right:0;padding-top:0;padding-bottom:0;-webkit-box-shadow:none;box-shadow:none}.navbar-form.navbar-right:last-child{margin-right:-15px}}
.navbar-nav>li>.dropdown-menu{margin-top:0;border-top-right-radius:0;border-top-left-radius:0}
.navbar-fixed-bottom .navbar-nav>li>.dropdown-menu{border-bottom-right-radius:0;border-bottom-left-radius:0}
.navbar-btn{margin-top:8px;margin-bottom:8px}.navbar-btn.btn-sm{margin-top:10px;margin-bottom:10px}
.navbar-btn.btn-xs{margin-top:14px;margin-bottom:14px}
.navbar-text{margin-top:15px;margin-bottom:15px}@media (min-width:768px){.navbar-text{float:left;margin-left:15px;margin-right:15px}.navbar-text.navbar-right:last-child{margin-right:0}}
.navbar-default{background-color:#f8f8f8;border-color:#e7e7e7}.navbar-default .navbar-brand{color:#777}.navbar-default .navbar-brand:hover,.navbar-default .navbar-brand:focus{color:#5e5e5e;background-color:transparent}
.navbar-default .navbar-text{color:#777}
.navbar-default .navbar-nav>li>a{color:#777}.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>li>a:focus{color:#333;background-color:transparent}
.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:hover,.navbar-default .navbar-nav>.active>a:focus{color:#555;background-color:#e7e7e7}
.navbar-default .navbar-nav>.disabled>a,.navbar-default .navbar-nav>.disabled>a:hover,.navbar-default .navbar-nav>.disabled>a:focus{color:#ccc;background-color:transparent}
.navbar-default .navbar-toggle{border-color:#ddd}.navbar-default .navbar-toggle:hover,.navbar-default .navbar-toggle:focus{background-color:#ddd}
.navbar-default .navbar-toggle .icon-bar{background-color:#888}
.navbar-default .navbar-collapse,.navbar-default .navbar-form{border-color:#e7e7e7}
.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:hover,.navbar-default .navbar-nav>.open>a:focus{background-color:#e7e7e7;color:#555}
@media (max-width:767px){.navbar-default .navbar-nav .open .dropdown-menu>li>a{color:#777}.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus{color:#333;background-color:transparent} .navbar-default .navbar-nav .open .dropdown-menu>.active>a,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus{color:#555;background-color:#e7e7e7} .navbar-default .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:hover,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:focus{color:#ccc;background-color:transparent}}
.navbar-default .navbar-link{color:#777}.navbar-default .navbar-link:hover{color:#333}
.navbar-default .btn-link{color:#777}.navbar-default .btn-link:hover,.navbar-default .btn-link:focus{color:#333}
.navbar-default .btn-link[disabled]:hover,fieldset[disabled] .navbar-default .btn-link:hover,.navbar-default .btn-link[disabled]:focus,fieldset[disabled] .navbar-default .btn-link:focus{color:#ccc}
.navbar-inverse{background-color:#222;border-color:#080808}.navbar-inverse .navbar-brand{color:#999}.navbar-inverse .navbar-brand:hover,.navbar-inverse .navbar-brand:focus{color:#fff;background-color:transparent}
.navbar-inverse .navbar-text{color:#999}
.navbar-inverse .navbar-nav>li>a{color:#999}.navbar-inverse .navbar-nav>li>a:hover,.navbar-inverse .navbar-nav>li>a:focus{color:#fff;background-color:transparent}
.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.active>a:hover,.navbar-inverse .navbar-nav>.active>a:focus{color:#fff;background-color:#080808}
.navbar-inverse .navbar-nav>.disabled>a,.navbar-inverse .navbar-nav>.disabled>a:hover,.navbar-inverse .navbar-nav>.disabled>a:focus{color:#444;background-color:transparent}
.navbar-inverse .navbar-toggle{border-color:#333}.navbar-inverse .navbar-toggle:hover,.navbar-inverse .navbar-toggle:focus{background-color:#333}
.navbar-inverse .navbar-toggle .icon-bar{background-color:#fff}
.navbar-inverse .navbar-collapse,.navbar-inverse .navbar-form{border-color:#101010}
.navbar-inverse .navbar-nav>.open>a,.navbar-inverse .navbar-nav>.open>a:hover,.navbar-inverse .navbar-nav>.open>a:focus{background-color:#080808;color:#fff}
@media (max-width:767px){.navbar-inverse .navbar-nav .open .dropdown-menu>.dropdown-header{border-color:#080808} .navbar-inverse .navbar-nav .open .dropdown-menu .divider{background-color:#080808} .navbar-inverse .navbar-nav .open .dropdown-menu>li>a{color:#999}.navbar-inverse .navbar-nav .open .dropdown-menu>li>a:hover,.navbar-inverse .navbar-nav .open .dropdown-menu>li>a:focus{color:#fff;background-color:transparent} .navbar-inverse .navbar-nav .open .dropdown-menu>.active>a,.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:hover,.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:focus{color:#fff;background-color:#080808} .navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:hover,.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:focus{color:#444;background-color:transparent}}
.navbar-inverse .navbar-link{color:#999}.navbar-inverse .navbar-link:hover{color:#fff}
.navbar-inverse .btn-link{color:#999}.navbar-inverse .btn-link:hover,.navbar-inverse .btn-link:focus{color:#fff}
.navbar-inverse .btn-link[disabled]:hover,fieldset[disabled] .navbar-inverse .btn-link:hover,.navbar-inverse .btn-link[disabled]:focus,fieldset[disabled] .navbar-inverse .btn-link:focus{color:#444}
.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:3px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;line-height:1.428571429;text-decoration:none;color:rgba(216,76,49,0.85);background-color:#fff;border:1px solid #ddd;margin-left:-1px}
.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-bottom-left-radius:3px;border-top-left-radius:3px}
.pagination>li:last-child>a,.pagination>li:last-child>span{border-bottom-right-radius:3px;border-top-right-radius:3px}
.pagination>li>a:hover,.pagination>li>span:hover,.pagination>li>a:focus,.pagination>li>span:focus{color:rgba(216,76,49,0.9);background-color:#eee;border-color:#ddd}
.pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{z-index:2;color:#fff;background-color:rgba(216,76,49,0.7);border-color:rgba(216,76,49,0.72);cursor:default}
.pagination>.disabled>span,.pagination>.disabled>span:hover,.pagination>.disabled>span:focus,.pagination>.disabled>a,.pagination>.disabled>a:hover,.pagination>.disabled>a:focus{color:#999;background-color:#fff;border-color:#ddd;cursor:not-allowed}
.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px}
.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-bottom-left-radius:4px;border-top-left-radius:4px}
.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-bottom-right-radius:4px;border-top-right-radius:4px}
.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px}
.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-bottom-left-radius:2px;border-top-left-radius:2px}
.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-bottom-right-radius:2px;border-top-right-radius:2px}
.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:bold;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}a.label:hover,a.label:focus{color:#fff;text-decoration:none;cursor:pointer}
.label:empty{display:none}
.btn .label{position:relative;top:-1px}
.label-default{background-color:#999}.label-default[href]:hover,.label-default[href]:focus{background-color:#808080}
.label-primary{background-color:#428bca}.label-primary[href]:hover,.label-primary[href]:focus{background-color:#3071a9}
.label-success{background-color:#4A90E2}.label-success[href]:hover,.label-success[href]:focus{background-color:#4281CA}
.label-info{background-color:#5bc0de}.label-info[href]:hover,.label-info[href]:focus{background-color:#31b0d5}
.label-warning{background-color:#f0ad4e}.label-warning[href]:hover,.label-warning[href]:focus{background-color:#ec971f}
.label-danger{background-color:#d84c31}.label-danger[href]:hover,.label-danger[href]:focus{background-color:#b43a22}
.badge{display:inline-block;min-width:10px;padding:3px 7px;font-size:12px;font-weight:bold;color:#fff;line-height:1;vertical-align:baseline;white-space:nowrap;text-align:center;background-color:#999;border-radius:10px}.badge:empty{display:none}
.btn .badge{position:relative;top:-1px}
.btn-xs .badge{top:0;padding:1px 5px}
a.badge:hover,a.badge:focus{color:#fff;text-decoration:none;cursor:pointer}
a.list-group-item.active>.badge,.nav-pills>.active>a>.badge{color:#428bca;background-color:#fff}
.nav-pills>li>a>.badge{margin-left:3px}
.alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:3px}.alert h4{margin-top:0;color:inherit}
.alert .alert-link{font-weight:bold}
.alert>p,.alert>ul{margin-bottom:0}
.alert>p+p{margin-top:5px}
.alert-dismissable,.alert-dismissible{padding-right:35px}.alert-dismissable .close,.alert-dismissible .close{position:relative;top:-2px;right:-21px;color:inherit}
.alert-success{background-color:#dff0d8;border-color:#d6e9c6;color:#3c763d}.alert-success hr{border-top-color:#c9e2b3}
.alert-success .alert-link{color:#2b542c}
.alert-info{background-color:#d9edf7;border-color:#bce8f1;color:#31708f}.alert-info hr{border-top-color:#a6e1ec}
.alert-info .alert-link{color:#245269}
.alert-warning{background-color:#fcf8e3;border-color:#faebcc;color:#8a6d3b}.alert-warning hr{border-top-color:#f7e1b5}
.alert-warning .alert-link{color:#66512c}
.alert-danger{background-color:#f2dede;border-color:#ebccd1;color:#a94442}.alert-danger hr{border-top-color:#e4b9c0}
.alert-danger .alert-link{color:#843534}
@-webkit-keyframes progress-bar-stripes{from{background-position:40px 0} to{background-position:0 0}}@keyframes progress-bar-stripes{from{background-position:40px 0} to{background-position:0 0}}.progress{overflow:hidden;height:20px;margin-bottom:20px;background-color:#f5f5f5;border-radius:3px;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,0.1);box-shadow:inset 0 1px 2px rgba(0,0,0,0.1)}
.progress-bar{float:left;width:0;height:100%;font-size:12px;line-height:20px;color:#fff;text-align:center;background-color:#428bca;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,0.15);box-shadow:inset 0 -1px 0 rgba(0,0,0,0.15);-webkit-transition:width .6s ease;-o-transition:width .6s ease;transition:width .6s ease}
.progress-striped .progress-bar,.progress-bar-striped{background-image:-webkit-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:-o-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-size:40px 40px}
.progress.active .progress-bar,.progress-bar.active{-webkit-animation:progress-bar-stripes 2s linear infinite;-o-animation:progress-bar-stripes 2s linear infinite;animation:progress-bar-stripes 2s linear infinite}
.progress-bar[aria-valuenow="1"],.progress-bar[aria-valuenow="2"]{min-width:30px}
.progress-bar[aria-valuenow="0"]{color:#999;min-width:30px;background-color:transparent;background-image:none;box-shadow:none}
.progress-bar-success{background-color:#4A90E2}.progress-striped .progress-bar-success{background-image:-webkit-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:-o-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent)}
.progress-bar-info{background-color:#5bc0de}.progress-striped .progress-bar-info{background-image:-webkit-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:-o-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent)}
.progress-bar-warning{background-color:#f0ad4e}.progress-striped .progress-bar-warning{background-image:-webkit-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:-o-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent)}
.progress-bar-danger{background-color:#d84c31}.progress-striped .progress-bar-danger{background-image:-webkit-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:-o-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent);background-image:linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent)}
.embed-responsive{position:relative;display:block;height:0;padding:0;overflow:hidden}.embed-responsive .embed-responsive-item,.embed-responsive iframe,.embed-responsive embed,.embed-responsive object{position:absolute;top:0;left:0;bottom:0;height:100%;width:100%;border:0}
.embed-responsive.embed-responsive-16by9{padding-bottom:56.25%}
.embed-responsive.embed-responsive-4by3{padding-bottom:75%}
.well{min-height:20px;padding:19px;margin-bottom:20px;background-color:#f5f5f5;border:1px solid #e3e3e3;border-radius:3px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.05);box-shadow:inset 0 1px 1px rgba(0,0,0,0.05)}.well blockquote{border-color:#ddd;border-color:rgba(0,0,0,0.15)}
.well-lg{padding:24px;border-radius:4px}
.well-sm{padding:9px;border-radius:2px}
.close{float:right;font-size:21px;font-weight:bold;line-height:1;color:#000;text-shadow:0 1px 0 #fff;opacity:.2;filter:alpha(opacity=20)}.close:hover,.close:focus{color:#000;text-decoration:none;cursor:pointer;opacity:.5;filter:alpha(opacity=50)}
button.close{padding:0;cursor:pointer;background:transparent;border:0;-webkit-appearance:none}
.modal-open{overflow:hidden}
.modal{display:none;overflow:hidden;position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transform:translate3d(0, -25%, 0);transform:translate3d(0, -25%, 0);-webkit-transition:-webkit-transform 0.3s ease-out;-moz-transition:-moz-transform 0.3s ease-out;-o-transition:-o-transform 0.3s ease-out;transition:transform 0.3s ease-out}
.modal.in .modal-dialog{-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}
.modal-open .modal{overflow-x:hidden;overflow-y:auto}
.modal-dialog{position:relative;width:auto;margin:10px}
.modal-content{position:relative;background-color:#fff;border:1px solid #999;border:1px solid rgba(0,0,0,0.2);border-radius:4px;-webkit-box-shadow:0 3px 9px rgba(0,0,0,0.5);box-shadow:0 3px 9px rgba(0,0,0,0.5);background-clip:padding-box;outline:0}
.modal-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}.modal-backdrop.fade{opacity:0;filter:alpha(opacity=0)}
.modal-backdrop.in{opacity:.5;filter:alpha(opacity=50)}
.modal-header{padding:15px;border-bottom:1px solid #e5e5e5;min-height:16.428571429px}
.modal-header .close{margin-top:-2px}
.modal-title{margin:0;line-height:1.428571429}
.modal-body{position:relative;padding:15px}
.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-left:5px;margin-bottom:0}
.modal-footer .btn-group .btn+.btn{margin-left:-1px}
.modal-footer .btn-block+.btn-block{margin-left:0}
.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}
@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto} .modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,0.5);box-shadow:0 5px 15px rgba(0,0,0,0.5)} .modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}.tooltip{position:absolute;z-index:1070;display:block;visibility:visible;font-size:12px;line-height:1.4;opacity:0;filter:alpha(opacity=0)}.tooltip.in{opacity:.9;filter:alpha(opacity=90)}
.tooltip.top{margin-top:-3px;padding:5px 0}
.tooltip.right{margin-left:3px;padding:0 4px}
.tooltip.bottom{margin-top:3px;padding:5px 0}
.tooltip.left{margin-left:-3px;padding:0 5px}
.tooltip-inner{max-width:200px;padding:3px 8px;color:#fff;text-align:center;text-decoration:none;background-color:#000;border-radius:3px}
.tooltip-arrow{position:absolute;width:0;height:0;border-color:transparent;border-style:solid}
.tooltip.top .tooltip-arrow{bottom:0;left:50%;margin-left:-5px;border-width:5px 5px 0;border-top-color:#000}
.tooltip.top-left .tooltip-arrow{bottom:0;left:5px;border-width:5px 5px 0;border-top-color:#000}
.tooltip.top-right .tooltip-arrow{bottom:0;right:5px;border-width:5px 5px 0;border-top-color:#000}
.tooltip.right .tooltip-arrow{top:50%;left:0;margin-top:-5px;border-width:5px 5px 5px 0;border-right-color:#000}
.tooltip.left .tooltip-arrow{top:50%;right:0;margin-top:-5px;border-width:5px 0 5px 5px;border-left-color:#000}
.tooltip.bottom .tooltip-arrow{top:0;left:50%;margin-left:-5px;border-width:0 5px 5px;border-bottom-color:#000}
.tooltip.bottom-left .tooltip-arrow{top:0;left:5px;border-width:0 5px 5px;border-bottom-color:#000}
.tooltip.bottom-right .tooltip-arrow{top:0;right:5px;border-width:0 5px 5px;border-bottom-color:#000}
.carousel{position:relative}
.carousel-inner{position:relative;overflow:hidden;width:100%}.carousel-inner>.item{display:none;position:relative;-webkit-transition:.6s ease-in-out left;-o-transition:.6s ease-in-out left;transition:.6s ease-in-out left}.carousel-inner>.item>img,.carousel-inner>.item>a>img{line-height:1}
.carousel-inner>.active,.carousel-inner>.next,.carousel-inner>.prev{display:block}
.carousel-inner>.active{left:0}
.carousel-inner>.next,.carousel-inner>.prev{position:absolute;top:0;width:100%}
.carousel-inner>.next{left:100%}
.carousel-inner>.prev{left:-100%}
.carousel-inner>.next.left,.carousel-inner>.prev.right{left:0}
.carousel-inner>.active.left{left:-100%}
.carousel-inner>.active.right{left:100%}
.carousel-control{position:absolute;top:0;left:0;bottom:0;width:15%;opacity:.5;filter:alpha(opacity=50);font-size:20px;color:#fff;text-align:center;text-shadow:0 1px 2px rgba(0,0,0,0.6)}.carousel-control.left{background-image:-webkit-linear-gradient(left, rgba(0,0,0,0.5) 0, rgba(0,0,0,0.0001) 100%);background-image:-o-linear-gradient(left, rgba(0,0,0,0.5) 0, rgba(0,0,0,0.0001) 100%);background-image:linear-gradient(to right, rgba(0,0,0,0.5) 0, rgba(0,0,0,0.0001) 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1)}
.carousel-control.right{left:auto;right:0;background-image:-webkit-linear-gradient(left, rgba(0,0,0,0.0001) 0, rgba(0,0,0,0.5) 100%);background-image:-o-linear-gradient(left, rgba(0,0,0,0.0001) 0, rgba(0,0,0,0.5) 100%);background-image:linear-gradient(to right, rgba(0,0,0,0.0001) 0, rgba(0,0,0,0.5) 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1)}
.carousel-control:hover,.carousel-control:focus{outline:0;color:#fff;text-decoration:none;opacity:.9;filter:alpha(opacity=90)}
.carousel-control .icon-prev,.carousel-control .icon-next,.carousel-control .glyphicon-chevron-left,.carousel-control .glyphicon-chevron-right{position:absolute;top:50%;z-index:5;display:inline-block}
.carousel-control .icon-prev,.carousel-control .glyphicon-chevron-left{left:50%;margin-left:-10px}
.carousel-control .icon-next,.carousel-control .glyphicon-chevron-right{right:50%;margin-right:-10px}
.carousel-control .icon-prev,.carousel-control .icon-next{width:20px;height:20px;margin-top:-10px;font-family:serif}
.carousel-control .icon-prev:before{content:'\2039'}
.carousel-control .icon-next:before{content:'\203a'}
.carousel-indicators{position:absolute;bottom:10px;left:50%;z-index:15;width:60%;margin-left:-30%;padding-left:0;list-style:none;text-align:center}.carousel-indicators li{display:inline-block;width:10px;height:10px;margin:1px;text-indent:-999px;border:1px solid #fff;border-radius:10px;cursor:pointer;background-color:#000 \9;background-color:rgba(0,0,0,0)}
.carousel-indicators .active{margin:0;width:12px;height:12px;background-color:#fff}
.carousel-caption{position:absolute;left:15%;right:15%;bottom:20px;z-index:10;padding-top:20px;padding-bottom:20px;color:#fff;text-align:center;text-shadow:0 1px 2px rgba(0,0,0,0.6)}.carousel-caption .btn{text-shadow:none}
@media screen and (min-width:768px){.carousel-control .glyphicon-chevron-left,.carousel-control .glyphicon-chevron-right,.carousel-control .icon-prev,.carousel-control .icon-next{width:30px;height:30px;margin-top:-15px;font-size:30px} .carousel-control .glyphicon-chevron-left,.carousel-control .icon-prev{margin-left:-15px} .carousel-control .glyphicon-chevron-right,.carousel-control .icon-next{margin-right:-15px} .carousel-caption{left:20%;right:20%;padding-bottom:30px} .carousel-indicators{bottom:20px}}.clearfix:before,.clearfix:after,.dl-horizontal dd:before,.dl-horizontal dd:after,.container:before,.container:after,.container-fluid:before,.container-fluid:after,.row:before,.row:after,.form-horizontal .form-group:before,.form-horizontal .form-group:after,.btn-toolbar:before,.btn-toolbar:after,.btn-group-vertical>.btn-group:before,.btn-group-vertical>.btn-group:after,.nav:before,.nav:after,.navbar:before,.navbar:after,.navbar-header:before,.navbar-header:after,.navbar-collapse:before,.navbar-collapse:after,.modal-footer:before,.modal-footer:after{content:" ";display:table}
.clearfix:after,.dl-horizontal dd:after,.container:after,.container-fluid:after,.row:after,.form-horizontal .form-group:after,.btn-toolbar:after,.btn-group-vertical>.btn-group:after,.nav:after,.navbar:after,.navbar-header:after,.navbar-collapse:after,.modal-footer:after{clear:both}
.center-block{display:block;margin-left:auto;margin-right:auto}
.pull-right{float:right !important}
.pull-left{float:left !important}
.hide{display:none !important}
.show{display:block !important}
.invisible{visibility:hidden}
.text-hide{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0}
.hidden{display:none !important;visibility:hidden !important}
.affix{position:fixed;-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}
@-ms-viewport{width:device-width}.visible-xs,.visible-sm,.visible-md,.visible-lg{display:none !important}
.visible-xs-block,.visible-xs-inline,.visible-xs-inline-block,.visible-sm-block,.visible-sm-inline,.visible-sm-inline-block,.visible-md-block,.visible-md-inline,.visible-md-inline-block,.visible-lg-block,.visible-lg-inline,.visible-lg-inline-block{display:none !important}
@media (max-width:767px){.visible-xs{display:block !important}table.visible-xs{display:table} tr.visible-xs{display:table-row !important} th.visible-xs,td.visible-xs{display:table-cell !important}}
@media (max-width:767px){.visible-xs-block{display:block !important}}
@media (max-width:767px){.visible-xs-inline{display:inline !important}}
@media (max-width:767px){.visible-xs-inline-block{display:inline-block !important}}
@media (min-width:768px) and (max-width:991px){.visible-sm{display:block !important}table.visible-sm{display:table} tr.visible-sm{display:table-row !important} th.visible-sm,td.visible-sm{display:table-cell !important}}
@media (min-width:768px) and (max-width:991px){.visible-sm-block{display:block !important}}
@media (min-width:768px) and (max-width:991px){.visible-sm-inline{display:inline !important}}
@media (min-width:768px) and (max-width:991px){.visible-sm-inline-block{display:inline-block !important}}
@media (min-width:992px) and (max-width:1199px){.visible-md{display:block !important}table.visible-md{display:table} tr.visible-md{display:table-row !important} th.visible-md,td.visible-md{display:table-cell !important}}
@media (min-width:992px) and (max-width:1199px){.visible-md-block{display:block !important}}
@media (min-width:992px) and (max-width:1199px){.visible-md-inline{display:inline !important}}
@media (min-width:992px) and (max-width:1199px){.visible-md-inline-block{display:inline-block !important}}
@media (min-width:1200px){.visible-lg{display:block !important}table.visible-lg{display:table} tr.visible-lg{display:table-row !important} th.visible-lg,td.visible-lg{display:table-cell !important}}
@media (min-width:1200px){.visible-lg-block{display:block !important}}
@media (min-width:1200px){.visible-lg-inline{display:inline !important}}
@media (min-width:1200px){.visible-lg-inline-block{display:inline-block !important}}
@media (max-width:767px){.hidden-xs{display:none !important}}
@media (min-width:768px) and (max-width:991px){.hidden-sm{display:none !important}}
@media (min-width:992px) and (max-width:1199px){.hidden-md{display:none !important}}
@media (min-width:1200px){.hidden-lg{display:none !important}}
.visible-print{display:none !important}@media print{.visible-print{display:block !important}table.visible-print{display:table} tr.visible-print{display:table-row !important} th.visible-print,td.visible-print{display:table-cell !important}}
.visible-print-block{display:none !important}@media print{.visible-print-block{display:block !important}}
.visible-print-inline{display:none !important}@media print{.visible-print-inline{display:inline !important}}
.visible-print-inline-block{display:none !important}@media print{.visible-print-inline-block{display:inline-block !important}}
@media print{.hidden-print{display:none !important}}
.notifications{position:fixed;pointer-events:none;z-index:1060}.notifications.top-right{right:10px;top:25px}
.notifications.top-left{left:10px;top:25px}
.notifications.bottom-left{left:10px;bottom:25px}
.notifications.bottom-right{right:10px;bottom:25px}
.notifications>div{position:relative;z-index:9999;margin:5px 0}
.notifications.center{top:48%;left:0;width:100%}.notifications.center>div{margin:5px auto;width:20%;text-align:center}
.notifications.center-top{top:56px;left:0;width:100%}.notifications.center-top>div{pointer-events:auto;margin:5px auto;width:20%;text-align:center}
@font-face{font-family:'FontAwesome';src:url('font/fontawesome-webfont.eot?v=3.2.1');src:url('font/fontawesome-webfont.eot?#iefix&v=3.2.1') format('embedded-opentype'),url('font/fontawesome-webfont.woff?v=3.2.1') format('woff'),url('font/fontawesome-webfont.ttf?v=3.2.1') format('truetype'),url('font/fontawesome-webfont.svg#fontawesomeregular?v=3.2.1') format('svg');font-weight:normal;font-style:normal}[class^="icon-"],[class*=" icon-"]{font-family:FontAwesome;font-weight:normal;font-style:normal;text-decoration:inherit;-webkit-font-smoothing:antialiased;*margin-right:.3em}
[class^="icon-"]:before,[class*=" icon-"]:before{text-decoration:inherit;display:inline-block;speak:none}
.icon-large:before{vertical-align:-10%;font-size:1.3333333333333333em}
a [class^="icon-"],a [class*=" icon-"]{display:inline}
[class^="icon-"].icon-fixed-width,[class*=" icon-"].icon-fixed-width{display:inline-block;width:1.1428571428571428em;text-align:right;padding-right:.2857142857142857em}[class^="icon-"].icon-fixed-width.icon-large,[class*=" icon-"].icon-fixed-width.icon-large{width:1.4285714285714286em}
.icons-ul{margin-left:2.142857142857143em;list-style-type:none}.icons-ul>li{position:relative}
.icons-ul .icon-li{position:absolute;left:-2.142857142857143em;width:2.142857142857143em;text-align:center;line-height:inherit}
[class^="icon-"].hide,[class*=" icon-"].hide{display:none}
.icon-muted{color:#eee}
.icon-light{color:#fff}
.icon-dark{color:#333}
.icon-border{border:solid 1px #eee;padding:.2em .25em .15em;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}
.icon-2x{font-size:2em}.icon-2x.icon-border{border-width:2px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}
.icon-3x{font-size:3em}.icon-3x.icon-border{border-width:3px;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}
.icon-4x{font-size:4em}.icon-4x.icon-border{border-width:4px;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px}
.icon-5x{font-size:5em}.icon-5x.icon-border{border-width:5px;-webkit-border-radius:7px;-moz-border-radius:7px;border-radius:7px}
.pull-right{float:right}
.pull-left{float:left}
[class^="icon-"].pull-left,[class*=" icon-"].pull-left{margin-right:.3em}
[class^="icon-"].pull-right,[class*=" icon-"].pull-right{margin-left:.3em}
[class^="icon-"],[class*=" icon-"]{display:inline;width:auto;height:auto;line-height:normal;vertical-align:baseline;background-image:none;background-position:0 0;background-repeat:repeat;margin-top:0}
.icon-white,.nav-pills>.active>a>[class^="icon-"],.nav-pills>.active>a>[class*=" icon-"],.nav-list>.active>a>[class^="icon-"],.nav-list>.active>a>[class*=" icon-"],.navbar-inverse .nav>.active>a>[class^="icon-"],.navbar-inverse .nav>.active>a>[class*=" icon-"],.dropdown-menu>li>a:hover>[class^="icon-"],.dropdown-menu>li>a:hover>[class*=" icon-"],.dropdown-menu>.active>a>[class^="icon-"],.dropdown-menu>.active>a>[class*=" icon-"],.dropdown-submenu:hover>a>[class^="icon-"],.dropdown-submenu:hover>a>[class*=" icon-"]{background-image:none}
.btn [class^="icon-"].icon-large,.nav [class^="icon-"].icon-large,.btn [class*=" icon-"].icon-large,.nav [class*=" icon-"].icon-large{line-height:.9em}
.btn [class^="icon-"].icon-spin,.nav [class^="icon-"].icon-spin,.btn [class*=" icon-"].icon-spin,.nav [class*=" icon-"].icon-spin{display:inline-block}
.nav-tabs [class^="icon-"],.nav-pills [class^="icon-"],.nav-tabs [class*=" icon-"],.nav-pills [class*=" icon-"],.nav-tabs [class^="icon-"].icon-large,.nav-pills [class^="icon-"].icon-large,.nav-tabs [class*=" icon-"].icon-large,.nav-pills [class*=" icon-"].icon-large{line-height:.9em}
.btn [class^="icon-"].pull-left.icon-2x,.btn [class*=" icon-"].pull-left.icon-2x,.btn [class^="icon-"].pull-right.icon-2x,.btn [class*=" icon-"].pull-right.icon-2x{margin-top:.18em}
.btn [class^="icon-"].icon-spin.icon-large,.btn [class*=" icon-"].icon-spin.icon-large{line-height:.8em}
.btn.btn-sm [class^="icon-"].pull-left.icon-2x,.btn.btn-sm [class*=" icon-"].pull-left.icon-2x,.btn.btn-sm [class^="icon-"].pull-right.icon-2x,.btn.btn-sm [class*=" icon-"].pull-right.icon-2x{margin-top:.25em}
.btn.btn-lg [class^="icon-"],.btn.btn-lg [class*=" icon-"]{margin-top:0}.btn.btn-lg [class^="icon-"].pull-left.icon-2x,.btn.btn-lg [class*=" icon-"].pull-left.icon-2x,.btn.btn-lg [class^="icon-"].pull-right.icon-2x,.btn.btn-lg [class*=" icon-"].pull-right.icon-2x{margin-top:.05em}
.btn.btn-lg [class^="icon-"].pull-left.icon-2x,.btn.btn-lg [class*=" icon-"].pull-left.icon-2x{margin-right:.2em}
.btn.btn-lg [class^="icon-"].pull-right.icon-2x,.btn.btn-lg [class*=" icon-"].pull-right.icon-2x{margin-left:.2em}
.nav-list [class^="icon-"],.nav-list [class*=" icon-"]{line-height:inherit}
.icon-stack{position:relative;display:inline-block;width:2em;height:2em;line-height:2em;vertical-align:-35%}.icon-stack [class^="icon-"],.icon-stack [class*=" icon-"]{display:block;text-align:center;position:absolute;width:100%;height:100%;font-size:1em;line-height:inherit;*line-height:2em}
.icon-stack .icon-stack-base{font-size:2em;*line-height:1em}
.icon-spin{display:inline-block;-moz-animation:spin 2s infinite linear;-o-animation:spin 2s infinite linear;-webkit-animation:spin 2s infinite linear;animation:spin 2s infinite linear}
a .icon-stack,a .icon-spin{display:inline-block;text-decoration:none}
@-moz-keyframes spin{0%{-moz-transform:rotate(0deg)} 100%{-moz-transform:rotate(359deg)}}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0deg)} 100%{-webkit-transform:rotate(359deg)}}@-o-keyframes spin{0%{-o-transform:rotate(0deg)} 100%{-o-transform:rotate(359deg)}}@-ms-keyframes spin{0%{-ms-transform:rotate(0deg)} 100%{-ms-transform:rotate(359deg)}}@keyframes spin{0%{transform:rotate(0deg)} 100%{transform:rotate(359deg)}}.icon-rotate-90:before{-webkit-transform:rotate(90deg);-moz-transform:rotate(90deg);-ms-transform:rotate(90deg);-o-transform:rotate(90deg);transform:rotate(90deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1)}
.icon-rotate-180:before{-webkit-transform:rotate(180deg);-moz-transform:rotate(180deg);-ms-transform:rotate(180deg);-o-transform:rotate(180deg);transform:rotate(180deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=2)}
.icon-rotate-270:before{-webkit-transform:rotate(270deg);-moz-transform:rotate(270deg);-ms-transform:rotate(270deg);-o-transform:rotate(270deg);transform:rotate(270deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3)}
.icon-flip-horizontal:before{-webkit-transform:scale(-1, 1);-moz-transform:scale(-1, 1);-ms-transform:scale(-1, 1);-o-transform:scale(-1, 1);transform:scale(-1, 1)}
.icon-flip-vertical:before{-webkit-transform:scale(1, -1);-moz-transform:scale(1, -1);-ms-transform:scale(1, -1);-o-transform:scale(1, -1);transform:scale(1, -1)}
a .icon-rotate-90:before,a .icon-rotate-180:before,a .icon-rotate-270:before,a .icon-flip-horizontal:before,a .icon-flip-vertical:before{display:inline-block}
.icon-glass:before{content:"\f000"}
.icon-music:before{content:"\f001"}
.icon-search:before{content:"\f002"}
.icon-envelope-alt:before{content:"\f003"}
.icon-heart:before{content:"\f004"}
.icon-star:before{content:"\f005"}
.icon-star-empty:before{content:"\f006"}
.icon-user:before{content:"\f007"}
.icon-film:before{content:"\f008"}
.icon-th-large:before{content:"\f009"}
.icon-th:before{content:"\f00a"}
.icon-th-list:before{content:"\f00b"}
.icon-ok:before{content:"\f00c"}
.icon-remove:before{content:"\f00d"}
.icon-zoom-in:before{content:"\f00e"}
.icon-zoom-out:before{content:"\f010"}
.icon-power-off:before,.icon-off:before{content:"\f011"}
.icon-signal:before{content:"\f012"}
.icon-gear:before,.icon-cog:before{content:"\f013"}
.icon-trash:before{content:"\f014"}
.icon-home:before{content:"\f015"}
.icon-file-alt:before{content:"\f016"}
.icon-time:before{content:"\f017"}
.icon-road:before{content:"\f018"}
.icon-download-alt:before{content:"\f019"}
.icon-download:before{content:"\f01a"}
.icon-upload:before{content:"\f01b"}
.icon-inbox:before{content:"\f01c"}
.icon-play-circle:before{content:"\f01d"}
.icon-rotate-right:before,.icon-repeat:before{content:"\f01e"}
.icon-refresh:before{content:"\f021"}
.icon-list-alt:before{content:"\f022"}
.icon-lock:before{content:"\f023"}
.icon-flag:before{content:"\f024"}
.icon-headphones:before{content:"\f025"}
.icon-volume-off:before{content:"\f026"}
.icon-volume-down:before{content:"\f027"}
.icon-volume-up:before{content:"\f028"}
.icon-qrcode:before{content:"\f029"}
.icon-barcode:before{content:"\f02a"}
.icon-tag:before{content:"\f02b"}
.icon-tags:before{content:"\f02c"}
.icon-book:before{content:"\f02d"}
.icon-bookmark:before{content:"\f02e"}
.icon-print:before{content:"\f02f"}
.icon-camera:before{content:"\f030"}
.icon-font:before{content:"\f031"}
.icon-bold:before{content:"\f032"}
.icon-italic:before{content:"\f033"}
.icon-text-height:before{content:"\f034"}
.icon-text-width:before{content:"\f035"}
.icon-align-left:before{content:"\f036"}
.icon-align-center:before{content:"\f037"}
.icon-align-right:before{content:"\f038"}
.icon-align-justify:before{content:"\f039"}
.icon-list:before{content:"\f03a"}
.icon-indent-left:before{content:"\f03b"}
.icon-indent-right:before{content:"\f03c"}
.icon-facetime-video:before{content:"\f03d"}
.icon-picture:before{content:"\f03e"}
.icon-pencil:before{content:"\f040"}
.icon-map-marker:before{content:"\f041"}
.icon-adjust:before{content:"\f042"}
.icon-tint:before{content:"\f043"}
.icon-edit:before{content:"\f044"}
.icon-share:before{content:"\f045"}
.icon-check:before{content:"\f046"}
.icon-move:before{content:"\f047"}
.icon-step-backward:before{content:"\f048"}
.icon-fast-backward:before{content:"\f049"}
.icon-backward:before{content:"\f04a"}
.icon-play:before{content:"\f04b"}
.icon-pause:before{content:"\f04c"}
.icon-stop:before{content:"\f04d"}
.icon-forward:before{content:"\f04e"}
.icon-fast-forward:before{content:"\f050"}
.icon-step-forward:before{content:"\f051"}
.icon-eject:before{content:"\f052"}
.icon-chevron-left:before{content:"\f053"}
.icon-chevron-right:before{content:"\f054"}
.icon-plus-sign:before{content:"\f055"}
.icon-minus-sign:before{content:"\f056"}
.icon-remove-sign:before{content:"\f057"}
.icon-ok-sign:before{content:"\f058"}
.icon-question-sign:before{content:"\f059"}
.icon-info-sign:before{content:"\f05a"}
.icon-screenshot:before{content:"\f05b"}
.icon-remove-circle:before{content:"\f05c"}
.icon-ok-circle:before{content:"\f05d"}
.icon-ban-circle:before{content:"\f05e"}
.icon-arrow-left:before{content:"\f060"}
.icon-arrow-right:before{content:"\f061"}
.icon-arrow-up:before{content:"\f062"}
.icon-arrow-down:before{content:"\f063"}
.icon-mail-forward:before,.icon-share-alt:before{content:"\f064"}
.icon-resize-full:before{content:"\f065"}
.icon-resize-small:before{content:"\f066"}
.icon-plus:before{content:"\f067"}
.icon-minus:before{content:"\f068"}
.icon-asterisk:before{content:"\f069"}
.icon-exclamation-sign:before{content:"\f06a"}
.icon-gift:before{content:"\f06b"}
.icon-leaf:before{content:"\f06c"}
.icon-fire:before{content:"\f06d"}
.icon-eye-open:before{content:"\f06e"}
.icon-eye-close:before{content:"\f070"}
.icon-warning-sign:before{content:"\f071"}
.icon-plane:before{content:"\f072"}
.icon-calendar:before{content:"\f073"}
.icon-random:before{content:"\f074"}
.icon-comment:before{content:"\f075"}
.icon-magnet:before{content:"\f076"}
.icon-chevron-up:before{content:"\f077"}
.icon-chevron-down:before{content:"\f078"}
.icon-retweet:before{content:"\f079"}
.icon-shopping-cart:before{content:"\f07a"}
.icon-folder-close:before{content:"\f07b"}
.icon-folder-open:before{content:"\f07c"}
.icon-resize-vertical:before{content:"\f07d"}
.icon-resize-horizontal:before{content:"\f07e"}
.icon-bar-chart:before{content:"\f080"}
.icon-twitter-sign:before{content:"\f081"}
.icon-facebook-sign:before{content:"\f082"}
.icon-camera-retro:before{content:"\f083"}
.icon-key:before{content:"\f084"}
.icon-gears:before,.icon-cogs:before{content:"\f085"}
.icon-comments:before{content:"\f086"}
.icon-thumbs-up-alt:before{content:"\f087"}
.icon-thumbs-down-alt:before{content:"\f088"}
.icon-star-half:before{content:"\f089"}
.icon-heart-empty:before{content:"\f08a"}
.icon-signout:before{content:"\f08b"}
.icon-linkedin-sign:before{content:"\f08c"}
.icon-pushpin:before{content:"\f08d"}
.icon-external-link:before{content:"\f08e"}
.icon-signin:before{content:"\f090"}
.icon-trophy:before{content:"\f091"}
.icon-github-sign:before{content:"\f092"}
.icon-upload-alt:before{content:"\f093"}
.icon-lemon:before{content:"\f094"}
.icon-phone:before{content:"\f095"}
.icon-unchecked:before,.icon-check-empty:before{content:"\f096"}
.icon-bookmark-empty:before{content:"\f097"}
.icon-phone-sign:before{content:"\f098"}
.icon-twitter:before{content:"\f099"}
.icon-facebook:before{content:"\f09a"}
.icon-github:before{content:"\f09b"}
.icon-unlock:before{content:"\f09c"}
.icon-credit-card:before{content:"\f09d"}
.icon-rss:before{content:"\f09e"}
.icon-hdd:before{content:"\f0a0"}
.icon-bullhorn:before{content:"\f0a1"}
.icon-bell:before{content:"\f0a2"}
.icon-certificate:before{content:"\f0a3"}
.icon-hand-right:before{content:"\f0a4"}
.icon-hand-left:before{content:"\f0a5"}
.icon-hand-up:before{content:"\f0a6"}
.icon-hand-down:before{content:"\f0a7"}
.icon-circle-arrow-left:before{content:"\f0a8"}
.icon-circle-arrow-right:before{content:"\f0a9"}
.icon-circle-arrow-up:before{content:"\f0aa"}
.icon-circle-arrow-down:before{content:"\f0ab"}
.icon-globe:before{content:"\f0ac"}
.icon-wrench:before{content:"\f0ad"}
.icon-tasks:before{content:"\f0ae"}
.icon-filter:before{content:"\f0b0"}
.icon-briefcase:before{content:"\f0b1"}
.icon-fullscreen:before{content:"\f0b2"}
.icon-group:before{content:"\f0c0"}
.icon-link:before{content:"\f0c1"}
.icon-cloud:before{content:"\f0c2"}
.icon-beaker:before{content:"\f0c3"}
.icon-cut:before{content:"\f0c4"}
.icon-copy:before{content:"\f0c5"}
.icon-paperclip:before,.icon-paper-clip:before{content:"\f0c6"}
.icon-save:before{content:"\f0c7"}
.icon-sign-blank:before{content:"\f0c8"}
.icon-reorder:before{content:"\f0c9"}
.icon-list-ul:before{content:"\f0ca"}
.icon-list-ol:before{content:"\f0cb"}
.icon-strikethrough:before{content:"\f0cc"}
.icon-underline:before{content:"\f0cd"}
.icon-table:before{content:"\f0ce"}
.icon-magic:before{content:"\f0d0"}
.icon-truck:before{content:"\f0d1"}
.icon-pinterest:before{content:"\f0d2"}
.icon-pinterest-sign:before{content:"\f0d3"}
.icon-google-plus-sign:before{content:"\f0d4"}
.icon-google-plus:before{content:"\f0d5"}
.icon-money:before{content:"\f0d6"}
.icon-caret-down:before{content:"\f0d7"}
.icon-caret-up:before{content:"\f0d8"}
.icon-caret-left:before{content:"\f0d9"}
.icon-caret-right:before{content:"\f0da"}
.icon-columns:before{content:"\f0db"}
.icon-sort:before{content:"\f0dc"}
.icon-sort-down:before{content:"\f0dd"}
.icon-sort-up:before{content:"\f0de"}
.icon-envelope:before{content:"\f0e0"}
.icon-linkedin:before{content:"\f0e1"}
.icon-rotate-left:before,.icon-undo:before{content:"\f0e2"}
.icon-legal:before{content:"\f0e3"}
.icon-dashboard:before{content:"\f0e4"}
.icon-comment-alt:before{content:"\f0e5"}
.icon-comments-alt:before{content:"\f0e6"}
.icon-bolt:before{content:"\f0e7"}
.icon-sitemap:before{content:"\f0e8"}
.icon-umbrella:before{content:"\f0e9"}
.icon-paste:before{content:"\f0ea"}
.icon-lightbulb:before{content:"\f0eb"}
.icon-exchange:before{content:"\f0ec"}
.icon-cloud-download:before{content:"\f0ed"}
.icon-cloud-upload:before{content:"\f0ee"}
.icon-user-md:before{content:"\f0f0"}
.icon-stethoscope:before{content:"\f0f1"}
.icon-suitcase:before{content:"\f0f2"}
.icon-bell-alt:before{content:"\f0f3"}
.icon-coffee:before{content:"\f0f4"}
.icon-food:before{content:"\f0f5"}
.icon-file-text-alt:before{content:"\f0f6"}
.icon-building:before{content:"\f0f7"}
.icon-hospital:before{content:"\f0f8"}
.icon-ambulance:before{content:"\f0f9"}
.icon-medkit:before{content:"\f0fa"}
.icon-fighter-jet:before{content:"\f0fb"}
.icon-beer:before{content:"\f0fc"}
.icon-h-sign:before{content:"\f0fd"}
.icon-plus-sign-alt:before{content:"\f0fe"}
.icon-double-angle-left:before{content:"\f100"}
.icon-double-angle-right:before{content:"\f101"}
.icon-double-angle-up:before{content:"\f102"}
.icon-double-angle-down:before{content:"\f103"}
.icon-angle-left:before{content:"\f104"}
.icon-angle-right:before{content:"\f105"}
.icon-angle-up:before{content:"\f106"}
.icon-angle-down:before{content:"\f107"}
.icon-desktop:before{content:"\f108"}
.icon-laptop:before{content:"\f109"}
.icon-tablet:before{content:"\f10a"}
.icon-mobile-phone:before{content:"\f10b"}
.icon-circle-blank:before{content:"\f10c"}
.icon-quote-left:before{content:"\f10d"}
.icon-quote-right:before{content:"\f10e"}
.icon-spinner:before{content:"\f110"}
.icon-circle:before{content:"\f111"}
.icon-mail-reply:before,.icon-reply:before{content:"\f112"}
.icon-github-alt:before{content:"\f113"}
.icon-folder-close-alt:before{content:"\f114"}
.icon-folder-open-alt:before{content:"\f115"}
.icon-expand-alt:before{content:"\f116"}
.icon-collapse-alt:before{content:"\f117"}
.icon-smile:before{content:"\f118"}
.icon-frown:before{content:"\f119"}
.icon-meh:before{content:"\f11a"}
.icon-gamepad:before{content:"\f11b"}
.icon-keyboard:before{content:"\f11c"}
.icon-flag-alt:before{content:"\f11d"}
.icon-flag-checkered:before{content:"\f11e"}
.icon-terminal:before{content:"\f120"}
.icon-code:before{content:"\f121"}
.icon-reply-all:before{content:"\f122"}
.icon-mail-reply-all:before{content:"\f122"}
.icon-star-half-full:before,.icon-star-half-empty:before{content:"\f123"}
.icon-location-arrow:before{content:"\f124"}
.icon-crop:before{content:"\f125"}
.icon-code-fork:before{content:"\f126"}
.icon-unlink:before{content:"\f127"}
.icon-question:before{content:"\f128"}
.icon-info:before{content:"\f129"}
.icon-exclamation:before{content:"\f12a"}
.icon-superscript:before{content:"\f12b"}
.icon-subscript:before{content:"\f12c"}
.icon-eraser:before{content:"\f12d"}
.icon-puzzle-piece:before{content:"\f12e"}
.icon-microphone:before{content:"\f130"}
.icon-microphone-off:before{content:"\f131"}
.icon-shield:before{content:"\f132"}
.icon-calendar-empty:before{content:"\f133"}
.icon-fire-extinguisher:before{content:"\f134"}
.icon-rocket:before{content:"\f135"}
.icon-maxcdn:before{content:"\f136"}
.icon-chevron-sign-left:before{content:"\f137"}
.icon-chevron-sign-right:before{content:"\f138"}
.icon-chevron-sign-up:before{content:"\f139"}
.icon-chevron-sign-down:before{content:"\f13a"}
.icon-html5:before{content:"\f13b"}
.icon-css3:before{content:"\f13c"}
.icon-anchor:before{content:"\f13d"}
.icon-unlock-alt:before{content:"\f13e"}
.icon-bullseye:before{content:"\f140"}
.icon-ellipsis-horizontal:before{content:"\f141"}
.icon-ellipsis-vertical:before{content:"\f142"}
.icon-rss-sign:before{content:"\f143"}
.icon-play-sign:before{content:"\f144"}
.icon-ticket:before{content:"\f145"}
.icon-minus-sign-alt:before{content:"\f146"}
.icon-check-minus:before{content:"\f147"}
.icon-level-up:before{content:"\f148"}
.icon-level-down:before{content:"\f149"}
.icon-check-sign:before{content:"\f14a"}
.icon-edit-sign:before{content:"\f14b"}
.icon-external-link-sign:before{content:"\f14c"}
.icon-share-sign:before{content:"\f14d"}
.icon-compass:before{content:"\f14e"}
.icon-collapse:before{content:"\f150"}
.icon-collapse-top:before{content:"\f151"}
.icon-expand:before{content:"\f152"}
.icon-euro:before,.icon-eur:before{content:"\f153"}
.icon-gbp:before{content:"\f154"}
.icon-dollar:before,.icon-usd:before{content:"\f155"}
.icon-rupee:before,.icon-inr:before{content:"\f156"}
.icon-yen:before,.icon-jpy:before{content:"\f157"}
.icon-renminbi:before,.icon-cny:before{content:"\f158"}
.icon-won:before,.icon-krw:before{content:"\f159"}
.icon-bitcoin:before,.icon-btc:before{content:"\f15a"}
.icon-file:before{content:"\f15b"}
.icon-file-text:before{content:"\f15c"}
.icon-sort-by-alphabet:before{content:"\f15d"}
.icon-sort-by-alphabet-alt:before{content:"\f15e"}
.icon-sort-by-attributes:before{content:"\f160"}
.icon-sort-by-attributes-alt:before{content:"\f161"}
.icon-sort-by-order:before{content:"\f162"}
.icon-sort-by-order-alt:before{content:"\f163"}
.icon-thumbs-up:before{content:"\f164"}
.icon-thumbs-down:before{content:"\f165"}
.icon-youtube-sign:before{content:"\f166"}
.icon-youtube:before{content:"\f167"}
.icon-xing:before{content:"\f168"}
.icon-xing-sign:before{content:"\f169"}
.icon-youtube-play:before{content:"\f16a"}
.icon-dropbox:before{content:"\f16b"}
.icon-stackexchange:before{content:"\f16c"}
.icon-instagram:before{content:"\f16d"}
.icon-flickr:before{content:"\f16e"}
.icon-adn:before{content:"\f170"}
.icon-bitbucket:before{content:"\f171"}
.icon-bitbucket-sign:before{content:"\f172"}
.icon-tumblr:before{content:"\f173"}
.icon-tumblr-sign:before{content:"\f174"}
.icon-long-arrow-down:before{content:"\f175"}
.icon-long-arrow-up:before{content:"\f176"}
.icon-long-arrow-left:before{content:"\f177"}
.icon-long-arrow-right:before{content:"\f178"}
.icon-apple:before{content:"\f179"}
.icon-windows:before{content:"\f17a"}
.icon-android:before{content:"\f17b"}
.icon-linux:before{content:"\f17c"}
.icon-dribbble:before{content:"\f17d"}
.icon-skype:before{content:"\f17e"}
.icon-foursquare:before{content:"\f180"}
.icon-trello:before{content:"\f181"}
.icon-female:before{content:"\f182"}
.icon-male:before{content:"\f183"}
.icon-gittip:before{content:"\f184"}
.icon-sun:before{content:"\f185"}
.icon-moon:before{content:"\f186"}
.icon-archive:before{content:"\f187"}
.icon-bug:before{content:"\f188"}
.icon-vk:before{content:"\f189"}
.icon-weibo:before{content:"\f18a"}
.icon-renren:before{content:"\f18b"}
a{-moz-outline:none !important}
.jaws{display:block;height:1px;left:-5000px;overflow:hidden;position:absolute;top:-5000px;width:1px}
.gollum-editor{}.gollum-editor .gollum-editor-function-bar{overflow:hidden}.gollum-editor .gollum-editor-function-bar.active .gollum-editor-function-buttons{display:block;float:left;overflow:hidden}
.gollum-editor .gollum-editor-function-bar .gollum-editor-function-buttons{display:none}
.gollum-editor .gollum-editor-function-bar a.function-button{border:solid 1px #ddd;color:#333;display:block;float:left;height:29px;overflow:hidden;padding:0;text-shadow:0 1px 0 #fff;width:37px}.gollum-editor .gollum-editor-function-bar a.function-button span{background-image:url("images/icon-sprite.png");background-repeat:no-repeat;display:block;height:29px;overflow:hidden;text-indent:-5000px;width:37px}
.gollum-editor .gollum-editor-function-bar a.function-button:hover{text-decoration:none;border-color:#ccc #ccc #b5b5b5}
.gollum-editor-title-field+.gollum-editor-function-bar{margin-top:.6em}
a.function-bold span{background-position:5px 2px}
a.function-italic span{background-position:-21px 2px}
a.function-underline span{background-position:-48px 2px}
a.function-code span{background-position:-76px 2px}
a.function-ul span{background-position:-103px 2px}
a.function-ol span{background-position:-130px 2px}
a.function-blockquote span{background-position:-157px 2px}
a.function-hr span{background-position:-184px 2px}
a.function-h1 span{background-position:-211px 2px}
a.function-h2 span{background-position:-238px 2px}
a.function-h3 span{background-position:-265px 2px}
a.function-link span{background-position:-292px 2px}
a.function-image span{background-position:-318px 2px}
a.function-emoji{background-position:0 2px}a.function-emoji:hover{color:#000 !important}
a.function-emoji i{background:none;line-height:29px}
a.function-preview{background-position:0 2px}a.function-preview:hover{color:#000 !important}
a.function-preview i{font-size:16px;background:none;line-height:29px}
a.function-help span{background-position:-399px 2px}
div.markdown-preview{min-height:20px;margin-top:10px}
.gollum-editor .gollum-editor-function-bar a.disabled{display:none}
.gollum-editor .gollum-editor-function-bar span.function-divider{display:block;float:left;width:.5em}
.gollum-editor .gollum-editor-function-bar .gollum-editor-format-selector{overflow:hidden;padding:0 0 1.1em 0}
.gollum-editor .gollum-editor-function-bar .gollum-editor-format-selector select{background-color:#f9f9f9;border:1px solid transparent;float:right;font-size:1.1em;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:bold;line-height:1.6em;padding:.5em .7em;margin-bottom:0;border-radius:.5em;-moz-border-radius:.5em;-webkit-border-radius:.5em;-moz-outline:none}
.gollum-editor .gollum-editor-function-bar .gollum-editor-format-selector select:hover{background-color:#fff;border:1px solid #ddd;-moz-outline:none}
.gollum-editor .gollum-editor-function-bar .gollum-editor-format-selector label{color:#999;float:right;font-size:1.1em;font-weight:bold;line-height:1.6em;padding:.6em .5em 0 0}
.gollum-editor .gollum-editor-function-bar .gollum-editor-format-selector label:after{content:':'}
textarea.gollum-editor-body{background:#fff;border:1px solid #ddd;font-size:14px;line-height:180%;margin:0;margin-top:10px;padding:.5em;height:14em;resize:none}
textarea.gollum-editor-full{resize:none}
.gollum-editor-help{margin:0;overflow:hidden;padding:0;border:1px solid #ddd;border-width:0 1px 1px 1px}.gollum-editor-help .gollum-editor-help-parent,.gollum-editor-help .gollum-editor-help-list{display:block;float:left;height:17em;list-style-type:none;overflow:auto;margin:0;padding:1em 0;width:18%}
.gollum-editor-help .gollum-editor-help-parent{border-right:1px solid #eee}
.gollum-editor-help .gollum-editor-help-list{background:#fafafa;border-right:1px solid #eee}
.gollum-editor-help .gollum-editor-help-parent li,.gollum-editor-help .gollum-editor-help-list li{line-height:1.6em;margin:0;padding:0}
.gollum-editor-help .gollum-editor-help-parent li a,.gollum-editor-help .gollum-editor-help-list li a{border:1px solid transparent;border-width:1px 0;display:block;font-weight:bold;height:100%;width:auto;padding:.2em 1em;text-shadow:0 -1px 0 #fff}
.gollum-editor-help .gollum-editor-help-parent li a:hover,.gollum-editor-help .gollum-editor-help-list li a:hover{background:#fff;border-color:#f0f0f0;text-decoration:none;box-shadow:none}
.gollum-editor-help .gollum-editor-help-parent li a.selected,.gollum-editor-help .gollum-editor-help-list li a.selected{border:1px solid #eee;border-bottom-color:#e7e7e7;border-width:1px 0;background:#fff;color:#000;box-shadow:0 1px 2px #f0f0f0}
.gollum-editor-help .gollum-editor-help-wrapper{background:#fff;overflow:auto;height:17em;padding:1em}.gollum-editor-help .gollum-editor-help-wrapper .gollum-editor-help-content{font-size:1.2em;margin:0 1em 0 .5em;padding:0;line-height:1.8em}.gollum-editor-help .gollum-editor-help-wrapper .gollum-editor-help-content p{margin:0 0 1em 0;padding:0}
.editor-wrap{border:solid 1px #e1e1e1;background:#f9f9f7;padding:10px;margin-bottom:10px}.editor-wrap input[type="text"]{height:36px}
.webkit .gollum-editor input.gollum-editor-submit{padding:.5em 1em .45em}
.ie .gollum-editor input.gollum-editor-submit{padding:.4em 1em .5em}
.ie .gollum-editor{padding-bottom:1em}
.ie .gollum-editor .singleline input{padding-top:.25em;padding-bottom:.75em}
#gollum-dialog-dialog{display:block;overflow:visible;position:absolute;top:50%;left:50%}
#gollum-dialog-dialog.active{display:block}
#gollum-dialog-dialog-inner{margin:0 0 0 -225px;position:relative;width:450px;border:7px solid #999;border:7px solid rgba(0,0,0,0.3);border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px}
#gollum-dialog-dialog-bg{background-color:#fff;overflow:hidden;padding:1em;background:-webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#fff));background:-moz-linear-gradient(top, #f7f7f7, #fff)}
#gollum-dialog-dialog-inner h4{border-bottom:1px solid #ddd;color:#000;font-size:1.8em;line-height:normal;font-weight:bold;margin:0 0 .75em 0;padding:0 0 .3em 0}
#gollum-dialog-dialog-body{font-size:1.2em;line-height:1.6em}
#gollum-dialog-dialog-body fieldset{display:block;border:0;margin:0;overflow:hidden;padding:0}
#gollum-dialog-dialog-body fieldset .field{margin:0 0 1.5em 0;padding:0}
#gollum-dialog-dialog-body fieldset .field label{color:#000;display:block;font-size:1.2em;font-weight:bold;line-height:1.6em;margin:0;padding:0;min-width:80px}
#gollum-dialog-dialog-body fieldset .field input[type="text"]{border:1px solid #ddd;display:block;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:1.2em;line-height:1.6em;margin:.3em 0 0 0;padding:.3em .5em;width:96.5%}
#gollum-dialog-dialog-body fieldset .field input.code{font-family:'Monaco','Courier New',Courier,monospace}
#gollum-dialog-dialog-body fieldset .field:last-child{margin:0 0 1em 0}
#gollum-dialog-dialog-buttons{border-top:1px solid #ddd;overflow:hidden;margin:1.5em 0 0 0;padding:1em 0 0 0}
#gollum-dialog-dialog a.minibutton{float:right;margin-right:.5em;width:auto}
#gollum-dialog-dialog a.minibutton,#gollum-dialog-dialog a.minibutton:visited{background-color:#f7f7f7;border:1px solid #d4d4d4;color:#333;cursor:pointer;display:block;font-size:1.2em;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:bold;margin:0 0 0 .8em;padding:.4em 1em;text-shadow:0 1px 0 #fff;filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr='#f4f4f4', endColorstr='#ececec');background:-webkit-gradient(linear, left top, left bottom, from(#f4f4f4), to(#ececec));background:-moz-linear-gradient(top, #f4f4f4, #ececec);border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px}
#gollum-dialog-dialog a.minibutton:hover{background:#3072b3;border-color:#518cc6 #518cc6 #2a65a0;color:#fff;text-shadow:0 -1px 0 rgba(0,0,0,0.3);text-decoration:none;filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr='#599bdc', endColorstr='#3072b3');background:-webkit-gradient(linear, left top, left bottom, from(#599bdc), to(#3072b3));background:-moz-linear-gradient(top, #599bdc, #3072b3)}
.avatar{position:relative;display:inline-block;zoom:1}.avatar .avatar-face{display:inline-block;position:relative;zoom:1}.avatar .avatar-face .avatar-text{text-align:center;overflow:hidden;display:inline-block;zoom:1;vertical-align:middle;background:#e7e7df;font-size:16px;height:40px;line-height:40px;width:40px;border-radius:50%;color:#d84c31;text-shadow:transparent 0 0 0}
.avatar .avatar-face img{border-radius:50%;width:40px;height:40px;background:#f7f7f7;-webkit-box-shadow:0 0 1px #ddd;box-shadow:0 0 1px #ddd}
.avatar .avatar-face i{padding:0 !important;display:inline-block;position:absolute;right:0;bottom:0;z-index:3}.avatar .avatar-face i.status-point{right:8px;overflow:hidden;font-size:0;-webkit-text-size-adjust:none;width:7px;height:7px;border-width:1px;border-radius:2px;border-style:solid}.avatar .avatar-face i.status-point.online{background-color:#8fdc00;border-color:#48c000}
.avatar .avatar-face i.status-point.offline{background-color:#d4d4d4;border-color:#b8b8b8}
.avatar .avatar-face i.status-point.leave{background-color:#ffd700;border-color:#daa520}
.avatar .avatar-face i.icon-user.online{color:#48c000}
.avatar .avatar-face i.icon-user.leave{color:#daa520}
.avatar .avatar-face i.icon-user.offline{color:#b8b8b8}
.avatar:hover{opacity:.7}
.avatar.avatar-80 .avatar-text{width:80px;height:80px;line-height:80px !important;font-size:35px}
.avatar.avatar-80 img{width:80px;height:80px}
.avatar.avatar-80 i.status-point{right:19px}
.avatar.avatar-56 .avatar-text{width:56px;height:56px;line-height:56px !important;font-size:25px}
.avatar.avatar-56 img{width:56px;height:56px}
.avatar.avatar-56 i.status-point{right:9px}
.avatar.avatar-50 .avatar-text{width:50px;height:50px;line-height:50px}
.avatar.avatar-50 img{width:50px;height:50px}
.avatar.avatar-50 i.status-point{right:6px}
.avatar.avatar-40 i.status-point{right:2px}
.avatar.avatar-30 .avatar-text{width:30px;height:30px;line-height:30px}
.avatar.avatar-30 img{width:30px;height:30px}
.avatar.avatar-30 i.status-point{right:0}
.avatar-add{text-align:center;color:#8a959e}.avatar-add:hover{color:#d84c31;opacity:.7}.avatar-add:hover .o{color:#d84c31;border:solid 1px #d84c31}
.avatar-add.avatar-56 .o{width:56px;height:56px;line-height:56px;font-size:23px !important}
.avatar-add .o{width:40px;height:40px;line-height:40px;color:#8a959e;border:solid 1px #8a959e;border-radius:50%;display:inline-block;font-size:18px !important}
.popbox-avatar .avatar-body{position:relative;overflow-x:hidden;overflow-y:auto;padding:15px 15px 8px 15px;overflow:hidden;zoom:1;width:300px;margin-bottom:10px}.popbox-avatar .avatar-body:before,.popbox-avatar .avatar-body:after{content:" ";display:table}
.popbox-avatar .avatar-body:after{clear:both}
.popbox-avatar .avatar-body:before,.popbox-avatar .avatar-body:after{content:" ";display:table}
.popbox-avatar .avatar-body:after{clear:both}
.popbox-avatar .avatar-body button.back,.popbox-avatar .avatar-body button.cancel{padding:0;cursor:pointer;background:transparent;border:0;-webkit-appearance:none;margin-top:4px;opacity:.2;filter:alpha(opacity=20)}.popbox-avatar .avatar-body button.back:hover,.popbox-avatar .avatar-body button.cancel:hover{opacity:.4;filter:alpha(opacity=40)}
.popbox-avatar .avatar-body button.back{float:left}
.popbox-avatar .avatar-body button.cancel{float:right}
.popbox-avatar .avatar-body .avatar{float:left;margin-right:10px}.popbox-avatar .avatar-body .avatar img{display:block}
.popbox-avatar .avatar-body .text-muted{color:#ccc}
.popbox-avatar .avatar-body .member_desc{margin-top:15px}.popbox-avatar .avatar-body .member_desc:before,.popbox-avatar .avatar-body .member_desc:after{content:" ";display:table}
.popbox-avatar .avatar-body .member_desc:after{clear:both}
.popbox-avatar .avatar-body .member_desc:before,.popbox-avatar .avatar-body .member_desc:after{content:" ";display:table}
.popbox-avatar .avatar-body .member_desc:after{clear:both}
.popbox-avatar .avatar-body .member_desc span{width:200px;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis}
.popbox-avatar .avatar-footer{width:300px;border-top:solid 1px #fff;padding:5px 15px;text-align:right;background:#f9f9f7;line-height:32px;border-top:solid 1px #e1e1e1}.popbox-avatar .avatar-footer:before,.popbox-avatar .avatar-footer:after{content:" ";display:table}
.popbox-avatar .avatar-footer:after{clear:both}
.popbox-avatar .avatar-footer:before,.popbox-avatar .avatar-footer:after{content:" ";display:table}
.popbox-avatar .avatar-footer:after{clear:both}
.popbox-avatar a:hover{color:#d14836}
.avatar-right{overflow:hidden;zoom:1;margin-left:30px}.avatar-right h4.avatar-heading{font-size:16px;margin:4px 0 8px;display:inline-block}
.avatar-right p{word-wrap:break-word;word-break:break-all;margin:0}
.member-pendding{opacity:.5}.member-pendding:hover{opacity:.8}
.markdown{line-height:180%}.markdown a{word-break:break-all}
.markdown p{margin:5px 0 15px 0}
.markdown h1{font-size:24px;border-bottom:1px solid #e1e1e1;line-height:180%}
.markdown h2{font-size:22px;border-bottom:1px solid #e1e1e1;line-height:180%}
.markdown h3{font-size:20px}
.markdown h4{font-size:18px}
.markdown h5{font-size:16px}
.markdown h6{font-size:14px}
.markdown pre{background-color:#f9f9f7;padding:10px;line-height:24px;border:1px solid #e1e1e1}
.markdown blockquote{font-size:14px;margin-left:10px;padding:5px 10px;margin-bottom:10px;border-left:solid 5px #f2f2ea;color:#999}.markdown blockquote p{font-size:14px;line-height:180%}.markdown blockquote p:last-child{margin-bottom:0 !important}
.markdown ul,.markdown ol{margin-left:30px;margin-bottom:20px}
.markdown ul li{list-style-type:disc}
.markdown ol li{list-style-type:decimal}
.markdown hr{margin:15px 0;border:0;border-top:1px solid #e1e1e1}
.markdown img{max-width:98%;margin:15px;border:solid 5px #fbfbfb;-webkit-box-shadow:0 0 3px #eee, inset 0 0 3px white;box-shadow:0 0 3px #eee, inset 0 0 3px white}.markdown img.emoji{width:22px;height:22px;margin:0;border:0;box-shadow:0 0 0 #fff,inset 0 0 0 #fff}
.markdown code{white-space:pre-line}
.markdown pre code{white-space:pre-wrap}
.markdown table{width:100%;max-width:100%;margin-bottom:20px;border:1px solid #ddd}.markdown table th{text-align:center}.markdown table th[align=left]{text-align:left}
.markdown table th[align=right]{text-align:right}
.markdown table>thead>tr>th,.markdown table>tbody>tr>th,.markdown table>tfoot>tr>th,.markdown table>thead>tr>td,.markdown table>tbody>tr>td,.markdown table>tfoot>tr>td{padding:8px;line-height:1.428571429;vertical-align:top;border-top:1px solid #ddd}
.markdown table>thead>tr>th{vertical-align:bottom;border-bottom:2px solid #ddd}
.markdown table>caption+thead>tr:first-child>th,.markdown table>colgroup+thead>tr:first-child>th,.markdown table>thead:first-child>tr:first-child>th,.markdown table>caption+thead>tr:first-child>td,.markdown table>colgroup+thead>tr:first-child>td,.markdown table>thead:first-child>tr:first-child>td{border-top:0}
.markdown table>tbody+tbody{border-top:2px solid #ddd}
.markdown table .table{background-color:#fff}
.markdown table>thead>tr>th,.markdown table>tbody>tr>th,.markdown table>tfoot>tr>th,.markdown table>thead>tr>td,.markdown table>tbody>tr>td,.markdown table>tfoot>tr>td{border:1px solid #ddd}
.markdown table>thead>tr>th,.markdown table>thead>tr>td{border-bottom-width:2px}
.markdown-chat h1,.markdown-chat h2,.markdown-chat h3,.markdown-chat h4,.markdown-chat h5,.markdown-chat h6{font-size:16px;border-bottom:0 none transparent;margin:5px 0}
.markdown-chat p{margin-bottom:0;line-height:150%}
.markdown-chat blockquote{margin:0;padding:0 10px;opacity:.7;border-color:#ccc;font-size:14px}
.fileinput-button{position:relative;overflow:hidden;display:block}
.fileinput-button input{position:absolute;top:0;bottom:0;right:0;margin:0;opacity:0;filter:alpha(opacity=0);transform:translate(-300px, 0) scale(4);font-size:23px;direction:ltr;cursor:pointer}
.fileupload-buttonbar .btn,.fileupload-buttonbar .toggle{margin-bottom:5px}
.success-panel{margin:0;padding-top:5%;padding-bottom:10%;text-align:center}.success-panel span{font-size:18px;line-height:36px;color:#555}.success-panel span em{color:#d14836}
.icon-white{color:#fff}
.icon-xx{width:14px;height:14px;display:inline-block !important;zoom:1}
.icon-s{font-size:.8em !important;width:.8em !important;height:.8em !important;line-height:.8em !important;text-shadow:0 0 3px #fff,0 0 3px #fff,0 0 3px #fff,0 0 3px #fff,0 0 3px #fff,0 0 3px #fff,0 0 3px #fff;position:absolute;right:0;bottom:2px}
.icon-blue{background:#5297cc}
.icon-green{background:#88b33e}
.icon-orange{background:#eb7e3b}
.icon-red{background:#e65845}
.icon-dark-blue{background:#3a99a6}
.icon-purple{background:#9d569d}
.imgicon-success,.imgicon-warning,.imgicon-warning-sitemap{zoom:1;display:inline-block;width:81px;height:81px;background:transparent center center no-repeat}
.imgicon-warning{background-image:url("images/imgicon_warning.png")}
.imgicon-success{background-image:url("images/imgicon_success.png")}
.imgicon-warning-sitemap{background-image:url("images/imgicon_warning_sitemap.png")}
.icon-private{color:#d61818}.icon-private:before{content:"\f023"}
.icon-protected{color:#ecba05}.icon-protected:before{content:"\f09c"}
.icon-public{color:#15945f}.icon-public:before{content:"\f0ac"}
.common-content-panel{background:#f9f9f7}.common-content-panel .content-container{width:97%;max-width:1600px;margin-right:auto;margin-left:auto;padding-top:15px;margin-bottom:30px}.common-content-panel .content-container:before,.common-content-panel .content-container:after{content:" ";display:table}
.common-content-panel .content-container:after{clear:both}
.common-content-panel .content-container:before,.common-content-panel .content-container:after{content:" ";display:table}
.common-content-panel .content-container:after{clear:both}
.common-content-panel .content-container .content{width:75%;float:right}.common-content-panel .content-container .content .content-wrapper{background:#fbfbfb;border:solid 1px #e1e1e1;-webkit-box-shadow:0 0 3px #eee,inset 0 0 3px #fff;box-shadow:0 0 3px #eee,inset 0 0 3px #fff;min-height:478px;padding:20px}.common-content-panel .content-container .content .content-wrapper .content-title{color:#d84c31;font-size:24px;border-bottom:solid 1px #e1e1e1;padding-bottom:10px}
.common-content-panel .content-container .sidebar{width:24%;float:left}.common-content-panel .content-container .sidebar .sidebar-widget{background:#fbfbfb;border:solid 1px #e1e1e1;margin-bottom:15px;-webkit-box-shadow:0 0 3px #eee,inset 0 0 3px #fff;box-shadow:0 0 3px #eee,inset 0 0 3px #fff;padding:15px}.common-content-panel .content-container .sidebar .sidebar-widget h4{border-bottom:solid 1px #e1e1e1;margin:0;margin-bottom:10px;padding-bottom:10px;font-size:16px}
.common-content-panel .content-container .sidebar .sidebar-widget .widget-text{line-height:2.4em}
.common-content-panel .content-container .sidebar .sidebar-widget ul{margin:0}.common-content-panel .content-container .sidebar .sidebar-widget ul li{padding-top:10px;padding-bottom:10px;padding-left:15px}.common-content-panel .content-container .sidebar .sidebar-widget ul li i{margin-right:5px}
.common-content-panel .content-container .sidebar .sidebar-widget ul li.active a{color:#d84c31}
.single-panel{background:#f9f9f7;overflow:hidden}.single-panel .single-panel-inner{width:960px;margin:30px auto;margin-bottom:50px;border:1px solid #e1e1e1;-webkit-box-shadow:0 0 3px #eee,inset 0 0 3px #fff;box-shadow:0 0 3px #eee,inset 0 0 3px #fff;background:#fbfbfb;padding:20px}.single-panel .single-panel-inner h3,.single-panel .single-panel-inner h4{margin:0}
.single-panel .single-panel-inner.mini{width:500px}.single-panel .single-panel-inner.mini .single-panel-body form{margin:0 5% !important}
.single-panel .single-panel-inner.middle{width:680px}.single-panel .single-panel-inner.middle .single-panel-body form{margin:0 5% !important}
.single-panel .single-panel-inner .single-panel-header{border-bottom:solid 0px #e1e1e1;padding-bottom:10px;position:relative}.single-panel .single-panel-inner .single-panel-header h3{line-height:40px;color:#5c6371;font-size:24px}
.single-panel .single-panel-inner .single-panel-header .side-link{position:absolute;top:10px;right:10px}
.single-panel .single-panel-inner .single-panel-body{border-top:solid 1px #e1e1e1;margin-top:5px;padding-bottom:20px;padding-top:20px}.single-panel .single-panel-inner .single-panel-body p{line-height:180%;text-indent:2em}
.single-panel .single-panel-inner .single-panel-body .panel-tips{margin-bottom:20px}.single-panel .single-panel-inner .single-panel-body .panel-tips span{color:#d84c31}
.single-panel .single-panel-inner .single-panel-body .single-panel-section{margin-top:10px}.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-header h4{color:#d84c31}.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-header h4 span{font-size:14px;color:#aaa;margin-left:10px}
.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content{padding-top:15px}.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content:before,.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content:after{content:" ";display:table}
.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content:after{clear:both}
.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content:before,.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content:after{content:" ";display:table}
.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content:after{clear:both}
.single-panel .single-panel-inner .single-panel-body .single-panel-section .single-panel-section-content .input-group-btn button{border-left:0}
.single-panel .single-panel-inner .single-panel-body .single-panel-section form{margin:0 15%}.single-panel .single-panel-inner .single-panel-body .single-panel-section form .alert{margin-bottom:0}
.single-panel .single-panel-inner .single-panel-body .single-panel-section form a.dropdown-toggle{line-height:20px}
.single-panel .single-panel-inner .single-panel-footer{min-height:40px;border-top:1px solid #e1e1e1;background:#fbfbfb;line-height:54px}
.error-panel{margin:0;padding-top:7%;padding-bottom:10%;text-align:center}.error-panel i{font-size:160px;color:#f2f2ea}
.error-panel span{font-size:18px;line-height:36px;color:#999}
.shortcut-column .shortcut-section ul li .key{display:inline-block;width:77px;text-align:right}.shortcut-column .shortcut-section ul li .key a{background:#fff;border-radius:5px;border:1px solid #d3d3d3;border-bottom-color:#bbb;-webkit-box-shadow:0 2px 3px rgba(0,0,0,0.1);box-shadow:0 2px 3px rgba(0,0,0,0.1);color:#666;cursor:default;display:inline-block;font-weight:bold;font-size:16px;margin:0 5px 10px 0;padding:6px 10px}
.shortcut-column .shortcut-section-horizontal{position:absolute;bottom:155px;left:17px}
.shortcut-column .shortcut-section-horizontal ul li .key{display:inline-block;width:77px;text-align:right}.shortcut-column .shortcut-section-horizontal ul li .key a{background:#fff;border-radius:5px;border:1px solid #d3d3d3;border-bottom-color:#bbb;-webkit-box-shadow:0 2px 3px rgba(0,0,0,0.1);box-shadow:0 2px 3px rgba(0,0,0,0.1);color:#666;cursor:default;display:inline-block;font-weight:bold;font-size:16px;margin:0 5px 10px 0;padding:6px 10px}
a{color:#666;outline:0 none}a:link{color:#666;outline:0 none}
a:hover{color:#d14836;text-decoration:none}
a:focus{text-decoration:none}
header#header{height:58px;background:#393939;position:relative}header#header #warning_info{background-color:#fcf8e3;border:1px solid #fbeed5;padding:8px 35px 8px 14px;position:absolute;top:58px;left:0;right:0;z-index:2000}
header#header nav.navbar{border:0;margin:0;height:58px;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,0.15),0 1px 5px rgba(57,57,57,0.075);box-shadow:inset 0 1px 0 rgba(255,255,255,0.15),0 1px 5px rgba(57,57,57,0.075);background:#393939;margin:0 auto;height:58px}header#header nav.navbar:before,header#header nav.navbar:after{content:" ";display:table}
header#header nav.navbar:after{clear:both}
header#header nav.navbar:before,header#header nav.navbar:after{content:" ";display:table}
header#header nav.navbar:after{clear:both}
header#header nav.navbar#header_outer ul#header_menu{margin-left:200px}header#header nav.navbar#header_outer ul#header_menu>li{margin-right:5px}header#header nav.navbar#header_outer ul#header_menu>li.divider-vertical{border-left-color:#111;border-right-color:#363636}
header#header nav.navbar#header_outer ul#header_menu>li>a{line-height:35px;height:35px;padding:0 20px;margin-top:12px;border-radius:3px;color:#aaa}header#header nav.navbar#header_outer ul#header_menu>li>a:hover{color:#fff}
header#header nav.navbar#header_outer ul#header_menu>li.active>a{color:#fff;background:#555;box-shadow:none}
header#header nav.navbar#header_outer div#header_me{height:58px}header#header nav.navbar#header_outer div#header_me ul.nav{margin-right:0}header#header nav.navbar#header_outer div#header_me ul.nav li a{padding-right:0;color:#aaa}
header#header nav.navbar#header_inner .navbar-header a#header_logo:hover{background-position:left -58px}
header#header nav.navbar#header_inner #header_search{height:58px;margin-left:220px;position:relative}header#header nav.navbar#header_inner #header_search .navbar-form{margin-top:13px;padding:0;padding-right:10px}header#header nav.navbar#header_inner #header_search .navbar-form i.icon-search{position:absolute;left:6px;top:21px;font-size:13px;color:#000;z-index:2}
header#header nav.navbar#header_inner #header_search .navbar-form input.typeahead{position:absolute;z-index:3;font-size:12px;color:#555;background:rgba(255,255,255,0.75);width:305px;height:32px;padding:5px 5px 5px 25px;margin:0;border:solid 1px #555;border-radius:3px;vertical-align:middle;float:left;outline:none}header#header nav.navbar#header_inner #header_search .navbar-form input.typeahead::-webkit-input-placeholder{color:#666}
header#header nav.navbar#header_inner #header_search .navbar-form input.typeahead:-moz-placeholder{color:#666}
header#header nav.navbar#header_inner #header_search .navbar-form input.typeahead:focus{z-index:1;-webkit-transition:background 150ms linear;-o-transition:background 150ms linear;transition:background 150ms linear;background-color:#fff}
header#header nav.navbar#header_inner div#header_menu ul.nav>li>a{line-height:58px;padding:0 25px;color:#aaa}header#header nav.navbar#header_inner div#header_menu ul.nav>li>a:hover{color:#d14836;background:rgba(255,255,255,0.05)}
header#header nav.navbar#header_inner div#header_menu ul.nav>li .icon-plus,header#header nav.navbar#header_inner div#header_menu ul.nav>li .icon-bell-alt{font-size:16px}
header#header nav.navbar#header_inner div#header_menu ul.nav>li .notice-menu{white-space:nowrap}header#header nav.navbar#header_inner div#header_menu ul.nav>li .notice-menu .label{font-size:12px !important;font-weight:300;text-align:center;height:14px;padding:2px 6px;border-radius:2px !important;text-shadow:none !important}header#header nav.navbar#header_inner div#header_menu ul.nav>li .notice-menu .label.label-default{color:#777;background-color:#aaa}
header#header nav.navbar#header_inner div#header_menu ul.nav>li .notice-menu .label.label-danger{color:#fff;background-color:#d84c31}
header#header nav.navbar#header_inner ul#header_me a{display:block;padding-right:15px !important}header#header nav.navbar#header_inner ul#header_me a span.avatar-face .status{bottom:12px}
header#header nav.navbar .navbar-header a#header_logo{left:0;bottom:0;border:0;display:block;padding:0;width:220px;height:58px;overflow:hidden;line-height:100em;text-indent:200em;background-repeat:no-repeat;background-image:url('images/logo.png')}@media (-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx){header#header nav.navbar .navbar-header a#header_logo{background-image:url("images/logo@2x.png");background-size:220px 174px}}header#header nav.navbar .navbar-header a#header_logo:hover{background-position:left bottom}
header#header nav.navbar .navbar-right:last-child{margin-right:0}
header#header ul.nav>li{line-height:58px}header#header ul.nav>li>a{height:58px;line-height:58px;padding-top:0;padding-bottom:0}header#header ul.nav>li>a:hover{color:#fff;background:none}
header#header ul.nav>li>a:focus{background:none}
header#header ul.nav>li.divider-vertical{border-style:solid;border-width:1px;opacity:.5;height:58px;border-left-color:#111415;border-right-color:#646668}
@media (min-width:768px) and (max-width:910px){ul#header_menu{margin-left:90px !important} a#header_logo{width:59px !important} #header_search{margin-left:60px !important}}@media (max-width:768px){ul#header_menu{margin-left:auto !important} .navbar-collapse{background:#393939 !important;margin:0 -2% 0 -2%}}

</style>
</head>

<body style="padding:0; margin:0">
 <!--[if lte IE 9]>
    <div id="warning_info" class="text-warning fade in mb_0" style="margin:100px;text-align:center">
        <button data-dismiss="alert" class="close" type="button"></button>
        <strong>您正在使用低版本浏览器，</strong> 需要升级浏览器才能使用此功能。<br>
        建议您升级到
        <a href="http://www.google.cn/intl/zh-CN/chrome/" target="_blank">Chrome</a>
        或以下浏览器：
        <a href="www.mozilla.org/en-US/firefox/‎" target="_blank">Firefox</a> /
        <a href="http://www.apple.com.cn/safari/" target="_blank">Safari</a> /
        <a href="http://www.opera.com/" target="_blank">Opera</a> /
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank">
            Internet Explorer 10</a>
    </div>
    <style>
    .wt{display:none}
    </style>
   
<![endif]-->
<script type="text/javascript" language="javascript">

    function iFrameHeight() {

        var ifm= document.getElementById("iframepage");


            if(ifm != null) {

            ifm.height = $(document).height();

            }

    }
    
$(document).ready(function()
{ 

});
$(window).resize(function(){
   iFrameHeight();
});
</script> 
<iframe marginheight="0" marginwidth="0" frameborder="0" width="100%" id="iframepage" name="iframepage" class="wt" onLoad='iFrameHeight()' src="http://115.29.211.223/<?php echo ($helpParm); ?>"></iframe>

</body>
</html>