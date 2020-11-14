<?php

namespace Oleglacto\Hints\Listeners;

use Oleglacto\Hints\Events\InstructionDeleting;

/**
 * Слушатель эвента InstructionDeleting
 * Удаляет все блоки связанные с инструкцией
 */
class InstructionDeletingListener
{
    /**
     * @param InstructionDeleting $event
     */
    public function handle(InstructionDeleting $event)
    {
        $instruction = $event->getInstruction();
        $instruction->instructionBlocks()->delete();
        $instruction->instructionUsers()->delete();
    }
}