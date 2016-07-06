<?php

namespace Nht\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use Nht\Http\Requests;
use Nht\Http\Controllers\Controller;
use Nht\Http\Controllers\Frontend\FrontendController;
use Nht\Hocs\Core\Images\Image;

class TestController extends FrontendController
{

    public function __construct(Image $image)
    {
        $this->image = $image;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $existImage = \Storage::exists('11218828_1055543477823000_4926351115721913626_n.jpg');
        if ($existImage) {
            $pathImage = $this->getStoragePath('11218828_1055543477823000_4926351115721913626_n.jpg');
        }

        return view('frontend/upload_test');

        // $makeDir = \Storage::disk('s3')->makeDirectory('store-image');
        // dd($makeDir);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $image = $this->image->getImage($request->file('upload'));
            \Storage::put('store-image/store-img-' . str_random() . '.jpg', (string) $image, 'public');
        }
    }

    protected function getStoragePath($fileName) {
        if (\Storage::getDefaultDriver() == 's3') {
            return \Storage::getDriver()
                    ->getAdapter()
                    ->getClient()
                    ->getObjectUrl('rap-image', $fileName);
        }
        return \URL::to('/');
    }
}
