<?php
    if(isset($_REQUEST['EquipmentID']) and $_REQUEST['EquipmentID']!=""){
        $row    =   $db->getAllRecords('users','*',' AND id="'.$_REQUEST['EquipmentID'].'"');
    }
     
    if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
        extract($_REQUEST);
        if($username==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=un&amp;EquipmentID='.$_REQUEST['EquipmentID']);
            exit;
        }elseif($useremail==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&amp;EquipmentID='.$_REQUEST['EquipmentID']);
            exit;
        }elseif($userphone==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=up&amp;EquipmentID='.$_REQUEST['EquipmentID']);
            exit;
        }
        $data   =   array(
                        'username'=>$username,
                        'useremail'=>$useremail,
                        'userphone'=>$userphone,
                        );
        $update =   $db->update('users',$data,array('id'=>$editId));
        if($update){
            header('location: browse-users.php?msg=rus');
            exit;
        }else{
            header('location: browse-users.php?msg=rnu');
            exit;
        }
    }
?>