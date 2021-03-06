<?php

namespace DBlackborough\Quill\Tests\Attributes\GitHubMarkdown;

require __DIR__ . '../../../../vendor/autoload.php';

use DBlackborough\Quill\Options;
use DBlackborough\Quill\Render as QuillRender;

/**
 * Href tests
 */
final class HrefTest extends \PHPUnit\Framework\TestCase
{
    private $delta_href = '{"ops":[{"insert":"Lorem ipsum dolor sit amet, "},{"attributes":{"link":"http://www.example.com"},"insert":"consectetur"},{"insert":" adipiscing elit. In sed efficitur enim. Suspendisse mattis purus id odio varius suscipit. Nunc posuere fermentum blandit. \nIn vitae eros nec mauris dignissim porttitor. Morbi a tempus tellus. Mauris quis velit sapien. "},{"attributes":{"link":"http://www.example.com"},"insert":"Etiam "},{"insert":"sit amet enim venenatis, eleifend lectus ac, ultricies orci. Sed tristique laoreet mi nec imperdiet. Vivamus non dui diam. Aliquam erat eros, dignissim in quam id.\n"}]}';

    private $expected_href = 'Lorem ipsum dolor sit amet, [consectetur](http://www.example.com) adipiscing elit. In sed efficitur enim. Suspendisse mattis purus id odio varius suscipit. Nunc posuere fermentum blandit. 
In vitae eros nec mauris dignissim porttitor. Morbi a tempus tellus. Mauris quis velit sapien. [Etiam](http://www.example.com) sit amet enim venenatis, eleifend lectus ac, ultricies orci. Sed tristique laoreet mi nec imperdiet. Vivamus non dui diam. Aliquam erat eros, dignissim in quam id.
';

    /**
     * Link
     *
     * @return void
     * @throws \Exception
     */
    public function testLink()
    {
        $result = null;

        try {
            $quill = new QuillRender($this->delta_href, OPTIONS::FORMAT_GITHUB_MARKDOWN);
            $result = $quill->render();
        } catch (\Exception $e) {
            $this->fail(__METHOD__ . 'failure, ' . $e->getMessage());
        }

        $this->assertEquals(
            $this->expected_href,
            $result,
            __METHOD__ . ' Href failure'
        );
    }
}
