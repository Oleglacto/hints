<?php

namespace Oleglacto\Hints\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Связть пользователя с инструкцией
 *
 * @property int            entity_id           -   id пользователя
 * @property int            instruction_id      -   id инструкции
 * @property array          blocks_viewed       -   массив с просмотренными блоками
 */
class InstructionEntity extends Pivot
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'instruction_user';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'entity_type',
        'entity_id',
        'instruction_id',
        'blocks_viewed',
        'is_viewed',
    ];

    protected $casts = [
        'blocks_viewed' => 'array',
        'is_viewed' => 'boolean',
    ];

    protected $primaryKey = 'instruction_entity_id';

    public $timestamps = false;
}