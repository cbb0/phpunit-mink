<?php
/**
 * This file is part of the phpunit-mink library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/phpunit-mink
 */


namespace tests\aik099\PHPUnit\MinkDriver;


use aik099\PHPUnit\MinkDriver\DriverFactoryRegistry;
use aik099\PHPUnit\MinkDriver\IMinkDriverFactory;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class DriverFactoryRegistryTest extends MockeryTestCase
{

	/**
	 * Driver factory registry.
	 *
	 * @var DriverFactoryRegistry|m\MockInterface
	 */
	private $_driverFactoryRegistry;

	public function setUp()
	{
		parent::setUp();

		$this->_driverFactoryRegistry = new DriverFactoryRegistry();
	}

	public function testAddingAndGetting()
	{
		$factory = m::mock(IMinkDriverFactory::class);
		$factory->shouldReceive('getDriverName')->andReturn('test');

		$this->_driverFactoryRegistry->add($factory);

		$this->assertSame($factory, $this->_driverFactoryRegistry->get('test'));
	}

	/**
	 * @expectedException \LogicException
	 * @expectedExceptionMessage Driver factory for "test" driver is already registered.
	 */
	public function testAddingExisting()
	{
		$factory = m::mock(IMinkDriverFactory::class);
		$factory->shouldReceive('getDriverName')->andReturn('test');

		$this->_driverFactoryRegistry->add($factory);
		$this->_driverFactoryRegistry->add($factory);
	}

	/**
	 * @expectedException \OutOfBoundsException
	 * @expectedExceptionMessage No driver factory for "test" driver.
	 */
	public function testGettingNonExisting()
	{
		$this->_driverFactoryRegistry->get('test');
	}

}
