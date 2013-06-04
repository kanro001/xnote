

function getFilters(uid){
	//alert("begin----------");
	//alert(uid);
	$('.xnote_upload_note').hide();
	$.post("ajax/body.php?action=filter",{
		"uid":uid,
	},
	function(data,status){
		//alert("----------get node successed");
		//var str = "data.data"+"0"+"tag";
		//alert("Data: " + data.success + "\nMsg:" + data.msg + "\nStatus: " + status + "\nNum: " + data.count + "\naddr: " + eval(str));
		//Set Area Sidebar data 
		if(data.success ){
			var article_count = data.count;
			for (var i=0;i <article_count; i++)
			{ 
				var article_content = "<article class=\"xnote_body_section xnote_filter\">"+
		
											"<header>"+
												"<h1 class=\"xnote_filter_title\">"+
													"<a href=\"#\">" + eval("data.data"+ i +"state") + "</a>"+
												"</h1>"+
												"<p class=\"xnote_filter-meta\">"+
													"<a href='javascript:void(0)'>" + eval("data.data"+ i +"tag") + "</a>"+
													"<em> in </em>"+
													"<a href=\"#\">" + eval("data.data"+ i +"dow") + "</a>"+
													"<span> | </span>"+
													"<span> From </span>"+
													"<time class=\"xnote_filter_date\" >" + eval("data.data"+ i +"starttime") + "</time>"+
													"<span> To </span>"+
													"<time class=\"xnote_filter_date\" >" + eval("data.data"+ i +"endtime") + "</time>"+	
												"</p>"+
												"<address class=\"xnote_filter_loc\">"+
													"<strong>" + eval("data.data"+ i +"loc") + "<br/></strong>"+
													"<span>" + eval("data.data"+ i +"long") + "</span>" +
													"<span>" + eval("data.data"+ i +"lat") + "</span>" +
												"</address>"+
												"<div class=\"item_gender\">"+
													"<span>Radius : </span>"+
													"<span>" + eval("data.data"+ i +"rad") + "</span>"+
												"</div>"+
											"</header>"+
										"</article>";
				if(i == 0){
					//alert("--------");
					$('#xnote_body_content').html(article_content);
				}else{
					//alert("--------");
					$('#xnote_body_content').append(article_content);
				}
			}
		}else{
			$('#xnote_body_content').html("");
		}

	},"json").fail(function() {
		alert("content article by area ajax error...");
	});
	
	//alert("end------");
}

function logout(){
	$.post("ajax/login.php?action=logout",
	function(data,status){

		location.assign("index.html");
	}).fail(function() {
		alert("logout error...");
	});
	
}

function getNodes(uid){
	//alert("begin----------");
	//alert(uid);
	$('.xnote_upload_note').hide();
	$.post("ajax/body.php?action=note",{
		"uid":uid,
	},
	function(data,status){
		//alert("----------");
		//var str = "data.data"+"0"+"endtime";
		//alert("Data: " + data.success + "\nMsg:" + data.msg + "\nStatus: " + status + "\nNum: " +  data.count + "\nEndtime: " + eval(str));
		//Set Area Sidebar data 
		if(data.success == 1){
			//alert("-----");
			var article_count = data.count;
			//alert(article_count);
			for (var i=0;i <article_count; i++)
			{ 
				var article_content = "<article class=\"xnote_body_section xnote_filter\">"+
		
											"<header>"+
												"<h2 class=\"xnote_filter_title\">"+
													"<a href=\"#\">" + eval("data.data"+ i +"txt") + "</a>"+
												"</h2>"+
												"<time class=\"xnote_filter_date\" >" + eval("data.data"+ i +"posttime") + "</time>"+
												"<p class=\"xnote_filter-meta\">"+
													"<span>Tag: </span><a href='javascript:void(0)'>" + eval("data.data"+ i +"tag") + "</a>"+
													"<br/><em> Privacy: </em>"+
													"<a href=\"#\">" + eval("data.data"+ i +"privacy") + "</a>"+
													"<br/>"+
													"<span> From </span>"+
													"<time class=\"xnote_filter_date\" >" + eval("data.data"+ i +"start_daytime") + "</time>"+
													"<span> To </span>"+
													"<time class=\"xnote_filter_date\" >" + eval("data.data"+ i +"end_daytime") + "</time>"+	
												"</p>"+
												"<address class=\"xnote_filter_loc\">"+
													"<span>" + eval("data.data"+ i +"lat") + "</span>" +
													"<span>" + eval("data.data"+ i +"long") + "</span>" +
												"</address>"+
												"<div class=\"item_gender\">"+
													"<span>Radius : </span>"+
													"<span>" + eval("data.data"+ i +"radius") + "</span>"+
												"</div>"+
											"</header>"+
										"</article>";
				if(i == 0){
					$('#xnote_body_content').html(article_content);
				}else{
					$('#xnote_body_content').append(article_content);
				}
			}
		}else{
			$('#xnote_body_content').html("");
		}

	},
	
	"json").fail(function() {
		alert("content ajax error...");
	});
	
	//alert("end------");
}

function postNote(){


	//$('.finder_upload_txt').show();
	$('.xnote_upload_note').show();

	$('#finder_upload_txt').show();

	$('#finder_upload_submit').val("New Note");
	$('#xnote_body_content').html("");
}

function newFilter(){

	$('.xnote_upload_note').show();
	$('#finder_upload_txt').hide();
	$('#finder_upload_submit').val("New Filter");
	$('#xnote_body_content').html("");
}

function insertNote(){
	
}

function insertFilter(){
	
}
