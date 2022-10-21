<?php

namespace App\Http\Middleware;

use App\Service\Jwt;
use Closure;
use Illuminate\Http\Request;

class ApiJwt
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //将token放入header中传输
        $token = $request->header('Authorization');
        if (!$token) {
            return response()->json(['code' => 500, 'msg' => 'token不存在', 'data' => []]);
        }
        $result = Jwt::decodeToken($token);
        if ($result) {
            //将加密id解密传入下一步
            $request->attributes->add(['user_id' => $result->user_id, 'nickname' => $result->nickname]);
        } else {
            return response()->json(['code' => 500, 'msg' => 'token过期', 'data' => []]);
        }
        return $next($request);
    }
}
