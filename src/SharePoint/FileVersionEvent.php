<?php

/**
 * Updated By PHP Office365 Generator 2019-11-17T16:07:15+00:00 16.0.19506.12022
 */
namespace Office365\PHP\Client\SharePoint;

use Office365\PHP\Client\Runtime\ClientObject;

/**
 * Represents 
 * an event object happened on a Microsoft.SharePoint.SPFile.
 */
class FileVersionEvent extends ClientObject
{
    /**
     * @return string
     */
    public function getEditor()
    {
        if (!$this->isPropertyAvailable("Editor")) {
            return null;
        }
        return $this->getProperty("Editor");
    }
    /**
     * @var string
     */
    public function setEditor($value)
    {
        $this->setProperty("Editor", $value, true);
    }
    /**
     * @return string
     */
    public function getEditorEmail()
    {
        if (!$this->isPropertyAvailable("EditorEmail")) {
            return null;
        }
        return $this->getProperty("EditorEmail");
    }
    /**
     * @var string
     */
    public function setEditorEmail($value)
    {
        $this->setProperty("EditorEmail", $value, true);
    }
    /**
     * @return SharedWithUser
     */
    public function getSharedByUser()
    {
        if (!$this->isPropertyAvailable("SharedByUser")) {
            return null;
        }
        return $this->getProperty("SharedByUser");
    }
    /**
     * @var SharedWithUser
     */
    public function setSharedByUser($value)
    {
        $this->setProperty("SharedByUser", $value, true);
    }
    /**
     * @return SharedWithUserCollection
     */
    public function getSharedWithUsers()
    {
        if (!$this->isPropertyAvailable("SharedWithUsers")) {
            return null;
        }
        return $this->getProperty("SharedWithUsers");
    }
    /**
     * @var SharedWithUserCollection
     */
    public function setSharedWithUsers($value)
    {
        $this->setProperty("SharedWithUsers", $value, true);
    }
    /**
     * @return string
     */
    public function getTime()
    {
        if (!$this->isPropertyAvailable("Time")) {
            return null;
        }
        return $this->getProperty("Time");
    }
    /**
     * @var string
     */
    public function setTime($value)
    {
        $this->setProperty("Time", $value, true);
    }
}