<?php

namespace Openify\Storage\MongoDB;
use Openify\Storage\MongoDB\DBManager as MongoDbManager;

class Link {

    /**
     * @var \MongoCollection
     */
    protected $collection;

    /**
     * @param DBManager $dbManager
     */
    public function __construct(MongoDbManager $dbManager){
        $this->collection = $dbManager->getDbHandle()->links;
    }

    /**
     * Insert data into database
     * TODO: allow updates in the future
     * @param $data
     */
    public function save($data){
        $data['createdOn'] = new \MongoDate();
        $this->collection->insert($data);
    }
} 