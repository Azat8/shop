<?php


namespace HG\Crud\src\Models;

use Webkul\Core\Eloquent\TranslatableModel;
use HG\Crud\src\Contracts\Matrix as MatrixContract;

class Matrix extends TranslatableModel implements MatrixContract
{
    protected $table = 'matrix';
    public $translatedAttributes = ['name'];
    protected $fillable = ['image', 'file'];
    protected $with = ['translations'];
}