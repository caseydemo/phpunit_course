<?
use PHPUnit\Framework\TestCase;
class UserTest extends TestCase {
    public function testReturnsFullName() {
        
        $user = new User;
        $user->first_name = 'Teresa';
        $user->surname = 'Greene';
        $this->assertEquals('Teresa Greene', $user->getFullName());
    }

    public function testFullNameReturnsEmptyByDefault() {
        $user = new User;
        $this->assertEquals("", $user->getFullName());
    }
}