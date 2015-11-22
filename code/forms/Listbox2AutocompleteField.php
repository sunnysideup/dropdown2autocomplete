<?php

/**
 * just like a ListboxField but now with an autocomplete
 * system baked into it.
 *
 *
 */
  
class Listbox2AutocompleteField extends ListboxField {

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
		$field = parent::Field($parameters);
		if($this->autocomplete) {
			Requirements::css("dropdown2autocomplete/javascript/chosen/chosen.min.css");
			Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
			Requirements::javascript("dropdown2autocomplete/javascript/chosen/chosen.jquery.min.js");
			$this->addClass("Listbox2AutocompleteField");
			Requirements::customScript('
				jQuery("#'.$this->ID().'").chosen('.$this->Config()->get("js_settings").');
				jQuery("body").on(
					"focus",
					".Listbox2AutocompleteField",
					function(){
						jQuery(el).chosen('.$this->Config()->get("js_settings").');
					}
				);
				

				',
				$this->ID()."_chosen_setup"
			);
			
		}
		return $field;
		
	}

}
