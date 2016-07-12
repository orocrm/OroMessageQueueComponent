<?php
namespace Oro\Component\MessageQueue\Tests\Unit\Transport\Exception;

use Oro\Component\MessageQueue\Transport\Exception\Exception as ExceptionInterface;
use Oro\Component\MessageQueue\Transport\DestinationInterface;
use Oro\Component\MessageQueue\Transport\Exception\InvalidDestinationException;
use Oro\Component\Testing\ClassExtensionTrait;

// @codingStandardsIgnoreStart

class InvalidDestinationExceptionTest extends \PHPUnit_Framework_TestCase
{
    use ClassExtensionTrait;
    
    public function testShouldBeSubClassOfException()
    {
        $this->assertClassExtends(ExceptionInterface::class, InvalidDestinationException::class);
    }

    public function testCouldBeConstructedWithoutAnyArguments()
    {
        new InvalidDestinationException();
    }

    public function testThrowIfAssertDestinationInstanceOfNotSameAsExpected()
    {
        $this->setExpectedException(InvalidDestinationException::class, 'The destination must be an instance of Oro\Component\MessageQueue\Tests\Unit\Transport\Exception\DestinationBar but it is Oro\Component\MessageQueue\Tests\Unit\Transport\Exception\DestinationFoo.');

        InvalidDestinationException::assertDestinationInstanceOf(new DestinationFoo(), DestinationBar::class);
    }

    public function testShouldDoNothingIfAssertDestinationInstanceOfSameAsExpected()
    {
        InvalidDestinationException::assertDestinationInstanceOf(new DestinationFoo(), DestinationFoo::class);
    }
}

class DestinationFoo implements DestinationInterface
{
}

class DestinationBar implements DestinationInterface
{
}

// @codingStandardsIgnoreEnd