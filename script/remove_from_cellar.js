function remove_from_table(row_id, beer_id) {
	if (document.getElementById('quantity_of_'+row_id).innerHTML == 1) {
		var row = document.getElementById('row_'+row_id);
		row.parentElement.removeChild(row);
		update_table_sort();
		$.ajax({
			url: './../DB/change_quantity.php?id='+beer_id+'&remove=true'
		});
	} else {
		document.getElementById('quantity_of_'+row_id).innerHTML = (document.getElementById('quantity_of_'+row_id).innerHTML-1);
		$.ajax({
			url: './../DB/change_quantity.php?id='+beer_id+'&remove=false'
		});
	}
}
function update_table_sort() {
	$("#cellar_table").trigger("update");
}