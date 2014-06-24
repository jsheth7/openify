<?php

namespace Openify\Input;
use Goutte\Client;

abstract class AbstractDataFetcher {

    protected $goutteClient;

    protected $baseUrl;
    protected $path;
    protected $type;
    protected $maxResults;

    public function __construct(){
        $this->goutteClient = new Client();
        $this->setUrlInfo();
        $this->maxResults = 3;
    }

    abstract protected function setUrlInfo();

    /**
     * Set number of maximum results to be returned by the fetcher
     * @param $maxResults
     * @return mixed
     */
    public function setMaxResults($maxResults){
        $this->maxResults = (int)$maxResults;
    }

    /**
     * Returns an associative array of link titles, and absolute URIs
     * @return array
     */
    abstract public function getLinks();

} 