<?php


namespace App\Helpers;


class StopWatch
{
    /**
     * @var $startTimes array The start times of the StopWatches
     */
    private static $startTimes = array();
    private static $roundTimes = array();

    /**
     * Start the timer
     *
     * @param $timerName string The name of the timer
     *
     * @return void
     */
    public static function start($timerName = 'default')
    {
        $time                         = microtime(true);
        self::$startTimes[$timerName] = $time;
        self::$roundTimes[$timerName] = $time;
    }

    /**
     * Get the elapsed time in seconds, in formatted string with two decimals
     *
     * @param $timerName string The name of the timer to start
     *
     * @return string The elapsed time since start() was called in formatted string
     */
    public static function elapsed($timerName = 'default')
    {
        $elapsed = microtime(true) - self::$startTimes[$timerName];

        return number_format($elapsed, 2, ',', '.');
    }

    /**
     * Get the round time in seconds, in formatted string with two decimals
     *
     * @param $timerName string The name of the timer to start
     *
     * @return string The elapsed time since last round() was called in formatted string
     * if no round was called, the time since start()
     */
    public static function round($timerName = 'default')
    {
        $now = microtime(true);
        $round =  $now - self::$roundTimes[$timerName];
        self::$roundTimes[$timerName] = $now;
        return number_format($round, 2, ',', '.');
    }

    public static function clear($timerName = 'default') {
        unset(self::$startTimes[$timerName]);
        unset(self::$roundTimes[$timerName]);
        info("Stopwatch cleared");
    }
}
