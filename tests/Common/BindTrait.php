<?php

declare(strict_types=1);

namespace DocxTemplate\Tests\Common;

use DocxTemplate\Processor\Process\Bind\ValuableBind;
use DocxTemplate\Processor\Process\Bind\FilterBind;

trait BindTrait
{
    public static function filterMock(string $id, callable $function): FilterBind
    {
        return new class($id, $function) extends FilterBind {
            private string $id;
            private $function;

            public function __construct(string $id, callable $function)
            {
                $this->id = $id;
                $this->function = $function;
            }

            public function getId(): string
            {
                return $this->id;
            }

            public function filter($entity)
            {
                $call = $this->function;
                return $call($entity, ...$this->getParams());
            }
        };
    }

    public static function valuableMock(string $id, callable $function): ValuableBind
    {
        return new class($id, $function) extends ValuableBind {
            private string $id;
            private $function;

            public function __construct(string $id, callable $function)
            {
                $this->id = $id;
                $this->function = $function;
            }


            public function getId(): string
            {
                return $this->id;
            }

            public function getValue(): string
            {
                $call = $this->function;
                return $call(...$this->getParams());
            }
        };
    }
}
