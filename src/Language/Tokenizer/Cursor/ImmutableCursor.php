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

namespace Symbiont\Language\Tokenizer\Cursor;

class ImmutableCursor implements CursorInterface
{
    private int $line;

    private int $column;

    /**
     * Constructor.
     *
     * @param CursorInterface $cursor
     */
    public function __construct(CursorInterface $cursor)
    {
        $this->line   = $cursor->getLine();
        $this->column = $cursor->getColumn();
    }

    /**
     * Get the current row.
     *
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }

    /**
     * Get the current column.
     *
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }
}
