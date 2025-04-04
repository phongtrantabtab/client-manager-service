<?php

namespace App\Enum;

enum General
{
    //SORT
    public const SORT_ASC = 'ASC';
    public const SORT_DESC = 'DESC';

    //DATE TIME FORMAT
    public const DATE_TIME_FORMAT = 'Y-m-d H:i:s';
    public const DATE_FORMAT_YMD = 'Y/m/d';

    //REQUEST
    public const REQUEST_SAVE = 'save';
    public const REQUEST_DRAFT = 'draft';
    public const REQUEST_UPDATE = 'update';
    public const REQUEST_DELETE = 'delete';

    // MESSAGE
    public const MSG = 'message';
    public const MSG_CAUGHT_ERROR = 'Exception caught';
    public const MSG_OK = 'OK';
    public const MSG_NOT_EXIST = ' not found';
    public const MSG_ERROR = 'Error';
    public const MSG_EXCEPTION = 'Exception';
    public const MSG_INVALID_REQUEST = 'Invalid data send';
    public const MSG_SETUP_SUCCESS = 'Setup successful';
    public const MSG_CREATE_FAILED = 'Create failed';
    public const MSG_ADDRESS_NOT_FOUND = 'Address not found';
    public const MSG_UPDATE_FAILED = 'Update failed';
    public const ERR_MSG = 'error_message';

    // COLUMN
    public const COL_ID = 'id';

    public const COL_CREATED = 'created_at';

    public const COL_UPDATED = 'updated_at';

    public const COL_DELETED = 'deleted_at';

    public const GOOGLE = 'google';

    public const TOKEN = 'token';

    // OPERATOR
    public const OPERATOR_LIKE = 'like';
    public const OPERATOR_EQUAL = '=';
    public const OPERATOR_GREATER_EQUAL = '>=';
    public const OPERATOR_LESS_EQUAL = '<=';
    public const OPERATOR_GREATER = '>';
    public const OPERATOR_LESS_THAN = '<';
    public const OPERATOR_DIFFERENT = '<>';

    //STATUS
    public const STATUS_SUCCESS = 'success';
    public const STATUS_ERROR = 'error';
}
