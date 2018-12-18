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
        if(SearchTerm::isCameFromSearchEngine()){

            $keyword = SearchTerm::get();

            if(!empty($keyword)){
            
                insert_term([
                    'token' => config('laraveltermapi.token'),
                    'keyword' => $keyword,
                    'url' => url()->full()
                ]);
            }
        }

        return $next($request);
    }
}