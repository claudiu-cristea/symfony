<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Lock\Tests\Store;

use PHPUnit\Framework\SkippedTestSuiteError;

/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 * @group integration
 */
class PredisStoreTest extends AbstractRedisStoreTest
{
    public static function setUpBeforeClass(): void
    {
        $redis = new \Predis\Client('tcp://'.getenv('REDIS_HOST').':6379');
        try {
            $redis->connect();
        } catch (\Exception $e) {
            throw new SkippedTestSuiteError($e->getMessage());
        }
    }

    protected function getRedisConnection()
    {
        $redis = new \Predis\Client('tcp://'.getenv('REDIS_HOST').':6379');
        $redis->connect();

        return $redis;
    }
}
