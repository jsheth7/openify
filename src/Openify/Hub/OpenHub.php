<?php

/**
 * Retrieve data from input source. Save data to database.
 * Take action based on input data.
 */

namespace Openify\Hub;

use Openify\Storage\MongoDB\DBManager;
use Openify\Storage\MongoDB\Link;
use Openify\Input\OpensslFetcher;
use Openify\Input\ArsFetcher;

class OpenHub {

    protected $dbManager;

    protected $inputSource;

    /**
     * @param DBManager $dbManager
     * @param $inputSource
     */
    public function __construct($inputSource){
        $this->dbManager = new DBManager();
        $this->inputSource = $inputSource;
    }

    public function process(){
        $fetcher = $this->getFetcher();

        $links = $fetcher->getLinks();
        $this->storeData($links);
    }

    protected function getFetcher(){
        $fetcherClass = 'Openify\\Input\\' . ucfirst("{$this->inputSource}Fetcher");

        if( !class_exists($fetcherClass) ){
            throw new \Exception("$fetcherClass is not a valid class name");
        }

        $fetcher = new $fetcherClass();
        return $fetcher;
    }

    protected function storeData($links){

        //TODO - do not store duplicate data the second time this script runs

        foreach($links as $row ){
            print_r($row);
            $link = new Link($this->dbManager);
            $link->save($row);
        }

        echo "Saved to DB\n";
    }

    /**
     * TODO - take action on the save data, by mapping inputs to outputs
     */
    protected function actOnData(){

    }

} 