<?php

namespace App\Jobs;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\DB;
class CalculateServiceRating implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        
        $services = Service::leftJoin('user_review', 'services.id', '=', 'user_review.service_id')
        ->select('services.*', DB::raw('AVG(user_review.star_rating) as average_rating'))
        ->groupBy('services.id')
        ->get();
        //  dd($services);
        // dd($services);

        foreach ($services as $service) {

            //dd($service);
            $averageRating = $service->average_rating ?? 0;
            
            // Update the service's average_star column (assuming you have such a column)
            $service->update(['average_star' => $averageRating]);
        }
    }
}
