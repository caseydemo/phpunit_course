<?
use PHPUnit\Framework\TestCase;
class FunctionTest extends TestCase {
    public function testAddFunction() {
        require './functions.php';
        $this->assertEquals(4, add(2, 2));
    }
}