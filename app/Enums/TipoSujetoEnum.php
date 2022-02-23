<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Cliente()
 * @method static static Proveedor() 
 */
final class TipoSujetoEnum extends Enum
{
    const Cliente = 1;
    const Proveedor = 2;

    public static function getNombre(int $value): string
    {
        return self::getKey($value);
    }
}
