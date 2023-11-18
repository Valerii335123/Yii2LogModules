<?php

namespace app\modules\logger\interfaces;

interface ILoggerManager
{
    /**
     * Sends message to current models.
     * @param string $message
     * @return void
     */
    public function send(string $message): string;

    /**
     * Sends message by selected models
     * @param string $message
     * @param string $loggerType
     * @return void
     */
    public function sendByLogger(string $message, string $loggerType): string;

    /**
     * Gets current models type.
     * @return string
     */
    public function getType(): string;

    /**
     * Sets current models type.
     * @param string $type
     * @return void
     */
    public function setType(string $type): void;

}