<?php
/**
 * @author Andru Cherny
 * @date: 24.04.18 - 17:55
 */


namespace App\Components;


use yii\helpers\VarDumper;
use yii\log\FileTarget;
use yii\log\Logger;

class LogFileTarget extends FileTarget
{

    public function formatMessage($message)
    {
        [$text, $level, $category, $timestamp] = $message;
        $level = Logger::getLevelName($level);
        if (!is_string($text)) {
            // exceptions may not be serializable if in the call stack somewhere is a Closure
            if ($text instanceof \Throwable || $text instanceof \Exception) {
                $text = (string)$text;
            } else {
                $text = VarDumper::export($text);
            }
        }
        $traces = [];
        if (isset($message[4])) {
            foreach ($message[4] as $trace) {
                $traces[] = "in {$trace['file']}:{$trace['line']}";
            }
        }
        $pid = getmypid();
        $prefix = $this->getMessagePrefix($message);
        return $this->getTime($timestamp) . " {$prefix}[$pid][$level][$category] $text";
    }
}