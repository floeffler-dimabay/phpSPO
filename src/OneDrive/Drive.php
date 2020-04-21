<?php

namespace Office365\PHP\Client\OneDrive;

use Office365\PHP\Client\Runtime\ClientObject;
use Office365\PHP\Client\Runtime\ResourcePath;

class Drive extends ClientObject
{

    /**
     * Gets the user account that owns the drive.
     * @return Identity
     */
    public function getOwner(){
        return $this->getProperty("owner");
    }


    /**
     * Sets the user account that owns the drive.
     * @param string $value
     */
    public function setOwner($value){
        $this->setProperty("owner",$value);
    }


    /**
     * @return ItemCollection
     */
    public function getFiles(){
        if (!$this->isPropertyAvailable("files")) {
            $this->setProperty("files",
                new ItemCollection(
                    $this->getContext(),
                    new ResourcePath("files",$this->getResourcePath())
                ));
        }
        return $this->getProperty("files");
    }



    /**
     * @param string $value
     */
    public function setFiles($value){
        $this->setProperty("files",$value);
    }

}