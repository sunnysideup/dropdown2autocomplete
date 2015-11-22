<?php


class Dropdown2Autocomplete extends DropdownField {

	function Field() {
		Requirements::css("dropdown2autodropdown/javascript/chosen/chose.min.css");
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript("dropdown2autodropdown/javascript/chosen/chosen.jquery.min.js");
		Return parent::Field();
	}

}
