<?php


namespace HG\Crud\src\Repositories;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Webkul\Core\Eloquent\Repository;

class MatrixRepository extends Repository
{
    public function model()
    {
        return 'HG\Crud\src\Models\Matrix';
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        Event::dispatch('catalog.matrix.create.before');

        if (isset($data['locale']) && $data['locale'] == 'all') {
            $model = app()->make($this->model());

            foreach (core()->getAllLocales() as $locale) {
                foreach ($model->translatedAttributes as $attribute) {
                    if (isset($data[$attribute])) {
                        $data[$locale->code][$attribute] = $data[$attribute];
                        $data[$locale->code]['locale'] = $locale->id;
                    }
                }
            }
        }

        $matrix = $this->model->create(Arr::except($data, ['image', 'file']));

        $this->uploadImages($data, $matrix);
        $this->uploadImages($data, $matrix, 'file');


        if (isset($data['attributes'])) {
            $matrix->filterableAttributes()->sync($data['attributes']);
        }

        Event::dispatch('catalog.matrix.create.after', $matrix);

        return $matrix;
    }

    public function update(array $data, $id, $attribute = "id")
    {
        $matrix = $this->find($id);

        Event::dispatch('matrix.update.before', $id);

        $matrix->update(Arr::except($data, ['image', 'file']));
        $this->uploadImages($data, $matrix);
        $this->uploadImages($data, $matrix, 'file');

        if (isset($data['attributes'])) {
            $matrix->filterableAttributes()->sync($data['attributes']);
        }

        Event::dispatch('matrix.update.after', $id);

        return $matrix;
    }

    public function uploadImages($data, $matrix, $type = "image")
    {
        if (isset($data[$type])) {
            $request = request();
            foreach ($data[$type] as $imageId => $image) {
                $file = $type . '.' . $imageId;
                $dir = 'matrix/' . $matrix->id;

                if ($request->hasFile($file)) {
                    if ($matrix->{$type}) {
                        Storage::delete($matrix->{$type});
                    }

                    $matrix->{$type} = $request->file($file)->store($dir);
                    $matrix->save();
                }
            }
        } else {
            if ($matrix->{$type}) {
                Storage::delete($matrix->{$type});
            }

            $matrix->{$type} = null;
            $matrix->save();
        }
    }
}