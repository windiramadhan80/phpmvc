<?php

class Home extends Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
