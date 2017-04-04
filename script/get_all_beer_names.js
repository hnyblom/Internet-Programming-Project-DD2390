$(function () {
	$.ajax({
		url: './../DB/get_all_beer.php',
		data: "",

		dataType: 'json',
		success: function(data) {
			var select = document.getElementById('selector');
			var fragment = document.createDocumentFragment();
			for (var i = 0; i < data.length; i++) {
				var name = data[i].name;
				var id = data[i].id;
				var opt = document.createElement('option');
				opt.innerHTML = name;
				opt.value = id;
				fragment.appendChild(opt);
			}
			select.appendChild(fragment);
		}
	});
});