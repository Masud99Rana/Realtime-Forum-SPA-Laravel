<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray($request)
    {   
        //-> default
        // return parent::toArray($request);
        
        return [
            'title' => $this->title,
            'path' => $this->path, // this come from Question model pathAttribute
            'body' => $this->body,
            'created_at' => $this->created_at->diffForHumans(),
            'user' => $this->user->name // this is come from relationship
        ]; 
      
    }
}
