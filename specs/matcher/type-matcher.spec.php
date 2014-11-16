<?php
use Peridot\Leo\Interfaces\Bdd;
use Peridot\Leo\Matcher\TypeMatcher;

describe('TypeMatcher', function() {
    beforeEach(function() {
        $this->interface = new Bdd([]);
        $this->matcher = new TypeMatcher();
        $this->matcher->peridotSetParentScope($this->interface);
    });

    describe('->getMessage()', function() {
        it("should return a formated success message", function() {
            $this->matcher->match("string");
            $expected = "Expected array, got string";
            $actual = $this->matcher->getMessage("array", "string");
            assert($expected == $actual, "Expected '$expected', got $actual");
        });
    });

    describe('->match()', function() {
        it('should return true when subject is expected value', function() {
            $match = $this->matcher->match('array');
            assert($match, "should have matched array type");
        });

        it('should return false when the subject is not expected value', function() {
            $match = $this->matcher->match('string');
            assert(!$match, "should not have matched string type");
        });
    });

    describe('->a()', function() {
        it('should throw an exception when match fails', function() {
            $exception = null;
            try {
                $this->interface->setSubject([]);
                $this->matcher->a('string');
            } catch (\Exception $e) {
                $exception = $e;
            }
            assert($exception->getMessage() == "Expected string, got array", "should not have been {$exception->getMessage()}");
        });
    });

    describe('->an()', function() {
        it('should throw an exception when match fails', function() {
            $exception = null;
            try {
                $this->interface->setSubject([]);
                $this->matcher->an('string');
            } catch (\Exception $e) {
                $exception = $e;
            }
            assert($exception->getMessage() == "Expected string, got array", "should not have been {$exception->getMessage()}");
        });
    });
});
