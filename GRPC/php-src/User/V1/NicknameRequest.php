<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api/user/v1/user.proto

namespace User\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>user.v1.NicknameRequest</code>
 */
class NicknameRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string nickname = 1;</code>
     */
    protected $nickname = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $nickname
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Api\User\V1\User::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string nickname = 1;</code>
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Generated from protobuf field <code>string nickname = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setNickname($var)
    {
        GPBUtil::checkString($var, True);
        $this->nickname = $var;

        return $this;
    }

}

