/*
 * jQuery Filter Demo
 * Matt Ryall
 * http://www.mattryall.net/blog/2008/07/jquery-filter-demo
 * 
 * Licensed under Creative Commons Attribution 3.0.
 * http://creativecommons.org/licenses/by/3.0/
 */
jQuery(function ($) {
    var thumbnailUrl = "https://graph.facebook.com/{id}/picture?width=100&height=100";
    var linkUrl = "https://www.facebook.com/{id}";
	$.ajax({
		type: "post",
		url: "http://www.nextstop.pt/get_fb_friends",
		cache: false,				
		data: "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
		success: function(json){						
		try{		
			var obj = jQuery.parseJSON(json);
			var photos = obj.data;
        	var list = $("<ul></ul");
        	$.each(photos, function (i, photo) {
            	var url = thumbnailUrl.replace("{id}", photo.id);
            	var img = $("<img/>").attr("src", url)
                	.attr("title", photo.name).attr("alt", photo.name);
            	var href = linkUrl.replace("{id}", photo.id);
            	var link = $("<a></a>").attr("href", href).append(img);
            	var caption = $("<a/>").attr("href", href)
            	    .text(photo.title).addClass("caption");
            	var div = $("<div/>").append(link).append(caption);
            	$(list).append($("<li/>").append(div));
        	});
        	$("#flickr-photos .loading").remove();
        	$("#flickr-photos").append(list);
		}catch(e) {		
			noty({text: 'Excepção no pedido AJAX', type: 'warning', timeout: '3000'});
		}		
		},
		error: function(){						
			noty({text: 'Erro no pedido AJAX', type: 'warning', timeout: '3000'});
		}
	});

    $("#filter").keyup(function () {
        var filter = $(this).val(), count = 0;
        $(".filtered:first li").each(function () {
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).addClass("hidden");
            } else {
                $(this).removeClass("hidden");
                count++;
            }
        });
        $("#filter-count").text(count);
    });
});

