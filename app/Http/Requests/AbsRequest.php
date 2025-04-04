<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AbsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get current controller method
     */
    final public function getCurrentControllerMethod(): string
    {
        [$controller, $method] = explode('@', Route::currentRouteAction());

        return $method;
    }
}
