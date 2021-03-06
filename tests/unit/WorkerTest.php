<?php

/*
 * This file is part of the Fuel Queue package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Fuel;

use Codeception\TestCase\Test;

/**
 * Tests for Worker
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Fuel\Worker
 * @group              Worker
 */
class WorkerTest extends Test
{
    public function _before()
    {
        Worker::_init();
        \Config::set('queue.queue.test', \Mockery::mock('Indigo\\Queue\\Connector\\ConnectorInterface'));
    }

    /**
     * @covers ::forge
     */
    public function testForge()
    {
        $class = Worker::forge('test');

        $this->assertInstanceOf('Indigo\\Queue\\Worker', $class);
    }
}
