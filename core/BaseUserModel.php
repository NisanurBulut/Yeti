<?php

namespace app\core;

use app\core\db\DbModel;

abstract class BaseUserModel extends DbModel
{

    abstract public function getDisplayName(): string;
    abstract public function isAdmin(): bool;
    abstract public function getUserImageUrl():string;
}
