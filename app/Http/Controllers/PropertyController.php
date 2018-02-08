<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::get();
        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'code' => 'required|unique:properties|max:20',
            'type' => [
                'required',
                'regex:/^[ac]$/'
            ],

            'address_cep' => 'nullable|string|max:10',
            'address_street' => 'nullable|string|max:50',
            'address_number' => 'nullable|string|max:5',
            'address_neighbour' => 'nullable|string|max:20',
            'address_complements' => 'nullable|string|max:10',
            'address_city' => 'nullable|string|max:30',
            'address_state' => 'nullable|string|max:20',

            'price' => [
                'nullable',
                'regex:/^\d{1,9}(\,\d{2})?$/'
            ],
            'area' => [
                'nullable',
                'regex:/^\d{1,9}(\,\d{2})?$/'
            ],
            'number_bedrooms' => 'nullable|numeric|between:0,9',
            'number_suite' => 'nullable|numeric|between:0,9',
            'number_bathrooms' => 'nullable|numeric|between:0,9',
            'number_rooms' => 'nullable|numeric|between:0,9',
            'number_parking_places' => 'nullable|numeric|between:0,9',

            'description' => 'nullable|string|max:300',
        ]);

        $property = new Property;
        $property->fill($request->all());
        $property->save();

        return redirect()->route('properties.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|max:100',
            'code' => [
                'required',
                Rule::unique('properties')->ignore($property->id),
                'max:20'
            ],
            'type' => [
                'required',
                'regex:/^[ac]$/'
            ],

            'address_cep' => 'nullable|string|max:10',
            'address_street' => 'nullable|string|max:50',
            'address_number' => 'nullable|string|max:5',
            'address_neighbour' => 'nullable|string|max:20',
            'address_complements' => 'nullable|string|max:10',
            'address_city' => 'nullable|string|max:30',
            'address_state' => 'nullable|string|max:20',

            'price' => [
                'nullable',
                'regex:/^\d{1,9}(\,\d{2})?$/'
            ],
            'area' => [
                'nullable',
                'regex:/^\d{1,9}(\,\d{2})?$/'
            ],
            'number_bedrooms' => 'nullable|numeric|between:0,9',
            'number_suite' => 'nullable|numeric|between:0,9',
            'number_bathrooms' => 'nullable|numeric|between:0,9',
            'number_rooms' => 'nullable|numeric|between:0,9',
            'number_parking_places' => 'nullable|numeric|between:0,9',

            'description' => 'nullable|string|max:300',
        ]);

        $property->fill($request->all());
        $property->save();

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return back();
    }

    /**
     * Import properties from file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'import' => [
                'required',
                'file',
                'mimetypes:application/xml,text/xml',
                'mimes:xml',
                'max:4096'
            ],
        ]);

        $parsed_xml = simplexml_load_file($request->file('import'));
        
        foreach ($parsed_xml->Imoveis->Imovel as $property_xml) {
            if (is_null(Property::where('code', $property_xml->CodigoImovel->__toString())->first())) {
                $property = new Property;
            
                $property->title = 'Imovel '. $property_xml->CodigoImovel->__toString();
                $property->code = $property_xml->CodigoImovel->__toString();
                $property->type = $property_xml->TipoImovel->__toString() == 'Casa' ? 'c' : 'a';

                $property->address_cep = $property_xml->CEP->__toString();
                $property->address_street = null;
                $property->address_number = $property_xml->Numero->__toString();
                $property->address_neighbour = $property_xml->Bairro->__toString();
                $property->address_complements = $property_xml->Complemento->__toString();
                $property->address_city = $property_xml->Cidade->__toString();
                $property->address_state = $property_xml->UF->__toString();

                $property->price = $property_xml->PrecoVenda->__toString();
                $property->area = $property_xml->AreaTotal->__toString();
                $property->number_bedrooms = $property_xml->QtdDormitorios->__toString();
                $property->number_suite = $property_xml->QtdSuites->__toString();
                $property->number_bathrooms = $property_xml->QtdBanheiros->__toString();
                $property->number_rooms = $property_xml->QtdSalas->__toString();
                $property->number_parking_places = $property_xml->QtdVagas->__toString();
                $property->description = $property_xml->Observacao->__toString();

                $property->save();
            }
        }

        return redirect()->route('properties.index');
    }
}
