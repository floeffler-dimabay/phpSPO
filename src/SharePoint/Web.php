<?php

/**
 * Updated By PHP Office365 Generator 2020-01-12T20:58:24+00:00 16.0.19527.12070
 */
namespace Office365\PHP\Client\SharePoint;


use Office365\PHP\Client\Runtime\ClientResult;
use Office365\PHP\Client\Runtime\DeleteEntityQuery;
use Office365\PHP\Client\Runtime\InvokePostMethodQuery;
use Office365\PHP\Client\Runtime\ResourcePath;
use Office365\PHP\Client\Runtime\UpdateEntityQuery;
use Office365\PHP\Client\Runtime\ResourcePathServiceOperation;
/**
 * Specifies 
 * a site 
 * (2).The AllowAutomaticASPXPageIndexing, 
 * AllowCreateDeclarativeWorkflowForCurrentUser, AllowDesignerForCurrentUser, 
 * AllowMasterPageEditingForCurrentUser, AllowRevertFromTemplateForCurrentUser, 
 * AllowSaveDeclarativeWorkflowAsTemplateForCurrentUser, AllowSavePublishDeclarativeWorkflowForCurrentUser, 
 * CommentsOnSitePagesDisabled, ContainsConfidentialInfo, 
 * DesignerDownloadUrlForCurrentUser, EffectiveBasePermissions, 
 * ExcludeFromOfflineClient, HasUniqueRoleAssignments, MembersCanShare, 
 * NotificationsInOneDriveForBusinessEnabled, NotificationsInSharePointEnabled, 
 * PreviewFeaturesEnabled, RequestAccessEmail, SaveSiteAsTemplateEnabled, 
 * ServerRelativePath, ShowUrlStructureForCurrentUser, SiteLogoDescription, 
 * SupportedUILanguageIds, ThemeData, ThemedCssFolderUrl and ThirdPartyMdmEnabled 
 * properties are not included in the default scalar property set 
 * for this type.
 */
class Web extends SecurableObject
{
    /**
     * @param ClientContext $context
     * @param string $url
     * @param boolean $isEditLink
     * @return ClientResult
     */
    public static function createAnonymousLink($context, $url, $isEditLink)
    {
        $result = new ClientResult();
        $qry = new InvokePostMethodQuery($context->getWeb(),
            "CreateAnonymousLink",
            null,
            null,
            array("url" => $url, "isEditLink" => $isEditLink)
        );
        $qry->IsStatic = true;
        $context->addQueryAndResultObject($qry, $result);
        return $result;
    }
    /**
     * @param ClientContext $context
     * @param string $url
     * @param boolean $isEditLink
     * @param string $expirationString
     * @return ClientResult
     */
    public static function createAnonymousLinkWithExpiration($context, $url, $isEditLink, $expirationString)
    {
        $result = new ClientResult();
        $qry = new InvokePostMethodQuery($context->getWeb(),
            "CreateAnonymousLinkWithExpiration",
            null,
            null,
            array("url" => $url, "isEditLink" => $isEditLink, "expirationString" => $expirationString));
        $qry->IsStatic = true;
        $context->addQueryAndResultObject($qry, $result);
        return $result;
    }
    public function update()
    {
        $qry = new UpdateEntityQuery($this);
        $this->getContext()->addQueryAndResultObject($qry, $this);
    }
    public function deleteObject()
    {
        $qry = new DeleteEntityQuery($this);
        $this->getContext()->addQuery($qry);
        $this->removeFromParentCollection();
    }
    /**
     * Returns the collection of all changes from the change log that have occurred within the scope of the site, based on the specified query.
     * @param ChangeQuery $query
     * @return ChangeCollection
     */
    public function getChanges(ChangeQuery $query)
    {
        $qry = new InvokePostMethodQuery($this, "GetChanges", null,"query", $query);
        $changes = new ChangeCollection($this->getContext());
        $this->getContext()->addQueryAndResultObject($qry, $changes);
        return $changes;
    }
    /**
     * Gets the collection of all lists that are contained in the Web site available to the current user
     * based on the permissions of the current user.
     * @return ListCollection
     */
    public function getLists()
    {
        if (!$this->isPropertyAvailable('Lists')) {
            $this->setProperty("Lists", new ListCollection($this->getContext(), new ResourcePath("Lists", $this->getResourcePath())));
        }
        return $this->getProperty("Lists");
    }
    /**
     * Gets a Web site collection object that represents all Web sites immediately beneath the Web site,
     * excluding children of those Web sites.
     * @return WebCollection
     */
    public function getWebs()
    {
        if (!$this->isPropertyAvailable('Webs')) {
            $this->setProperty("Webs", new WebCollection($this->getContext(),
                new ResourcePath("webs", $this->getResourcePath())));
        }
        return $this->getProperty("Webs");
    }
    /**
     * Gets the collection of field objects that represents all the fields in the Web site.
     * @return FieldCollection
     */
    public function getFields()
    {
        if (!$this->isPropertyAvailable('Fields')) {
            $this->setProperty("Fields", new FieldCollection($this->getContext(),
                new ResourcePath("fields", $this->getResourcePath())));
        }
        return $this->getProperty("Fields");
    }
    /**
     * Gets the collection of all first-level folders in the Web site.
     * @return FolderCollection
     */
    public function getFolders()
    {
        if (!isset($this->Folders)) {
            $this->Folders = new FolderCollection($this->getContext(),
                new ResourcePath("folders", $this->getResourcePath()));
        }
        return $this->Folders;
    }
    /**
     * Gets the collection of all users that belong to the site collection.
     * @return UserCollection
     */
    public function getSiteUsers()
    {
        if (!isset($this->SiteUsers)) {
            $this->SiteUsers = new UserCollection($this->getContext(),
                new ResourcePath("SiteUsers", $this->getResourcePath()));
        }
        return $this->SiteUsers;
    }
    /**
     * Gets the collection of groups for the site collection.
     * @return mixed|null|GroupCollection
     */
    public function getSiteGroups()
    {
        if (!isset($this->SiteGroups)) {
            $this->setProperty("SiteGroups", new GroupCollection($this->getContext(),
                new ResourcePath("SiteGroups", $this->getResourcePath())));
        }
        return $this->getProperty("SiteGroups");
    }
    /**
     * Gets the collection of role definitions for the Web site.
     * @return RoleDefinitionCollection
     */
    public function getRoleDefinitions()
    {
        if (!$this->isPropertyAvailable('RoleDefinitions')) {
            $this->setProperty("RoleDefinitions", new RoleDefinitionCollection($this->getContext(),
                new ResourcePath("RoleDefinitions", $this->getResourcePath())));
        }
        return $this->getProperty("RoleDefinitions");
    }
    /**
     * Gets a value that specifies the collection of user custom actions for the site.
     * @return UserCustomActionCollection
     */
    public function getUserCustomActions()
    {
        if (!$this->isPropertyAvailable('UserCustomActions')) {
            $this->setProperty("UserCustomActions", new UserCustomActionCollection($this->getContext(),
                new ResourcePath("UserCustomActions", $this->getResourcePath())));
        }
        return $this->getProperty("UserCustomActions");
    }
    /**
     * @return User
     */
    public function getCurrentUser()
    {
        if (!$this->isPropertyAvailable('CurrentUser')) {
            $this->setProperty("CurrentUser", new User($this->getContext(),
                new ResourcePath("CurrentUser", $this->getResourcePath())));
        }
        return $this->getProperty("CurrentUser");
    }

    /**
     * Returns the file object located at the specified server-relative URL.
     * @param string $serverRelativeUrl The server relative URL of the file.
     * @return File
     */
    public function getFileByServerRelativeUrl($serverRelativeUrl)
    {
        $path = new ResourcePathServiceOperation( "getFileByServerRelativeUrl", array(rawurlencode($serverRelativeUrl)),$this->getResourcePath());
        return new File($this->getContext(), $path);
    }
    /**
     * Returns the folder object located at the specified server-relative URL.
     * @param string $serverRelativeUrl The server relative URL of the folder.
     * @return Folder
     */
    public function getFolderByServerRelativeUrl($serverRelativeUrl)
    {
        return new Folder($this->getContext(),
            new ResourcePathServiceOperation("getFolderByServerRelativeUrl", array(rawurlencode($serverRelativeUrl)),$this->getResourcePath()));
    }
    /**
     * @return ContentTypeCollection
     */
    public function getContentTypes()
    {
        if (!$this->isPropertyAvailable('ContentTypes')) {
            $this->setProperty('ContentTypes', new ContentTypeCollection($this->getContext(),
                new ResourcePath('ContentTypes', $this->getResourcePath())), false);
        }
        return $this->getProperty('ContentTypes');
    }
    /**
     * @param string $name
     * @param mixed $value
     * @param bool $persistChanges
     */
    public function setProperty($name, $value, $persistChanges = true)
    {
        parent::setProperty($name, $value, $persistChanges);
        if ($name === 'Id') {
            $this->setResourceUrl("Site/openWebById(guid'{$value}')");
        }
    }
    /**
     * @return string
     */
    public function getAccessRequestListUrl()
    {
        if (!$this->isPropertyAvailable("AccessRequestListUrl")) {
            return null;
        }
        return $this->getProperty("AccessRequestListUrl");
    }
    /**
     * @var string
     */
    public function setAccessRequestListUrl($value)
    {
        $this->setProperty("AccessRequestListUrl", $value, true);
    }
    /**
     * @return string
     */
    public function getAccessRequestSiteDescription()
    {
        if (!$this->isPropertyAvailable("AccessRequestSiteDescription")) {
            return null;
        }
        return $this->getProperty("AccessRequestSiteDescription");
    }
    /**
     * @var string
     */
    public function setAccessRequestSiteDescription($value)
    {
        $this->setProperty("AccessRequestSiteDescription", $value, true);
    }
    /**
     * Gets or 
     * sets a Boolean value that specifies whether the .aspx page within the Web site 
     * is indexed by the search engine.
     * @return bool
     */
    public function getAllowAutomaticASPXPageIndexing()
    {
        if (!$this->isPropertyAvailable("AllowAutomaticASPXPageIndexing")) {
            return null;
        }
        return $this->getProperty("AllowAutomaticASPXPageIndexing");
    }
    /**
     * Gets or 
     * sets a Boolean value that specifies whether the .aspx page within the Web site 
     * is indexed by the search engine.
     * @var bool
     */
    public function setAllowAutomaticASPXPageIndexing($value)
    {
        $this->setProperty("AllowAutomaticASPXPageIndexing", $value, true);
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to create declarative workflows. The value, if not disabled on the Web 
     * application, is the same as the scalar property of Microsoft.SharePoint.Client.Site.AllowCreateDeclarativeWorkflow.
     * @return bool
     */
    public function getAllowCreateDeclarativeWorkflowForCurrentUser()
    {
        if (!$this->isPropertyAvailable("AllowCreateDeclarativeWorkflowForCurrentUser")) {
            return null;
        }
        return $this->getProperty("AllowCreateDeclarativeWorkflowForCurrentUser");
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to create declarative workflows. The value, if not disabled on the Web 
     * application, is the same as the scalar property of Microsoft.SharePoint.Client.Site.AllowCreateDeclarativeWorkflow.
     * @var bool
     */
    public function setAllowCreateDeclarativeWorkflowForCurrentUser($value)
    {
        $this->setProperty("AllowCreateDeclarativeWorkflowForCurrentUser", $value, true);
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to use a designer application to customize this site (2).
     * @return bool
     */
    public function getAllowDesignerForCurrentUser()
    {
        if (!$this->isPropertyAvailable("AllowDesignerForCurrentUser")) {
            return null;
        }
        return $this->getProperty("AllowDesignerForCurrentUser");
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to use a designer application to customize this site (2).
     * @var bool
     */
    public function setAllowDesignerForCurrentUser($value)
    {
        $this->setProperty("AllowDesignerForCurrentUser", $value, true);
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to edit the master page.
     * @return bool
     */
    public function getAllowMasterPageEditingForCurrentUser()
    {
        if (!$this->isPropertyAvailable("AllowMasterPageEditingForCurrentUser")) {
            return null;
        }
        return $this->getProperty("AllowMasterPageEditingForCurrentUser");
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to edit the master page.
     * @var bool
     */
    public function setAllowMasterPageEditingForCurrentUser($value)
    {
        $this->setProperty("AllowMasterPageEditingForCurrentUser", $value, true);
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to revert the site (2) to a 
     * default site template. 
     * @return bool
     */
    public function getAllowRevertFromTemplateForCurrentUser()
    {
        if (!$this->isPropertyAvailable("AllowRevertFromTemplateForCurrentUser")) {
            return null;
        }
        return $this->getProperty("AllowRevertFromTemplateForCurrentUser");
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to revert the site (2) to a 
     * default site template. 
     * @var bool
     */
    public function setAllowRevertFromTemplateForCurrentUser($value)
    {
        $this->setProperty("AllowRevertFromTemplateForCurrentUser", $value, true);
    }
    /**
     * Specifies 
     * whether the site (2) allows RSS 
     * feeds.  
     * @return bool
     */
    public function getAllowRssFeeds()
    {
        if (!$this->isPropertyAvailable("AllowRssFeeds")) {
            return null;
        }
        return $this->getProperty("AllowRssFeeds");
    }
    /**
     * Specifies 
     * whether the site (2) allows RSS 
     * feeds.  
     * @var bool
     */
    public function setAllowRssFeeds($value)
    {
        $this->setProperty("AllowRssFeeds", $value, true);
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to save declarative workflows as a template. The value, if not disabled 
     * on the Web application, is 
     * the same as the scalar property of Microsoft.SharePoint.Client.Site.AllowSaveDeclarativeWorkflowAsTemplate.
     * @return bool
     */
    public function getAllowSaveDeclarativeWorkflowAsTemplateForCurrentUser()
    {
        if (!$this->isPropertyAvailable("AllowSaveDeclarativeWorkflowAsTemplateForCurrentUser")) {
            return null;
        }
        return $this->getProperty("AllowSaveDeclarativeWorkflowAsTemplateForCurrentUser");
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to save declarative workflows as a template. The value, if not disabled 
     * on the Web application, is 
     * the same as the scalar property of Microsoft.SharePoint.Client.Site.AllowSaveDeclarativeWorkflowAsTemplate.
     * @var bool
     */
    public function setAllowSaveDeclarativeWorkflowAsTemplateForCurrentUser($value)
    {
        $this->setProperty("AllowSaveDeclarativeWorkflowAsTemplateForCurrentUser", $value, true);
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to save or publish declarative workflows. The value, if not disabled on 
     * the Web 
     * application, is the same as the scalar property of Microsoft.SharePoint.Client.Site.AllowSavePublishDeclarativeWorkflow.
     * @return bool
     */
    public function getAllowSavePublishDeclarativeWorkflowForCurrentUser()
    {
        if (!$this->isPropertyAvailable("AllowSavePublishDeclarativeWorkflowForCurrentUser")) {
            return null;
        }
        return $this->getProperty("AllowSavePublishDeclarativeWorkflowForCurrentUser");
    }
    /**
     * Specifies 
     * whether the current user is 
     * allowed to save or publish declarative workflows. The value, if not disabled on 
     * the Web 
     * application, is the same as the scalar property of Microsoft.SharePoint.Client.Site.AllowSavePublishDeclarativeWorkflow.
     * @var bool
     */
    public function setAllowSavePublishDeclarativeWorkflowForCurrentUser($value)
    {
        $this->setProperty("AllowSavePublishDeclarativeWorkflowForCurrentUser", $value, true);
    }
    /**
     * Gets or 
     * sets the URL for an alternate cascading style sheet (CSS) to use in the 
     * website.A string 
     * that contains the URL for an alternate CSS file.
     * @return string
     */
    public function getAlternateCssUrl()
    {
        if (!$this->isPropertyAvailable("AlternateCssUrl")) {
            return null;
        }
        return $this->getProperty("AlternateCssUrl");
    }
    /**
     * Gets or 
     * sets the URL for an alternate cascading style sheet (CSS) to use in the 
     * website.A string 
     * that contains the URL for an alternate CSS file.
     * @var string
     */
    public function setAlternateCssUrl($value)
    {
        $this->setProperty("AlternateCssUrl", $value, true);
    }
    /**
     * Specifies 
     * the identifier of the app instance that 
     * this site 
     * (2) represents. If this site (2) does not represent an app instance, 
     * then this MUST specify an empty GUID.
     * @return string
     */
    public function getAppInstanceId()
    {
        if (!$this->isPropertyAvailable("AppInstanceId")) {
            return null;
        }
        return $this->getProperty("AppInstanceId");
    }
    /**
     * Specifies 
     * the identifier of the app instance that 
     * this site 
     * (2) represents. If this site (2) does not represent an app instance, 
     * then this MUST specify an empty GUID.
     * @var string
     */
    public function setAppInstanceId($value)
    {
        $this->setProperty("AppInstanceId", $value, true);
    }
    /**
     * @return string
     */
    public function getClassicWelcomePage()
    {
        if (!$this->isPropertyAvailable("ClassicWelcomePage")) {
            return null;
        }
        return $this->getProperty("ClassicWelcomePage");
    }
    /**
     * @var string
     */
    public function setClassicWelcomePage($value)
    {
        $this->setProperty("ClassicWelcomePage", $value, true);
    }
    /**
     * Indicates 
     * whether comments on site pages are disabled or not.
     * @return bool
     */
    public function getCommentsOnSitePagesDisabled()
    {
        if (!$this->isPropertyAvailable("CommentsOnSitePagesDisabled")) {
            return null;
        }
        return $this->getProperty("CommentsOnSitePagesDisabled");
    }
    /**
     * Indicates 
     * whether comments on site pages are disabled or not.
     * @var bool
     */
    public function setCommentsOnSitePagesDisabled($value)
    {
        $this->setProperty("CommentsOnSitePagesDisabled", $value, true);
    }
    /**
     * Gets a 
     * Boolean value that specifies whether the site contains highly confidential 
     * information.If the tenant settings don't allow tagging sites as 
     * confidential, this property will return false.
     * @return bool
     */
    public function getContainsConfidentialInfo()
    {
        if (!$this->isPropertyAvailable("ContainsConfidentialInfo")) {
            return null;
        }
        return $this->getProperty("ContainsConfidentialInfo");
    }
    /**
     * Gets a 
     * Boolean value that specifies whether the site contains highly confidential 
     * information.If the tenant settings don't allow tagging sites as 
     * confidential, this property will return false.
     * @var bool
     */
    public function setContainsConfidentialInfo($value)
    {
        $this->setProperty("ContainsConfidentialInfo", $value, true);
    }
    /**
     * Specifies 
     * when the site (2) was 
     * created.    It MUST NOT be NULL. 
     * @return string
     */
    public function getCreated()
    {
        if (!$this->isPropertyAvailable("Created")) {
            return null;
        }
        return $this->getProperty("Created");
    }
    /**
     * Specifies 
     * when the site (2) was 
     * created.    It MUST NOT be NULL. 
     * @var string
     */
    public function setCreated($value)
    {
        $this->setProperty("Created", $value, true);
    }
    /**
     * Gets the 
     * current change token that is implemented in a query against the change log 
     * through the GetChanges method.An SPChangeToken 
     * object that represents the change token.
     * @return ChangeToken
     */
    public function getCurrentChangeToken()
    {
        if (!$this->isPropertyAvailable("CurrentChangeToken")) {
            return null;
        }
        return $this->getProperty("CurrentChangeToken");
    }
    /**
     * Gets the 
     * current change token that is implemented in a query against the change log 
     * through the GetChanges method.An SPChangeToken 
     * object that represents the change token.
     * @var ChangeToken
     */
    public function setCurrentChangeToken($value)
    {
        $this->setProperty("CurrentChangeToken", $value, true);
    }
    /**
     * Specifies 
     * the URL 
     * for a custom master page to apply 
     * to the Web site.<129>
     * @return string
     */
    public function getCustomMasterUrl()
    {
        if (!$this->isPropertyAvailable("CustomMasterUrl")) {
            return null;
        }
        return $this->getProperty("CustomMasterUrl");
    }
    /**
     * Specifies 
     * the URL 
     * for a custom master page to apply 
     * to the Web site.<129>
     * @var string
     */
    public function setCustomMasterUrl($value)
    {
        $this->setProperty("CustomMasterUrl", $value, true);
    }
    /**
     * @return bool
     */
    public function getCustomSiteActionsDisabled()
    {
        if (!$this->isPropertyAvailable("CustomSiteActionsDisabled")) {
            return null;
        }
        return $this->getProperty("CustomSiteActionsDisabled");
    }
    /**
     * @var bool
     */
    public function setCustomSiteActionsDisabled($value)
    {
        $this->setProperty("CustomSiteActionsDisabled", $value, true);
    }
    /**
     * Specifies 
     * the description for the site (2).   
     * @return string
     */
    public function getDescription()
    {
        if (!$this->isPropertyAvailable("Description")) {
            return null;
        }
        return $this->getProperty("Description");
    }
    /**
     * Specifies 
     * the description for the site (2).   
     * @var string
     */
    public function setDescription($value)
    {
        $this->setProperty("Description", $value, true);
    }
    /**
     * Specifies 
     * the URL where the current user can 
     * download a designer.
     * @return string
     */
    public function getDesignerDownloadUrlForCurrentUser()
    {
        if (!$this->isPropertyAvailable("DesignerDownloadUrlForCurrentUser")) {
            return null;
        }
        return $this->getProperty("DesignerDownloadUrlForCurrentUser");
    }
    /**
     * Specifies 
     * the URL where the current user can 
     * download a designer.
     * @var string
     */
    public function setDesignerDownloadUrlForCurrentUser($value)
    {
        $this->setProperty("DesignerDownloadUrlForCurrentUser", $value, true);
    }
    /**
     * Gets or 
     * sets the ID of the Design Package used in this SPWeb.A value of 
     * Guid.Empty will mean that the default Design Package will be used for this 
     * SPWeb. The default is determined by the SPWebTemplate of this SPWeb.
     * @return string
     */
    public function getDesignPackageId()
    {
        if (!$this->isPropertyAvailable("DesignPackageId")) {
            return null;
        }
        return $this->getProperty("DesignPackageId");
    }
    /**
     * Gets or 
     * sets the ID of the Design Package used in this SPWeb.A value of 
     * Guid.Empty will mean that the default Design Package will be used for this 
     * SPWeb. The default is determined by the SPWebTemplate of this SPWeb.
     * @var string
     */
    public function setDesignPackageId($value)
    {
        $this->setProperty("DesignPackageId", $value, true);
    }
    /**
     * @return bool
     */
    public function getDisableAppViews()
    {
        if (!$this->isPropertyAvailable("DisableAppViews")) {
            return null;
        }
        return $this->getProperty("DisableAppViews");
    }
    /**
     * @var bool
     */
    public function setDisableAppViews($value)
    {
        $this->setProperty("DisableAppViews", $value, true);
    }
    /**
     * @return bool
     */
    public function getDisableFlows()
    {
        if (!$this->isPropertyAvailable("DisableFlows")) {
            return null;
        }
        return $this->getProperty("DisableFlows");
    }
    /**
     * @var bool
     */
    public function setDisableFlows($value)
    {
        $this->setProperty("DisableFlows", $value, true);
    }
    /**
     * @return bool
     */
    public function getDisableRecommendedItems()
    {
        if (!$this->isPropertyAvailable("DisableRecommendedItems")) {
            return null;
        }
        return $this->getProperty("DisableRecommendedItems");
    }
    /**
     * @var bool
     */
    public function setDisableRecommendedItems($value)
    {
        $this->setProperty("DisableRecommendedItems", $value, true);
    }
    /**
     * Specifies 
     * whether the Office Add-in 
     * previews are disabled for the context menus in a document library.
     * @return bool
     */
    public function getDocumentLibraryCalloutOfficeWebAppPreviewersDisabled()
    {
        if (!$this->isPropertyAvailable("DocumentLibraryCalloutOfficeWebAppPreviewersDisabled")) {
            return null;
        }
        return $this->getProperty("DocumentLibraryCalloutOfficeWebAppPreviewersDisabled");
    }
    /**
     * Specifies 
     * whether the Office Add-in 
     * previews are disabled for the context menus in a document library.
     * @var bool
     */
    public function setDocumentLibraryCalloutOfficeWebAppPreviewersDisabled($value)
    {
        $this->setProperty("DocumentLibraryCalloutOfficeWebAppPreviewersDisabled", $value, true);
    }
    /**
     * Specifies 
     * the effective permissions that are 
     * assigned to the current user.  It MUST NOT be NULL. 
     * @return BasePermissions
     */
    public function getEffectiveBasePermissions()
    {
        if (!$this->isPropertyAvailable("EffectiveBasePermissions")) {
            return null;
        }
        return $this->getProperty("EffectiveBasePermissions");
    }
    /**
     * Specifies 
     * the effective permissions that are 
     * assigned to the current user.  It MUST NOT be NULL. 
     * @var BasePermissions
     */
    public function setEffectiveBasePermissions($value)
    {
        $this->setProperty("EffectiveBasePermissions", $value, true);
    }
    /**
     * Specifies 
     * whether the site will use the minimal download strategy by default.<127>The 
     * minimal download strategy will use a single .aspx file (start.aspx) for your 
     * pages, with the actual URL encoded in the 
     * text following the hash mark ('#'). When navigating from page to page, only the 
     * changes between two compatible pages will be downloaded. Fewer bytes will be 
     * downloaded and the page will appear more quickly.
     * @return bool
     */
    public function getEnableMinimalDownload()
    {
        if (!$this->isPropertyAvailable("EnableMinimalDownload")) {
            return null;
        }
        return $this->getProperty("EnableMinimalDownload");
    }
    /**
     * Specifies 
     * whether the site will use the minimal download strategy by default.<127>The 
     * minimal download strategy will use a single .aspx file (start.aspx) for your 
     * pages, with the actual URL encoded in the 
     * text following the hash mark ('#'). When navigating from page to page, only the 
     * changes between two compatible pages will be downloaded. Fewer bytes will be 
     * downloaded and the page will appear more quickly.
     * @var bool
     */
    public function setEnableMinimalDownload($value)
    {
        $this->setProperty("EnableMinimalDownload", $value, true);
    }
    /**
     * Indicates 
     * whether the data from the website is to be downloaded to the client during 
     * offline synchronization. A value of "true" means yes.
     * @return bool
     */
    public function getExcludeFromOfflineClient()
    {
        if (!$this->isPropertyAvailable("ExcludeFromOfflineClient")) {
            return null;
        }
        return $this->getProperty("ExcludeFromOfflineClient");
    }
    /**
     * Indicates 
     * whether the data from the website is to be downloaded to the client during 
     * offline synchronization. A value of "true" means yes.
     * @var bool
     */
    public function setExcludeFromOfflineClient($value)
    {
        $this->setProperty("ExcludeFromOfflineClient", $value, true);
    }
    /**
     * @return integer
     */
    public function getFooterEmphasis()
    {
        if (!$this->isPropertyAvailable("FooterEmphasis")) {
            return null;
        }
        return $this->getProperty("FooterEmphasis");
    }
    /**
     * @var integer
     */
    public function setFooterEmphasis($value)
    {
        $this->setProperty("FooterEmphasis", $value, true);
    }
    /**
     * @return bool
     */
    public function getFooterEnabled()
    {
        if (!$this->isPropertyAvailable("FooterEnabled")) {
            return null;
        }
        return $this->getProperty("FooterEnabled");
    }
    /**
     * @var bool
     */
    public function setFooterEnabled($value)
    {
        $this->setProperty("FooterEnabled", $value, true);
    }
    /**
     * @return integer
     */
    public function getFooterLayout()
    {
        if (!$this->isPropertyAvailable("FooterLayout")) {
            return null;
        }
        return $this->getProperty("FooterLayout");
    }
    /**
     * @var integer
     */
    public function setFooterLayout($value)
    {
        $this->setProperty("FooterLayout", $value, true);
    }
    /**
     * @return integer
     */
    public function getHeaderEmphasis()
    {
        if (!$this->isPropertyAvailable("HeaderEmphasis")) {
            return null;
        }
        return $this->getProperty("HeaderEmphasis");
    }
    /**
     * @var integer
     */
    public function setHeaderEmphasis($value)
    {
        $this->setProperty("HeaderEmphasis", $value, true);
    }
    /**
     * @return integer
     */
    public function getHeaderLayout()
    {
        if (!$this->isPropertyAvailable("HeaderLayout")) {
            return null;
        }
        return $this->getProperty("HeaderLayout");
    }
    /**
     * @var integer
     */
    public function setHeaderLayout($value)
    {
        $this->setProperty("HeaderLayout", $value, true);
    }
    /**
     * @return bool
     */
    public function getHorizontalQuickLaunch()
    {
        if (!$this->isPropertyAvailable("HorizontalQuickLaunch")) {
            return null;
        }
        return $this->getProperty("HorizontalQuickLaunch");
    }
    /**
     * @var bool
     */
    public function setHorizontalQuickLaunch($value)
    {
        $this->setProperty("HorizontalQuickLaunch", $value, true);
    }
    /**
     * Specifies 
     * the site 
     * identifier for the site (2).  
     * @return string
     */
    public function getId()
    {
        if (!$this->isPropertyAvailable("Id")) {
            return null;
        }
        return $this->getProperty("Id");
    }
    /**
     * Specifies 
     * the site 
     * identifier for the site (2).  
     * @var string
     */
    public function setId($value)
    {
        $this->setProperty("Id", $value, true);
    }
    /**
     * @return bool
     */
    public function getIsHomepageModernized()
    {
        if (!$this->isPropertyAvailable("IsHomepageModernized")) {
            return null;
        }
        return $this->getProperty("IsHomepageModernized");
    }
    /**
     * @var bool
     */
    public function setIsHomepageModernized($value)
    {
        $this->setProperty("IsHomepageModernized", $value, true);
    }
    /**
     * Gets or 
     * sets whether Multilingual UI is turned on for this web or not.
     * @return bool
     */
    public function getIsMultilingual()
    {
        if (!$this->isPropertyAvailable("IsMultilingual")) {
            return null;
        }
        return $this->getProperty("IsMultilingual");
    }
    /**
     * Gets or 
     * sets whether Multilingual UI is turned on for this web or not.
     * @var bool
     */
    public function setIsMultilingual($value)
    {
        $this->setProperty("IsMultilingual", $value, true);
    }
    /**
     * @return bool
     */
    public function getIsProvisioningComplete()
    {
        if (!$this->isPropertyAvailable("IsProvisioningComplete")) {
            return null;
        }
        return $this->getProperty("IsProvisioningComplete");
    }
    /**
     * @var bool
     */
    public function setIsProvisioningComplete($value)
    {
        $this->setProperty("IsProvisioningComplete", $value, true);
    }
    /**
     * @return bool
     */
    public function getIsRevertHomepageLinkHidden()
    {
        if (!$this->isPropertyAvailable("IsRevertHomepageLinkHidden")) {
            return null;
        }
        return $this->getProperty("IsRevertHomepageLinkHidden");
    }
    /**
     * @var bool
     */
    public function setIsRevertHomepageLinkHidden($value)
    {
        $this->setProperty("IsRevertHomepageLinkHidden", $value, true);
    }
    /**
     * Specifies 
     * the language 
     * code identifier (LCID) for the language that is used on the site (2).  
     * @return integer
     */
    public function getLanguage()
    {
        if (!$this->isPropertyAvailable("Language")) {
            return null;
        }
        return $this->getProperty("Language");
    }
    /**
     * Specifies 
     * the language 
     * code identifier (LCID) for the language that is used on the site (2).  
     * @var integer
     */
    public function setLanguage($value)
    {
        $this->setProperty("Language", $value, true);
    }
    /**
     * Specifies 
     * when an item was last 
     * modified in the site (2).  
     * @return string
     */
    public function getLastItemModifiedDate()
    {
        if (!$this->isPropertyAvailable("LastItemModifiedDate")) {
            return null;
        }
        return $this->getProperty("LastItemModifiedDate");
    }
    /**
     * Specifies 
     * when an item was last 
     * modified in the site (2).  
     * @var string
     */
    public function setLastItemModifiedDate($value)
    {
        $this->setProperty("LastItemModifiedDate", $value, true);
    }
    /**
     * Gets the 
     * date and time that an item was last modified in the site by a non-system 
     * update. A non-system update is a change to a list item that is visible to end 
     * users.
     * @return string
     */
    public function getLastItemUserModifiedDate()
    {
        if (!$this->isPropertyAvailable("LastItemUserModifiedDate")) {
            return null;
        }
        return $this->getProperty("LastItemUserModifiedDate");
    }
    /**
     * Gets the 
     * date and time that an item was last modified in the site by a non-system 
     * update. A non-system update is a change to a list item that is visible to end 
     * users.
     * @var string
     */
    public function setLastItemUserModifiedDate($value)
    {
        $this->setProperty("LastItemUserModifiedDate", $value, true);
    }
    /**
     * Specifies 
     * the URL 
     * for a custom master page to apply 
     * to the Web site.<129>
     * @return string
     */
    public function getMasterUrl()
    {
        if (!$this->isPropertyAvailable("MasterUrl")) {
            return null;
        }
        return $this->getProperty("MasterUrl");
    }
    /**
     * Specifies 
     * the URL 
     * for a custom master page to apply 
     * to the Web site.<129>
     * @var string
     */
    public function setMasterUrl($value)
    {
        $this->setProperty("MasterUrl", $value, true);
    }
    /**
     * @return bool
     */
    public function getMegaMenuEnabled()
    {
        if (!$this->isPropertyAvailable("MegaMenuEnabled")) {
            return null;
        }
        return $this->getProperty("MegaMenuEnabled");
    }
    /**
     * @var bool
     */
    public function setMegaMenuEnabled($value)
    {
        $this->setProperty("MegaMenuEnabled", $value, true);
    }
    /**
     * Specifies 
     * whether to enable site members to invite external users.
     * @return bool
     */
    public function getMembersCanShare()
    {
        if (!$this->isPropertyAvailable("MembersCanShare")) {
            return null;
        }
        return $this->getProperty("MembersCanShare");
    }
    /**
     * Specifies 
     * whether to enable site members to invite external users.
     * @var bool
     */
    public function setMembersCanShare($value)
    {
        $this->setProperty("MembersCanShare", $value, true);
    }
    /**
     * @return bool
     */
    public function getNavAudienceTargetingEnabled()
    {
        if (!$this->isPropertyAvailable("NavAudienceTargetingEnabled")) {
            return null;
        }
        return $this->getProperty("NavAudienceTargetingEnabled");
    }
    /**
     * @var bool
     */
    public function setNavAudienceTargetingEnabled($value)
    {
        $this->setProperty("NavAudienceTargetingEnabled", $value, true);
    }
    /**
     * Gets or 
     * sets a Boolean value that specifies whether searching is enabled for the Web 
     * site.
     * @return bool
     */
    public function getNoCrawl()
    {
        if (!$this->isPropertyAvailable("NoCrawl")) {
            return null;
        }
        return $this->getProperty("NoCrawl");
    }
    /**
     * Gets or 
     * sets a Boolean value that specifies whether searching is enabled for the Web 
     * site.
     * @var bool
     */
    public function setNoCrawl($value)
    {
        $this->setProperty("NoCrawl", $value, true);
    }
    /**
     * Returns if 
     * true if the tenant allowed to send push notifications in ODB.
     * @return bool
     */
    public function getNotificationsInOneDriveForBusinessEnabled()
    {
        if (!$this->isPropertyAvailable("NotificationsInOneDriveForBusinessEnabled")) {
            return null;
        }
        return $this->getProperty("NotificationsInOneDriveForBusinessEnabled");
    }
    /**
     * Returns if 
     * true if the tenant allowed to send push notifications in ODB.
     * @var bool
     */
    public function setNotificationsInOneDriveForBusinessEnabled($value)
    {
        $this->setProperty("NotificationsInOneDriveForBusinessEnabled", $value, true);
    }
    /**
     * Returns if 
     * true if the tenant allowed to send push notifications in SharePoint.
     * @return bool
     */
    public function getNotificationsInSharePointEnabled()
    {
        if (!$this->isPropertyAvailable("NotificationsInSharePointEnabled")) {
            return null;
        }
        return $this->getProperty("NotificationsInSharePointEnabled");
    }
    /**
     * Returns if 
     * true if the tenant allowed to send push notifications in SharePoint.
     * @var bool
     */
    public function setNotificationsInSharePointEnabled($value)
    {
        $this->setProperty("NotificationsInSharePointEnabled", $value, true);
    }
    /**
     * @return bool
     */
    public function getObjectCacheEnabled()
    {
        if (!$this->isPropertyAvailable("ObjectCacheEnabled")) {
            return null;
        }
        return $this->getProperty("ObjectCacheEnabled");
    }
    /**
     * @var bool
     */
    public function setObjectCacheEnabled($value)
    {
        $this->setProperty("ObjectCacheEnabled", $value, true);
    }
    /**
     * Gets or 
     * sets whether changing the UserResource value in the UICulture of the web 
     * overwrites the values for AdditionalUICultures or not.
     * @return bool
     */
    public function getOverwriteTranslationsOnChange()
    {
        if (!$this->isPropertyAvailable("OverwriteTranslationsOnChange")) {
            return null;
        }
        return $this->getProperty("OverwriteTranslationsOnChange");
    }
    /**
     * Gets or 
     * sets whether changing the UserResource value in the UICulture of the web 
     * overwrites the values for AdditionalUICultures or not.
     * @var bool
     */
    public function setOverwriteTranslationsOnChange($value)
    {
        $this->setProperty("OverwriteTranslationsOnChange", $value, true);
    }
    /**
     * Indicates 
     * whether the tenant administrator has chosen to disable the Preview Features.Defaults 
     * to True: Preview Features are enabled.
     * @return bool
     */
    public function getPreviewFeaturesEnabled()
    {
        if (!$this->isPropertyAvailable("PreviewFeaturesEnabled")) {
            return null;
        }
        return $this->getProperty("PreviewFeaturesEnabled");
    }
    /**
     * Indicates 
     * whether the tenant administrator has chosen to disable the Preview Features.Defaults 
     * to True: Preview Features are enabled.
     * @var bool
     */
    public function setPreviewFeaturesEnabled($value)
    {
        $this->setProperty("PreviewFeaturesEnabled", $value, true);
    }
    /**
     * @return string
     */
    public function getPrimaryColor()
    {
        if (!$this->isPropertyAvailable("PrimaryColor")) {
            return null;
        }
        return $this->getProperty("PrimaryColor");
    }
    /**
     * @var string
     */
    public function setPrimaryColor($value)
    {
        $this->setProperty("PrimaryColor", $value, true);
    }
    /**
     * Specifies 
     * whether the Quick Launch area is 
     * enabled on the site (2).  
     * @return bool
     */
    public function getQuickLaunchEnabled()
    {
        if (!$this->isPropertyAvailable("QuickLaunchEnabled")) {
            return null;
        }
        return $this->getProperty("QuickLaunchEnabled");
    }
    /**
     * Specifies 
     * whether the Quick Launch area is 
     * enabled on the site (2).  
     * @var bool
     */
    public function setQuickLaunchEnabled($value)
    {
        $this->setProperty("QuickLaunchEnabled", $value, true);
    }
    /**
     * Specifies 
     * whether the Recycle Bin is 
     * enabled. 
     * @return bool
     */
    public function getRecycleBinEnabled()
    {
        if (!$this->isPropertyAvailable("RecycleBinEnabled")) {
            return null;
        }
        return $this->getProperty("RecycleBinEnabled");
    }
    /**
     * Specifies 
     * whether the Recycle Bin is 
     * enabled. 
     * @var bool
     */
    public function setRecycleBinEnabled($value)
    {
        $this->setProperty("RecycleBinEnabled", $value, true);
    }
    /**
     * Gets or 
     * sets the e-mail address to which requests for access are sent.
     * @return string
     */
    public function getRequestAccessEmail()
    {
        if (!$this->isPropertyAvailable("RequestAccessEmail")) {
            return null;
        }
        return $this->getProperty("RequestAccessEmail");
    }
    /**
     * Gets or 
     * sets the e-mail address to which requests for access are sent.
     * @var string
     */
    public function setRequestAccessEmail($value)
    {
        $this->setProperty("RequestAccessEmail", $value, true);
    }
    /**
     * Specifies 
     * if the site (2) can be 
     * saved as a site template.A feature 
     * that creates content which is not compatible for a site template can set this 
     * value to false to stop users of this site (2) from generating an invalid site 
     * template.A feature ought to never set this value to true when it is 
     * deactivated or at any other time since another feature might have created 
     * content that is not compatible in a site template.Setting this value to false, if it was true, will result in 
     * a site template that is not supported.
     * @return bool
     */
    public function getSaveSiteAsTemplateEnabled()
    {
        if (!$this->isPropertyAvailable("SaveSiteAsTemplateEnabled")) {
            return null;
        }
        return $this->getProperty("SaveSiteAsTemplateEnabled");
    }
    /**
     * Specifies 
     * if the site (2) can be 
     * saved as a site template.A feature 
     * that creates content which is not compatible for a site template can set this 
     * value to false to stop users of this site (2) from generating an invalid site 
     * template.A feature ought to never set this value to true when it is 
     * deactivated or at any other time since another feature might have created 
     * content that is not compatible in a site template.Setting this value to false, if it was true, will result in 
     * a site template that is not supported.
     * @var bool
     */
    public function setSaveSiteAsTemplateEnabled($value)
    {
        $this->setProperty("SaveSiteAsTemplateEnabled", $value, true);
    }
    /**
     * @return integer
     */
    public function getSearchBoxInNavBar()
    {
        if (!$this->isPropertyAvailable("SearchBoxInNavBar")) {
            return null;
        }
        return $this->getProperty("SearchBoxInNavBar");
    }
    /**
     * @var integer
     */
    public function setSearchBoxInNavBar($value)
    {
        $this->setProperty("SearchBoxInNavBar", $value, true);
    }
    /**
     * @return string
     */
    public function getSearchBoxPlaceholderText()
    {
        if (!$this->isPropertyAvailable("SearchBoxPlaceholderText")) {
            return null;
        }
        return $this->getProperty("SearchBoxPlaceholderText");
    }
    /**
     * @var string
     */
    public function setSearchBoxPlaceholderText($value)
    {
        $this->setProperty("SearchBoxPlaceholderText", $value, true);
    }
    /**
     * @return integer
     */
    public function getSearchScope()
    {
        if (!$this->isPropertyAvailable("SearchScope")) {
            return null;
        }
        return $this->getProperty("SearchScope");
    }
    /**
     * @var integer
     */
    public function setSearchScope($value)
    {
        $this->setProperty("SearchScope", $value, true);
    }
    /**
     * Specifies 
     * the server-relative 
     * URL of the site (2).It MUST 
     * NOT be NULL. It MUST NOT contain any of the reserved Uniform Resource Locators 
     * (URLs). Reserved URLs are implementation-specific and not defined by 
     * this protocol. It MUST NOT contain the following illegal characters: 
     * [!#$&'+:<>?\\{|}~]|(//)|(\.\.)|(/_)|(/wpresources$)|(/wpresources/)
     * @return string
     */
    public function getServerRelativeUrl()
    {
        if (!$this->isPropertyAvailable("ServerRelativeUrl")) {
            return null;
        }
        return $this->getProperty("ServerRelativeUrl");
    }
    /**
     * Specifies 
     * the server-relative 
     * URL of the site (2).It MUST 
     * NOT be NULL. It MUST NOT contain any of the reserved Uniform Resource Locators 
     * (URLs). Reserved URLs are implementation-specific and not defined by 
     * this protocol. It MUST NOT contain the following illegal characters: 
     * [!#$&'+:<>?\\{|}~]|(//)|(\.\.)|(/_)|(/wpresources$)|(/wpresources/)
     * @var string
     */
    public function setServerRelativeUrl($value)
    {
        $this->setProperty("ServerRelativeUrl", $value, true);
    }
    /**
     * Specifies 
     * whether the current user is able 
     * to view the file system structure of this site (2).
     * @return bool
     */
    public function getShowUrlStructureForCurrentUser()
    {
        if (!$this->isPropertyAvailable("ShowUrlStructureForCurrentUser")) {
            return null;
        }
        return $this->getProperty("ShowUrlStructureForCurrentUser");
    }
    /**
     * Specifies 
     * whether the current user is able 
     * to view the file system structure of this site (2).
     * @var bool
     */
    public function setShowUrlStructureForCurrentUser($value)
    {
        $this->setProperty("ShowUrlStructureForCurrentUser", $value, true);
    }
    /**
     * Gets or 
     * sets the description of the Web site logo.
     * @return string
     */
    public function getSiteLogoDescription()
    {
        if (!$this->isPropertyAvailable("SiteLogoDescription")) {
            return null;
        }
        return $this->getProperty("SiteLogoDescription");
    }
    /**
     * Gets or 
     * sets the description of the Web site logo.
     * @var string
     */
    public function setSiteLogoDescription($value)
    {
        $this->setProperty("SiteLogoDescription", $value, true);
    }
    /**
     * Specifies 
     * the server-relative URL of the Web site logo.
     * @return string
     */
    public function getSiteLogoUrl()
    {
        if (!$this->isPropertyAvailable("SiteLogoUrl")) {
            return null;
        }
        return $this->getProperty("SiteLogoUrl");
    }
    /**
     * Specifies 
     * the server-relative URL of the Web site logo.
     * @var string
     */
    public function setSiteLogoUrl($value)
    {
        $this->setProperty("SiteLogoUrl", $value, true);
    }
    /**
     * Accessibility: Read OnlySpecifies 
     * the language 
     * code identifiers (LCIDs) of the languages that are enabled for the site (2).
     * @var array
     */
    public function setSupportedUILanguageIds($value)
    {
        $this->setProperty("SupportedUILanguageIds", $value, true);
    }
    /**
     * Specifies 
     * whether the [RSS2.0] feeds 
     * are enabled on the site (2).
     * @return bool
     */
    public function getSyndicationEnabled()
    {
        if (!$this->isPropertyAvailable("SyndicationEnabled")) {
            return null;
        }
        return $this->getProperty("SyndicationEnabled");
    }
    /**
     * Specifies 
     * whether the [RSS2.0] feeds 
     * are enabled on the site (2).
     * @var bool
     */
    public function setSyndicationEnabled($value)
    {
        $this->setProperty("SyndicationEnabled", $value, true);
    }
    /**
     * @return integer
     */
    public function getTenantAdminMembersCanShare()
    {
        if (!$this->isPropertyAvailable("TenantAdminMembersCanShare")) {
            return null;
        }
        return $this->getProperty("TenantAdminMembersCanShare");
    }
    /**
     * @var integer
     */
    public function setTenantAdminMembersCanShare($value)
    {
        $this->setProperty("TenantAdminMembersCanShare", $value, true);
    }
    /**
     * @return bool
     */
    public function getTenantTagPolicyEnabled()
    {
        if (!$this->isPropertyAvailable("TenantTagPolicyEnabled")) {
            return null;
        }
        return $this->getProperty("TenantTagPolicyEnabled");
    }
    /**
     * @var bool
     */
    public function setTenantTagPolicyEnabled($value)
    {
        $this->setProperty("TenantTagPolicyEnabled", $value, true);
    }
    /**
     * A string 
     * of JSON 
     * representing a theme.
     * @return string
     */
    public function getThemeData()
    {
        if (!$this->isPropertyAvailable("ThemeData")) {
            return null;
        }
        return $this->getProperty("ThemeData");
    }
    /**
     * A string 
     * of JSON 
     * representing a theme.
     * @var string
     */
    public function setThemeData($value)
    {
        $this->setProperty("ThemeData", $value, true);
    }
    /**
     * Returns 
     * the URL of the folder containing the themed CSS for the web, null if no theme 
     * is applied.
     * @return string
     */
    public function getThemedCssFolderUrl()
    {
        if (!$this->isPropertyAvailable("ThemedCssFolderUrl")) {
            return null;
        }
        return $this->getProperty("ThemedCssFolderUrl");
    }
    /**
     * Returns 
     * the URL of the folder containing the themed CSS for the web, null if no theme 
     * is applied.
     * @var string
     */
    public function setThemedCssFolderUrl($value)
    {
        $this->setProperty("ThemedCssFolderUrl", $value, true);
    }
    /**
     * Gets the 
     * value that indicates whether or not the tenant that uses third-party Mobile 
     * Device Management (MDM) have block access to the public OneDrive app, and direct 
     * users to their company version of the app.        
     * @return bool
     */
    public function getThirdPartyMdmEnabled()
    {
        if (!$this->isPropertyAvailable("ThirdPartyMdmEnabled")) {
            return null;
        }
        return $this->getProperty("ThirdPartyMdmEnabled");
    }
    /**
     * Gets the 
     * value that indicates whether or not the tenant that uses third-party Mobile 
     * Device Management (MDM) have block access to the public OneDrive app, and direct 
     * users to their company version of the app.        
     * @var bool
     */
    public function setThirdPartyMdmEnabled($value)
    {
        $this->setProperty("ThirdPartyMdmEnabled", $value, true);
    }
    /**
     * Specifies 
     * the title for the site (2).Its length 
     * MUST be equal to or less than 255. 
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
     * Specifies 
     * the title for the site (2).Its length 
     * MUST be equal to or less than 255. 
     * @var string
     */
    public function setTitle($value)
    {
        $this->setProperty("Title", $value, true);
    }
    /**
     * Specifies 
     * whether the tree view is enabled on the site (2). 
     * @return bool
     */
    public function getTreeViewEnabled()
    {
        if (!$this->isPropertyAvailable("TreeViewEnabled")) {
            return null;
        }
        return $this->getProperty("TreeViewEnabled");
    }
    /**
     * Specifies 
     * whether the tree view is enabled on the site (2). 
     * @var bool
     */
    public function setTreeViewEnabled($value)
    {
        $this->setProperty("TreeViewEnabled", $value, true);
    }
    /**
     * Specifies 
     * which version of the user interface (UI) the site (2) is using. 
     * This value MUST be a defined SPValidUIVersion value, as specified in the 
     * following table.SPValidUIVersionDescription3Specifies that the site (2) is using the SharePoint 
     *   2007 user interface (UI).4Specifies that the site (2) is using the SharePoint 
     *   2010 user interface (UI).
     * @return integer
     */
    public function getUIVersion()
    {
        if (!$this->isPropertyAvailable("UIVersion")) {
            return null;
        }
        return $this->getProperty("UIVersion");
    }
    /**
     * Specifies 
     * which version of the user interface (UI) the site (2) is using. 
     * This value MUST be a defined SPValidUIVersion value, as specified in the 
     * following table.SPValidUIVersionDescription3Specifies that the site (2) is using the SharePoint 
     *   2007 user interface (UI).4Specifies that the site (2) is using the SharePoint 
     *   2010 user interface (UI).
     * @var integer
     */
    public function setUIVersion($value)
    {
        $this->setProperty("UIVersion", $value, true);
    }
    /**
     * Specifies 
     * whether the settings UI for visual upgrade is 
     * shown or hidden.
     * @return bool
     */
    public function getUIVersionConfigurationEnabled()
    {
        if (!$this->isPropertyAvailable("UIVersionConfigurationEnabled")) {
            return null;
        }
        return $this->getProperty("UIVersionConfigurationEnabled");
    }
    /**
     * Specifies 
     * whether the settings UI for visual upgrade is 
     * shown or hidden.
     * @var bool
     */
    public function setUIVersionConfigurationEnabled($value)
    {
        $this->setProperty("UIVersionConfigurationEnabled", $value, true);
    }
    /**
     * Specifies 
     * the server-relative 
     * URL of the site (2).It MUST 
     * NOT be NULL. It MUST NOT contain any of the reserved Uniform Resource Locators 
     * (URLs). Reserved URLs are implementation-specific and not defined by 
     * this protocol. It MUST NOT contain the following illegal characters: 
     * [!#$&'+:<>?\\{|}~]|(//)|(\.\.)|(/_)|(/wpresources$)|(/wpresources/)
     * @return string
     */
    public function getUrl()
    {
        if (!$this->isPropertyAvailable("Url")) {
            return null;
        }
        return $this->getProperty("Url");
    }
    /**
     * Specifies 
     * the server-relative 
     * URL of the site (2).It MUST 
     * NOT be NULL. It MUST NOT contain any of the reserved Uniform Resource Locators 
     * (URLs). Reserved URLs are implementation-specific and not defined by 
     * this protocol. It MUST NOT contain the following illegal characters: 
     * [!#$&'+:<>?\\{|}~]|(//)|(\.\.)|(/_)|(/wpresources$)|(/wpresources/)
     * @var string
     */
    public function setUrl($value)
    {
        $this->setProperty("Url", $value, true);
    }
    /**
     * @return bool
     */
    public function getUseAccessRequestDefault()
    {
        if (!$this->isPropertyAvailable("UseAccessRequestDefault")) {
            return null;
        }
        return $this->getProperty("UseAccessRequestDefault");
    }
    /**
     * @var bool
     */
    public function setUseAccessRequestDefault($value)
    {
        $this->setProperty("UseAccessRequestDefault", $value, true);
    }
    /**
     * Specifies 
     * the name of the site definition that 
     * was used to create the site (2). If the 
     * site (2) was created with a custom site template this 
     * specifies the name of the site definition from which the custom site template 
     * is derived.
     * @return string
     */
    public function getWebTemplate()
    {
        if (!$this->isPropertyAvailable("WebTemplate")) {
            return null;
        }
        return $this->getProperty("WebTemplate");
    }
    /**
     * Specifies 
     * the name of the site definition that 
     * was used to create the site (2). If the 
     * site (2) was created with a custom site template this 
     * specifies the name of the site definition from which the custom site template 
     * is derived.
     * @var string
     */
    public function setWebTemplate($value)
    {
        $this->setProperty("WebTemplate", $value, true);
    }
    /**
     * Specifies 
     * the URL 
     * of the Welcome page for the 
     * site 
     * (2).
     * @return string
     */
    public function getWelcomePage()
    {
        if (!$this->isPropertyAvailable("WelcomePage")) {
            return null;
        }
        return $this->getProperty("WelcomePage");
    }
    /**
     * Specifies 
     * the URL 
     * of the Welcome page for the 
     * site 
     * (2).
     * @var string
     */
    public function setWelcomePage($value)
    {
        $this->setProperty("WelcomePage", $value, true);
    }
    /**
     * Specifies 
     * the default site (2)group 
     * that was created with contribute permissions at the time the site (2) was 
     * created.
     * @return Group
     */
    public function getAssociatedMemberGroup()
    {
        if (!$this->isPropertyAvailable("AssociatedMemberGroup")) {
            $this->setProperty("AssociatedMemberGroup", new Group($this->getContext(),
                new ResourcePath("AssociatedMemberGroup", $this->getResourcePath())));
        }
        return $this->getProperty("AssociatedMemberGroup");
    }
    /**
     * Specifies 
     * the default site (2)group 
     * that was created with full control permissions at the time the site (2) was 
     * created.
     * @return Group
     */
    public function getAssociatedOwnerGroup()
    {
        if (!$this->isPropertyAvailable("AssociatedOwnerGroup")) {
            $this->setProperty("AssociatedOwnerGroup", new Group($this->getContext(),
                new ResourcePath("AssociatedOwnerGroup", $this->getResourcePath())));
        }
        return $this->getProperty("AssociatedOwnerGroup");
    }
    /**
     * Specifies 
     * the default site (2)group 
     * that was created with read permissions at the time the site (2) was created.
     * @return Group
     */
    public function getAssociatedVisitorGroup()
    {
        if (!$this->isPropertyAvailable("AssociatedVisitorGroup")) {
            $this->setProperty("AssociatedVisitorGroup", new Group($this->getContext(),
                new ResourcePath("AssociatedVisitorGroup", $this->getResourcePath())));
        }
        return $this->getProperty("AssociatedVisitorGroup");
    }
    /**
     * Gets a 
     * user object that represents the user who created the Web site.
     * @return User
     */
    public function getAuthor()
    {
        if (!$this->isPropertyAvailable("Author")) {
            $this->setProperty("Author", new User($this->getContext(),
                new ResourcePath("Author", $this->getResourcePath())));
        }
        return $this->getProperty("Author");
    }
    /**
     * Specifies 
     * the collection of all site content types 
     * that apply to the current scope, including those of the current site (2), 
     * as well as any parent sites.   It MUST NOT be NULL. 
     * @return ContentTypeCollection
     */
    public function getAvailableContentTypes()
    {
        if (!$this->isPropertyAvailable("AvailableContentTypes")) {
            $this->setProperty("AvailableContentTypes", new ContentTypeCollection($this->getContext(),
                new ResourcePath("AvailableContentTypes", $this->getResourcePath())));
        }
        return $this->getProperty("AvailableContentTypes");
    }
    /**
     * Specifies 
     * the collection of all fields (2) available 
     * for the current scope, including those of the current site (2), as well as 
     * any parent 
     * sites.   It MUST NOT be NULL. 
     * @return FieldCollection
     */
    public function getAvailableFields()
    {
        if (!$this->isPropertyAvailable("AvailableFields")) {
            $this->setProperty("AvailableFields", new FieldCollection($this->getContext(),
                new ResourcePath("AvailableFields", $this->getResourcePath())));
        }
        return $this->getProperty("AvailableFields");
    }
    /**
     * Specifies 
     * whether the Recycle Bin is 
     * enabled. 
     * @return RecycleBinItemCollection
     */
    public function getRecycleBin()
    {
        if (!$this->isPropertyAvailable("RecycleBin")) {
            $this->setProperty("RecycleBin", new RecycleBinItemCollection($this->getContext(),
                new ResourcePath("RecycleBin", $this->getResourcePath())));
        }
        return $this->getProperty("RecycleBin");
    }
    /**
     * Specifies 
     * the root 
     * folder for the site (2). 
     * @return Folder
     */
    public function getRootFolder()
    {
        if (!$this->isPropertyAvailable("RootFolder")) {
            $this->setProperty("RootFolder", new Folder($this->getContext(),
                new ResourcePath("RootFolder", $this->getResourcePath())));
        }
        return $this->getProperty("RootFolder");
    }
    /**
     * @return UserResource
     */
    public function getDescriptionResource()
    {
        if (!$this->isPropertyAvailable("DescriptionResource")) {
            $this->setProperty("DescriptionResource", new UserResource($this->getContext(),
                new ResourcePath("DescriptionResource", $this->getResourcePath())));
        }
        return $this->getProperty("DescriptionResource");
    }
    /**
     * @return UserResource
     */
    public function getTitleResource()
    {
        if (!$this->isPropertyAvailable("TitleResource")) {
            $this->setProperty("TitleResource", new UserResource($this->getContext(),
                new ResourcePath("TitleResource", $this->getResourcePath())));
        }
        return $this->getProperty("TitleResource");
    }
    /**
     * @return SPDataLeakagePreventionStatusInfo
     */
    public function getDataLeakagePreventionStatusInfo()
    {
        if (!$this->isPropertyAvailable("DataLeakagePreventionStatusInfo")) {
            $this->setProperty("DataLeakagePreventionStatusInfo", new SPDataLeakagePreventionStatusInfo($this->getContext(),
                new ResourcePath("DataLeakagePreventionStatusInfo", $this->getResourcePath())));
        }
        return $this->getProperty("DataLeakagePreventionStatusInfo");
    }
    /**
     * @return MultilingualSettings
     */
    public function getMultilingualSettings()
    {
        if (!$this->isPropertyAvailable("MultilingualSettings")) {
            $this->setProperty("MultilingualSettings", new MultilingualSettings($this->getContext(),
                new ResourcePath("MultilingualSettings", $this->getResourcePath())));
        }
        return $this->getProperty("MultilingualSettings");
    }
    /**
     * @return Navigation
     */
    public function getNavigation()
    {
        if (!$this->isPropertyAvailable("Navigation")) {
            $this->setProperty("Navigation", new Navigation($this->getContext(),
                new ResourcePath("Navigation", $this->getResourcePath())));
        }
        return $this->getProperty("Navigation");
    }
    /**
     * @return WebInformation
     */
    public function getParentWeb()
    {
        if (!$this->isPropertyAvailable("ParentWeb")) {
            $this->setProperty("ParentWeb", new WebInformation($this->getContext(),
                new ResourcePath("ParentWeb", $this->getResourcePath())));
        }
        return $this->getProperty("ParentWeb");
    }
    /**
     * @return RegionalSettings
     */
    public function getRegionalSettings()
    {
        if (!$this->isPropertyAvailable("RegionalSettings")) {
            $this->setProperty("RegionalSettings", new RegionalSettings($this->getContext(),
                new ResourcePath("RegionalSettings", $this->getResourcePath())));
        }
        return $this->getProperty("RegionalSettings");
    }
    /**
     * @return ThemeInfo
     */
    public function getThemeInfo()
    {
        if (!$this->isPropertyAvailable("ThemeInfo")) {
            $this->setProperty("ThemeInfo", new ThemeInfo($this->getContext(),
                new ResourcePath("ThemeInfo", $this->getResourcePath())));
        }
        return $this->getProperty("ThemeInfo");
    }
    /**
     * Specifies 
     * the user 
     * information list for the site collection that 
     * contains the site (2).
     * @return SPList
     */
    public function getSiteUserInfoList()
    {
        if (!$this->isPropertyAvailable("SiteUserInfoList")) {
            $this->setProperty("SiteUserInfoList", new SPList($this->getContext(),
                new ResourcePath("SiteUserInfoList", $this->getResourcePath())));
        }
        return $this->getProperty("SiteUserInfoList");
    }
}
