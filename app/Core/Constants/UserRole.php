<?php

namespace App\Core\Constants;

use App\Core\Utils\Enum;

class UserRole extends Enum
{
    const MASTER = 'master';
    const SERVICE = 'service';
    const FINANCIAL = 'financial';
    const MARKETING = 'marketing';
    const ORGANIZER = 'organizer';
    const INFLUENCER = 'influencer';
    const ATHLETE = 'athlete';

    static $labels = [
        self::MASTER => 'Mestre',
        self::SERVICE => 'Atendimento',
        self::FINANCIAL => 'Financeiro',
        self::MARKETING => 'Marketing',
        self::ORGANIZER => 'Organizador',
        self::INFLUENCER => 'Influenciador',
        self::ATHLETE => 'Atleta',
    ];
}
