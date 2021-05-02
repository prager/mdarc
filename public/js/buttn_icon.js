function put_icon() {

  $(document).ready(function(){
  	$(".icon-input-btn").each(function(){
          var btnFont = $(this).find(".btn").css("font-size");
          var btnColor = $(this).find(".btn").css("color");
        	$(this).find(".fa").css({'font-size': btnFont, 'color': btnColor});
  	});
  });
  
}
