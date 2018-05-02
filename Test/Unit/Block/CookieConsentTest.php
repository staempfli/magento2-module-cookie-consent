<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Test\Unit\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Staempfli\CookieConsent\Block\CookieConsent;
use Staempfli\CookieConsent\Model\Config;
use Staempfli\CookieConsent\Model\Config\Source\Layout;
use Staempfli\CookieConsent\Model\Config\Source\Position;
use Staempfli\CookieConsent\Model\Config\Source\Type;

final class CookieConsentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CookieConsent
     */
    private $block;

    /**
     * @var \Magento\Framework\View\Element\Template\Context|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $context;

    public function setUp()
    {
        $this->context = $this->getMockBuilder(\Magento\Framework\View\Element\Template\Context::class)
            ->disableOriginalConstructor()
            ->getMock();
        $config = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->block = new CookieConsent($this->context, $this->setupCookieMethods($config), []);
    }

    public function testGetCookieConsentConfiguration()
    {
        $this->assertSame('"palette":{"popup":{"background":"#000000","text":"#ffffff"},"button":{"background":"#0000f6","text":"#ffffff","border":"#0000f6"}},"content":{"message":"This website uses cookies to ensure you get the best experience on our website.","dismiss":"Got it!","allow":"Allow cookies","deny":"Decline","link":"Learn more","href":"https:\/\/cookiesandyou.com\/"},"animateRevokable":true,"revokeBtn":"<div class=\"cc-revoke {{classes}}\">Cookie Policy<\/div>","position":"bottom","static":false,"theme":"block","type":"default"', $this->block->getCookieConsentConfiguration());
    }

    public function testIsEnabled()
    {
        $this->assertSame(true, $this->block->isEnabled());
    }

    public function testUseAdvancedConfiguration()
    {
        $this->assertSame(false, $this->block->useAdvancedConfiguration());
    }

    public function testCookiePositionIsTopPushdown()
    {
        $config = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->getMock();
        $block = new CookieConsent($this->context, $this->setupCookieMethods($config, Position::POSITION_BANNER_TOP_PUSHDOWN), []);
        $this->assertSame('"palette":{"popup":{"background":"#000000","text":"#ffffff"},"button":{"background":"#0000f6","text":"#ffffff","border":"#0000f6"}},"content":{"message":"This website uses cookies to ensure you get the best experience on our website.","dismiss":"Got it!","allow":"Allow cookies","deny":"Decline","link":"Learn more","href":"https:\/\/cookiesandyou.com\/"},"animateRevokable":true,"revokeBtn":"<div class=\"cc-revoke {{classes}}\">Cookie Policy<\/div>","position":"top","static":true,"theme":"block","type":"default"', $block->getCookieConsentConfiguration());
    }

    private function setupCookieMethods($config, $position = Position::POSITION_BANNER_BOTTOM)
    {
        $config->expects($this->any())->method('isCookieConsentEnabled')->willReturn(true);
        $config->expects($this->any())->method('getPaletteBackgroundColor')->willReturn('#000000');
        $config->expects($this->any())->method('getPaletteTextColor')->willReturn('#ffffff');
        $config->expects($this->any())->method('getButtonBackgroundColor')->willReturn('#0000f6');
        $config->expects($this->any())->method('getButtonTextColor')->willReturn('#ffffff');
        $config->expects($this->any())->method('getButtonBorderColor')->willReturn('#0000f6');
        $config->expects($this->any())->method('getMessage')->willReturn('This website uses cookies to ensure you get the best experience on our website.');
        $config->expects($this->any())->method('getDismissText')->willReturn('Got it!');
        $config->expects($this->any())->method('getAllowText')->willReturn('Allow cookies');
        $config->expects($this->any())->method('getDenyText')->willReturn('Decline');
        $config->expects($this->any())->method('getLinkText')->willReturn('Learn more');
        $config->expects($this->any())->method('getLinkUrl')->willReturn('https://cookiesandyou.com/');
        $config->expects($this->any())->method('isRevokeAnimate')->willReturn(true);
        $config->expects($this->any())->method('getRevokeText')->willReturn('Cookie Policy');
        $config->expects($this->any())->method('getPosition')->willReturn($position);
        $config->expects($this->any())->method('getLayout')->willReturn(Layout::THEME_BLOCK);
        $config->expects($this->any())->method('getType')->willReturn(Type::TYPE_DEFAULT);
        return $config;
    }
}
