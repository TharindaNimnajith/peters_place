<?php

namespace Hamcrest;

use Hamcrest\Core\IsEqual;
use Hamcrest\Text\MatchesPattern;
use PhpUnit_Framework_TestCase;

class UtilTest extends PhpUnit_Framework_TestCase
{

    public function testWrapValueWithIsEqualLeavesMatchersUntouched()
    {
        $matcher = new MatchesPattern('/fo+/');
        $newMatcher = Util::wrapValueWithIsEqual($matcher);
        $this->assertSame($matcher, $newMatcher);
    }

    public function testWrapValueWithIsEqualWrapsPrimitive()
    {
        $matcher = Util::wrapValueWithIsEqual('foo');
        $this->assertInstanceOf('Hamcrest\Core\IsEqual', $matcher);
        $this->assertTrue($matcher->matches('foo'));
    }

    public function testCheckAllAreMatchersAcceptsMatchers()
    {
        Util::checkAllAreMatchers(array(
            new MatchesPattern('/fo+/'),
            new IsEqual('foo'),
        ));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCheckAllAreMatchersFailsForPrimitive()
    {
        Util::checkAllAreMatchers(array(
            new MatchesPattern('/fo+/'),
            'foo',
        ));
    }

    public function testCreateMatcherArrayLeavesMatchersUntouched()
    {
        $matcher = new MatchesPattern('/fo+/');
        $items = array($matcher);
        $matchers = $this->callAndAssertCreateMatcherArray($items);
        $this->assertSame($matcher, $matchers[0]);
    }

    public function testCreateMatcherArrayWrapsPrimitiveWithIsEqualMatcher()
    {
        $matchers = $this->callAndAssertCreateMatcherArray(array('foo'));
        $this->assertInstanceOf('Hamcrest\Core\IsEqual', $matchers[0]);
        $this->assertTrue($matchers[0]->matches('foo'));
    }

    public function testCreateMatcherArrayDoesntModifyOriginalArray()
    {
        $items = array('foo');
        $this->callAndAssertCreateMatcherArray($items);
        $this->assertSame('foo', $items[0]);
    }

    public function testCreateMatcherArrayUnwrapsSingleArrayElement()
    {
        $matchers = $this->callAndAssertCreateMatcherArray(array(array('foo')));
        $this->assertInstanceOf('Hamcrest\Core\IsEqual', $matchers[0]);
        $this->assertTrue($matchers[0]->matches('foo'));
    }

    private function callAndAssertCreateMatcherArray($items)
    {
        $matchers = Util::createMatcherArray($items);
        $this->assertInternalType('array', $matchers);
        $this->assertSameSize($items, $matchers);
        foreach ($matchers as $matcher) {
            $this->assertInstanceOf('\Hamcrest\Matcher', $matcher);
        }

        return $matchers;
    }
}
