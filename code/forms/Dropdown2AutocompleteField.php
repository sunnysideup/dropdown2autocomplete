<?php

/**
 * just like a Dropdown Field but now with an autocomplete
 * system baked into it.
 *
 *
 */
class Dropdown2AutocompleteField extends DropdownField {

	/**
	 * @var boolean
	 */ 
	private $autocomplete = true;

	/**
	 *
	 * @return $this
	 */ 
	function turnOnAutocomplete() {
		$this->autocomplete = true;
		return $this;
	}

	/**
	 *
	 * @return $this
	 */ 
	function turnOffAutocomplete() {
		$this->autocomplete = false;
		return $this;
	}

	/**
	 * @param array $parameters
	 * @return string
	 */ 
	function Field($parameters = array()) {
		if($this->autocomplete) {
			$this->addExtraClass("chosenAutocompleteField");
			$field = parent::Field($parameters);
			Requirements::css("dropdown2autocomplete/javascript/chosen/chosen.min.css");
			Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
			Requirements::javascript("dropdown2autocomplete/javascript/chosen/chosen.jquery.min.js");
			
			Requirements::customScript('
					jQuery("#'.$this->ID().'").chosen('.$this->Config()->get("js_settings").');
					jQuery("body").on(
						"focus",
						".chosenAutocompleteField",
						function(){
							jQuery(this).chosen('.$this->Config()->get("js_settings").');
						}
					);
				',
				$this->ID()."_chosen_setup"
			);
		}
		else {
			$field = parent::Field($parameters);
		}
		return $field;
		
	}

}
