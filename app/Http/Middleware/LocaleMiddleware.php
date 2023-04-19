<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $langs = ['en', 'ru', 'ko'];

        //app()->setLocale('');

       $curretLang = $request->session()->get('lang');

        if(! in_array($curretLang, $langs)){

            app()->setLocale('ru');
        }else{
            app()->setLocale($curretLang);

        }

        return $next($request);
    }
}
