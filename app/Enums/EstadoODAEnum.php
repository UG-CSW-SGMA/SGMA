<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Activo()
 * @method static static EnAtecion()
 * @method static static Cerrado()
 * @method static static NoAtendido()
 */
final class EstadoODAEnum extends Enum
{
    const Activo = 1;
    const EnAtecion = 2;
    const Cerrado = 3;
    const NoAtendido = 4;

    public static function getNombre(int $value): string
    {
        switch ($value) {
            case self::EnAtecion:
                return 'En Atención';
                break;
            case self::NoAtendido:
                return 'No Atendido';
                break;
            default:
                return self::getKey($value);
        }
    }
}
