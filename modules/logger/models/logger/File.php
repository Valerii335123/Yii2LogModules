<?php

namespace app\modules\logger\models\logger;


use app\modules\logger\models\AbstractLogger;

class File extends AbstractLogger
{
    const TYPE = 'file';

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