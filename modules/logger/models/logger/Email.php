<?php

namespace app\modules\logger\models\logger;

use app\modules\logger\models\AbstractLogger;

class Email extends AbstractLogger
{
    const TYPE = 'email';

    public $email;

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