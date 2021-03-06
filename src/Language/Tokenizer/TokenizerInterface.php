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

namespace Symbiont\Language\Tokenizer;

use SplFileInfo;

interface TokenizerInterface
{
    /**
     * Tokenize the given file into a list of tokens.
     *
     * @param SplFileInfo $file
     *
     * @return TokenStreamInterface
     *
     * @throws UnexpectedTokenSequenceException When a token could not be resolved.
     */
    public function __invoke(SplFileInfo $file): TokenStreamInterface;
}
