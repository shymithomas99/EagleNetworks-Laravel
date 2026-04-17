<?php

namespace App\Traits;

use App\Enums\WebsiteFilesFor;
use App\Enums\WebsiteFilesType;
use App\Models\Websitefile;
use Illuminate\Support\Facades\File;

trait WebsitefileTrait
{
    public function saveFile($files = [], $filetype = WebsiteFilesType::IMAGE->value, $filesfor = WebsiteFilesFor::MAIN->value, $referenceId = null, $fileId = null, $linksrc = null, $status = 'CREATE', $belongsTo = null)
    {
        if (!empty($belongsTo) || $belongsTo != null) {
            if (isset($files) && count($files) > 0) {
                if ($status == 'CREATE') {
                    $this->createImage($filesfor, $referenceId, $files, $filetype, $belongsTo);
                } else if ($status == 'UPDATE') {
                    $this->updateImage($filesfor, $files, $fileId, $referenceId, $belongsTo);
                } else if ($status == 'DELETE') {
                    $this->deleteFIle($fileId);
                }
            }
        }
    }

    function createImage($filesfor, $referenceId, $files, $filetype, $belongsTo)
    {
        $path = 'backend_assets/images/' . $referenceId . '/' . $filesfor . '/';
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName(); // Use original filename
            Websitefile::create([
                'reference_id' => $referenceId,
                'filename' => $fileName,
                'filetype' => $filetype,
                'filextension' => $file->getClientOriginalExtension(),
                'filesrc' => $path . $fileName,
                'filesfor' => $filesfor,
                'belongsTo' => $belongsTo,
            ]);
            $file->move(public_path($path), $fileName);
        }
    }

    function updateImage($filesfor, $files, $fileId, $referenceId, $belongsTo)
    {
        $path = 'backend_assets/images/' . $referenceId . '/' . $filesfor . '/';
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            Websitefile::where([
                'id' => $fileId
            ])->update([
                'filename' => $fileName,
                'filextension' => $file->getClientOriginalExtension(),
                'filesrc' => $path . $fileName,
                'belongsTo' => $belongsTo,
            ]);
            $file->move(public_path($path), $fileName);
        }
    }

    function deleteFIle($fileId)
    {
        $WebsiteFiles = Websitefile::where('id', $fileId)->get();
        foreach ($WebsiteFiles as $WebsiteFile) {
            $fileToDelete = public_path($WebsiteFile->filesrc);
            if (File::exists($fileToDelete)) {
                File::delete($fileToDelete);
            }
            $WebsiteFile->delete();
        }
    }

    /**
     * Call this in the model to automatically delete related files on model deletion
     */
    public static function bootWebsitefileTrait()
    {
        static::deleting(function ($model) {
            if (method_exists($model, 'websitefiles')) {
                foreach ($model->websitefiles as $file) {
                    if (method_exists($model, 'deleteFIle')) {
                        $model->deleteFIle($file->id);
                    }
                }
            }
        });
    }
}