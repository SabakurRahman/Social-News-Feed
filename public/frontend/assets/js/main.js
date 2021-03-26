function getliveSearch(value) {
	$.post("{{route('user.liveSearch')}}", {query:value}, function(data) {
		$(".result").html(data);
	});
}

