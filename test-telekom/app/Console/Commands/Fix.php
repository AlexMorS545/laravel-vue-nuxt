<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Fix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->test();
    }

    private function test()
    {
        $str = '2ac23ABD@';
        $str_arr = str_split($str);
        $pattern = ['/[a-z]/', '/[A-Z]/','/\d/', '/[-_@]/'];
        $replace = ['a', 'A', 'N', 'Z'];
        $new_str = implode('', preg_filter($pattern, $replace, $str_arr));
        dd($new_str);
    }
}
