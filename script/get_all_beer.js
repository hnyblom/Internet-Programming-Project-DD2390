$(function () {
	$.ajax({
		url: './../DB/get_all_beer.php',
		data: "",

		dataType: 'json',
		success: function(data) {
			for (var i = 0; i < data.length; i++) {
				var name = data[i].name;
				var brewery = data[i].brewery;
				if (data[i].year == null) {
					var year = "";
				} else {
					var year = data[i].year;
				}
				var abv = data[i].abv;
				var style = data[i].style;
				$('#beer_table').append("<tr><td>"+name+"</td><td>"+brewery+"</td><td>"+year+"</td><td>"+abv+"</td><td>"+style+"</td></tr>");
			}
		}
	});
	window.setInterval("activate_table_sort()", 1000);
});

function activate_table_sort() {
	$("#beer_table").tablesorter();
}