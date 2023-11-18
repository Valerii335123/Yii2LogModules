<?php

namespace app\modules\logger\controllers;

use app\modules\logger\interfaces\ILoggerManager;
use yii\web\Controller;

class LoggerController extends Controller
{
    private ILoggerManager $loggerManager;


    public function __construct($id, $module, $config = [])
    {
        $this->loggerManager = \Yii::$container->get(ILoggerManager::class);

        parent::__construct($id, $module, $config);
    }

    /**
     * @return string
     */
    public function actionLog(): string
    {
        return $this->loggerManager->send('log message');
    }

    /**
     * @param string $type
     * @return string
     */
    public function actionLogTo(string $type): string
    {
        return $this->loggerManager->sendByLogger('log message logto', $type);
    }

    /**
     * @return string
     */
    public function actionLogToAll(): string
    {
        $iterator = new \DirectoryIterator(__DIR__ . '/../models/logger');
        $messages = [];
        while ($iterator->isFile()) {
            $type = $iterator->getBasename('.php');
            $messages[] = $this->loggerManager->sendByLogger('log message logto', $type);
            $iterator->next();
        }

        return json_encode($messages);
    }

}