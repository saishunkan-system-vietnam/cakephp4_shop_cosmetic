<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class FileComponent extends Component{

    public function uploadImage($file,$dirFolder)
    {
        if(!empty($file)){
            $extFile = $this->getExtFile($file);
            if($this->validPhoto($extFile))
            {
                $this->checkPath($dirFolder);
                $date       = date('Ymd');
                $filename   = $date . "_" . uniqid() . "." . $extFile;
                $targetFile = $dirFolder. DS . $filename;
                $file->moveTo($targetFile);
                return $filename;
            }
        }
        return null;
    }

    public function checkPath($path)
    {
        if(!file_exists($path))
        {
            mkdir($path, 0755, true);
        }
    }

    public function getExtFile($file)
    {
        return pathinfo($file->getclientFilename(), PATHINFO_EXTENSION);
    }

    public function validPhoto($extFile)
    {
        if(in_array($extFile,['jpg', 'png', 'jpeg', 'gif']))
            return true;
        return false;
    }

    public function deleteFile($dirFile)
    {
        return unlink($dirFile);
    }
}
