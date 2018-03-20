<?php
/**
 * Created by PhpStorm.
 * User: zwerm
 * Date: 20.03.2018
 * Time: 11:18
 */

namespace controller;


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
                    $uploader = new FileUploader(__DIR__ . '/../assets/articleImages/');

                    $uploader->upload($_FILES['Image'], 'image');

                    $Imagename = $_FILES['Image']['name'];

                    $query = new QueryBuilder();

                    $user = unserialize(\services\Sessionmanagement::get('user'))['id'];

                    $query
                        ->insert("product")
                        ->addField("name")
                        ->addField("price")
                        ->addField("image")
                        ->addField("description")
                        ->addField("date")
                        ->addField("userFk")
                        ->addValue("".$data['title']."")
                        ->addValue("".$data['price']."")
                        ->addValue("".$Imagename."")
                        ->addValue("".$data['text']."")
                        ->addValue("".$date."")
                        ->addLastValue("".$user."");


                    $last_id = $query
                        ->select("MAX(id)")
                        ->from("product")
                        ->execute()->fetch();

                    $idCat = $query
                        ->select("id")
                        ->from("categorie")
                        ->Where("name","'".$data['Categories']."'")
                        ->execute()->fetch();

                    $query
                        ->insert("product_categorie")
                        ->addField("categorieFk")
                        ->addField("productFk")
                        ->addValue("".$idCat[0]."")
                        ->addLastValue("".$last_id[0]."");


                }
                header("Location:/BossBay/Homepage");
            }
        }
    }

}