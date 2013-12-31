<?php
    $attributes = array(
        'class' => 'form-signin',
        'id' => 'form_details',
        'onsubmit' => 'return validate_add_orders()',
        'autocomplete' => 'off'
    );
    echo form_open($base_url.'po/details', $attributes);
?>

<div class="row">
    <div class="col-xs-11">
        <table class="table table-striped" cellspacing="0" id="tbl_order">
            <thead>
				<tr>
					<th class="col-xs-4">
						Material Description
					</th>
					<th class="col-xs-2">
						Grade
					</th>
					<th class="col-xs-2">
						Quantity
					</th>
					<th class="col-xs-1">
						Unit
					</th>
					<th class="col-xs-2">
						Unit Price
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-xs-4">
						<input type="text" class="form-control" autofocus="" placeholder="Material Description" name="txt_material_desc[]" id="txt_material_desc0" onkeyup="searchSuggest();" autocomplete="off">
                        <div id="layer1"></div>
                    </td>
					<td class="col-xs-2">
						<input type="text" class="form-control" placeholder="Grade" name="txt_grade[]" id="txt_grade0">
					</td>
					<td class="col-xs-2">
						<input type="text" class="form-control" placeholder="Quantity" name="txt_quantity[]" id="txt_quantity0">
					</td>
					<td class="col-xs-1">
						<input type="text" class="form-control" placeholder="Unit" name="txt_unit[]" id="txt_unit0">
					</td>
					<td class="col-xs-2">
						<input type="text" class="form-control" placeholder="Unit Price" name="txt_unit_price[]" id="txt_unit_price0">
					</td>
				</tr>
			</tbody>
		</table>
    </div>
    <div class="col-xs-1">
        <input type="button" name="btn_add_option[]" value="+" onclick="add_row();" class="btn btn-sm btn-success" id="btn_add_option" />
        <input type="button" name="btn_remove_option[]" value="-" onclick="remove_row();" class="btn btn-sm btn-danger disabled" id="btn_remove_option" />
    </div>
</div>

<input type="hidden" name="hid_material_desc_ids" id="hid_material_desc_ids" value="">
<input type="hidden" name="hid_grade_ids" id="hid_grade_ids" value="">
<input type="hidden" name="hid_quantity_ids" id="hid_quantity_ids" value="">
<input type="hidden" name="hid_unit_ids" id="hid_unit_ids" value="">
<input type="hidden" name="hid_unit_price_ids" id="hid_unit_price_ids" value="">

<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="btn_submit_order" value="Save"  onclick="display_options();">
    </div>
	<div class="col-xs-4"></div>
</div>
</form>