<?php

/**
 * Updated By PHP Office365 Generator 2019-11-16T19:51:42+00:00 16.0.19506.12022
 */
namespace Office365\PHP\Client\SharePoint;

use Office365\PHP\Client\Runtime\ResourcePath;

/**
 * Specifies 
 * a change on a list.The RelativeTime and RootFolderUrl properties are not 
 * included in the default scalar property set 
 * for this type.
 */
class ChangeList extends Change
{

    /**
     * An 
     * SPListTemplateType object that returns the list template type 
     * of the list.
     * @return integer
     */
    public function getBaseTemplate()
    {
        if (!$this->isPropertyAvailable("BaseTemplate")) {
            return null;
        }
        return $this->getProperty("BaseTemplate");
    }
    /**
     * An 
     * SPListTemplateType object that returns the list template type 
     * of the list.
     * @var integer
     */
    public function setBaseTemplate($value)
    {
        $this->setProperty("BaseTemplate", $value, true);
    }
    /**
     * A string 
     * that returns the name of the user (2) who 
     * modified the list.
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
     * A string 
     * that returns the name of the user (2) who 
     * modified the list.
     * @var string
     */
    public function setEditor($value)
    {
        $this->setProperty("Editor", $value, true);
    }
    /**
     * Returns a Boolean 
     * value that indicates whether a list is a hidden hidden 
     * list.
     * @return bool
     */
    public function getHidden()
    {
        if (!$this->isPropertyAvailable("Hidden")) {
            return null;
        }
        return $this->getProperty("Hidden");
    }
    /**
     * Returns a Boolean 
     * value that indicates whether a list is a hidden hidden 
     * list.
     * @var bool
     */
    public function setHidden($value)
    {
        $this->setProperty("Hidden", $value, true);
    }
    /**
     * Identifies 
     * the changed list.Exceptions: 
     * Error CodeError Type NameCondition-1System.NotSupportedExceptionThe list identifier 
     *   contained in the change fields (2) item of 
     *   the change collection is NULL.
     * @return string
     */
    public function getListId()
    {
        if (!$this->isPropertyAvailable("ListId")) {
            return null;
        }
        return $this->getProperty("ListId");
    }
    /**
     * Identifies 
     * the changed list.Exceptions: 
     * Error CodeError Type NameCondition-1System.NotSupportedExceptionThe list identifier 
     *   contained in the change fields (2) item of 
     *   the change collection is NULL.
     * @var string
     */
    public function setListId($value)
    {
        $this->setProperty("ListId", $value, true);
    }
    /**
     * A string 
     * that returns the root folderURL 
     * of the list.
     * @return string
     */
    public function getRootFolderUrl()
    {
        if (!$this->isPropertyAvailable("RootFolderUrl")) {
            return null;
        }
        return $this->getProperty("RootFolderUrl");
    }
    /**
     * A string 
     * that returns the root folderURL 
     * of the list.
     * @var string
     */
    public function setRootFolderUrl($value)
    {
        $this->setProperty("RootFolderUrl", $value, true);
    }
    /**
     * A string 
     * that returns the list title.
     * @return string
     */
    public function getTitle()
    {
        if (!$this->isPropertyAvailable("Title")) {
            return null;
        }
        return $this->getProperty("Title");
    }
    /**
     * A string 
     * that returns the list title.
     * @var string
     */
    public function setTitle($value)
    {
        $this->setProperty("Title", $value, true);
    }
    /**
     * Identifies 
     * the site 
     * (2) that contains the changed list.Exceptions: 
     * Error CodeError Type NameCondition-1System.NotSupportedExceptionThe site identifier in 
     *   the change fields (2) item of 
     *   the change collection is NULL.
     * @return string
     */
    public function getWebId()
    {
        if (!$this->isPropertyAvailable("WebId")) {
            return null;
        }
        return $this->getProperty("WebId");
    }
    /**
     * Identifies 
     * the site 
     * (2) that contains the changed list.Exceptions: 
     * Error CodeError Type NameCondition-1System.NotSupportedExceptionThe site identifier in 
     *   the change fields (2) item of 
     *   the change collection is NULL.
     * @var string
     */
    public function setWebId($value)
    {
        $this->setProperty("WebId", $value, true);
    }
    /**
     * An SPUser object 
     * (1) that represents information about the user (2) who created 
     * the list.
     * @return User
     */
    public function getCreator()
    {
        if (!$this->isPropertyAvailable("Creator")) {
            $this->setProperty("Creator", new User($this->getContext(), new ResourcePath("Creator", $this->getResourcePath())));
        }
        return $this->getProperty("Creator");
    }
}
