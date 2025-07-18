<?php

namespace app\core\models\dto;
use app\core\models\dto\base\InterfaceDTO;

final class UsuarioDTO implements InterfaceDTO{

    /* VARIABLES DE LA TABLA USUARIOS */
    private $id, $apellido, $nombres, $cuenta, $perfil, $clave, $correo, $estado, $fechaAlta, $resetPass;


    /* CONSTRUCTOR DE LA CLASE */

    public function __construct(array $data = [] ){

        $this->setId((int) $data["id"] ?? 0);
        $this->setApellido($data["apellido"] ?? "");
        $this->setNombres($data["nombres"] ?? "");
        $this->setCuenta($data["cuenta"] ?? "");
        $this->setPerfil($data["perfil"] ?? "");
        $this->setClave($data["clave"] ?? "");
        $this->setCorreo($data["correo"] ?? "");
        $this->setEstado($data["estado"] ?? 1);
        $this->setFechaAlta($data["fechaAlta"] ?? "");
        $this->setResetPass($data["resetPass"] ?? 0);

    }

    /* GETTERS */

    public function getId(): int{
        return $this->id;
    }

    public function getApellido(): string{
        return $this->apellido;
    }

    public function getNombres(): string{
        return $this->nombres;
    }

    public function getCuenta(): string{
        return $this->cuenta;
    }

    public function getPerfil(): string{
        return $this->perfil;
    }

    public function getClave(): string{
        return $this->clave;
    }

    public function getCorreo(): string{
        return $this->correo;
    }

    public function getEstado(): int{
        return $this->estado;
    }

    public function getFechaAlta(): string{
        return $this->fechaAlta;
    }

    public function getResetPass(): int{
        return $this->resetPass;
    }

    public function getPerfilNombre(): string {
    return match($this->perfil) {
        1 => "Administrador",
        2 => "Operador",
        default => "Desconocido"
    };
}


    /* SETTERS */


    public function setId(int $id): void{
        $this->id = (is_integer($id) && $id > 0) ? $id : 0;
    }

    public function setApellido(string $apellido){
        $this->apellido = 
            is_string($apellido) && (strlen(trim($apellido)) <= 45) ? trim($apellido) : "";
    }

    public function setNombres(string $nombres){
        $this->nombres = 
        is_string($nombres) && (strlen(trim($nombres)) <= 45) ? trim($nombres) : "";
    }

    public function setCuenta(string $cuenta){
        $this->cuenta =
        is_string($cuenta) && (strlen(trim($cuenta)) <= 45) ? trim($cuenta) : "";
    }

    public function setPerfil(string $perfil){
        $map = [
        'Administrador' => 1,
        'Operador'      => 2,
        1               => 1,
        2               => 2
        ];

        if (isset($map[$perfil])) {
            $this->perfil = $map[$perfil];
        } else {
            $this->perfil = 0;
        }

    }

    public function setClave(string $clave){
        $this->clave = $clave;
    }

    public function setCorreo(string $correo): void{
        $this->correo = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/", $correo) ? $correo : "";   
    }

    public function setEstado(int $estado){

        $this->estado = ($estado == 1) ? $estado : 0;

    }

    public function setFechaAlta(string $fechaAlta){
        $this->fechaAlta = is_string($fechaAlta) ? $fechaAlta : "";
    }

    public function setResetPass(int $resetPass){
        $this->resetPass = ($resetPass == 0 || $resetPass == 1) ? $resetPass : 1;
    }

    

    public function toArray(): array{
        return [
            "id"            => $this->getId(),
            "apellido"      => $this->getApellido(),
            "nombres"       => $this->getNombres(),
            "cuenta"        => $this->getCuenta(),
            "perfil"        => $this->getPerfil(),
            "clave"         => $this->getClave(),
            "correo"        => $this->getCorreo(),
            "estado"        => $this->getEstado(),
            "fechaAlta"     => $this->getFechaAlta(),
            "resetPass"     => $this->getResetPass(),
            "perfilNombre"  => $this->getPerfilNombre()
        ];
    }


}