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


    public function test_user_can_not_notify_with_no_email() {
        $user = new User;

        /* use the original methods and not the stubs */
        $mock = $this->getMockBuilder(Mailer::class)
                    ->setMethods()
                    ->getMock();


        // $mock = $this->createMock(Mailer::class);
        // $mock->method('sendMessage')->will($this->throwException(new Exception));
        $user->setMailer($mock);
        $this->expectException(Exception::class);
        $user->notify("Hello");
    }
}