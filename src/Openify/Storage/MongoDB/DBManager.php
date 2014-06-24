<?php

namespace Openify\Storage\MongoDB;

use MongoClient;

class DBManager {

    protected $dbHandle;

    public function __construct(){
        $mongoClient = new MongoClient();

        // select a database
        $this->dbHandle = $mongoClient->openify;
    }

    public function getDbHandle(){
        return $this->dbHandle;
    }

} 