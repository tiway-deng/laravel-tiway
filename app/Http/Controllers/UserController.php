<?php

namespace App\Http\Controllers;

use App\Service\GrpcUser;
use App\Service\Jwt;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(Request $request)
    {
        $input = $request->only('nickname','mobile', 'password');
        //用户手机号码是否已注册
        $user = GrpcUser::getUserByMobile($input['mobile']);
        if (isset($user['id'])) {
            throw new \Exception('手机号码已被注册');
        }
        //创建用户
        $user = GrpcUser::CreateUser($input['nickname'],$input['mobile'],$input['password']);
        if (!isset($user['id'])) {
            throw new \Exception('创建失败');
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function login(Request $request)
    {
        $input = $request->only('mobile', 'password');
        //是否已经存在相同手机号码
        $isLogin = GrpcUser::checkoutUserPassword($input['mobile'],$input['password']);
        if (!$isLogin) {
            throw new \Exception('账号或密码错误');
        }
        //获取用户信息
        $user = GrpcUser::getUserByMobile($input['mobile']);
        //jwt
        if (isset($user['id'])) {
            $token = Jwt::createToken($user['id'],$user['nickname']);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request)
    {
        $userId =$request->attributes->get('user_id');
        $user = GrpcUser::getUserById($userId);
        return response()->json(['user' => $user]);
    }

}
