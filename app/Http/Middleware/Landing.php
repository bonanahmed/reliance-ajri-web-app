<?php

namespace App\Http\Middleware;

use App\Models\Variabel;
use Closure;
use Illuminate\Http\Request;

class Landing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $variabel = Variabel::all();
        $object = new \stdClass;
        foreach ($variabel as $key => $value) {
            $request->merge([$value->var => (object)[
                'value' => $value->value,
                'content' => $value->content,
                'image' => $value->image
            ]]);
            $object->{$value->var} = (object)[
                'value' => $value->value,
                'content' => $value->content,
                'image' => $value->image
            ];
        }
        $request->merge(['variabel' => $object]);
        return $next($request);
    }
}
