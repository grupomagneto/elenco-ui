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
		width: 290px;
		margin: 30px auto 0;
		background-color: #FFFFFF;
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
		background-color: #11956c;
	}
	header a.hide-list{
		background-color: #11956c;
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
		padding: 1px 1px 1px 1px;
	}
	.wrapper .box{
		float: left;
		width: 95px;
		height: 95px;
		margin: 0 1px 1px 0;
		background-color: #CCCCCC;
		-webkit-transition: all 1.0s ease;
		-moz-transition: all 1.0s ease;
		transition: all 1.0s ease;
	}
	.wrapper .box .photo{
		float: left;
		width: 95px;
		height: 95px;
		margin: 0 1px 1px 0;
		background-color: #CCCCCC;
		-webkit-transition: all 1.0s ease;
		-moz-transition: all 1.0s ease;
		transition: all 1.0s ease;
		transition: all 1.0s ease;
	}
	.wrapper.list-mode .container{
		padding-right: 1px;
	}
	.wrapper.list-mode .box{
		width: 142px;
		height: 142px;
	}
	.wrapper.list-mode .box .photo{
		width: 142px;
		height: 142px;
	}
	.wrapper.list-mode-single .container{
		padding-right: 5px;
	}
	.wrapper.list-mode-single .box{
		width: 100%;
		position: relative;
	}
	.wrapper.list-mode-single .box:nth-child(even) {
		margin-top: -92px;
		width: 100%;
	}
	.wrapper.list-mode-single .box:nth-child(odd) {
		margin-top: -92px;
		width: 100%;
	}
	.wrapper.list-mode-single .box:first-of-type {
		margin-top: 5px;
		width: 100%;
	}
	.wrapper.list-mode-single .box .photo{
		transition: all 100ms ease-in-out;
		-webkit-transition: all 100ms ease-in-out;
		-moz-transition: all 100ms ease-in-out;
		-ms-transition: all 100ms ease-in-out;
		-o-transition: all 100ms ease-in-out;
        -o-box-shadow: 0 2px 15px 1px rgba(225, 225, 225, 0.5);
        -ms-box-shadow: 0 2px 15px 1px rgba(225, 225, 225, 0.5);
        -moz-box-shadow: 0 2px 15px 1px rgba(225, 225, 225, 0.5);
        -webkit-box-shadow: 0 2px 15px 1px rgba(225, 225, 225, 0.5);
        box-shadow: 0 1px 4px 1px rgba(0, 0, 0, 0.5);
        border-radius: 2px;
        position: absolute;
        list-style: none;
        height: 100%;
        left: 0;
        right: 0;
        margin: 0 auto;
        text-align: center;
	}
	.wrapper.list-mode-single .box .photo:first-of-type {
		top: 1px;
		width: 100%;
	}

	.animated {
	  -moz-animation-duration: 1s;
	  -webkit-animation-duration: 1s;
	  animation-duration: 1s;
	  -moz-animation-fill-mode: both;
	  -webkit-animation-fill-mode: both;
	  animation-fill-mode: both;
	}

	@-webkit-keyframes rotateOutUpLeft {
	  from {
	    -moz-transform-origin: left bottom;
	    -webkit-transform-origin: left bottom;
	    transform-origin: left bottom;
	  }

	  to {
	    -moz-transform-origin: left bottom;
	    -webkit-transform-origin: left bottom;
	    transform-origin: left bottom;
	    -moz-transform: rotate3d(0, 0, 1, -45deg);
	    -webkit-transform: rotate3d(0, 0, 1, -45deg);
	    transform: rotate3d(0, 0, 1, -45deg);
	  }
	}

	@keyframes rotateOutUpLeft {
	  from {
	    -moz-transform-origin: left bottom;
	    -webkit-transform-origin: left bottom;
	    transform-origin: left bottom;
	  }

	  to {
	    -moz-transform-origin: left bottom;
	    -webkit-transform-origin: left bottom;
	    transform-origin: left bottom;
	    -moz-transform: rotate3d(0, 0, 1, -45deg);
	    -webkit-transform: rotate3d(0, 0, 1, -45deg);
	    transform: rotate3d(0, 0, 1, -45deg);
	  }
	}

	.rotateOutUpLeft {
	  -ms-animation-name: rotateOutUpLeft;
	  -moz-animation-name: rotateOutUpLeft;
	  -webkit-animation-name: rotateOutUpLeft;
	  animation-name: rotateOutUpLeft;
	}

	@-ms-keyframes fadeOutRight {
		from {
			opacity: 1;
		}
		to {
			opacity: 0;
			-ms-transform: translate3d(100%, 0, 0);
			transform: translate3d(100%, 0, 0);
		}
	}

	@-moz-keyframes fadeOutRight {
		from {
			opacity: 1;
		}
		to {
			opacity: 0;
			-moz-transform: translate3d(100%, 0, 0);
			transform: translate3d(100%, 0, 0);
		}
	}


	@-webkit-keyframes fadeOutRight {
	  from {
	    opacity: 1;
	  }

	  to {
	    opacity: 0;
	    -webkit-transform: translate3d(100%, 0, 0);
	    transform: translate3d(100%, 0, 0);
	  }
	}

	@keyframes fadeOutRight {
	  from {
	    opacity: 1;
	  }

	  to {
	    opacity: 0;
	    -webkit-transform: translate3d(100%, 0, 0);
	    transform: translate3d(100%, 0, 0);
	  }
	}

	.fadeOutRight {
	  -webkit-animation-name: fadeOutRight;
	  -moz-animation-name: fadeOutRight;
	  -ms-animation-name: fadeOutRight;
	  animation-name: fadeOutRight;
	}

	@-ms-keyframes fadeOutLeft {
		from {
			opacity: 1;
		}
		to {
			opacity: 0;
			-ms-transform: translate3d(-100%, 0, 0);
			transform: translate3d(-100%, 0, 0);
		}
	}

	@-moz-keyframes fadeOutLeft {
		from {
			opacity: 1;
		}
		to {
			opacity: 0;
			-moz-transform: translate3d(-100%, 0, 0);
			transform: translate3d(-100%, 0, 0);
		}
	}

	@-webkit-keyframes fadeOutLeft {
	  from {
	    opacity: 1;
	  }

	  to {
	    opacity: 0;
	    -webkit-transform: translate3d(-100%, 0, 0);
	    transform: translate3d(-100%, 0, 0);
	  }
	}

	@keyframes fadeOutLeft {
	  from {
	    opacity: 1;
	  }

	  to {
	    opacity: 0;
	    -webkit-transform: translate3d(-100%, 0, 0);
	    transform: translate3d(-100%, 0, 0);
	  }
	}

	.fadeOutLeft {
	  -ms-animation-name: fadeOutLeft;
	  -moz-animation-name: fadeOutLeft;
	  -webkit-animation-name: fadeOutLeft;
	  animation-name: fadeOutLeft;
	}

</style>

</head>
<body>
	
	<div class="wrapper">

	    <div class="container">
	    	<div class="box animated">
	    		<div class="photo"></div>
	    	</div>
	        <div class="box animated">
	        	<div class="photo"></div>
	        </div>
	        <div class="box animated">
	        	<div class="photo"></div>
	        </div>
	        <div class="box animated">
	        	<div class="photo"></div>
	        </div>
	        <div class="box animated">
	        	<div class="photo"></div>
	        </div>
	        <div class="box animated">
	        	<div class="photo"></div>
	        </div>
	    </div>

		<button type="button" class="dislike" id="dislike">dislike</button>
		<button type="button" class="like" id="like">like</button>
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

	$(".dislike").click(function(){
	    $(".wrapper.list-mode-single .box:last-child").addClass('fadeOutLeft');
	  $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
	              function(event) {
	    // Do something when the transition ends
	    $(".wrapper.list-mode-single .box").remove();
	  });
	});

	$(".dislike").click(function (e){
	    $(".wrapper.list-mode-single .box:last-child").addClass('fadeOutLeft');
	});

	$(".like").click(function (e){
	    $(".wrapper.list-mode-single .box:last-child").addClass('fadeOutRight');
	});


	</script>

</body>
</html>
