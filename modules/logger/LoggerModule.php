<?php

namespace app\modules\logger;

use app\modules\logger\models\LoggerManager;
use app\modules\logger\interfaces\ILoggerManager;
use yii\base\Module;

class LoggerModule extends Module
{

    public $controllerNamespace = 'app\modules\logger\controllers';

    public $defaultLogger;

    public function init()
    {
        parent::init();

        \Yii::configure($this, require __DIR__ . '/config/main.php');
        \Yii::$container->setSingleton(ILoggerManager::class, LoggerManager::class, [$this->defaultLogger]);
    }
}