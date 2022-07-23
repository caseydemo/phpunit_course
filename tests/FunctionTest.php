<?
use PHPUnit\Framework\TestCase;
class FunctionTest extends TestCase {
    public function testAddFunctionReturnsCorrectSum() {
        require './functions.php';
        $this->assertEquals(4, add(2, 2));
    }

    public function testAddFunctionDoesNotReturnIncorrectSum() {
        $this->assertNotEquals(5, 2 + 2);
    }
}