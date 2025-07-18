<?php

namespace app\core\models\dto;

use app\core\models\dto\base\InterfaceDTO;

final class LoginDTO implements InterfaceDTO{

    private $userName, $password;

    public function __construct(array $data = [] ){

        $this->setUserName($data["userName"] ?? ""); //name del input del formulario va acá php
        $this->setPassword($data["password"] ?? ""); 

    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getUserName(): string{
        return $this->userName;
    }

    public function setUserName(string $userName): void{
        $this->userName = $userName;
    }

    public function setPassword(string $password): void{
        $this->password = $password;
    }


    public function toArray(): array{
        return [
            "userName" => $this->getUserName(),
            "password" => $this->getPassword()
        ];
    }
}