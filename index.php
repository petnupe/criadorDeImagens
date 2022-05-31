<?php
require_once('./canvas.php');

define('_DIR_BASE_', './input/');

class GeraImagensAndroid
{
    private $Canvas;

    public function __construct()
    {
        $this->Canvas = new canvas();
        $od = opendir(_DIR_BASE_);

        while ($file = readdir($od)) {

            if (substr($file, 0, 1) != '.') {
                $file = _DIR_BASE_ . $file;
                $dimensoes = getimagesize($file);
                echo "$file whidth {$dimensoes[0]} height {$dimensoes[0]}";
                echo PHP_EOL . PHP_EOL;
                $this->geraImagemFinal($file, $dimensoes[0], $dimensoes[1]);
            }
        }
    }

    public function geraImagemFinal($nome = null, $largura = null, $altura = null)
    {
        $this->Canvas->carrega('./base.png');
        $this->Canvas->redimensiona($largura, $altura);
        $this->Canvas->grava(str_replace('input', 'output', $nome));
    }
}

new GeraImagensAndroid();
