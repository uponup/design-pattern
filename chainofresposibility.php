<?php

/**
 * 创建抽象的记录器类
 */
abstract class AbstractLogger {
    public static int $INFO = 1;
    public static int $DEBUG = 2;
    public static int $ERROR = 3;

    protected int $level;

    //责任链中下一个元素
    protected AbstractLogger $nextLogger;

    public function setNextLogger(AbstractLogger $next) {
        $this->nextLogger = $next;    
    }

    public function logMessage(int $level, string $message) {
        if ($this->level <= $level) {
            $this->write($message);
        }

        if (isset($this->nextLogger) &&  $this->nextLogger != null) {
            $this->nextLogger->logMessage($level, $message);
        }
    }

    abstract protected function write(string $message);
}


/**
 * 创建记录器类的实体类
 */
class ConsoleLogger extends AbstractLogger {
    public function __construct(int $level)
    {
        $this->level = $level;
    }

    protected function write(string $message)
    {
        echo "Standard Console::Logger: $message" . PHP_EOL;
    }
}

class ErrorLogger extends AbstractLogger {
    public function __construct(int $level)
    {
        $this->level = $level;
    }

    protected function write(string $message)
    {
        echo "Error Console::Logger: $message" . PHP_EOL;
    }
}

class FileLogger extends AbstractLogger {
    public function __construct(int $level)
    {
        $this->level = $level;
    }

    protected function write(string $message)
    {
        echo "File::Logger: $message" . PHP_EOL;
    }
}


/**
 * 创建责任链
 */

class A {
    function getChainOfLoggers(): AbstractLogger {
        $errorLogger = new ErrorLogger(AbstractLogger::$ERROR);
        $fileLogger = new FileLogger(AbstractLogger::$DEBUG);
        $consoleLogger = new ConsoleLogger(AbstractLogger::$INFO);
    
        $errorLogger->setNextLogger($fileLogger);
        $fileLogger->setNextLogger($consoleLogger);
    
        return $errorLogger;
    }
}

$a = new A();
$chain = $a->getChainOfLoggers();
$chain->logMessage(AbstractLogger::$INFO, "This is an information.");
echo " " . PHP_EOL;
$chain->logMessage(AbstractLogger::$DEBUG, "This is a debug level information.");
echo " " . PHP_EOL;
$chain->logMessage(AbstractLogger::$ERROR, "This is an error information.");
