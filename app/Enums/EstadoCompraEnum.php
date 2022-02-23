<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Activo()
 * @method static static Cerrado()
 * @method static static Anulado()
 */
final class EstadoCompraEnum extends Enum
{
    const Activo = 1;
    const Cerrado = 2;
    const Anulado = 3;

    public static function getNombre(int $value): string
    {
        return self::getKey($value);
    }
}
