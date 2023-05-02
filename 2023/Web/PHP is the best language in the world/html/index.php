<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Powerful PHP t00l!</title>
<!-- 引入 jQuery.js -->
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Noto+Sans+Inscriptional+Pahlavi&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">

<script>
	//复制文本
	function copyInnerText(text)
	{
		var tmpInput = document.createElement("input");
		tmpInput.setAttribute("type","text");
		tmpInput.setAttribute("value", text);
		document.body.appendChild(tmpInput);
		tmpInput.select();
		document.execCommand("cut");
		tmpInput.remove();
		return true;
	}
	
	$(function(){
		$("#copyRunResult").on('click',function(){
			copyInnerText($("#run_result").html());
			$("#msg").html("复制成功");
			window.setTimeout(function(){
				$("#msg").html("");
			}, 1000);
		});
	
	})

</script>

<style type="text/css">
body{
	background-color:#eee;
}
button {  
	background-color: #777;  
	border-color: #fff;  
	color: #fff;  
	-moz-border-radius: 3px;  
	-webkit-border-radius: 3px;  
	border-radius: 2px;
	-khtml-border-radius: 2px;
	text-align: center;  
	vertical-align: middle;  
	border: 1px solid transparent;
}

button:hover{
	cursor: pointer;
	background: #64492b;
}

input{
    border-color: #66afe9;
	border-radius:4px;
	border:1px solid #c8cccf;
	color:#6a6f77;
    outline: 0;

}

input:focus{
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}

textarea:focus{
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}


</style>
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
    <nav class="navbar navbar-light navbar-expand-md fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#">Powerful php tool</a><button data-bs-toggle="collapse"
                class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i
                    class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item nav-link"></li>
                    <li class="nav-item nav-link"></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.7)), url('https://www.dmoe.cc/random.php');">
        <div class="intro-body" style="padding-top: 65px;">
            <div class="container">
                <div class="row">
                    <div class="col"><button id="goJsonTool" onclick="javascript:{window.open('./jsonTool/json.html')}" class="btn btn-primary" id="goJsonTool" type="button"
                            data-bs-toggle="modal" data-bs-target="#modal1"
                            style="border-radius: 46px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">打开json工具</button>
                        <section style="height: 36px;"></section>
                        <div><button class="btn btn-primary" id="formatJson" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal1"
                                style="border-radius: 46px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">格式化json</button><button
                                class="btn btn-primary" id="JsonToArray" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal1"
                                style="border-radius: 46px;margin: 6px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">JsonToArray</button><button
                                class="btn btn-primary" id="UrlEncode" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal1"
                                style="border-radius: 46px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">URL&nbsp;
                                加密<br></button><button class="btn btn-primary" id="UrlDecode" type="button"
                                data-bs-toggle="modal" data-bs-target="#modal1"
                                style="border-radius: 46px;margin: 5px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">URL&nbsp;
                                加密</button><button class="btn btn-primary" id="Base64Encode" type="button"
                                data-bs-toggle="modal" data-bs-target="#modal1"
                                style="border-radius: 46px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">Base64加密</button><button
                                class="btn btn-primary" id="Base64Decode" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal1"
                                style="border-radius: 46px;margin: 6px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">BASE64解密<br></button>
                        </div>
                        <section style="height: -8px;"></section>
						<div class="form-control-plaintext" type="text"
                            id="run_result" value="Out Put" readonly=""
                            style="height: 215px;background: rgba(255,255,255,0.29);border-radius: 21px;color: #ffffff;border-color: #fffdfd;font-weight: bold;"> </div><button
                            class="btn btn-primary" id="copyRunResult" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal1"
                            style="border-radius: 46px;margin: 5px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;border-color: #fffdfd;font-weight: bold;">复制输出内容</button>
                        <div></div>
                    </div>
                    <div class="col-lg-8 mx-auto" style="padding-bottom: 11px;padding-top: -1px;">
                        <h1 class="brand-heading"></h1>
                        <div class="btn-group btn-group-toggle" data-bs-toggle="buttons"></div>



						<textarea name="php_code" id="php_code" 
                            style="height: 343px;width: 674px;color: #ffffff;background: rgba(255,255,255,0.29);border-radius: 37px;border-color: #fffdfd;font-weight: bold;padding-right: 15px;padding-left: 15px;padding-top: 15px;padding-bottom: 15px;"></textarea><button
                            class="btn btn-primary" id="run" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal1"
                            style="border-radius: 46px;background: rgba(255,255,255,0.29);--bs-primary: #919191;--bs-primary-rgb: 145,145,145;--bs-success: #8c8c8c;--bs-success-rgb: 140,140,140;color: #ffffff;margin: 43px;padding-right: 12px;border-color: #fffdfd;font-weight: bold;">Run
                            CODE</button>
                        <p class="intro-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
<script>
var url="do.php";
$(function(){
    $('#now').click(function(){
		$.ajax({
			 type: "POST",
			 url: url,
			 data: {"type":"now"},
			 dataType: "json",
			 success: function(json){
					if(json.code != 0){
						console.log(json.message);
					} else {
						$("#run_result").html(json.message);
						$("#left_input").val(json.data.date);
						$("#right_input").val(json.data.timestamp);
					}
				}
		 });
    });

	$('#to_left').click(function(){
		right_value = $("#right_input").val().trim();
		if(right_value != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"timestamp_to_date","right_value":right_value},
				 dataType: "json",
				 success: function(json){
						if(json.code != 0){
							$("#run_result").html(json.message);
						} else {
							$("#left_input").val(json.data.date);
						}
					}
			 });
		}
    });


	$('#to_right').click(function(){
		left_value = $("#left_input").val().trim() ;
		if(left_value != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"date_to_timestamp","left_value":left_value},
				 dataType: "json",
				 success: function(json){
						if(json.code != 0){
							$("#run_result").html(json.message);
						} else {
							$("#right_input").val(json.data.timestamp);
						}
					}
			 });
		}
    });
	
	
	$('#run').click(function(){
		php_code = $("#php_code").val().trim() ;
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"run","php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
    });
	
	
	$('#JsonToArray').click(function(){
		php_code = $("#php_code").val().trim() ;
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"JsonToArray", "php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
    });
	
	
	//格式化json
	$('#formatJson').click(function(){
		php_code = $("#php_code").val().trim() ;
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"formatJson","php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
		
    });
	
	
	$('#UrlEncode').click(function(){
		php_code = $("#php_code").val().trim() ;
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"UrlEncode", "php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
    });	
	
	$('#UrlDecode').click(function(){
		php_code = $("#php_code").val().trim() ;
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"UrlDecode", "php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
    });
	
	$('#Base64Encode').click(function(){
		php_code = $("#php_code").val().trim() ;
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"Base64Encode", "php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
    });
	
	$('#Base64Decode').click(function(){
		php_code = $("#php_code").val().trim() ;
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"Base64Decode", "php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
    });

	$('#MongoDecode').click(function(){
		php_code = $("#php_code").val();
		if(php_code != ""){
			$.ajax({
				 type: "POST",
				 url: url,
				 data: {"type":"MongoDecode", "php_code":php_code},
				 success: function(json){
						$("#run_result").html(json);
					}
			 });
		}
    });
	
	
	
	function triggerSomething(){
		
	}
	
	
	$(document).keypress(function(e){
			if(e.ctrlKey && e.which == 13 || e.which == 10) {		
					php_code = $("#php_code").val().trim() ;
					if(php_code != ""){
						$.ajax({
							 type: "POST",
							 url: url,
							 data: {"type":"run","php_code":php_code},
							 success: function(json){
									$("#run_result").html(json);
								}
						 });
					}
			}        
	 });

});
</script>
</body>
</html>