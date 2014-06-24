<?php

namespace Openify\Output;

use Openify\Output\AbstractNotifier;

//use Openify\Recipient\AbstractRecipient;
use Openify\Recipient\PushoverRecipient;

class PushoverNotifier extends AbstractNotifier {

    protected function setRecipient(PushoverRecipient $recipient){
        $this->recipient = $recipient;
    }

    public function sendNotification($message){
        $contactInfo = $this->recipient->getContactInfo();

        curl_setopt_array($ch = curl_init(), array(
            CURLOPT_URL => "https://api.pushover.net/1/messages.json",
            CURLOPT_POSTFIELDS => array(
                "token" => $contactInfo['token'],
                "user" => $contactInfo['user'],
                "message" => $message,
            )));
        curl_exec($ch);
        curl_close($ch);
    }

} 