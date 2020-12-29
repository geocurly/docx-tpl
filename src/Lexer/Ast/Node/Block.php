<?php

declare(strict_types=1);

namespace DocxTemplate\Lexer\Ast\Node;

use DocxTemplate\Lexer\Ast\NodePosition;
use DocxTemplate\Contract\Lexer\Ast\AstNode;

class Block extends Node
{
    private array $nested;

    public function __construct(NodePosition $position, AstNode ...$nested)
    {
        parent::__construct($position);
        $this->nested = $nested;
    }

    /**
     * Get nested nodes
     * @return AstNode[]
     */
    public function nested(): array
    {
        return $this->nested;
    }

    /** @inheritdoc  */
    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'position' => $this->getPosition()->toArray(),
            'nested' => array_map(fn(AstNode $node) => $node->toArray(), $this->nested)
        ];
    }
}