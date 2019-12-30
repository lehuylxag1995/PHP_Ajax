<?php 
require_once "../php/DB.php";
class User extends DB
{
    public $connectdb=null;
    function __construct()
    {
        if( empty($this->connectdb) )
        {
            $this->connectdb=new DB();
        }
    }
    function addUser()
    {
        if( isset($_POST['UserName']) && isset($_POST['UserEmail']) ){
            $N=$_POST['UserName'];
            $E=$_POST['UserEmail'];
            $sql=$this->connectdb->conn->prepare("INSERT INTO sinhvien VALUES (null,:name,:email)");
            $sql->bindParam(":name",$N);
            $sql->bindParam(":email",$E);
            $sql->execute();
            $last_id=$this->connectdb->conn->lastInsertId();
            echo json_encode($last_id);
        }
    }

    function LoadList()
    {
        $i=1;
        $sql=$this->connectdb->conn->prepare("SELECT * FROM sinhvien");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sql->fetchAll();
        $table='<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
        foreach ($result as $key => $value) 
        {
            $table.='
                <tr>
                    <td>'.$value['ID'].'</td>
                    <td>'.$value['Name'].'</td>
                    <td>'.$value['Email'].'</td>
                    <td><button class="btn btn-success" id="btn_user_edit" data-id="'.$value['ID'].'" data-toggle="modal" data-target="#Edit"><i class="fas fa-user-edit"></i></button></td>
                    <td><button class="btn btn-danger" id="btn_user_delete" data-id="'.$value['ID'].'"><i class="fas fa-user-times"></i></button></td>
                </tr>';
            $i++;
        }
       
        $table.="
                    </tbody>
                </table> ";
      
        echo json_encode([
            "status"=>"success",
            "value"=>$table
        ]);
    }

    function removeUser()
    {
        if( isset($_POST['ID']) )
        {
            $id=$_POST['ID'];
            $sql=$this->connectdb->conn->prepare("DELETE FROM sinhvien WHERE ID=:ID");
            $sql->bindParam(":ID",$id);
            $result=$sql->execute();
            echo json_encode($result);
        }
    }

    function getInfoUser()
    {
        if( isset($_POST['ID']) )
        {
            $id=$_POST['ID'];
            $sql=$this->connectdb->conn->prepare("SELECT * FROM sinhvien WHERE ID=:id");
            $sql->bindParam(":id",$id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            echo json_encode([
                "status"=>"success",
                "value"=>$sql->fetchAll()
            ]);
        }
    }

    function editUser()
    {
        if( isset( $_POST['ID'] ) )
        {
            $id= $_POST['ID'];
            $sql=$this->connectdb->conn->prepare("UPDATE sinhvien SET Name=:name,Email=:email WHERE ID=:id");
            $sql->bindParam(":name",$_POST['Name']);
            $sql->bindParam(":email",$_POST['Email']);
            $sql->bindParam(":id",$id);
            $sql->execute();
            echo json_encode($sql->rowCount());
        }
    }

}
?>

