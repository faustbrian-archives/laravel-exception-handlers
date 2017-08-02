<?php

/*
 * This file is part of Laravel Exception Handlers.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\ExceptionHandlers;

use Exception;
use Airbrake\Client;
use Airbrake\Configuration;

abstract class AirbrakeHandler extends Handler
{
    /**
     * @param Exception $e
     */
    public function report(Exception $e)
    {
        $config = new Configuration(env('AIRBRAKE_API_KEY'));
        $client = new Client($config);

        $client->notifyOnException($e);

        return parent::report($e);
    }
}
