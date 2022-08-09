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

    public function testNotificationIsSent() {
        $user = new User;
        $mock = $this->createMock(Mailer::class);
        $mock->expects($this->once())
                ->method('sendMessage')
                ->with($this->equalTo("caseyd@budsgunshop.com"), $this->equalTo('Hello'))
                ->willReturn(true);
        $user->setMailer($mock);
        $user->email = 'caseyd@budsgunshop.com';
        $this->assertTrue($user->notify('Hello'));
    }
}