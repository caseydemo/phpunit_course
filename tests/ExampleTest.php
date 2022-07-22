<?
use \PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class ExampleTest extends TestCase {
    public function testTwoPlusTwoEqualsFour() {
        $this->assertEquals(4, 2+ 2);
    }

    public function testAddFunction() {
        require './functions.php';
        $this->assertEquals(4, add(2, 2));
    }
}
