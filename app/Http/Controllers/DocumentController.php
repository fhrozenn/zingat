<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Response\Document\DocumentsResponse;
use App\Http\Response\DocumentResponse;
use Illuminate\Http\Request;

class DocumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $documents = Document::all();

        return $this->response->ok((new DocumentsResponse($documents))->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $document = new Document();
        $document->title = $request->get('title');
        $document->body = $request->get('body');
        $document->save();

        return $this->response->ok();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $document = Document::query()->findOrFail($id);

        return $this->response->ok((new DocumentResponse($document))->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $document = Document::query()->findOrFail($id);
        $document->title = $request->get('title');
        $document->body = $request->get('body');

        return $this->response->ok((new DocumentResponse($document))->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Document::query()->findOrFail($id)->delete();

        return $this->response->ok();
    }
}
