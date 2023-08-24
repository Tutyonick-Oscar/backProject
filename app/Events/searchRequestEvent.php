<?php

namespace App\Events;
use App\Models\question;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Request;

class searchRequestEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Bool $bool,public String $request)
    {
        
    }

    
}
