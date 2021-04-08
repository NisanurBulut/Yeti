<?php

namespace app\core\exceptions;

class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = 'Bu sayfaya erişim izniniz bulunmuyor !';
}
