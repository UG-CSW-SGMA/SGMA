<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Administrador()
 * @method static static Gerente()
 * @method static static Mecanico()
 * @method static static Vendedor()
 */
final class TipoRolEnum extends Enum
{
    const Visitante =   0;
    const Administrador =   1;
    const Gerente =   2;
    const Mecanico = 3;
    const Vendedor = 4;

    public static function getNombre(int $value): string
    {
        return self::getKey($value);
    }
}


/*
 * 
 * revisar su uso https://sampo.co.uk/blog/using-enums-in-laravel
 *  
 * https://github.com/BenSampo/laravel-enum/blob/v4.2.0/README.md
 * 
 */