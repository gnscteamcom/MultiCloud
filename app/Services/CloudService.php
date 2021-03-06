<?php namespace App\Services;

use App\Cloud;

abstract class CloudService {

    abstract public function getContents($cloudId, $path);
    abstract public function removeContent($cloudId, $path);
    abstract public function copyContent($cloudId, $path, $newPath);
    abstract public function moveContent($cloudId, $path, $newPath);
    abstract public function renameContent($cloudId, $fileId, $newTitle);
    abstract public function shareStart($cloudId, $path);
    abstract public function downloadContents($cloudId, $cloudPath, $path);
    abstract public function uploadContents($cloudId, $cloudPath, $path);

    abstract public function create($attributes);
    abstract public function infoCloud($cloudId);
    abstract public function removeCloud($cloudId);

    public static function getCloud($cloudId)
    {
        //need catch exception
        $cloud = Cloud::findOrFail((int)$cloudId);
        return $cloud;
    }

    protected function getLocalContent($path)
    {
        $contents = scandir($path);
        array_shift($contents);
        array_shift($contents);

        return $contents;
    }

    protected function getPathFromBase($path, $base)
    {
        if($base) {
            $start = strpos($path, $base);
            return substr($path, 0, $start) . substr($path, $start + strlen($base));
        }
        else {
            return $path;
        }
    }

}