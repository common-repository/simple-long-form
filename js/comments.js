jQuery('document').ready(function($){
	
    var commentform=$('#commentform');
    
	commentform.prepend('<div id="comment-status" ></div>');
    var statusdiv=$('#comment-status');
    commentform.submit(function(){
      var formdata=commentform.serialize();
      statusdiv.html(slfvars.load);
      var formurl=commentform.attr('action');
      $.ajax({
        type: 'post',
        url: formurl,
        data: formdata,
        error: function(XMLHttpRequest, textStatus, errorThrown){
		  statusdiv.html(slfvars.erreur);
        },
        success: function(data, textStatus){
          if(data=="success") {
			statusdiv.empty();
			$("ol li").prepend('<div class="anchor" ></div>');
			$('label').hide();
            $('input').hide();
            $('textarea').hide();
            $('#reply-title').hide();
            $('.logged-in-as').hide();
            $('.navbar').show();
            $('.page_loader').hide();
            $('.trigger').hide();
            $('.fa-angle-down').hide();
            statusdiv.html(slfvars.message);
		  }
          else {
			statusdiv.empty();
			statusdiv.html(slfvars.erreurb);
			commentform.find('textarea[name=comment]').val('');
		  }
        }
      });
      return false;
    });
  });