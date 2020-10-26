<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Mailer;

class MailComponent extends Component
{

    /*config:[
        'from'=> 'abcxyz@gmail.com',
        'transport' => 'gmail' default gmail,
        'format' => 'html' default html,
        'subject' => 'abcd',
    ] */

    /* nameAndEmail:[
        'name' => 'email,...
    ]*/

    /* viewVars:[
        'key' => 'value',...
    ]*/

    /* templateAndLayout:[
        'template' => 'abc',
        'layout' => 'default'
    ]*/
    public function send(Array $config , Array $nameAndEmail, Array $viewVars, Array $templateAndLayout): bool
    {
        try {
            $from      = $config['from'];
            $transport = !empty($config['transport']) ? $config['transport'] : "gmail";
            $format    = !empty($config['format']) ? $config['format'] : "html";
            $subject   = !empty($config['subject']) ? $config['subject'] : '';
            $template  = $templateAndLayout['template'];
            $layout    = !empty($templateAndLayout['layout']) ? $templateAndLayout['layout'] : 'default';
            $mailer = new Mailer();
            $mailer->setTransport($transport)
            ->setEmailFormat($format)
            ->setSubject($subject)
            ->setViewVars($viewVars);

            $count = 1;
            foreach ($nameAndEmail as $name => $email) {
                if($count == 1)
                {
                    $mailer->setTo($email,$name);
                }else{
                    $mailer->addTo($email);
                }
                $count++;
            }
            $mailer->setFrom($from);

            $mailer->viewBuilder()
            ->setTemplate($template,$layout);
            $mailer->deliver();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
