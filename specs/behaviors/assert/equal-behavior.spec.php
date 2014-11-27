<?php
use Peridot\Leo\Behavior\Assert\EqualBehavior;
use Peridot\Leo\Formatter\ObjectFormatter;
use Peridot\Leo\Matcher\EqualMatcher;

describe('Assert\EqualBehavior', function() {

    beforeEach(function() {
        $matcher = new EqualMatcher(new ObjectFormatter());
        $this->subject = new EqualBehavior($matcher);
    });

    include __DIR__ . '/../../shared/behaviors/assert/has-equal-behavior.php';
});