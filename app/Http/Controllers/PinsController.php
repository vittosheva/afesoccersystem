<?php

namespace MiTutorialDigital\Http\Controllers;

use Illuminate\Http\Request;

use MiTutorialDigital\Http\Requests;
use MiTutorialDigital\Http\Controllers\Controller;

use MiTutorialDigital\Pin;
use MiTutorialDigital\Http\Requests\PinRequest;
use MiTutorialDigital\Http\Requests\SearchPinRequest;

use Session;
use Illuminate\Support\Facades\Input;

class PinsController extends Controller
{

    protected $paginateCount = 10;

    public function index()
    {
        $pin = new Pin();
        $pins = $pin->paginate($this->paginateCount);

        return view('back.pins.index', compact('pins'))->with([
            'title'     => 'Listado de pines',
            'keywords'  => 'pins, mi tutorial digital, tutorias digitales'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pin = new Pin();
        $id = $pin->orderBy('created_at', 'desc')->first();
        $next = $id->id + 1;

        return view('back.pins.create', compact('next'))->with([
            'title'     => 'Crear pin',
            'keywords'  => 'pins, mi tutorial digital, tutorias digitales'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PinRequest  $request
     * @return Response
     */
    public function store(PinRequest $request)
    {
        $input = $request->all();
        Pin::create($input);
        Session::flash('messages', 'PIN creado exitosamente!');

        return redirect()->back()->with([
            'flash_messages' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  SearchPinRequest  $request
     * @return Response
     */
    public function show(SearchPinRequest $request)
    {
        $pin = $request->get('pin');

        $pinModel = new Pin();
        $pins = $pinModel->where('pin', 'LIKE', '%'.$pin.'%')->paginate($this->paginateCount);

        return view('back.pins.index', compact('pins'))->with([
            'title'     => 'Buscar pin',
            'keywords'  => 'pins, mi tutorial digital, tutorias digitales'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('back.pins.edit');

        /*$pin = new Pin();
        $pins = $pin->find($id);
        return response()->json(
            $pins->toArray()
        );*/
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
        Pin::where('id', '=', $id)->delete();

        /*return response()->json([
            "messages" => "PIN eliminado correctamente!"
        ]);*/

        return redirect()->back();
    }

    /**
     * Defining A Catch-All Method.
     *
     * @param  array  $parameters
     * @return void
     */
    public function missingMethod($parameters = array())
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getListings()
    {
        $pin = new Pin();
        $pins = $pin->all();
        return response()->json(
            $pins->toArray()
        );
    }

}
