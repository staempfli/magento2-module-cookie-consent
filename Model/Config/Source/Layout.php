<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Layout implements ArrayInterface
{
    const THEME_BLOCK = 'block';
    const THEME_CLASSIC = 'classic';
    const THEME_EDGELESS = 'edgeless';
    const THEME_WIRE = 'wire';

    /**
     * Options array
     *
     * @var array
     */
    private $options;
    /**
     * Return options array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->options) {
            $this->options = [
                ['value' => self::THEME_BLOCK, 'label' => __('Block')],
                ['value' => self::THEME_CLASSIC, 'label' => __('Classic')],
                ['value' => self::THEME_EDGELESS, 'label' => __('Edgeless')],
                ['value' => self::THEME_WIRE, 'label' => __('Wire')],
            ];
        }
        return $this->options;
    }
}
