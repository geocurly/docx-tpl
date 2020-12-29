<?php

declare(strict_types=1);

namespace DocxTemplate\Lexer\Ast\Parser\Exception;

use DocxTemplate\Exception\Lexer\SyntaxError;

class ElementNotFoundException extends SyntaxError
{
    protected $message = 'Element not found';
}
