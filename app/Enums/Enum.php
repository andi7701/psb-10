<?php

namespace App\Enums;

enum KondisiOrangTua: string
{
    case ADA = 'ada';
    case LUAR = 'di luar negeri';
    case TIDAKTAHU = 'tidak tahu';
    case MENINGGAL = 'meninggal';
}

enum KondisiKeluarga: string
{
    case CERAI = 'cerai';
    case UTUH = 'utuh';
    case TIDAKUTUH = 'tidah utuh';
    case TERLANTAR = 'terlantar';
}

enum Ukuran: string
{
    case S = 's';
    case M = 'm';
    case L = 'l';
    case XL = 'xl';
    case XXL = 'xxl';
    case JUMBO = 'jumbo';
}
