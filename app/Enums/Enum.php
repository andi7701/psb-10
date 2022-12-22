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
