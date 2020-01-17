<?php

use \modules\controllers\MainController;

class DetailAlbumController extends MainController
{
    public function index()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : "0";
        $this->model('album');
        $data = $this->album->getWhere(array('id_album' => $id));
        $this->template('detailalbum', array('album' => $data));
    }
}
