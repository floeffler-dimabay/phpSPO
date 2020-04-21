<?php
/**
 * Represents a collection of Folder resources.
 */

namespace Office365\PHP\Client\SharePoint;


use Office365\PHP\Client\Runtime\CreateEntityQuery;
use Office365\PHP\Client\Runtime\ClientObjectCollection;
use Office365\PHP\Client\Runtime\ResourcePathServiceOperation;

class FolderCollection extends ClientObjectCollection
{
    public function add($url)
    {
        $folder = new Folder($this->getContext());
        $this->addChild($folder);
        $folder->setProperty("ServerRelativeUrl", rawurlencode($url));
        $qry = new CreateEntityQuery($folder);
        $this->getContext()->addQueryAndResultObject($qry, $folder);
        return $folder;
    }

    /**
     * @param $serverRelativeUrl
     * @return Folder
     */
    public function getByUrl($serverRelativeUrl){
        $path = new ResourcePathServiceOperation("getByUrl",array(
            rawurlencode($serverRelativeUrl)
        ),$this->getResourcePath());
        return new Folder($this->getContext(),$path);
    }
}
