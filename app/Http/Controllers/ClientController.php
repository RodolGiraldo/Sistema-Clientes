<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Requests\SearchClientRequest;
use DB;


class ClientController extends Controller
{
    //Funcion para mostrar la informacion de los clientes
    //Se envia tambien la informacion de la tabla documentos para mostrar el nombre del documento en vez del Id
    //Retorno una vista.
    public function index()
    {
        
        return view('clients.index',[
            'clients' => DB::select('select * from SeenData()'),
            'documents' => DB::select('select * from seendatadocument()')
        ]);
    }

    /*
    Funcion para mostrar la vista de crear.

    Retorna una vista a la cual se le envia enformacion de la tabla documents_type para realizar
    la lista desplegable
    */
    public function create()
    {
        return view('clients.create',[
            'documents' => DB::select('select * from seendatadocument()')
        ]);
    }

    /* 
    Funcion para buscar un cliente por el idnumber

    @param App\Http\Requests\SearchClientRequest;
    @return view

    funcion retornar la misma vista de index pero con solo la informacion de un cliente y tambien la informacion 
    de la tabla document_types    
    */
    public function searchbyidnumber(SearchClientRequest $request){

        $number = $request->get("idnumber");
        

        return view('clients.index',[
            'clients' => DB::select("select * from searchdataforidnumber('$number')"),
            'documents' => DB::select('select * from seendatadocument()')
        ]);
        
    }

    /*
    Funcion para guardar en la base de datos un cliente nuevo 

    @param App\Http\Requests\ClientRequest;  
    @return redirect 

    Creamos una instancia del modelo de Client y guardamos los datos que se ingresaron en el formulario
    se agrega la informacion a la base de datos a travez del formulario y retornamos a la ruta /clients
    */
    public function store(ClientRequest $request)
    {
        $client = new Client();
        
        $client->document_type_id = $request->get("documenttype");
        $client->IdNumber = $request->get("idnumber");
        $client->FirstName = $request->get("firstname");
        $client->LastName = $request->get("lastname");
        $client->Gender = $request->get("gender");
        $client->Address = $request->get("address");
        $client->Email = $request->get("email");
        $client->PhoneNumber = $request->get("phonenumber");

        DB::select("select AddData($client->document_type_id,'$client->IdNumber','$client->FirstName','$client->LastName','$client->Gender','$client->Address','$client->Email','$client->PhoneNumber')");
        return redirect("/clients");
    }

    /*
    Vista para retornar la vista para editar
    @param $id
    @return view

    La funcion retorna una vista, y le envia informacion del cliente que se busca y se envia 
    informacion de la tabla document_types para mostrar las listas desplegables  
    */
    public function edit($id)
    {
        return view('clients/edit',[
            'clients' => DB::select("select * from SearchDataForId('$id')"),
            'documents' => DB::select('select * from seendatadocument()')
        ]);
    }

    /*
    Funcion para actualizar en la base de datos un cliente 

    @param App\Http\Requests\ClientUpdateRequest;  
    @return redirect 

    Creamos una instancia del modelo de Client y guardamos los datos que se ingresaron en el formulario
    se actualiza la informacion a la base de datos a travez de la funcion almacenada y retornamos a la ruta 
    /clients
    
    */
    public function update(ClientUpdateRequest $request, $id)
    {
        $client = new Client();

        $client->Id = $id;
        $client->DocumentType = $request->get("documenttype");
        $client->IdNumber = $request->get("idnumber");
        $client->FirstName = $request->get("firstname");
        $client->LastName = $request->get("lastname");
        $client->Gender = $request->get("gender");
        $client->Address = $request->get("address");
        $client->Email = $request->get("email");
        $client->PhoneNumber = $request->get("phonenumber");

        DB::select("select UpdateData($client->Id,$client->DocumentType,'$client->IdNumber','$client->FirstName','$client->LastName','$client->Gender','$client->Address','$client->Email','$client->PhoneNumber')");
        return redirect("/clients");
    }

    /*
    Funcion para eliminar un cliente
    
    @param $id

    Se ingresa por parametros el id del cliente que queremos eliminar
    llamamos la funcion almacena con el id

    */
    public function destroy($id)
    {
        DB::select("select borrar('$id')");
        return back();
    }
}
