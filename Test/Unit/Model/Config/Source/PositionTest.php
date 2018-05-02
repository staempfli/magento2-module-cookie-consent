<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Test\Unit\Model\Config\Source;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Staempfli\CookieConsent\Model\Config\Source\Position;

final class PositionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Position
     */
    private $position;
    public function setUp()
    {
        $objectManager = new ObjectManager($this);
        $this->position = $objectManager->getObject(Position::class);
    }
    public function testToOptionArray()
    {
        $this->assertInstanceOf(\Magento\Framework\Option\ArrayInterface::class, $this->position);
        $this->assertCount(5, $this->position->toOptionArray());
        $option = current($this->position->toOptionArray());
        /** @var \Magento\Framework\Phrase $label */
        $label = $option['label'];
        $this->assertInstanceOf(\Magento\Framework\Phrase::class, $label);
    }
}
