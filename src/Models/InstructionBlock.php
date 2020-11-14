<?php

namespace Oleglacto\Hints\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель блок(часть) "Интерактивной инструкции"
 *
 * @property array      data                -   джейстон для хранения информации о блоке инструкции
 * @property int        instruction_id      -   id инструкции
 */
class InstructionBlock extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'instruction_blocks';

    /**
     * {@inheritdoc}
     */
    protected $primaryKey = 'instruction_block_id';

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'data' => 'array'
    ];

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'data',
        'instruction_id',
    ];

    /**
     * Блок инструкции принадлежит к целой инструкции
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instruction()
    {
        return $this->belongsTo(Instruction::class, 'instruction_id', 'instruction_id');
    }
}