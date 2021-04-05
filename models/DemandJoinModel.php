<?php

namespace app\models;

use app\core\db\DbModel;

class DemandJoinModel extends DbModel
{
    public string $title = '';
    public string $description = '';
    public string $state = '';
    public string $status = '';
    public string $color = '';
    public string $id = '';
    public string $appName = '';
    public string $takedUsername='';
    public string $takedNamesurname='';
    public string $ownerUsername='';
    public string $ownerNamesurname='';
    public string $differenceTime='';
    public string $takedImageUrl='';
    public string $ownerImageUrl='';

    public function primaryKey(): string
    {
        return 'id';
    }
    public function __constructor()
    {
    }
    public function tableName(): string
    {
        return '';
    }
    public function select()
    {

        return parent::select();
    }

    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['id', 'title', 'description', 'state', 'status',
        'appName','ownerUsername','takedUsername','color','status_id',
        'ownerNamesurname','takedNamesurname','differenceTime','takedImageUrl','ownerImageUrl'];
    }
    public function labels(): array
    {
        return [];
    }
}
