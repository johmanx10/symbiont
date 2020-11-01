<?php

/**
 * This file is part of the Symbiont package.
 *
 * (c) Jan-Marten de Boer <symbiont@janmarten.name>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symbiont\Language\Parser\Symbol;

trait BindingPowerTrait
{
    private int $bindingPower = 0;

    /**
     * Get the binding power of the current symbol.
     *
     * @return int
     */
    public function getBindingPower(): int
    {
        return $this->bindingPower;
    }
}
