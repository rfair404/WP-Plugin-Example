<?php

class MyTestClass extends \WP_Mock\Tools\TestCase {
    public function setUp() {
        \WP_Mock::setUp();
    }

    public function tearDown() {
        \WP_Mock::tearDown();
    }
}