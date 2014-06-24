<?php

namespace Openify\Input;
use Openify\Input\AbstractDataFetcher;

class OpensslFetcher extends AbstractDataFetcher {

    protected function setUrlInfo(){
        $this->baseUrl = 'http://www.openssl.org';
        $this->path    = '/news';
        $this->type    = 'openssl';
    }

    public function getLinks(){
        $fullUrl = $this->baseUrl . $this->path;
        $crawler = $this->goutteClient->request('GET', $fullUrl);
        $links = array();

        $numProcessed = 0;

        // Get the latest links
        $crawler->filter('td > a')->each(function ($node) use (&$links, &$numProcessed){
            $linkUrl = $node->attr('href');
            $linkText = $node->text();

            if( stristr($linkText, 'security') ){

                if($numProcessed == $this->maxResults){
                    return;
                }

                $linkText .= ' (' . $this->extractFormattedDate($linkUrl) . ')';
                $linkUrl = $this->baseUrl . str_replace('..', '', $linkUrl);

                //echo  "$linkText: $linkUrl" . "\n";
                $links[] = array(
                    'name' => $linkText,
                    'url'  => $linkUrl,
                    'type' => $this->type
                );

                $numProcessed++;
            }
        });

        return $links;
    }

    protected function extractFormattedDate($linkUrl){
        $formattedDate = '';

        $pattern = "~([0-9]{4})([0-9]{2})([0-9]{2})~";
        preg_match($pattern, $linkUrl, $matches);
            //print_r($matches);

        if( isset($matches[0]) ){
            $date = array( 'year' => $matches[1], 'month' => $matches[2], 'day' => $matches[3] );
            $time = strtotime("{$date['year']}-{$date['month']}-{$date['day']}");
            $formattedDate = date('M d, Y', $time);
        }

        return $formattedDate;
    }

} 