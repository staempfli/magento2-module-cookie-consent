<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Position implements ArrayInterface
{
    const POSITION_BANNER_BOTTOM = 'bottom';
    const POSITION_BANNER_TOP = 'top';
    const POSITION_BANNER_TOP_PUSHDOWN = 'top-pushdown';
    const POSITION_FLOATING_LEFT = 'bottom-left';
    const POSITION_FLOATING_RIGHT = 'bottom-right';

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
                ['value' => self::POSITION_BANNER_BOTTOM, 'label' => __('Banner Bottom')],
                ['value' => self::POSITION_BANNER_TOP, 'label' => __('Banner Top')],
                ['value' => self::POSITION_BANNER_TOP_PUSHDOWN, 'label' => __('Banner Top (Pushdown)')],
                ['value' => self::POSITION_FLOATING_LEFT, 'label' => __('Bottom Left')],
                ['value' => self::POSITION_FLOATING_RIGHT, 'label' => __('Bottom Right')],
            ];
        }
        return $this->options;
    }
}
