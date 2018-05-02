<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Test\Unit\Model\Config\Source;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Staempfli\CookieConsent\Model\Config\Source\Layout;

final class LayoutTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Layout
     */
    private $layout;
    public function setUp()
    {
        $objectManager = new ObjectManager($this);
        $this->layout = $objectManager->getObject(Layout::class);
    }
    public function testToOptionArray()
    {
        $this->assertInstanceOf(\Magento\Framework\Option\ArrayInterface::class, $this->layout);
        $this->assertCount(4, $this->layout->toOptionArray());
        $option = current($this->layout->toOptionArray());
        /** @var \Magento\Framework\Phrase $label */
        $label = $option['label'];
        $this->assertInstanceOf(\Magento\Framework\Phrase::class, $label);
    }
}
