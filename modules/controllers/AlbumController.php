<?php

use \modules\controllers\MainController;

class AlbumController extends MainController
{
    public function index()
    {

        $this->model('album');
        $data = $this->album->get();
        $this->template('album', array('album' => $data));
    }
}
