<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\SellOrderMongoDB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SellOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sell-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sellOrders = DB::table('orders')
                        ->where('status', '=' , 'SUCCESS')
                        ->get();

        $collection = collect($sellOrders);

        $sellOrder = $collection->toArray();

        SellOrderMongoDB::insert($sellOrder);
    }
}
