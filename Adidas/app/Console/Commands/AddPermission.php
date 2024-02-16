<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use App\Models\role;
use App\Models\Route as RouteModel;



class AddPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:permission';

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
        $route =  Route::getRoutes();

        // dd($route);

        foreach($route as $route){
            $uri = $route->uri();

            // dump($uri);

            if(strstr($uri, '_')) continue;
            if(strstr($uri, 'api')) continue;
            if(strstr($uri, 'csrf')) continue;

            $route = new RouteModel();
            $route->name = $uri;
            $route->save();
        }

        // dump($route);
    }
        
}
