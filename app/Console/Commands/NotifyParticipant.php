<?php

namespace App\Console\Commands;

use App\Mail\FormationStartMail;
use App\Models\Formation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyParticipant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:participants';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette commande nous sert a notifier les participants au la vielle de la formation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $formations = Formation::whereDate('start_at', today()->addDays(1))->get();

        foreach($formations as $formation) {
            Mail::to($formation->participants)->send(new FormationStartMail($formation));
        }

        $this->line('Mail envoye avec success');

        return Command::SUCCESS;
    }
}
