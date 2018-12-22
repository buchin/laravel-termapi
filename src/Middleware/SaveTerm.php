<?php
namespace Buchin\LaravelTermapi\Middleware;
use Closure;
use Buchin\SearchTerm\SearchTerm;

class SaveTerm
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        termapi(config('laraveltermapi.token'));

        return $next($request);
    }
}