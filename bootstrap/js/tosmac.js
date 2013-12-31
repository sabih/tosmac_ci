/**
 * @method : add_row()
 * @return : void
 * @desc : This function add new rows for orders on '+' button click
 */
function add_row() {

	var table = document.getElementById('tbl_order');
	
	// Get the number of rows in table (On 1st click row_count = 2)
	var row_count = table.rows.length;
	
	// Making row_count_input = 1, which will be used to generate id for option textbox
	var row_count_input = parseInt(row_count) - 1;
	
	// Insert row in table 
	//(insertRow(0) takes 1st value as 0, So, insertRow(row_count) means insertRow(3) ie, 4th row)
	var row = table.insertRow(row_count);
	
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	
	// The button "+" and "-" gets stored in "str_btn_add" and "str_btn_remove" respectively
	var str_btn_add = "";
	var str_btn_remove = "";
	
	
	var id = row_count_input;
	
	// Insert text "Option" in Cell1
	cell1.innerHTML = "<input type='text' class='form-control' placeholder='Material Description' name='txt_material_desc[]' id='txt_material_desc" + id + "' >";
	cell2.innerHTML = "<input type='text' class='form-control' placeholder='Grade' name='txt_grade[]' id='txt_grade" + id + "' >";
	cell3.innerHTML = "<input type='text' class='form-control' placeholder='Quantity' name='txt_quantity[]' id='txt_quantity" + id + "' >";
	cell4.innerHTML = "<input type='text' class='form-control' placeholder='Unit' name='txt_unit[]' id='txt_unit" + id + "' >";
	cell5.innerHTML = "<input type='text' class='form-control' placeholder='Unit Price' name='txt_unit_price[]' id='txt_unit_price" + id + "' >";
	
	// Enable Remove button when row_count > 2
	if( row_count > 1 ) {
        
        jQuery("#btn_remove_option").removeClass("disabled");
        
	}

}

/**
 * @method : remove_row()
 * @return : void
 * @desc : This function removes rows for option on "-" Remove button click
 */
function remove_row() {

	var table = document.getElementById('tbl_order');
	
	// Get the number of rows in table (On 1st click, row_count = n)
	var row_count = table.rows.length;
	
	// Delete row from table 
	//(deleteRow(0) takes 1st value as 0, So, deleteRow(row_count-1) means deleteRow(n-1) ie, last row)
	table.deleteRow( row_count - 1 );
		
	// Hide Remove button when row_count < 5
	if( row_count < 4 ) {
		
        jQuery("#btn_remove_option").addClass("disabled");
		
	}

}

/**
 * @method : diplay_options()
 * @return : void
 * @desc : This function stores all orders values in hidden fields onclick of "btn_submit_order"
 */
function display_options() {

	// To remove conflict
	jQuery.noConflict();
	
	var table = document.getElementById('tbl_order');
	
	// Get the number of rows in table (On 1st click row_count = n)
	var row_count = table.rows.length;
	// Remove table header from count
	row_count = row_count - 1;
	
	jQuery("#hid_material_desc_ids").val('');
	jQuery("#hid_grade_ids").val('');
	jQuery("#hid_quantity_ids").val('');
	jQuery("#hid_unit_ids").val('');
	jQuery("#hid_unit_price_ids").val('');
	
	for(var id = 0; id < row_count; id++) {

		var material_desc = document.getElementById('txt_material_desc'+id).value;
		var grade = document.getElementById('txt_grade'+id).value;
		var quantity = document.getElementById('txt_quantity'+id).value;
		var unit = document.getElementById('txt_unit'+id).value;
		var unit_price = document.getElementById('txt_unit_price'+id).value;
		
		//get the value of hidden field
		var prev_material_desc_ids = jQuery("#hid_material_desc_ids").val();
		var prev_grade_ids = jQuery("#hid_grade_ids").val();
		var prev_quantity_ids = jQuery("#hid_quantity_ids").val();
		var prev_unit_ids = jQuery("#hid_unit_ids").val();
		var prev_unit_price_ids = jQuery("#hid_unit_price_ids").val();
		
		//add id and status
		var current_material_desc_ids = prev_material_desc_ids + "|" + material_desc;
		var current_grade_ids = prev_grade_ids + "|" + grade;
		var current_quantity_ids = prev_quantity_ids + "|" + quantity;
		var current_unit_ids = prev_unit_ids + "|" + unit;
		var current_unit_price_ids = prev_unit_price_ids + "|" + unit_price;
		
		//set hidden field value null
		jQuery("#hid_material_desc_ids").val('');
		jQuery("#hid_grade_ids").val('');
		jQuery("#hid_quantity_ids").val('');
		jQuery("#hid_unit_ids").val('');
		jQuery("#hid_unit_price_ids").val('');
		
		//set the hidden field value
		jQuery("#hid_material_desc_ids").val(current_material_desc_ids);
		jQuery("#hid_grade_ids").val(current_grade_ids);
		jQuery("#hid_quantity_ids").val(current_quantity_ids);
		jQuery("#hid_unit_ids").val(current_unit_ids);
		jQuery("#hid_unit_price_ids").val(current_unit_price_ids);
		
	}
	
}

/**
 * @method : validate_add_question()
 * @return : boolean
 * @desc : This function validates po_view.php from inserting empty values
 */
function validate_add_orders() {

	// To remove conflict
	jQuery.noConflict();
	
	var empty_flag = 1;
	
	// checks if any option is empty
	// (If) empty change textbox border color to red
	// (Else) default textbox border color	
	var table = document.getElementById('tbl_order');

	var row_count = table.rows.length;
	// Remove table header from count
	var row_count = parseInt(row_count) - 1;
	
	for(var total_row = row_count; total_row  >= 0; total_row--) {
		
		var txt_material_desc_id = "#txt_material_desc" + total_row;
		var txt_grade_id = "#txt_grade" + total_row;
		var txt_quantity_id = "#txt_quantity" + total_row;
		var txt_unit_id = "#txt_unit" + total_row;
		var txt_unit_price_id = "#txt_unit_price" + total_row;
		
		//txt_unit_price_id			
		if(jQuery(txt_unit_price_id).val() === "") {
			
			jQuery(txt_unit_price_id).css("border","1px solid red");
			jQuery(txt_unit_price_id).focus();
			empty_flag = 0;
			
		} else {
			
			jQuery(txt_unit_price_id).css("border","1px solid #CCCCCC");
			
		}
		
		//txt_unit_id			
		if(jQuery(txt_unit_id).val() === "") {
			
			jQuery(txt_unit_id).css("border","1px solid red");
			jQuery(txt_unit_id).focus();
			empty_flag = 0;
			
		} else {
			
			jQuery(txt_unit_id).css("border","1px solid #CCCCCC");
			
		}
		
		//txt_quantity_id			
		if(jQuery(txt_quantity_id).val() === "") {
			
			jQuery(txt_quantity_id).css("border","1px solid red");
			jQuery(txt_quantity_id).focus();
			empty_flag = 0;
			
		} else {
			
			jQuery(txt_quantity_id).css("border","1px solid #CCCCCC");
			
		}
		
		//txt_grade_id
		if(jQuery(txt_grade_id).val() === "") {
			
			jQuery(txt_grade_id).css("border","1px solid red");
			jQuery(txt_grade_id).focus();
			empty_flag = 0;
			
		} else {
			
			jQuery(txt_grade_id).css("border","1px solid #CCCCCC");
			
		}
		
		//txt_material_desc_id
		if(jQuery(txt_material_desc_id).val() === "") {
			
			jQuery(txt_material_desc_id).css("border","1px solid red");
			jQuery(txt_material_desc_id).focus();
			empty_flag = 0;
			
		} else {
			
			jQuery(txt_material_desc_id).css("border","1px solid #CCCCCC");
			
		}
		
	}
	
	if(empty_flag === 0) {
		
		return false;			
		
	} else {
		
		return true;
		
	}

}