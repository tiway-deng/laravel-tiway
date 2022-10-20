<?php
// GENERATED CODE -- DO NOT EDIT!

namespace User\V1;

/**
 */
class UserClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \User\V1\SearchUser $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserList(\User\V1\SearchUser $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.v1.User/GetUserList',
        $argument,
        ['\User\V1\UserListResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \User\V1\MobileRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserByMobile(\User\V1\MobileRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.v1.User/GetUserByMobile',
        $argument,
        ['\User\V1\UserInfoResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \User\V1\NicknameRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserByNickname(\User\V1\NicknameRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.v1.User/GetUserByNickname',
        $argument,
        ['\User\V1\UserInfoResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \User\V1\IdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserById(\User\V1\IdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.v1.User/GetUserById',
        $argument,
        ['\User\V1\UserInfoResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \User\V1\CreateUserInfo $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateUser(\User\V1\CreateUserInfo $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.v1.User/CreateUser',
        $argument,
        ['\User\V1\UserInfoResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \User\V1\UpdateUserInfo $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateUser(\User\V1\UpdateUserInfo $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.v1.User/UpdateUser',
        $argument,
        ['\User\V1\UpdateUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \User\V1\PasswordCheckInfo $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CheckPassword(\User\V1\PasswordCheckInfo $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.v1.User/CheckPassword',
        $argument,
        ['\User\V1\CheckResponse', 'decode'],
        $metadata, $options);
    }

}
