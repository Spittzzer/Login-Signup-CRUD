<?php

require_once '../models/db.php';

$db = new Database();

if(isset($_POST['action']) && $_POST['action']=='view'){
        $output = '';
        $data=$db->read();
        if($db->totalRowCount() > 0){
                $output .= '<table class="table table-striped table-sm table-bordered">


                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Registration</th>
                        <th>Color</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Action</th>
                    </tr>


                </thead>

                <tbody>';

                foreach($data as $row){
                        $output .='<tr class="text-center text-secondary">
                        <td>'.$row['id'].'</td>
                        <td>'.$row['registration'].'</td>
                        <td>'.$row['color'].'</td>
                        <td>'.$row['brand'].'</td>
                        <td>'.$row['model'].'</td>
                        
                        <td>
                            
                            <a href="#" title="Edit" class="text-primary editBtn"  data-toggle="modal" data-target="#editModal" id="'.$row['id'].'"><i
                                    class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                            <a href="#" title="Delete" class="text-danger delBtn"  id="'.$row['id'].'"><i
                                    class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>';
                        

                        
                        
                        
                        
                        

                }

                $output .= '</tbody></table>';


                echo $output;

        }

        else{
                echo '<h3 class="text-center  text-secondary mt-5">:( Database is empty</h3> ';
        }


        // <a href="#" title="View Details" class="text-success" id="'.$row['id'].'"><i /// maybe implmement later
        // class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;


        







}
if(isset($_POST['action']) && $_POST['action'] == "insert"){
        $registration=$_POST['registration'];
        $color= $_POST['color'];
        $brand= $_POST['brand'];
        $model= $_POST['model'];


        $db->insert($registration,$color,$brand,$model);
}


if(isset($_POST['edit_id'])){
        $id=$_POST['edit_id'];
        $row=$db->getCarById($id);
        echo json_encode($row);

        
        
};



if(isset($_POST['action'])&& $_POST['action']== 'update'){
        $id = $_POST['id'];
        $registration = $_POST['registration'];
        $color = $_POST['color'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];



        $db->update($id,$registration,$color,$brand,$model);
}











if(isset($_POST['del_id'])){
        $id = $_POST['del_id'];

        $db->delete($id);
}




















?>