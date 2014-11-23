<?php
describe('->false()', function() {
    it('should throw exception when match fails', function() {
        $exception = null;
        try {
            $this->subject->false();
        } catch (Exception $e) {
            $exception = $e;
        }
        assert(!is_null($exception), "exception should have been thrown");
    });

    it('should allow an optional user message', function() {
        $exception = null;
        $expected = "custom user exception message";
        try {
            $this->subject->false($expected);
        } catch (\Exception $e) {
            $exception = $e;
        }
        assert($exception->getMessage() == $expected, "should not have been {$exception->getMessage()}");
    });
});
