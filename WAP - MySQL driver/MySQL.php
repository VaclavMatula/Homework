class MySQL implements IDB
{
    private $pdo;

    public function connect(
        string $host = "",
        string $username = "",
        string $password = "",
        string $database = ""
    ): ?static {
        try {
            $dsn = "mysql:host=$host;dbname=$database";
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function select(string $query): array {
        $stmt = $this->pdo->query($query);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows ?: [];
    }

    public function insert(string $table, array $data): bool {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->pdo->prepare($query);
        $success = $stmt->execute(array_values($data));
        return (bool) $success;
    }

    public function update(string $table, int $id, array $data): bool {
        $set = implode('=?,', array_keys($data)) . '=?';
        $query = "UPDATE $table SET $set WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $params = array_values($data);
        $params[] = $id;
        $success = $stmt->execute($params);
        return (bool) $success;
    }

    public function delete(string $table, int $id): bool {
        $query = "DELETE FROM $table WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $success = $stmt->execute([$id]);
        return (bool) $success;
    }
}