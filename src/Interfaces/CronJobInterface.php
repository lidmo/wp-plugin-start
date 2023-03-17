<?php

namespace LidmoPrefix\Interfaces;

interface CronJobInterface
{
  const ACTIONS = [
      'cron_boilerplate_event' => [
          'recurrence' => 'hourly',
          'controller' => 'boilerplateCallback',
          'method' => 'boilerplateCallback',
      ]
  ];
}