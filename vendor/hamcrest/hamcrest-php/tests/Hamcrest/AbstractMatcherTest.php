<?php

namespace Hamcrest;

use PHPUnit_Framework_TestCase;

class UnknownType
{
}

abstract class AbstractMatcherTest extends PHPUnit_Framework_TestCase
{

    const ARGUMENT_IGNORED = "ignored";
    const ANY_NON_NULL_ARGUMENT = "notnull";

    public function assertMatches(Matcher $matcher, $arg, $message)
    {
        $this->assertTrue($matcher->matches($arg), $message);
    }

    public function assertDoesNotMatch(Matcher $matcher, $arg, $message)
    {
        $this->assertFalse($matcher->matches($arg), $message);
    }

    public function assertDescription($expected, Matcher $matcher)
    {
        $description = new StringDescription();
        $description->appendDescriptionOf($matcher);
        $this->assertEquals($expected, (string)$description, 'Expected description');
    }

    public function assertMismatchDescription($expected, Matcher $matcher, $arg)
    {
        $description = new StringDescription();
        $this->assertFalse(
            $matcher->matches($arg),
            'Precondtion: Matcher should not match item'
        );
        $matcher->describeMismatch($arg, $description);
        $this->assertEquals(
            $expected,
            (string)$description,
            'Expected mismatch description'
        );
    }

    public function testIsNullSafe()
    {
        //Should not generate any notices
        $this->createMatcher()->matches(null);
        $this->createMatcher()->describeMismatch(
            null,
            new NullDescription()
        );
    }

    public function testCopesWithUnknownTypes()
    {
        //Should not generate any notices
        $this->createMatcher()->matches(new UnknownType());
        $this->createMatcher()->describeMismatch(
            new UnknownType(),
            new NullDescription()
        );
    }

    abstract protected function createMatcher();
}
