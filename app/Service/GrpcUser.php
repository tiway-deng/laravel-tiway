<?php


namespace App\Service;


use Grpc\ChannelCredentials;
use User\V1\CreateUserInfo;
use User\V1\IdRequest;
use User\V1\PasswordCheckInfo;
use User\V1\UserClient;

class GrpcUser
{
    private static function createClient()
    {
        //docker 请求宿主机
        return new UserClient("host.docker.internal:9001", [
            "credentials" => ChannelCredentials::createInsecure()
        ]);
    }

    /**
     * @return array
     */
    public static function CreateUser(string $nickname, string $mobile, string $password)
    {
        $request = new CreateUserInfo();
        $request->setNickname($nickname);
        $request->setMobile($mobile);
        $request->setPassword($password);
        $call = self::createClient()->CreateUser($request);
        list($response, $status) = $call->wait();

        $user = [];
        if ($response) {
            $user = [
                'id' => $response->getId(),
                'name' => $response->getName(),
                'mobile' => $response->getMobile(),
                'nickname' => $response->getNickname(),
                'email' => $response->getEmail(),
                'password' => $response->getPassword(),
                'status' => $response->getStatus(),
                'created_at' => $response->getCreatedAt(),
            ];
        }

        return $user;
    }

    /**
     * @param int $id
     * @return array
     */
    public static function getUserById(int $id)
    {
        $request = new IdRequest();
        $request->setId($id);
        $call = self::createClient()->GetUserById($request);
        list($response, $status) = $call->wait();

        $user = [];
        if ($response) {
            $user = [
                'id' => $response->getId(),
                'name' => $response->getName(),
                'mobile' => $response->getMobile(),
                'nickname' => $response->getNickname(),
                'email' => $response->getEmail(),
                'password' => $response->getPassword(),
                'status' => $response->getStatus(),
                'created_at' => $response->getCreatedAt(),
            ];
        }

        return $user;
    }

    /**
     * @param string $mobile
     * @param string $password
     * @return bool
     */
    public static function checkoutUserPassword(string $mobile,string $password)
    {
        $request = new PasswordCheckInfo();
        $request->setMobile($mobile);
        $request->setPassword($password);
        $call = self::createClient()->CheckPassword($request);
        list($response, $status) = $call->wait();

        if ($response && $response->getSuccess()) {
            return true;
        }
        return false;
    }

}
