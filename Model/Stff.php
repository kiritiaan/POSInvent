



<?php
include_once "config/Database/Database.php";

class Stff extends Database
{

    public $name;
    public $lastName;
    public $phone;
    public $email;
    public $add;
    public $table = "staff";
    public $id;
    public $Username;
    public $password;
    public $role = 'member';


    public function inserted()
    {


        $sql = "INSERT INTO " . $this->table . " (STAFF_USER, STAFF_PASS, STAFF_FNAME, STAFF_LNAME, STAFF_ADDRESS, STAFF_EMAIL, STAFF_PHONENUM, STAFF_ROLE, STAFF_CREATED_AT, STAFF_UPDATED_AT)
        VALUES (:STAFF_USER, :STAFF_PASS, :STAFF_FNAME, :STAFF_LNAME, :STAFF_ADDRESS, :STAFF_EMAIL, :STAFF_PHONENUM, :STAFF_ROLE, now(), now())";
        $stmt = $this->getConnect()->prepare($sql);

        $stmt->bindParam(":STAFF_USER", $this->Username);
        $stmt->bindParam(":STAFF_PASS", $this->password);
        $stmt->bindParam(":STAFF_FNAME", $this->name);
        $stmt->bindParam(":STAFF_LNAME", $this->lastName);
        $stmt->bindParam(":STAFF_ADDRESS", $this->add);
        $stmt->bindParam(":STAFF_EMAIL", $this->email);
        $stmt->bindParam(":STAFF_PHONENUM", $this->phone);
        $stmt->bindParam(":STAFF_ROLE", $this->role);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s \n", $stmt->error);
        return false;
    }

    public function showCustomer()
    {
        $sql = "SELECT * FROM " . $this->table . "";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteData()
    {
        $sql = "DELETE FROM " . $this->table . " WHERE STAFF_ID = :STAFF_ID";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindParam(":STAFF_ID", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s \n", $stmt->error);
        return false;
    }

    public function getSingle()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE STAFF_ID = :STAFF_ID";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindParam(":STAFF_ID", $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function UpdateMe()
    {
        $sql = "UPDATE " . $this->table . " SET STAFF_FNAME = :STAFF_FNAME, STAFF_LNAME = :STAFF_LNAME, STAFF_ADDRESS = :STAFF_ADDRESS, STAFF_EMAIL = :STAFF_EMAIL, STAFF_PHONENUM = :STAFF_PHONENUM, STAFF_UPDATED_AT = now() WHERE STAFF_ID= :STAFF_ID ";
        $stmt = $this->getConnect()->prepare($sql);


        $stmt->bindParam(":STAFF_ID", $this->id);
        $stmt->bindParam(":STAFF_FNAME", $this->name);
        $stmt->bindParam(":STAFF_LNAME", $this->lastName);
        $stmt->bindParam(":STAFF_ADDRESS", $this->add);
        $stmt->bindParam(":STAFF_EMAIL", $this->email);
        $stmt->bindParam(":STAFF_PHONENUM", $this->phone);




        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s \n", $stmt->error);
        return false;
    }
}



?>

