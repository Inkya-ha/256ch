<!--

脆弱性テスト求む
陰キャ男子

-->

<?php
require_once __DIR__ . "/../connect_db.php";

class User
{
    protected $uuid;

    function __construct($dataType, $dataBody)
    {
        if (!in_array($dataType, ["uuid", "email"])) {
            throw new InvalidArgumentException("Invalid data type");
        }

        if (!$dataBody) {
            throw new InvalidArgumentException("Data body must not be empty");
        }

        if ($dataType === "uuid") {
            $this->uuid = $dataBody;
        } else if ($dataType === "email") {
            $pdo = connect();
            $sql = "SELECT * FROM userdata WHERE EMAIL = :email";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':email', $dataBody, PDO::PARAM_STR);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                throw new InvalidArgumentException("User not found");
            }

            $this->uuid = $row['UUID'];
        }
    }

    function getUuid()
    {
        return $this->uuid;
    }

    function getEmail()
    {
        $pdo = connect();
        $sql = "SELECT * FROM userdata WHERE UUID = :uuid";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':uuid', $this->uuid, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new InvalidArgumentException("User not found");
        }

        return htmlentities($row['EMAIL'], ENT_QUOTES, "UTF-8");
    }
}
