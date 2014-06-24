<?php

namespace Openify\Recipient;


abstract class AbstractRecipient {

    /**
     * @var array
     */
    protected $contactInfo;

    abstract public function getContactInfo();

} 