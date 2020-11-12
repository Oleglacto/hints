<?php

namespace Oleglacto\Hints\Events;

use Oleglacto\Hints\Models\Instruction;

/**
 * Эвент выбрасывается при удалении "Интерактивной инструкции"
 */
class InstructionDeleting
{
    /**
     * @var Instruction $instruction
     */
    protected $instruction;

    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
    }

    /**
     * @return Instruction
     */
    public function getInstruction(): Instruction
    {
        return $this->instruction;
    }
}