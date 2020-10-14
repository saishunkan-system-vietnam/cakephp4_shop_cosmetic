<?php
namespace App\Controller;

use App\Service\SendMail;

class TestController extends AppController
{
    public function testMail()
    {
        $config = [
            'from' => 'thuanvp012van@gmail.com',
            'subject' => 'Xin chao ae'
        ];

        $sendTo = [
            'thuanhehe' => 'thuanvp012van@gmail.com',
            'thuantest' => 'thuantestemail1@gmail.com'
        ];

        $viewVars = [
            'ten' => 'thuanhehe',
            'abc' =>'aisdjasdi'
        ];

        $templateAndLayout = [
            'template' => 'test'
        ];

        $abc = SendMail::send($config,$sendTo,$viewVars, $templateAndLayout);
        dd($abc);
    }
}
