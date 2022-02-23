<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TipoDocumentoCompraEnum extends Enum
{
    const Factura = 1;
    const NotaVenta = 2;
    const LiquidacionCompra = 3;

    public static function getNombre(int $value): string
    {
        switch ($value) {
            case self::NotaVenta:
                return '>Nota de Venta';
                break;
            case self::LiquidacionCompra:
                return 'Liquidación Compras';
                break;
            default:
                return self::getKey($value);
        }
    }
}
