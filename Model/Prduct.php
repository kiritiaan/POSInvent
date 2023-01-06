

<?php
include_once "config/Database/Database.php";

class Prduct extends Database
{

    public $prod;
    public $price;
    public $desc;
    public $quantity;
    public $supplier;
    public $category;
    public $table = "item";
    public $id;
    public $code;
    public $item_id;
    public $staff_id;
    public $item_NAME;
    public $supp_id;
    public $place_id;
    public $updateQuan;
    public $img;
    public $status;
    public $activation = "Active";




    public function insertItem()
    {


        $sql = "INSERT INTO " . $this->table . " (ITEM_NAME, ITEM_DESC, ITEM_PRICE, ITEM_QUANTITY, CATEGORY_ID, SUPPLIER_ID, ITEM_CREATED_AT, ITEM_UPDATED_AT, ITEM_CODE, ITEM_IMAGE, ITEM_STATUS)
        VALUES (:ITEM_NAME, :ITEM_DESC, :ITEM_PRICE, :ITEM_QUANTITY, :CATEGORY_ID , :SUPPLIER_ID , now(), now(), :ITEM_CODE, :ITEM_IMAGE, :ITEM_STATUS)";
        $stmt = $this->getConnect()->prepare($sql);



        $stmt->bindParam(":ITEM_NAME", $this->prod);
        $stmt->bindParam(":ITEM_DESC", $this->desc);
        $stmt->bindParam(":ITEM_PRICE", $this->price);
        $stmt->bindParam(":ITEM_QUANTITY", $this->quantity);
        $stmt->bindParam(":CATEGORY_ID", $this->category);
        $stmt->bindParam(":SUPPLIER_ID", $this->supplier);
        $stmt->bindParam(":ITEM_CODE", $this->code);
        $stmt->bindParam(":ITEM_IMAGE", $this->img);
        $stmt->bindParam(":ITEM_STATUS", $this->status);


        if ($stmt->execute()) {

            return true;
        }

        printf("Error: %s \n", $stmt->error);
        return false;
    }







    public function showProduct()
    {
        $sql = "SELECT * FROM " . $this->table . " t GROUP BY ITEM_NAME";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function showProductActive()
    {
        $sql = "select * from item WHERE ITEM_STATUS = 'ACTIVE'";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function showProductPending()
    {
        $sql = "select * from item WHERE ITEM_STATUS = 'pending'";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function filterItem()
    {
        $sql = "Select * from " . $this->table . " t inner join category c on 
        t.CATEGORY_ID = c.CATEGORY_ID WHERE t.CATEGORY_ID = {$this->id} GROUP BY ITEM_NAME";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function getSupplier()
    {
        $sql = "SELECT * FROM supplier";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteData()
    {
        $sql = "DELETE FROM " . $this->table . " WHERE ITEM_ID = :ITEM_ID";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindParam(":ITEM_ID", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s \n", $stmt->error);
        return false;
    }


    public function getSingle()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE ITEM_CODE = :ITEM_CODE";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindParam(":ITEM_CODE", $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSingleProd()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE ITEM_NAME = :ITEM_NAME AND SUPPLIER_ID = :SUPPLIER_ID";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindParam(":ITEM_NAME", $this->item_NAME);
        $stmt->bindParam(":SUPPLIER_ID", $this->supplier);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function UpdateMe()
    {
        $sql = "UPDATE " . $this->table . " SET ITEM_NAME = :ITEM_NAME, ITEM_PRICE = :ITEM_PRICE, ITEM_DESC = :ITEM_DESC, ITEM_UPDATED_AT = now(), ITEM_IMAGE = :ITEM_IMAGE WHERE ITEM_ID= :ITEM_ID ";
        $stmt = $this->getConnect()->prepare($sql);


        $stmt->bindParam(":ITEM_ID", $this->id);
        $stmt->bindParam(":ITEM_NAME", $this->prod);
        $stmt->bindParam(":ITEM_PRICE", $this->price);
        $stmt->bindParam(":ITEM_DESC", $this->desc);
        $stmt->bindParam(":ITEM_IMAGE", $this->img);


        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s \n", $stmt->error);
        return false;
    }
    public function showDetails()
    {
        $sql = "SELECT * FROM " . $this->table . " inner join category ON item.CATEGORY_ID = category.CATEGORY_ID join supplier on item.SUPPLIER_ID = supplier.SUPPLIER_ID WHERE item.ITEM_CODE = {$this->id} GROUP BY supplier.SUPPLIER_ID";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function Quantity()
    {
        $sql = "UPDATE " . $this->table . " SET ITEM_QUANTITY = :ITEM_QUANTITY AND ITEM_UPDATED_AT = now() WHERE SUPPLIER_ID= :SUPPLIER_ID ";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindParam(":ITEM_QUANTITY", $this->quantity);


        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s \n", $stmt->error);
        return false;
    }



    public function getITEM()
    {
        $sql = "SELECT * FROM {$this->table} where SUPPLIER_ID = {$this->supp_id}";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function placeInput()
    {
        $sql = "SELECT *,(ITEM_PRICE * ITEM_QUANTITY) as total_Price FROM {$this->table} where ITEM_ID = {$this->place_id}";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateQuantity()
    {
        $sql = "UPDATE {$this->table} set ITEM_QUANTITY = {$this->updateQuan} WHERE  ITEM_ID = {$this->item_id} AND SUPPLIER_ID = {$this->supp_id}";
        $stmt = $this->getConnect()->prepare($sql);
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s \n", $stmt->error);
        return false;
    }
}








?>

