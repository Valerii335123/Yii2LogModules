<?php

namespace app\modules\logger\models;

use app\modules\logger\interfaces\IConcreteLogger;

class AbstractLogger implements IConcreteLogger
{
    private string $message;
    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;

        // Load config for logger
        \Yii::configure($this, require __DIR__ . "/../config/" . $this->type . ".php");
    }

    /**
     * @return string
     */
    public function send(): string
    {
        return $this->message . " via " . $this->type;
    }

    /**
     * @param string $message
     * @return IConcreteLogger
     */
    public function setMessage(string $message): IConcreteLogger
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}