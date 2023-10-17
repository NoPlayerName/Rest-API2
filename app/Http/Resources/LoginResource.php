<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public $status;
    public $message;
    public $resource;
    public $token;
    
    public function __construct($status, $message, $resource, $token){

        // parent::__construct($resource);
        $this->resource = $resource;
        $this->status = $status;
        $this->message = $message;
        $this->token = $token;

    }

    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource,
            'token' => $this->token,
        ];
    }
}
