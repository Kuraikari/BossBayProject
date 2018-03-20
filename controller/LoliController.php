<?php
/**
 * Created by PhpStorm.
 * User: zwerm
 * Date: 20.03.2018
 * Time: 11:18
 */

namespace controller;

use helper\FileUploader;
use models\User;
use MongoDB\Driver\Query;
use PDO;
use services\Cookiemanagement;
use services\DBConnection;
use services\QueryBuilder;
use services\Sessionmanagement;

class LoliController extends BaseController
{
    public function addLoli()
    {

        if ($this->httpHandler->isPost()) {
            $data = $this->httpHandler->getData();
            $timezone = date_default_timezone_get();
            date_default_timezone_set($timezone);
            $date = date('Y-m-d', time());

            if ($data) {
                if ($_FILES['Image']['name'])
                {
                    $uploader = new FileUploader(__DIR__ . '/../assets/lolis/');
                    $uploader->upload($_FILES['Image'], 'image');
                    $Imagename = $_FILES['Image']['name'];
                    $query = new QueryBuilder();
                    $user = unserialize(\services\Sessionmanagement::get('user'))['id'];
                    $query
                        ->insert("loli")
                        ->addField("firstname")
                        ->addField("lastname")
                        ->addField("age")
                        ->addField("deretype")
                        ->addField("image")
                        ->addField("userFk")
                        ->addValue("".$data['firstname']."")
                        ->addValue("".$data['lastname']."")
                        ->addValue("".$data['age']."")
                        ->addValue("".$data['text']."")
                        ->addValue("".$Imagename."")
                        ->addLastValue("".$user."");

                    $last_id = $query
                        ->select("MAX(id)")
                        ->from("loli")
                        ->execute()->fetch();

                    $idCat = $query
                        ->select("id")
                        ->from("user")
                        ->Where("username","'".$data['User']."'")
                        ->execute()->fetch();

                    $query
                        ->insert("loli_user")
                        ->addField("loli_fk")
                        ->addField("user_fk")
                        ->addValue("".$idCat[0]."")
                        ->addLastValue("".$last_id[0]."");


                }
                header("Location:/BossBay/Loli-Index");
            }
        }
    }

}