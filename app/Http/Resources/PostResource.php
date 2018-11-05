<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {

        $timestamp_created = strtotime((string) $this->created_at);
        $timestamp_updated = strtotime((string) $this->updated_at);

        $return = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'text' => $this->text,
            'image' => $this->image,
            'created_at' => date("F jS, Y", $timestamp_created).' at '.date('g:i', $timestamp_created),
            'updated_at' => date("F jS, Y", $timestamp_updated).' at '.date('g:i', $timestamp_updated),
        ];

        if(!empty($this->user)) {
            $return['user'] = $this->user;
        }

        if(!empty($this->comments)) {
            $return['comments'] = $this->comments;
        }

        return $return;
    }
}
