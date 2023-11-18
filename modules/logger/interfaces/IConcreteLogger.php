<?php

namespace app\modules\logger\interfaces;

interface IConcreteLogger
{

    /**
     * @return string
     */
    public function send(): string;

    /**
     * @param string $message
     * @return self
     */
    public function setMessage(string $message): self;

    /**
     * @return string
     */
    public function getType(): string;
}