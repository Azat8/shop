<?php

namespace HG\Crud\Http\Controllers;

use App\Http\Controllers\Controller;
use HG\Crud\src\Models\Matrix;
use HG\Crud\src\Models\MatrixTranslation;
use HG\Crud\src\Repositories\MatrixRepository;
use Illuminate\Http\Request;
use Webkul\Category\Models\CategoryTranslation;

class MatrixController extends Controller
{
    protected $_config;
    protected $matrixRepository;

    public function __construct(MatrixRepository $matrixRepository)
    {
        $this->matrixRepository = $matrixRepository;
        $this->_config = request('_config');
    }

    public function index()
    {
        $matrix = $this->matrixRepository->get();
        return view('crud::matrix.index', compact('matrix'));
    }

    public function create()
    {
        return view('crud::matrix.create');
    }

    public function edit($id)
    {
        $matrix = $this->matrixRepository->findOrFail($id);

        return view($this->_config['view'], compact('matrix'));
    }

    public function update($id)
    {
        $locale = request()->get('locale') ?: app()->getLocale();

        $this->validate(request(), [
            $locale . '.name' => 'required',
            'image.*' => 'mimes:jpeg,jpg,bmp,png|max:1000'
        ]);

        $this->matrixRepository->update(request()->all(), $id);

        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Matrix']));

        return redirect()->route($this->_config['redirect']);
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'image.*' => 'mimes:jpeg,jpg,bmp,png',
            'file.*' => 'mimes:pdf,x-pdf',
        ]);

        $this->matrixRepository->create(request()->all());

        session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Matrix']));

        return redirect()->route($this->_config['redirect']);
    }
}