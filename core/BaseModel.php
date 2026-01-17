<?php
require_once __DIR__ . '/Database.php';

class BaseModel
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->rawQuery($sql);
        $rows = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->primaryKey . " = ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE " . $this->primaryKey . " = ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Custom query helper
    public function query($sql)
    {
        return $this->db->query($sql);
    }

    // Direct query helper
    public function rawQuery($sql)
    {
        return $this->db->rawQuery($sql);
    }
}
