<?php


class Dropdown2Autocomplete extends DropdownField {

	function Field() {
		Requirements::css("dropdown2autoselect/javascript/chosen/chose.min.css");
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript("dropdown2autoselect/javascript/chosen/chosen.jquery.min.js");
		Return parent::Field();
	}

}
