<?php

class Index
{
    public function run()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POSTされたか判断
            $_SESSION['mean'] = $this->getMean($_POST['word']);
        }
    }
    
    
    private function getMean($word) // クローラー稼働
    {
        $url = 'https://ejje.weblio.jp/content/' . $word;
        $html = file_get_contents($url);
    
        $doc = phpQuery::newDocument($html);
    
        $mean = $doc->find('.content-explanation')->text();
    
        if (!($mean === '')) {
            return '意味: ' . $mean;
        } else {
            return "単語の意味が見つかりませんでした。";
        }
    }
}
