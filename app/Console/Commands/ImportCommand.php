<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MovieController;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permet d\importer les films tendance du jour via l\'API TheMovieDB et de les ajouter en base de données.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new MovieController;
        $controller->import();

        $this->info('La commande a été exécutée avec succès.');
    }
}
