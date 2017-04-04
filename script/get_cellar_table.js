$(function () {
	$.ajax({
		url: './../DB/get_cellar.php',
		data: "",

		dataType: 'json',
		success: function(data) {
			for (var i = 0; i < data.length; i++) {
				var id = data[i].id;
				var name = data[i].name;
				var brewery = data[i].brewery;
				var quantity = data[i].quantity;
				var bottle_date = data[i].bottle_date;
				var remove_button = "<input type='button' value='Remove(1)' onclick='remove_from_table("+(i+1)+","+id+");' />";
				$('#cellar_table').append("<tr id=row_"+(i+1)+"><td>"+name+"</td><td>"+brewery+"</td><td id='quantity_of_"+(i+1)+"'>"+quantity+"</td><td>"+bottle_date+"</td><td>"+remove_button+"</td></tr>");
			}
		}
	});
	window.setInterval("activate_table_sort()", 500);
});

function activate_table_sort() {
	$("#cellar_table").tablesorter();
}