<?php

namespace app\core\services\base;

use app\core\models\dto\base\InterfaceDTO;

interface InterfaceService{

    public function save(InterfaceDTO $data): void;

    public function load(int $id): InterfaceDTO;

    public function update(InterfaceDTO $data): void;

    public function delete(InterfaceDTO $id): void;

    public function list(array $filters): array;

}