<?php



class Database{

    private $dsn = "mysql:host=localhost;dbname=login_cars";
    private $user = "root";
    private $pass = "";
    public $conn;


    public function __construct()
    {
        try{
            $this->conn= new PDO($this->dsn,$this->user,$this->pass);
            // echo 'connected!';
        }
        catch(PDOException $e){
            echo $e->getMessage();

        }
        
        
        
    }


    public function insert($registration,$color,$brand,$model){
        $sql = "INSERT INTO cars (`registration`,`color`,`brand`,`model`) VALUES (:registration, :color, :brand, :model)";  

        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['registration'=>$registration,'color'=>$color,'brand'=>$brand,'model'=>$model]);

        return true;

    }


    public function read(){
        $data=array();
        $sql="SELECT * FROM cars";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $data[]=$row;
        }
        return $data;
    }




    public function getCarById($id){

        $sql= "SELECT * FROM cars WHERE id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    

    }


    public function update($id,$registration,$color,$brand,$model){
        $sql="UPDATE cars SET color= :color, registration = :registration, brand= :brand, model= :model WHERE id = :id;";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id,'registration'=>$registration,'color'=>$color,'brand'=>$brand,'model'=>$model]);
        return true;
    }


    public function delete($id){
        $sql = "DELETE FROM cars WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;

    }



    public function totalRowCount(){
        $sql="SELECT * FROM cars";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $t_rows=$stmt->rowCount();
        return $t_rows;
    }










}




$ob = new Database();


// $ob->insert('123456','red','ford','fiesta');

// print_r($ob->totalRowCount());


?>