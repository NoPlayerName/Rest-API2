<?php

namespace App\Http\Resources;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    //define properti

    public $status;
    public $message;
    public $resource;

    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource,

        ];
    }
}
