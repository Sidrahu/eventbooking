<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class DeletePastEvents extends Command
{
    protected $signature = 'events:delete-past';
    protected $description = 'Delete past events';

    public function handle()
{
   
    $deletedEvents = Event::where('event_date', '>', Carbon::today())->delete();

  
    $this->info($deletedEvents . ' old events deleted.');
}

}
