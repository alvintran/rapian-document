<?php

namespace Nht\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use Nht\Http\Requests;
use Nht\Http\Controllers\Controller;
use Nht\Hocs\Core\Metadata\MetadataTrait;

class FrontendController extends Controller
{
    use MetadataTrait;

	public function __construct()
    {
        // Các biến share view được khai báo ở đây
        $this->getMetadata();
    }
}
