<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 6/8/14
 * Time: 9:07 PM
 */

namespace Openify\Recipient;

use Openify\Recipient\AbstractRecipient;

class PushoverRecipient extends AbstractRecipient {

    public function getContactInfo(){

        /**
         * TODO - pull from YAML file
         */
        return array(
            'token' => '',
            'user'  => ''
        );
    }

} 