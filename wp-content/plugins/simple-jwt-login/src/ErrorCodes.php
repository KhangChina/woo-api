<?php

namespace SimpleJWTLogin;

class ErrorCodes
{
    const ERR_EMPTY_KEY = 1;
    const ERR_WRONG_NUMBER_OF_SEGMENTS = 2;
    const ERR_INVALID_HEADER_ENCODING = 3;
    const ERR_INVALID_CLAIMS_ENCODING = 4;
    const ERR_INVALID_SIGNATURE_ENCODING = 5;
    const ERR_EMPTY_ALGORITHM = 6;
    const ERR_ALGORITHM_NOT_SUPPORTED = 7;
    const ERR_ALGORITHM_NOT_ALLOWED = 8;
    const ERR_INVALID_KID = 9;
    const ERR_EMPTY_KID = 10;
    const ERR_SIGNATURE_VERIFICATION_FAILED = 11;
    const ERR_TOKEN_NBF = 12;
    const ERR_TOKEN_IAT = 13;
    const ERR_TOKEN_EXPIRED = 14;
    const ERR_ALGORITHM_NOT_SUPPORTED_IN_SIGNATURE = 15;
    const ERR_OPENSSL_SIGN = 16;
    const ERR_UNSUPPORTED_SIGN_FUNCTION = 17;
    const ERR_ALGORITHM_NOT_SUPPORTED_VERIFY = 18;
    const ERR_OPEN_SSL_VERIFY = 19;
    const ERR_JSON_DECODE_NON_NULL_INPUT = 20;
    const ERR_JSON_ENCODE_NON_NULL_INPUT = 21;
    const ERR_UNKNOWN_ERROR = 22;
    const ERR_VALIDATE_LOGIN_WRONG_REQUEST = 23;
    const ERR_DO_LOGIN_USER_NOT_FOUND = 24;
    const ERR_LOGIN_INVALID_JWT = 25;
    const ERR_AUTO_LOGIN_NOT_ENABLED = 26;
    const ERR_INVALID_AUTH_CODE_PROVIDED = 27;
    const ERR_IP_IS_NOT_ALLOWED_TO_LOGIN = 28;
    const ERR_UNABLE_TO_FIND_PROPERTY_FOR_USER_IN_JWT = 29;
    const ERR_JWT_PARAMETER_FOR_USER_NOT_FOUND = 30;
    const ERR_REGISTER_IS_NOT_ALLOWED = 31;
    const ERR_REGISTER_INVALID_AUTH_KEY = 32;
    const ERR_REGISTER_IP_IS_NOT_ALLOWED = 33;
    const ERR_REGISTER_MISSING_EMAIL_OR_PASSWORD = 35;
    const ERR_REGISTER_INVALID_EMAIL_ADDRESS = 36;
    const ERR_REGISTER_DOMAIN_FOR_USER = 37;
    const ERR_REGISTER_USER_ALREADY_EXISTS = 38;
    const ERR_DELETE_IS_NOT_ENABLED = 39;
    const ERR_DELETE_MISSING_AUTH_KEY = 40;
    const ERR_DELETE_INVALID_CLIENT_IP = 41;
    const ERR_DELETE_MISSING_JWT = 42;
    const ERR_INVALID_ROUTE_METHOD = 43;
    const ERR_INVALID_ROUTE_NAME = 44;

    const AUTHENTICATION_IS_NOT_ENABLED = 45;
    const AUTHENTICATION_MISSING_EMAIL = 46;
    const AUTHENTICATION_MISSING_PASSWORD = 47;
    const AUTHENTICATION_WRONG_CREDENTIALS = 48;
    const ERR_JWT_REFRESH_NULL_PAYLOAD = 49;
    const ERR_JWT_REFRESH_JWT_TOO_OLD = 50;
    const ERR_JWT_NOT_FOUND_ON_AUTH_REFRESH = 51;
    const ERR_CREATE_USER_ERROR = 52;
    const ERR_MISSING_JWT_AUTH_VALIDATE = 53;
    const ERR_GET_USER_ID_FROM_JWT = 54;

    const ERR_REVOKED_TOKEN = 55;
    const ERR_RESET_PASSWORD_IS_NOT_ALLOWED = 56;
    const ERR_ROUTE_CALLED_WITH_INVALID_METHOD = 57;
    const ERR_RESET_PASSWORD_INVALID_AUTH_KEY = 58;
    const ERR_MISSING_EMAIL_FOR_CHANGE_PASSWORD = 59;
    const ERR_MISSING_CODE_FOR_CHANGE_PASSWORD = 60;
    const ERR_MISSING_NEW_PASSWORD_FOR_CHANGE_PASSWORD = 61;
    const ERR_INVALID_RESET_PASSWORD_CODE = 62;
    const ERR_MISSING_NEW_PASSWORD_FOR_RESET_PASSWORD = 63;
    const ERR_USER_NOT_FOUND_FOR_RESET_PASSWORD = 64;
    const ERR_RESET_PASSWORD_INVALID_FLOW = 65;
    const ERR_MISSING_CODE_FROM_EMAIL_BODY = 66;
    const ERR_INVALID_NONCE = 67;
}