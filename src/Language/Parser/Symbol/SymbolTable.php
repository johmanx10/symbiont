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

class SymbolTable implements SymbolTableInterface
{
    /** @var array|SymbolInterface[] */
    private array $symbols = [];

    /** @var array|self[] */
    private static array $instances = [];

    /**
     * Register the given symbol for the given token name.
     *
     * @param string          $token
     * @param SymbolInterface $symbol
     *
     * @return void
     */
    public function register(string $token, SymbolInterface $symbol): void
    {
        $this->symbols[$token] = $symbol;
    }

    /**
     * Get an array of tokens and their corresponding sequence.
     * Tokens without corresponding sequence are omitted.
     *
     * @return string[]
     */
    public function getTokenSequences(): array
    {
        return array_filter(
            array_map(
                function (SymbolInterface $symbol): ?string {
                    return $symbol->getSequence();
                },
                $this->symbols
            )
        );
    }

    /**
     * Get the symbol for the given token.
     *
     * @param string $token
     *
     * @return SymbolInterface|null
     */
    public function getSymbol(string $token): ?SymbolInterface
    {
        return $this->symbols[$token] ?? null;
    }

    /**
     * Get a symbol table for the supplied file pattern.
     *
     * @param string $pattern
     *
     * @return self
     */
    public static function getInstance(string $pattern): self
    {
        if (!array_key_exists($pattern, static::$instances)) {
            static::$instances[$pattern] = new self();

            foreach (glob($pattern) ?: [] as $file) {
                /** @noinspection PhpIncludeInspection */
                $symbol = require $file;

                if ($symbol instanceof SymbolInterface) {
                    static::$instances[$pattern]->register(
                        sprintf(
                            'T_%s',
                            strtoupper(basename($file, '.php'))
                        ),
                        $symbol
                    );
                }
            }
        }

        return static::$instances[$pattern];
    }
}
