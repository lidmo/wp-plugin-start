<?php


namespace LidmoPrefix\Includes;

use LidmoPrefix\Interfaces\CronJobInterface;

class CronJobs implements CronJobInterface
{

    public static function registerScheduledEvents()
    {

        $availableSchedules = wp_get_schedules();

        if (!empty(self::ACTIONS)) {

            foreach (self::ACTIONS as $cronJob => $cronData) {

                if (!wp_next_scheduled($cronJob)) {

                    $recurrence = (isset($cronData['recurrence']) && isset($availableSchedules[$cronData['recurrence']]) ? $cronData['recurrence'] : 'hourly');

                    wp_schedule_event(time(), $recurrence, $cronJob);

                }

            }

        }

    }


    public static function registerHooks()
    {

        foreach (self::ACTIONS as $cronJob => $cronData) {
            if (isset($cronData['controller'], $cronData['method']) && method_exists($cronData['controller'], $cronData['method'])) {
                add_action($cronJob, [new $cronData['controller'], $cronData['method']]);
            }
        }

    }

}
