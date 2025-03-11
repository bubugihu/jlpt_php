<?php
declare(strict_types=1);

namespace App\Console\Command;

use App\Library\Business\Cron;
use Cake\Console\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * GetPictureCommand command.
 */
class GetPictureCommand extends Command
{
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        // Bạn có thể thêm tùy chọn hoặc tham số tại đây nếu cần
        // Ví dụ: thêm tùy chọn --force
        $parser->addOption('force', [
            'short' => 'f',
            'help' => 'Force the command to run',
            'boolean' => true,
        ]);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        try {
            // Thông báo bắt đầu
            $io->out('Starting GetPictureCommand...');

            // Khởi tạo Cron và chạy tác vụ
            $cron = new Cron();
            // $cron->getCustomerPictureDone();

            // Thông báo khi hoàn thành
            $io->out('Picture processing completed successfully!');
        } catch (\Exception $e) {
            // Thông báo lỗi nếu có
            $io->err('Error: ' . $e->getMessage());
            return 1; // Trả về mã lỗi nếu có lỗi
        }

        return 0; // Trả về 0 nếu thành công
    }
}
