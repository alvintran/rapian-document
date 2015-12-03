<?php

namespace Nht\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use Nht\Http\Requests;
use Nht\Http\Controllers\Frontend\FrontendController;
use Nht\Hocs\Tags\TagRepository;

use mjanssen\BreadcrumbsBundle\Breadcrumbs;

class TagController extends FrontendController
{

    public function __construct(TagRepository $tag)
    {
        $this->tag = $tag;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        Breadcrumbs::addBreadcrumb('Trang chủ', '/');
        Breadcrumbs::addBreadcrumb('Tags', '');
        $crumb = Breadcrumbs::generate();
        $allTags = $this->tag->getTopTagByRelaysionship(99999, 99999);
        return view('frontend.tag', compact('allTags', 'crumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
