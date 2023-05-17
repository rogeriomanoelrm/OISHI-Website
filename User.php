<?php

class User extends Conn
{
    public object $conn;
    public array $formData;

    public function list(): array
    {
        $this->conn = $this->connectDb();
        $query_users = "SELECT id, nome, telefone, email, data, horario,  FROM reserva ORDER BY id ASC LIMIT 40";
        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        // var_dump($retorno);
        return $retorno;
    }

    public function delete($id): bool
    {
        $this->conn = $this->connectDb();
        $query_delete_user = "DELETE FROM reserva WHERE id = :id";
        $delete_user = $this->conn->prepare($query_delete_user);
        $delete_user->bindParam(':id', $id);
        $delete_user->execute();
    
        if ($delete_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function index(): bool
    {
        var_dump($this->formData);
        $this->conn = $this->connectDb();
        $query_user = "INSERT INTO reserva (nome, telefone, email, data, horario) VALUES (:nome, :telefone, :email, :data, :horario)";
        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(':nome', $this->formData['sku']);
        $add_user->bindParam(':telefone', $this->formData['name']);
        $add_user->bindParam(':email', $this->formData['price']);
        $add_user->bindParam(':data', $this->formData['dimension1']);
        $add_user->bindParam(':horario', $this->formData['dimension2']);
     

        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
