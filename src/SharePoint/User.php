<?php

/**
 * Updated By PHP Office365 Generator 2019-11-17T14:35:07+00:00 16.0.19506.12022
 */
namespace Office365\PHP\Client\SharePoint;

use Office365\PHP\Client\Runtime\UpdateEntityQuery;
use Office365\PHP\Client\Runtime\ResourcePath;
/**
 * Specifies 
 * a user.
 */
class User extends Principal
{
    public function update()
    {
        $qry = new UpdateEntityQuery($this);
        $this->getContext()->addQuery($qry);
    }
    /**
     * Gets the collection of groups of which the user is a member.
     * @return GroupCollection
     */
    public function getGroups()
    {
        if (!$this->isPropertyAvailable('Groups')) {
            $this->setProperty("Groups", new GroupCollection($this->getContext(), new ResourcePath("groups", $this->getResourcePath())));
        }
        return $this->getProperty("Groups");
    }
    /**
     * @return UserIdInfo
     */
    public function getAadObjectId()
    {
        if (!$this->isPropertyAvailable("AadObjectId")) {
            return null;
        }
        return $this->getProperty("AadObjectId");
    }
    /**
     * @var UserIdInfo
     */
    public function setAadObjectId($value)
    {
        $this->setProperty("AadObjectId", $value, true);
    }
    /**
     * Specifies 
     * the e-mail 
     * address of the user.It MUST 
     * NOT be NULL. Its length MUST be equal to or less than 255. Exceptions: Error CodeError Type NameCondition-1Microsoft.SharePoint.SPExceptionThe property is read when either the user object 
     *   (1) was not successfully initialized or the user could not be 
     *   found.-1Microsoft.SharePoint.SPExceptionThe property is set when either the user object (1) 
     *   was not successfully initialized or the user could not be found.
     * @return string
     */
    public function getEmail()
    {
        if (!$this->isPropertyAvailable("Email")) {
            return null;
        }
        return $this->getProperty("Email");
    }
    /**
     * Specifies 
     * the e-mail 
     * address of the user.It MUST 
     * NOT be NULL. Its length MUST be equal to or less than 255. Exceptions: Error CodeError Type NameCondition-1Microsoft.SharePoint.SPExceptionThe property is read when either the user object 
     *   (1) was not successfully initialized or the user could not be 
     *   found.-1Microsoft.SharePoint.SPExceptionThe property is set when either the user object (1) 
     *   was not successfully initialized or the user could not be found.
     * @var string
     */
    public function setEmail($value)
    {
        $this->setProperty("Email", $value, true);
    }
    /**
     * @return string
     */
    public function getExpiration()
    {
        if (!$this->isPropertyAvailable("Expiration")) {
            return null;
        }
        return $this->getProperty("Expiration");
    }
    /**
     * @var string
     */
    public function setExpiration($value)
    {
        $this->setProperty("Expiration", $value, true);
    }
    /**
     * Indicates 
     * whether the User is a share by email guest user using time of access authentication.If this 
     * instance is an email authentication guest user, this value MUST be true, 
     * otherwise it MUST be false.
     * @return bool
     */
    public function getIsEmailAuthenticationGuestUser()
    {
        if (!$this->isPropertyAvailable("IsEmailAuthenticationGuestUser")) {
            return null;
        }
        return $this->getProperty("IsEmailAuthenticationGuestUser");
    }
    /**
     * Indicates 
     * whether the User is a share by email guest user using time of access authentication.If this 
     * instance is an email authentication guest user, this value MUST be true, 
     * otherwise it MUST be false.
     * @var bool
     */
    public function setIsEmailAuthenticationGuestUser($value)
    {
        $this->setProperty("IsEmailAuthenticationGuestUser", $value, true);
    }
    /**
     * Gets a 
     * value indicating whether this User is a share by email guest user.If this 
     * instance is a share by email guest user, it's true; otherwise, false.
     * @return bool
     */
    public function getIsShareByEmailGuestUser()
    {
        if (!$this->isPropertyAvailable("IsShareByEmailGuestUser")) {
            return null;
        }
        return $this->getProperty("IsShareByEmailGuestUser");
    }
    /**
     * Gets a 
     * value indicating whether this User is a share by email guest user.If this 
     * instance is a share by email guest user, it's true; otherwise, false.
     * @var bool
     */
    public function setIsShareByEmailGuestUser($value)
    {
        $this->setProperty("IsShareByEmailGuestUser", $value, true);
    }
    /**
     * Specifies 
     * whether the user is the site collection 
     * administrator for this site collection.<101>
     * @return bool
     */
    public function getIsSiteAdmin()
    {
        if (!$this->isPropertyAvailable("IsSiteAdmin")) {
            return null;
        }
        return $this->getProperty("IsSiteAdmin");
    }
    /**
     * Specifies 
     * whether the user is the site collection 
     * administrator for this site collection.<101>
     * @var bool
     */
    public function setIsSiteAdmin($value)
    {
        $this->setProperty("IsSiteAdmin", $value, true);
    }
    /**
     * Gets 
     * identity provider's unique identifier information about the user.The 
     * property returns null if identity provider's unique identifier cannot be constructed.
     * @return UserIdInfo
     */
    public function getUserId()
    {
        if (!$this->isPropertyAvailable("UserId")) {
            return null;
        }
        return $this->getProperty("UserId");
    }
    /**
     * Gets 
     * identity provider's unique identifier information about the user.The 
     * property returns null if identity provider's unique identifier cannot be constructed.
     * @var UserIdInfo
     */
    public function setUserId($value)
    {
        $this->setProperty("UserId", $value, true);
    }
    /**
     * @return string
     */
    public function getUserPrincipalName()
    {
        if (!$this->isPropertyAvailable("UserPrincipalName")) {
            return null;
        }
        return $this->getProperty("UserPrincipalName");
    }
    /**
     * @var string
     */
    public function setUserPrincipalName($value)
    {
        $this->setProperty("UserPrincipalName", $value, true);
    }
}