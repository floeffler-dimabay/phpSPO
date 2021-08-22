<?php

/**
 * Modified: 2020-05-24T22:08:35+00:00
 */
namespace Office365\Directory\Applications;

use Office365\Runtime\ClientValue;
class ParentalControlSettings extends ClientValue
{
    /**
     * @var array
     */
    public $CountriesBlockedForMinors;
    /**
     * @var string
     */
    public $LegalAgeGroupRule;
}