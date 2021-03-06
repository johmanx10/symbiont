<?php

/**
 * This file is part of the Symbiont package.
 *
 * (c) Jan-Marten de Boer <symbiont@janmarten.name>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Symbiont\Language\Parser\Symbol;

interface SymbolTableInterface extends SymbolHolderInterface
{
    /**
     * Register the given symbol for the given token name.
     *
     * @param string          $token
     * @param SymbolInterface $symbol
     *
     * @return void
     */
    public function register(string $token, SymbolInterface $symbol): void;

    /**
     * Get an array of tokens and their corresponding sequence.
     * Tokens without corresponding sequence are omitted.
     *
     * @return string[]
     */
    public function getTokenSequences(): array;
}
