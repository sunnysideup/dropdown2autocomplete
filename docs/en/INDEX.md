# How to use
This module replaces a bunch of Dropdown-esque fields in Framework:

 - DropdownField
 - GroupedDropdownField
 - ListBoxField
Using the chosen jQuery extension; see: https://github.com/harvesthq/chosen

```php
    $field = Dropdown2AutocompleteField::create(/* same __construct variables as DropdownField */);

    // OR 
    $field = GroupedDropdown2AutocompleteField::create(/* same __construct variables as GroupedDropdownField */);

    // OR
    $field = Listbox2AutocompleteField::create(/* same __construct variables as ListboxField */)

```

In the chosen demo you can see what will happen.

