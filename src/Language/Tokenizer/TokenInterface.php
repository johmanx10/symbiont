<?php
/**
 * This file is part of the Symbiont package.
 *
 * (c) Jan-Marten de Boer <symbiont@janmarten.name>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symbiont\Language\Tokenizer;

use Symbiont\Language\Tokenizer\Context\TokenContextInterface;

interface TokenInterface
{
    /**
     * Get the name of the token.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get the value of the token.
     *
     * @return string|null
     */
    public function getValue(): ?string;

    /**
     * Get the context in which the token was found.
     *
     * @return TokenContextInterface|null
     */
    public function getContext(): ?TokenContextInterface;

    /**
     * Create a new token with the given context.
     *
     * @param TokenContextInterface $context
     *
     * @return TokenInterface
     */
    public function withContext(TokenContextInterface $context): TokenInterface;
}
