var Data = {
	sendUrl: function() {
		var url = $("#url").val();
		if(Data.checkUrl(url)) {
			$.ajax(
			{
				async: false,
				type: "POST",
				url: "./server/cirqqus_post.php",
				data: "action=send_url&url=" + url,
				success: function(msg) {
					console.log(msg);
					$("#url_result").html("http://cirqq.us/" + msg);
					$("#url_result").delay(200).fadeIn(200);
				}
			});
		}
		else {
			$("#not_url").delay(200).slideDown(200);
		}
	},
	checkUrl: function(url) {
		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
		return regexp.test(url);
	}
}

$(document).ready(function() {
	$("#not_url").hide();
	$("#shortening_box").hide();
	$("#url_result").hide();
	$("#shortening_box").fadeIn(500);
	$("#submit_button").click(function() {
		Data.sendUrl();
	});
	$("#url_container").click(function() {
		$("#not_url").slideUp(200);
	})
});