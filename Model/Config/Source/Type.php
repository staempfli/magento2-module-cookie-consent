<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\CookieConsent\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Type implements ArrayInterface
{
    const TYPE_DEFAULT = 'default';
    const TYPE_OPT_IN = 'opt-in';
    const TYPE_OPT_OUT = 'opt-out';

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
                ['value' => self::TYPE_DEFAULT, 'label' => __('Informational')],
                ['value' => self::TYPE_OPT_IN, 'label' => __('Opt-in')],
                ['value' => self::TYPE_OPT_OUT, 'label' => __('Opt-out')],
            ];
        }
        return $this->options;
    }
}
