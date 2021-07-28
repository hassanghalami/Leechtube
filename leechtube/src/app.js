function refresh(){
alert("boz");
}
function buy(){
	var load=new Nanobar();
	var i=1,e = setInterval(function(){load.go(i++);if(i==100)clearInterval(e)},200)//start loading bar
	$.post( "/tpl/buy.tpl", function( data ) {
		$( ".workbody" ).html( data );

		clearInterval(e);
		load.go(100);//stop  loading bar
	},'html');
}
function shdlist(){
	var load=new Nanobar();
	var i=1,e = setInterval(function(){load.go(i++);if(i==100)clearInterval(e)},200)//start loading bar
	$.post( "showlist.php", function( data ) {
		$( ".workbody" ).html( data );
		clearInterval(e);
		load.go(100);//stop  loading bar

});
}
function dashboard(){
	var load=new Nanobar();
	var i=1,e = setInterval(function(){load.go(i++);if(i==100)clearInterval(e)},200)//start loading bar
	$.post( "/tpl/dashboard.tpl", function( data ) {
		$( "body" ).html( data );

		clearInterval(e);
		load.go(100);//stop  loading bar
	},'html');
}
function logout(){
	var load=new Nanobar();
	var i=1,e = setInterval(function(){load.go(i++);if(i==100)clearInterval(e)},200)//start loading bar
	$.post( "logout.php", function( data ) {
		$( "body" ).html( data );
		clearInterval(e);
		load.go(100);//stop  loading bar

});
}
function loginpage(){
	var load=new Nanobar();
	var i=1,e = setInterval(function(){load.go(i++);if(i==100)clearInterval(e)},200)//start loading bar
	$.post( "/tpl/signin.tpl", function( data ) {
		$( ".contentbody" ).html( data );
		clearInterval(e);
		load.go(100);//stop  loading bar
	},'html');
}
function homepage(){

	var load=new Nanobar();
	var i=1,e = setInterval(function(){load.go(i++);if(i==100)clearInterval(e)},200)//start loading bar
	$.post( "./tpl/home.tpl", function( data ) {
		$( ".contentbody" ).html( data );

		clearInterval(e);
		load.go(100);//stop  loading bar
	},'html');

}
function signuppage(){
	var load=new Nanobar();
	var i=1,e = setInterval(function(){load.go(i++);if(i==100)clearInterval(e)},200)

	$.post( "./tpl/signup.tpl", function( data ) {
		$( ".contentbody" ).html( data );
		clearInterval(e);
		load.go(100);
	},'html');
}
function signupload(){ //sign up loading !
	$(document).ready(function(){
		$(".signupform").submit(function(e){
			e.preventDefault();
			var load=new Nanobar();
			var i=1,e = setInterval(function(e){load.go(i++);if(i==100)clearInterval(e)},200)

			var mail = $('#mailsu').val();
			var pass = $('#passsu').val();
			var user = $('#usersu').val();

			$(".contentbody").html("<center><div class='alert alert-info'><strong> لطفا صبر کنید</strong></div></center>");
			var request=$.post('signup.php',{
				emailad: mail, passd: pass,userd:user
			});
			request.done(function(data) {
				$( ".contentbody" ).html( data );
				clearInterval(e);
				load.go(100);

			})

		});
	});

}
function signin(){
	$(document).ready(function(){
		$(".signinform").submit(function(e){
			e.preventDefault();
			var load=new Nanobar();
			var i=1,e = setInterval(function(e){load.go(i++);if(i==100)clearInterval(e)},200)
			var mailoruser = $('#emailuser').val();
			var pass = $('#password').val();
			$(".contentbody").html("<center><div class='alert alert-info'><strong> لطفا صبر کنید</stron></div></center>");
			$( ".top-menu" ).hide();
			var request=$.post('signin.php',{
				usermail: mailoruser, passwords: pass
			});

			request.done(function(data) {
				$( 'body' ).html( data );

				clearInterval(e);
				load.go(100);
			})

		});
	});

}
function download(){
	$(document).ready(function(){
		$(".downloadform").submit(function(e){
			e.preventDefault();
			var load=new Nanobar();
			var i=1,e = setInterval(function(e){load.go(i++);if(i==100)clearInterval(e)},200)
			var url = $('#basic-url').val();

			$(".workbody").html("<center><div class='alert alert-info'><strong> لطفا صبر کنید</stron></div></center>");
			var request=$.post('download.php',{
				urlpost:url
			});
			request.done(function(data) {
				$( ".workbody" ).html( data );
				clearInterval(e);
				load.go(100);

		});
	});
});
}
function startdownload(){
	$(document).ready(function(){
		$(".startdownloadform").submit(function(e){
			e.preventDefault();
			var load=new Nanobar();
			var i=1,e = setInterval(function(e){load.go(i++);if(i==100)clearInterval(e)},200)
			var link = $('#sendlink').val();
			$(".workbody").html("<center><div class='alert alert-info'><strong> لطفا صبر کنید</stron></div></center>");
			var request=$.get('startdownload.php',{
				tokenlink: link
			});

			request.done(function(data) {
				$( '.workbody' ).html( data );

				clearInterval(e);
				load.go(100);
			})

		});
	});

}
function deletemovie(){
	$(document).ready(function(){
		$(".deletemovie").submit(function(e){
			e.preventDefault();
			var load=new Nanobar();
			var i=1,e = setInterval(function(e){load.go(i++);if(i==100)clearInterval(e)},200)
			var token = $('#sendvideoname').val();
			$(".workbody").html("<center><div class='alert alert-info'><strong> لطفا صبر کنید</strong></div></center>");
			var request=$.get('deletevideo.php',{
				tokenvideo: token
			});

			request.done(function(data) {
				$( '.workbody' ).html( data );

				clearInterval(e);
				load.go(100);
			})

		});
	});
}
