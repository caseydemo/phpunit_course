    <?
    use PHPUnit\Framework\TestCase;

    class QueueTest extends TestCase {

        protected $queue;

        protected function setUp(): void {
            $this->queue = new Queue;
        }

        public function testNewQueueIsEmpty() {
            $this->assertEquals(0, $this->queue->getCount());
        }


        /**
         * @depends testNewQueueIsEmpty
         */
        public function testAnItemIsAddedToTheQueue() {
            $this->queue->push('green');
            $this->assertEquals(1, $this->queue->getCount());
        }

        /**
         * @depends testAnItemIsAddedToTheQueue
         */
        public function restRemoveAnItemFromTheQueue() {
            
            $item = $this->queue->pop();
            $this->assertEquals(0, $this->queue->getCount());
            $this->assertEquals('green', $item);
        }

    }