<?php

declare(strict_types=1);

namespace DocxTemplate\Contract\Lexer;

use DocxTemplate\Exception\Lexer\SyntaxErrorException;

interface Lexer
{
    /**
     * Start parsing content and iterate blocks
     * @return iterable
     * @throws SyntaxErrorException
     */
    public function run(): iterable;
}
