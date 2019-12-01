<?php

class Index
{
    public function run()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POSTされたか判断
            return $this->getMean($_POST['word']);
        }
    }
    
    
    private function getMean($word) // クローラー稼働
    {
        $url = 'https://ejje.weblio.jp/content/' . $word;
        $html = file_get_contents($url);
    
        $doc = phpQuery::newDocument($html);
    
        $title = $doc->find('.content-explanation')->text();
    
        return $title;
    }
}
