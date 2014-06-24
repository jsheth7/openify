<?php

namespace Openify\Input;
use Openify\Input\AbstractDataFetcher;
use PicoFeed\Reader;

class ArsFetcher extends AbstractDataFetcher {

    protected $feedUrl;

    protected function setUrlInfo(){
        $this->feedUrl = 'http://feeds.arstechnica.com/arstechnica/security?format=xml';
        $this->type = 'arstechnica';

    }

    public function getLinks(){
        $links = array();
        $numProcessed = 0;

        //Which keywords we'd like the title to contain
        //TODO: make this configurable
        $keywords = array('openssl', 'chrome', 'firefox', 'password', 'wordpress');

        $reader = new Reader;
        $reader->download($this->feedUrl);

        $parser = $reader->getParser();

        if ($parser !== false) {
            $feed = $parser->execute();

            if ($feed !== false) {
                foreach($feed->items as $item){

                    if($numProcessed == $this->maxResults){
                        break;
                    }

                    $title = $item->getTitle();

                    foreach($keywords as $keyword){
                        if( stristr($item, $keyword ) ){
                            $links[] = array(
                                'name' => $title,
                                'url' => $item->getUrl(),
                                'type' => $this->type
                            );

                            $numProcessed++;
                            break;
                        }

                    }

                }
            }
        }

        return $links;
    }

} 