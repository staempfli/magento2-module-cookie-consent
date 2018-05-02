<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */

namespace Staempfli\CookieConsent\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_COOKIE_CONSENT_ENABLE = 'cookie_consent/general/enabled';
    const XML_PATH_COOKIE_CONSENT_POSITION = 'cookie_consent/general/position';
    const XML_PATH_COOKIE_CONSENT_TYPE = 'cookie_consent/general/type';
    const XML_PATH_COOKIE_CONSENT_LAYOUT = 'cookie_consent/general/layout';
    const XML_PATH_COOKIE_CONSENT_PALETTE_BACKGROUND = 'cookie_consent/colors/palette_background';
    const XML_PATH_COOKIE_CONSENT_PALETTE_TEXT = 'cookie_consent/colors/palette_text';
    const XML_PATH_COOKIE_CONSENT_BUTTON_BACKGROUND = 'cookie_consent/colors/button_background';
    const XML_PATH_COOKIE_CONSENT_BUTTON_BORDER = 'cookie_consent/colors/button_border';
    const XML_PATH_COOKIE_CONSENT_BUTTON_TEXT = 'cookie_consent/colors/button_text';
    const XML_PATH_COOKIE_CONSENT_MESSAGE = 'cookie_consent/content/message';
    const XML_PATH_COOKIE_CONSENT_DISMISS = 'cookie_consent/content/dismiss';
    const XML_PATH_COOKIE_CONSENT_ALLOW = 'cookie_consent/content/allow';
    const XML_PATH_COOKIE_CONSENT_DENY = 'cookie_consent/content/deny';
    const XML_PATH_COOKIE_CONSENT_LINK_TEXT = 'cookie_consent/content/link_text';
    const XML_PATH_COOKIE_CONSENT_LINK_URL = 'cookie_consent/content/link_url';
    const XML_PATH_COOKIE_CONSENT_REVOKE_ANIMATE = 'cookie_consent/revoke/animate';
    const XML_PATH_COOKIE_CONSENT_REVOKE_TEXT = 'cookie_consent/revoke/text';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function isCookieConsentEnabled()
    {
        return $this->isSetFlag(self::XML_PATH_COOKIE_CONSENT_ENABLE);
    }

    public function getPosition()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_POSITION);
    }

    public function getType()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_TYPE);
    }

    public function getMessage()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_MESSAGE);
    }

    public function getDismissText()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_DISMISS);
    }

    public function getAllowText()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_ALLOW);
    }

    public function getDenyText()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_DENY);
    }

    public function isRevokeAnimate()
    {
        return $this->isSetFlag(self::XML_PATH_COOKIE_CONSENT_REVOKE_ANIMATE);
    }

    public function getRevokeText()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_REVOKE_TEXT);
    }

    public function getLinkText()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_LINK_TEXT);
    }

    public function getLinkUrl()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_LINK_URL);
    }

    public function getLayout()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_LAYOUT);
    }

    public function getPaletteBackgroundColor()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_PALETTE_BACKGROUND);
    }

    public function getPaletteTextColor()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_PALETTE_TEXT);
    }

    public function getButtonBackgroundColor()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_BUTTON_BACKGROUND);
    }

    public function getButtonTextColor()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_BUTTON_TEXT);
    }

    public function getButtonBorderColor()
    {
        return $this->getValue(self::XML_PATH_COOKIE_CONSENT_BUTTON_BORDER);
    }

    private function getValue(string $path) : string
    {
        return $this->scopeConfig->getValue($path) ?? '';
    }

    private function isSetFlag(string $path) : bool
    {
        return (bool) $this->scopeConfig->isSetFlag($path);
    }
}
