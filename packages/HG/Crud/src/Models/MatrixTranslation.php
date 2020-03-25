<?php


namespace HG\Crud\src\Models;

use \HG\Crud\src\Contracts\MatrixTranslation as MatrixTranslationContract;
use Illuminate\Database\Eloquent\Model;

class MatrixTranslation extends Model implements MatrixTranslationContract
{
    public $timestamps = false;

    protected $fillable = ['name', 'locale_id'];
}