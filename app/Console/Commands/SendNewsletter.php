<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Events;
use App\Models\newsletterlogs;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\Newsletter;

class SendNewsletter extends Command
{
    protected $signature = 'send:newsletter';

    protected $description = 'Send the newsletter to the user';

    public function handle()
    {
        $currentWeek = Carbon::now()->weekOfYear;

        $eventz = Events::whereYear('event_date', '>=', now()->year)
            ->limit(3)
            ->latest()
            ->get();

        $url = request()->getSchemeAndHttpHost();

        if (count($eventz) > 0) {
            Mail::to(auth()->user()->email)->send(new Newsletter($eventz, $url));
            $this->info('Newsletter sent successfully!');
        } else {
            $this->info('No events found for the newsletter.');
        }
        $newsletter = new newsletterlogs;
        $newsletter->customer_id = auth()->user()->id;
        $newsletter->week = $currentWeek;
        $newsletter->save();
    }
}
