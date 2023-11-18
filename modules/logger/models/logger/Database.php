<?php

namespace app\modules\logger\models\logger;

use app\modules\logger\models\AbstractLogger;

class Database extends AbstractLogger
{
    const TYPE = 'database';

    public function __construct()
    {
        parent::__construct(self::TYPE);
    }

    /**
     * @return void
     */
    public function send(): string
    {
        //Here Logic for concrete logger
        return parent::send();
    }

}