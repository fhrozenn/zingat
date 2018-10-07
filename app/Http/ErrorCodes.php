<?php

namespace App\Http;

class ErrorCodes {


    /**
     * They messed up
     */
    const BAD_REQUEST = -4000;
    const EXPIRED_TOKEN = -4001;
    const INVALID_PAX_INPUT = -4002;


    const UNAUTHORIZED = -4010;
    const UNAUTHORIZED_LOGIN_WITHOUT_PHONE_VERIFICATION = -4011;

    const PAYMENT_REQUIRED = -4020;

    const FORBIDDEN  = -4030;

    const NOT_FOUND = -4040;

    const UNPROCESSABLE_ENTITY = -4220;
    const UNACCEPTABLE_CC_TYPE = -4221;
    const INVALID_CARD_NUMBER = -4222;


    /**
     * I messed up
     */
    const SERVER_ERROR = -5000;
    const SERVER_ERROR_MINOR = -5001;
    const SERVER_UNAVAILABLE = -5030;


    /**
     * Other
     */

    const SESSION_EXPIRED = -50010;


}