<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class TestController extends AppController
{
    public function crawl()
    {
        $url = "https://beautygarden.vn";
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $productTable =TableRegistry::getTableLocator()->get('Product');
        $crawler->filter('.item')->each(
            function (Crawler $node) use($url,$productTable,$client) {
                $product = $productTable->newEmptyEntity();
                $product->name = $node->filter('.box-content a')->text();
                $price = explode(',',$node->filter('.price')->text());
                $price = chop(join('',$price),'₫');
                $product->price = $price;
                $dataSrc = $node->filter('.box-images a img')->attr('data-src');
                $src = $node->filter('.box-images a img')->attr('src');

                //upload file
                $url = !empty($dataSrc) ? $dataSrc : $src;
                $extFile = explode('?',pathinfo($url, PATHINFO_EXTENSION))[0];
                $fileName = uniqid().".".$extFile;
                $file = file_get_contents($url);
                $dirFile = WWW_ROOT."images/product".DS.$fileName;
                $dirFile = str_replace('\\','/',$dirFile);
                file_put_contents($dirFile,$file);
                $product->image = $fileName;
                $product->amount = 20;
                $product->slug = Text::slug($product->name,'-');

                $urlDetail = "https://beautygarden.vn".$node->filter('.box-content h3 a')->attr('href');
                $productDetail = $client->request('GET', $urlDetail);
                $infoProduct = $productDetail->filter('.box-thongtin')->html();
                $product->product_info = str_replace("data-src","src",$infoProduct);
                $product->type_product = rand(0,2);
                $product->id_trademark = TableRegistry::getTableLocator()->get('Trademark')->find()->order('RAND()')->first()->id;
                $product->id_category = TableRegistry::getTableLocator()->get('Category')->find()->order('RAND()')->first()->id;
                $product->deleted = 0;
                $productTable->save($product);
            }
        );
    }
}
