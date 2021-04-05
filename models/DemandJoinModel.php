<?php

namespace app\models;

use app\core\db\DbModel;

class DemandJoinModel extends DbModel
{
    public string $title = '';
    public string $description = '';
    public string $state = '';
    public string $status = '';
    public string $id = '';
    public string $appName = '';
    public string $takedUsername='';
    public string $takedNamesurname='';
    public string $ownerUsername='';
    public string $ownerNamesurname='';

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
        'appName','ownerUsername','takedUsername',
        'ownerNamesurname','takedNamesurname'];
    }
    public function labels(): array
    {
        return [

        ];
    }
}
