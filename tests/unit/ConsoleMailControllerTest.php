<?php

use app\models\Person;
use Codeception\Test\Unit;

/**
 * Class ConsoleMailControllerTest
 */
class ConsoleMailControllerTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $module;

    /**
     * Выполняет действия перед каждым тестом.
     * @throws \Codeception\Exception\ModuleException исключение.
     */
    protected function _before()
    {
        // Получить массив всех зарегистрированных модулей.
        //$data = $this->getMetadata()->getCurrent('modules');
        /**
         * Получить модуль по имени, по которому модуль зарегистрирован в yml-файле.
         * Если модуль зарегистрирован по короткому имени (например 'CLi'),
         * то получить модуль можно вызовом:
         * $module = $this->getModule('CLi');
         * Если модуль зарегистрирован по имени с пространством имён
         * (например '\Codeception\Module\Cli')
         * то получить модуль можно вызовом:
         * $module = $this->getModule('\Codeception\Module\Cli');
         */
        $this->module = $this->getModule('CLi');

        $log = Yii::$app->getLog();
        $logPath = $log->targets[0]->logFile;
        $logPath = preg_replace('/tests/', 'console', $logPath);
        file_put_contents($logPath, '');
    }

    /**
     * Выполняет действия после каждого теста.
     */
    protected function _after()
    {
    }

    /**
     * Тестирует public function actionSend($ticketTypes, $mode = '');
     * Возбудить событие для пользователей, у которых есть билеты типов 2 и 3
     * и нет билетов других типов.
     */
    public function testConsoleCallOfSendPassTypes2and3()
    {
        $cmd = 'php yii mail/send 2,3';
        $this->module->runShellCommand($cmd);
        $this->module->seeResultCodeIs(0);
        $log = Yii::$app->getLog();
        $logPath = $log->targets[0]->logFile;
        $logPath = preg_replace('/tests/', 'console', $logPath);
        $logFile = file_get_contents($logPath);
        $person5 = Person::findOne(5);
        $message = $person5->firstname;
        $message .= ' ' . $person5->lastname;
        $message .= ' возбудил событие MAIL';
        $this->assertTrue(preg_match("/$message/", $logFile) === 1);
    }

    /**
     * Тестирует public function actionSend($ticketTypes, $mode = '');
     * Возбудить событие для пользователей, у которых есть билет типа 4.
     */
    public function testConsoleCallOfSendPassTypes4Include() {
        $cmd = 'php yii mail/send 4 include';
        $this->module->runShellCommand($cmd);
        $this->module->seeResultCodeIs(0);
        $log = Yii::$app->getLog();
        $logPath = $log->targets[0]->logFile;
        $logPath = preg_replace('/tests/', 'console', $logPath);
        $logFile = file_get_contents($logPath);
        $persons = Person::findAll([1, 4]);
        foreach ($persons as $person) {
            $message = $person->firstname;
            $message .= ' ' . $person->lastname;
            $message .= ' возбудил событие MAIL';
            $this->assertTrue(preg_match("/$message/", $logFile) === 1);
        }
    }

    /**
     * Тестирует public function actionSend($ticketTypes, $mode = '');
     * Возбудить событие для пользователей, у которых нет билета типа 1.
     */
    public function testConsoleCallOfSendPassTypes1Exclude()
    {
        $cmd = 'php yii mail/send 1 exclude';
        $this->module->runShellCommand($cmd);
        $this->module->seeResultCodeIs(0);
        $log = Yii::$app->getLog();
        $logPath = $log->targets[0]->logFile;
        $logPath = preg_replace('/tests/', 'console', $logPath);
        $logFile = file_get_contents($logPath);
        $persons = Person::findAll([4, 5, 6]);
        foreach ($persons as $person) {
            $message = $person->firstname;
            $message .= ' ' . $person->lastname;
            $message .= ' возбудил событие MAIL';
            $this->assertTrue(preg_match("/$message/", $logFile) === 1);
        }
    }
}