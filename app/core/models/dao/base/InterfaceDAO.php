<?php

namespace app\core\models\dao\base;

use app\core\models\dto\base\InterfaceDTO;

interface InterfaceDAO{

    /* DEFINICIÓN DE METODOS CRUD */

    public function save(array $data): void;

    public function load(int $id): array;

    public function update(array $data): void;

    public function delete(int $id): void;

    public function list(array $filters): array;

}