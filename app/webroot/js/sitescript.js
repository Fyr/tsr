$(document).ready(function() {
	
	$('ul.tabset').contentTabs({
		tabLinks: 'a',
		event: 'mouseenter'
	});
	
	
	$('a.dd').bind('click', function (e) {
		e.preventDefault();
		
		var which = $(this).attr('href').replace('#', '');
		headerHeight = $("#header").height(); // Get fixed header height
		var position= $("#header").css("position");
		ww = $('#header').width();
		if (ww <= 976) {
			off = (headerHeight==80) ? 0 : 80;
		} else {
			off = (position=="fixed") ? headerHeight : headerHeight * 2;
		}
		
		var offset = $('a[name="' + which + '"]').offset().top - off;
		
		$('html, body').animate({ scrollTop: offset }, 500, function () {
		//location.hash = target; 
		});
		
		return false;
	});
	
	var url = window.location.href;
	var pos = url.indexOf('#');
	if (pos > -1) {
		link = url.substr(pos + 1);
		$('a.dd[href="#' + link + '"]').click();
	}
	
	
	var ps2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/; //reg for email
 	
	
		$('.sendOrder').click(function (e) {
			var data = {
                	data: {}
                 };
				  
		var id = $(this).data('id');
				  
		var o='#contact-form';
		var lang=$('input[name="lang"]', o).val()  ; 
		if (!(data.name = $('input[name="name"]', o).val()) || !(data.email = $('input[name="email"]', o).val()) || !(data.message = $('textarea[name="message"]', o).val())) {
			//if(lang=='eng')alert('All fields are required!');
			//if(lang=='per')alert('!همه فیلدها لازم هستند');
			$("#alert_ok").fadeOut();
			$("#alert_error2").fadeOut();
			$("#alert_error_email").fadeOut(); 
			$("#alert_error").fadeIn(); 
		return false;}
		if(!ps2.test(data.email)){
			//if(lang=='eng')alert('Wrong email format!'); 
			//if(lang=='per')alert('فرمت ایمیل اشتباه است!');
			$("#alert_ok").fadeOut(); 
			$("#alert_error").fadeOut();
			$("#alert_error2").fadeOut();
			$("#alert_error_email").fadeIn();
			return false;
			 }
		
			
			
					$.ajax({
						type: "POST",
						url: "submit_form.php",
						dataType: "json",
						data: data
					})
						.done(function( resp ) {
							if (resp.status == 1) {
								
								$("#alert_error").fadeOut(); 
								$("#alert_error2").fadeOut();
								$("#alert_error_email").fadeOut();
								$("#alert_ok").fadeIn(); 
								//if(lang=='eng')alert('Thank U! Our managers will contact you!');
								//if(lang=='per')alert('متشکرم! مدیران ما با شما تماس خواهد!');
								 							
								} 
							else { 
								//if(lang=='eng')alert('An error has occurred! Please try again later!');
								//if(lang=='per')alert('خطایی رخ داده است! لطفا بعدا دوباره امتحان کنید!');
								$("#alert_ok").fadeOut(); 
								$("#alert_error").fadeOut();								
								$("#alert_error_email").fadeOut();
								$("#alert_error2").fadeIn(); 
							
							}
						});
                  return false;
				});
	
	


});


