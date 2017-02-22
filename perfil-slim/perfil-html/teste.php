<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>gallery tabs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>

	*{
		-webkit-box-sizing: border-box;
	  	-moz-box-sizing: border-box;
		box-sizing: border-box;
		}

	html, body{
		background-color:#F2F2F2;
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
		margin:0;
		padding:0;
		height:100%;
		width:100%;
		text-align:center;
		color:#404040;
		position:relative;
	}

	a{
		-webkit-transition: all 0.3s ease;
	    -moz-transition: all 0.3s ease;
	    -o-transition: all 0.3s ease;
	    transition: all 0.3s ease;
	}

	.wrapper{
		width:450px;
		margin:30px auto 0;
		background-color:#FFFFFF;
		-webkit-box-sizing: border-box;
	  	-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	header{
		text-align:right;
		padding:10px;
		margin-bottom:10px;
		background-color:#5DBA9D;
	}

	header a{
		font-size:20px;
		color:#FFFFFF;
		width:40px;
		height:40px;
		line-height:40px;
		margin-left:10px;
		text-align:center;
		display:inline-block;
	}

	header a:hover, .list-mode header a.hide-list:hover{
		background-color:#11956c;
	}

	header a.hide-list{
		background-color:#11956c;
	}

	.list-mode header a.hide-list{
		background-color: #5DBA9D;
	}

	.list-mode header a.show-list{
		background-color: #11956c;
	}

	.list-mode header a.show-list-single{
		background-color: #ffffff;
	}

	.container:after{
		content: "";
		clear: both;
		display: table;
	}

	.container{
		padding:10px 0 10px 10px;
	}

	.wrapper .box{
		float:left;
		width: 100px;
		height: 100px;
		margin:0 10px 10px 0;
		background-color:#CCCCCC;
		-webkit-transition:all 1.0s ease;
		-moz-transition:all 1.0s ease;
		transition:all 1.0s ease;
		transition:all 1.0s ease;
	}

	.wrapper.list-mode .container{
		padding-right: 10px;
	}

	.wrapper.list-mode .box{
		width: 100%;
	}

	.wrapper.list-mode-single .container{
		padding-right:10px;
	}

	.wrapper.list-mode-single .box{
		width: 10%;
	}
</style>
</head>
<body>
	<div class="wrapper">

	    <div class="container">
	    	<div class="box">
	    	</div>
	        <div class="box">
	        	
	        </div>
	    </div>

	</div>
 	<header>
    	<a href="javascript:void(0)" class="show-list-single">
    		<i class="fa fa-square-o"></i>
    	</a>
    	<a href="javascript:void(0)" class="show-list">
    		<i class="fa fa-th-list"></i>
    	</a>
        <a href="javascript:void(0)" class="hide-list">
        	<i class="fa fa-th"></i>
        </a>
    </header>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="http://codepen.io/WhiteWolfWizard/pen/51307327227e72044ecac64310404cb3.js"></script>
<script>
	$('.show-list-single').click(function(){
		$('.wrapper').removeClass('list-mode');
		$('.wrapper').addClass('list-mode-single');
	});

	$('.show-list').click(function(){
		$('.wrapper').removeClass('list-mode-single');
		$('.wrapper').addClass('list-mode');
	});

	$('.hide-list').click(function(){
		$('.wrapper').removeClass('list-mode-single');
		$('.wrapper').removeClass('list-mode');
	});

</script>


</body>
</html>
