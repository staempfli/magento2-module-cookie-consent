<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Test\Unit\Model;

use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Staempfli\CookieConsent\Model\Config;

final class ConfigTest extends TestCase
{
    /**
     * @var Cookie
     */
    private $cookie;
    public function setUp()
    {
        $scopeConfigInterface = $this->getMockBuilder(ScopeConfigInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $objectManager = new ObjectManager($this);
        $this->cookie = $objectManager->getObject(
            Config::class,
            [
                'scopeConfigInterface' => $scopeConfigInterface,
            ]
        );
    }
    public function testIsCookieConsentEnabled()
    {
        $this->assertSame(false, $this->cookie->isCookieConsentEnabled());
    }

    public function testGetPosition()
    {
        $this->assertSame('', $this->cookie->getPosition());
    }

    public function testGetType()
    {
        $this->assertSame('', $this->cookie->getType());
    }

    public function testGetMessage()
    {
        $this->assertSame('', $this->cookie->getMessage());
    }

    public function testGetDismissText()
    {
        $this->assertSame('', $this->cookie->getDismissText());
    }

    public function testGetAllowText()
    {
        $this->assertSame('', $this->cookie->getAllowText());
    }

    public function testGetDenyText()
    {
        $this->assertSame('', $this->cookie->getDenyText());
    }

    public function testIsRevokeAnimate()
    {
        $this->assertSame(false, $this->cookie->isRevokeAnimate());
    }

    public function testGetRevokeText()
    {
        $this->assertSame('', $this->cookie->getRevokeText());
    }

    public function testGetLinkText()
    {
        $this->assertSame('', $this->cookie->getLinkText());
    }

    public function testGetLinkUrl()
    {
        $this->assertSame('', $this->cookie->getLinkUrl());
    }

    public function testGetLayout()
    {
        $this->assertSame('', $this->cookie->getLayout());
    }

    public function testGetPaletteBackgroundColor()
    {
        $this->assertSame('', $this->cookie->getPaletteBackgroundColor());
    }

    public function testGetPaletteTextColor()
    {
        $this->assertSame('', $this->cookie->getPaletteTextColor());
    }

    public function testGetButtonBackgroundColor()
    {
        $this->assertSame('', $this->cookie->getButtonBackgroundColor());
    }

    public function testGetButtonTextColor()
    {
        $this->assertSame('', $this->cookie->getButtonTextColor());
    }

    public function testGetButtonBorderColor()
    {
        $this->assertSame('', $this->cookie->getButtonBorderColor());
    }
}
