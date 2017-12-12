<?php
/**
 * This file is part of the phpunit-mink library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/phpunit-mink
 */

namespace tests\aik099\PHPUnit\Session;


use aik099\PHPUnit\BrowserConfiguration\BrowserConfiguration;
use aik099\PHPUnit\BrowserTestCase;
use aik099\PHPUnit\Session\ISessionStrategy;
use Behat\Mink\Session;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

class SessionStrategyTestCase extends MockeryTestCase
{

	const BROWSER_CLASS = BrowserConfiguration::class;

	const SESSION_CLASS = Session::class;

	const TEST_CASE_CLASS = BrowserTestCase::class;

	/**
	 * Event dispatcher.
	 *
	 * @var EventDispatcher
	 */
	protected $eventDispatcher;

	/**
	 * Session strategy.
	 *
	 * @var ISessionStrategy
	 */
	protected $strategy;

	/**
	 * Configures all tests.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->eventDispatcher = new EventDispatcher();
		$this->strategy->setEventDispatcher($this->eventDispatcher);
	}

}
