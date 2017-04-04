$(function () {
	$.ajax({
		url: './../DB/get_breweries.php',
		data: "",

		dataType: 'json',
		success: function(data) {
			var select = document.getElementById('selector');
			var fragment = document.createDocumentFragment();
			for (var i = 0; i < data.length; i++) {
				var brewery = data[i].name;
				var id = data[i].id;
				var opt = document.createElement('option');
				opt.innerHTML = brewery;
				opt.value = id;
				fragment.appendChild(opt);
			}
			select.appendChild(fragment);
		}
	});
});