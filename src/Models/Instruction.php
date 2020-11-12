<?php

namespace Oleglacto\Hints\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Oleglacto\Hints\Events\InstructionDeleting;

/**
 * Модель "Интерактивной инструкции"
 *
 * @property int                $device      -  Устройство на котором отображается инструкция
 * @property string             $start_url   -  Ссылка, на которой отображается инструкция
 * @property boolean            $enabled     -  Включена ли инструкция
 * @property string             $name        -   Название инструкции
 *
 * @property Collection|InstructionBlock[]          $instructionBlocks
 */
class Instruction extends Model
{

    /**
     * Устройство - десктор
     */
    const DEVICE_DESKTOP = 0;

    /**
     * Устройство - мобильный телефон
     */
    const DEVICE_MOBILE = 1;

    /**
     * {@inheritdoc}
     */
    protected $table = 'instructions';

    /**
     * {@inheritdoc}
     */
    protected $primaryKey = 'instruction_id';

    /**
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'device',
        'enabled',
        'start_url',
        'name'
    ];

    protected $casts = [
        'enabled' => 'bool',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'deleting' => InstructionDeleting::class,
    ];


    /**
     * Массив устройств
     *
     * @var array
     */
    protected $devices = [
        'desktop' => self::DEVICE_DESKTOP,
        'mobile' => self::DEVICE_MOBILE,
    ];

    /**
     * Переводит строку в int и сохраняет значение
     *
     * @param $device
     */
    public function setDeviceAttribute($device)
    {
        $this->attributes['device'] = !is_int($device) ? $this->devices[$device] : $device;
    }

    /**
     * Все блоки инрструкции
     *
     * @return HasMany
     */
    public function instructionBlocks()
    {
        return $this->hasMany(InstructionBlock::class,'instruction_id', 'instruction_id');
    }

    /**
     * Возвращает устройство в строковом формате
     */
    public function getDeviceAttribute()
    {
        return $this->attributes['device'] === 0 ? 'desktop' : 'mobile';
    }

    /**
     * Релейшен для поиска id'шников пользователей
     *
     * @return HasMany
     */
    public function instructionUsers()
    {
        return $this->hasMany(InstructionUser::class, 'instruction_id');
    }
}