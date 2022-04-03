<?php

/**
 * just like a ListboxField but now with an autocomplete
 * system baked into it.
 *
 *
 */
  
class Listbox2AutocompleteField extends ListboxField
{

    /**
     * @var boolean
     */
    private $autocomplete = true;

    /**
     *
     * @return $this
     */
    public function turnOnAutocomplete()
    {
        $this->autocomplete = true;
        return $this;
    }

    /**
     *
     * @return $this
     */
    public function turnOffAutocomplete()
    {
        $this->autocomplete = false;
        return $this;
    }

    /**
     * @param array $parameters
     * @return string
     */
    public function Field($parameters = array())
    {
        $field = parent::Field($parameters);
        if ($this->autocomplete) {
            $this->addExtraClass("chosenAutocompleteField");
            $field = parent::Field($parameters);
            Requirements::css("sunnysideup/dropdown2autocomplete: dropdown2autocomplete/javascript/chosen/chosen.min.css");

/**
  * ### @@@@ START REPLACEMENT @@@@ ###
  * WHY: automated upgrade
  * OLD: THIRDPARTY_DIR . '/jquery/jquery.js' (case sensitive)
  * NEW: 'silverstripe/admin: thirdparty/jquery/jquery.js' (COMPLEX)
  * EXP: Check for best usage and inclusion of Jquery
  * ### @@@@ STOP REPLACEMENT @@@@ ###
  */
            Requirements::javascript('sunnysideup/dropdown2autocomplete: silverstripe/admin: thirdparty/jquery/jquery.js');
            Requirements::javascript("sunnysideup/dropdown2autocomplete: dropdown2autocomplete/javascript/chosen/chosen.jquery.min.js");
            Requirements::customScript(
                '
					jQuery("#'.$this->ID().'").chosen('.$this->Config()->get("js_settings").');
					jQuery("body").on(
						"focus",
						".chosenAutocompleteField:visible",
						function(){
							jQuery(this).chosen('.$this->Config()->get("js_settings").');
						}
					);
				',
                $this->ID()."_chosen_setup"
            );
        }
        return $field;
    }
}
