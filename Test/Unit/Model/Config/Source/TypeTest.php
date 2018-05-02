<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Test\Unit\Model\Config\Source;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Staempfli\CookieConsent\Model\Config\Source\Type;

final class TypeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Type
     */
    private $type;
    public function setUp()
    {
        $objectManager = new ObjectManager($this);
        $this->type = $objectManager->getObject(Type::class);
    }
    public function testToOptionArray()
    {
        $this->assertInstanceOf(\Magento\Framework\Option\ArrayInterface::class, $this->type);
        $this->assertCount(3, $this->type->toOptionArray());
        $option = current($this->type->toOptionArray());
        /** @var \Magento\Framework\Phrase $label */
        $label = $option['label'];
        $this->assertInstanceOf(\Magento\Framework\Phrase::class, $label);
    }
}
