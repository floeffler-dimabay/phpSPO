<?php

/**
 * Updated By PHP Office365 Generator 2019-11-17T18:31:00+00:00 16.0.19506.12022
 */
namespace Office365\PHP\Client\SharePoint\Publishing;

use Office365\PHP\Client\Runtime\ClientObject;


class SitePageService extends ClientObject
{
    /**
     * @return bool
     */
    public function getCustomContentApprovalEnabled()
    {
        if (!$this->isPropertyAvailable("CustomContentApprovalEnabled")) {
            return null;
        }
        return $this->getProperty("CustomContentApprovalEnabled");
    }
    /**
     * @var bool
     */
    public function setCustomContentApprovalEnabled($value)
    {
        $this->setProperty("CustomContentApprovalEnabled", $value, true);
    }
}