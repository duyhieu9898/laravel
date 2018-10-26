<?php

namespace App\Http\Middleware;

use Closure;

class testMiddleWare {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		// return $next($request);
		if ($request->input('point') > 5) {
			return $next($request);
		} else {
			return redirect()->route('error');
		}
	}
}
