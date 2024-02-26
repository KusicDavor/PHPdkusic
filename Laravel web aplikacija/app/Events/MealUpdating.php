<?php

namespace App\Events;

use App\Models\Meal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

//event koji je trebao promijeniti status kod updatetanja meala
class MealUpdating
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $meal;

    public function __construct(Meal $meal)
    {
        $this->meal = $meal;
    }

    public function handle()
    {
        if ($this->meal->isDirty('updated_at')) {
            $this->meal->status = 'modified';
        }
    }
}
