<?php

namespace Openify\Output;
use Openify\Recipient\AbstractRecipient;

abstract class AbstractNotifier {

    protected $recipient;

    public function __construct( AbstractRecipient $recipient){
        $this->setRecipient($recipient);
    }

    abstract protected function setRecipient(AbstractRecipient $recipient);
    abstract public function sendNotification($message);

} 