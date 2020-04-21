<?php

/**
 * Updated By PHP Office365 Generator 2019-11-16T20:01:10+00:00 16.0.19506.12022
 */
namespace Office365\PHP\Client\SharePoint\UserProfiles;

use Office365\PHP\Client\Runtime\InvokeMethodQuery;
use Office365\PHP\Client\Runtime\InvokePostMethodQuery;
use Office365\PHP\Client\Runtime\ClientRuntimeContext;
use Office365\PHP\Client\Runtime\ClientObject;
use Office365\PHP\Client\Runtime\ClientResult;
use Office365\PHP\Client\Runtime\ResourcePath;
use Office365\PHP\Client\Runtime\ResourcePathServiceOperation;

class PeopleManager extends ClientObject
{
    public function __construct(ClientRuntimeContext $ctx)
    {
        parent::__construct($ctx, new ResourcePath("SP.UserProfiles.PeopleManager"));
    }
    /**
     * Checks whether the specified user is following the current user.
     * @param string $accountName
     * @return ClientResult
     */
    public function amIFollowedBy($accountName)
    {
        $result = new ClientResult();
        $qry = new InvokeMethodQuery($this, "AmIFollowedBy", array(rawurlencode($accountName)));
        $this->getContext()->addQueryAndResultObject($qry, $result);
        return $result;
    }
    /**
     * Gets user properties for the current user.
     * @return PersonProperties
     */
    public function getMyProperties()
    {
        return new PersonProperties($this->getContext(),
            new ResourcePathServiceOperation("getMyProperties",null,$this->getResourcePath()));
    }
    /**
     * Gets the people who are following the current user.
     * @return PersonProperties
     */
    public function getMyFollowers()
    {
        return new PersonProperties($this->getContext(),
            new ResourcePathServiceOperation("getMyFollowers",null,$this->getResourcePath()));
    }
    /**
     * Adds the specified user to the current user's list of followed users.
     * @param string $accountName
     */
    public function follow($accountName)
    {
        $qry = new InvokePostMethodQuery($this, "follow", array(rawurlencode($accountName)));
        $this->getContext()->addQuery($qry);
    }
    /**
     * Remove the specified user from the current user's list of followed users.
     * @param string $accountName
     * @return ClientResult
     */
    public function stopFollowing($accountName)
    {
        $result = new ClientResult();
        $qry = new InvokePostMethodQuery($this, "StopFollowing", array(rawurlencode($accountName)));
        $this->getContext()->addQueryAndResultObject($qry, $result);
        return $result;
    }
    /**
     * Checks whether the current user is following the specified user.
     * @param string $accountName
     * @return ClientResult
     */
    public function amIFollowing($accountName)
    {
        $result = new ClientResult();
        $qry = new InvokeMethodQuery($this, "AmIFollowing", array(rawurlencode($accountName)));
        $this->getContext()->addQueryAndResultObject($qry, $result);
        return $result;
    }
    /**
     * @param string $accountName The account name of the user, encoded and passed as an alias in the query string,
     * as shown in the request example. See Implementation notes for other example formats.
     * @return PersonPropertiesCollection
     */
    public function getFollowersFor($accountName)
    {
        return new PersonPropertiesCollection($this->getContext(),
            new ResourcePathServiceOperation("getFollowersFor", array(rawurlencode($accountName)),$this->getResourcePath()));
    }
    /**
     * Gets the specified user profile property for the specified user.
     * @param string $accountName The account name of the user, encoded and passed as an alias in the query string, as shown in the request example.
     * @param string $propertyName The case-sensitive name of the property to get.
     * @return ClientResult The specified profile property for the specified user.
     */
    public function getUserProfilePropertyFor($accountName, $propertyName)
    {
        $clientResult = new ClientResult();
        $qry = new InvokeMethodQuery($this, "GetUserProfilePropertyFor", array("accountname" => rawurlencode($accountName), "propertyname" => $propertyName));
        $this->getContext()->addQueryAndResultObject($qry, $clientResult);
        return $clientResult;
    }

    /**
     * @return string
     */
    public function getEditProfileLink()
    {
        if (!$this->isPropertyAvailable("EditProfileLink")) {
            return null;
        }
        return $this->getProperty("EditProfileLink");
    }
    /**
     * @var string
     */
    public function setEditProfileLink($value)
    {
        $this->setProperty("EditProfileLink", $value, true);
    }
    /**
     * @return bool
     */
    public function getIsMyPeopleListPublic()
    {
        if (!$this->isPropertyAvailable("IsMyPeopleListPublic")) {
            return null;
        }
        return $this->getProperty("IsMyPeopleListPublic");
    }
    /**
     * @var bool
     */
    public function setIsMyPeopleListPublic($value)
    {
        $this->setProperty("IsMyPeopleListPublic", $value, true);
    }
}
