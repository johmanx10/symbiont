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

use Symbiont\Language\Tokenizer\TokenStream;

$verbose = (bool)getenv('SYMBIONT_VERBOSE');

return function (TokenStream $tokens) use ($verbose): void {
    $result = '';

    foreach ($tokens as $token) {
        if ($token === null) {
            continue;
        }

        $entry = sprintf(
            "%s\t\t%s",
            $token->getName(),
            var_export($token->getValue(), true)
        );

        if ($verbose) {
            $context = $token->getContext();

            if ($context !== null) {
                $entry = sprintf(
                    "%s\t%d:%d\t%d:%d\t\t%s",
                    $context->getFile()->getPathname(),
                    $context->getStart()->getLine(),
                    $context->getStart()->getColumn(),
                    $context->getEnd()->getLine(),
                    $context->getEnd()->getColumn(),
                    $entry
                );
            }
        }

        $result .= $entry . PHP_EOL;
    }

    fwrite(STDOUT, $result);
};
