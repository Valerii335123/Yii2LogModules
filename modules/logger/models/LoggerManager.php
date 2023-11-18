<?php

namespace app\modules\logger\models;

use app\modules\logger\interfaces\IConcreteLogger;
use app\modules\logger\interfaces\ILoggerManager;
use yii\di\NotInstantiableException;
use Yii;

class LoggerManager implements ILoggerManager
{
    private IConcreteLogger $logger;

    /**
     * @param string $defaultLogger
     * @throws \yii\base\InvalidConfigException
     */
    public function __construct(string $defaultLogger)
    {
        $this->setType($defaultLogger);
    }

    /**
     * @param string $message
     * @return string
     */
    public function send(string $message): string
    {
        return $this->logger->setMessage($message)->send();
    }

    /**
     * @param string $message
     * @param string $loggerType
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function sendByLogger(string $message, string $loggerType): string
    {
        return $this->factoryLogger($loggerType)->setMessage($message)->send();
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->logger->getType();
    }

    /**
     * @param string $type
     * @return void
     * @throws \yii\base\InvalidConfigException
     */
    public function setType(string $type): void
    {
        $this->logger = $this->factoryLogger($type);
    }

    /**
     * @param $type
     * @return IConcreteLogger
     * @throws \yii\base\InvalidConfigException
     */
    private function factoryLogger($type): IConcreteLogger
    {
        //Get the name of the class by type from the logger directory
        $className = __NAMESPACE__ . "\logger\\" . ucfirst($type);

        $logger = Yii::createObject([
            'class' => $className
        ]);

        if ($logger instanceof IConcreteLogger) {
            return $logger;
        }

        throw new NotInstantiableException($className, "class is'n instance of IConcreteLogger");
    }
}