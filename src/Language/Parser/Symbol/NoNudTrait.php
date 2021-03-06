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

use Symbiont\Language\Ast\Node\NodeInterface;
use Symbiont\Language\Parser\ParseContextInterface;
use Symbiont\Language\Parser\SyntaxException;
use Symbiont\Language\Tokenizer\TokenInterface;
use Symbiont\Language\Tokenizer\UnexpectedEndOfStreamException;

// phpcs:disable Squiz.Commenting.FunctionComment.InvalidNoReturn
trait NoNudTrait
{
    /**
     * Invoke the symbol as a null denoted operator.
     *
     * @param ParseContextInterface $context
     *
     * @return NodeInterface
     *
     * @throws SyntaxException Always.
     * @throws UnexpectedEndOfStreamException When there is no current token
     */
    public function nud(
        ParseContextInterface $context
    ): NodeInterface {
        $token = $context->current();

        if ($token === null) {
            throw new UnexpectedEndOfStreamException(null);
        }

        throw $this->createException(
            $token,
            'Cannot be used as null denoted operator.'
        );
    }

    /**
     * Create an exception for the current symbol, using the given message and
     * optional node for additional context.
     *
     * @param TokenInterface     $token
     * @param string             $message
     * @param NodeInterface|null $node
     *
     * @return SyntaxException
     */
    abstract public function createException(
        TokenInterface $token,
        string $message,
        NodeInterface $node = null
    ): SyntaxException;
}
