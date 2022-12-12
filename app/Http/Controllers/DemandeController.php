<?php

namespace App\Http\Controllers;

//use App\Models\demande;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewDemandeMail;
use App\Models\Demande;
use App\Models\User;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $demandes= Demande::all();
         return view('demandes.new',compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demandes.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation de la demande
        $request->validate([
            'objet'=>'required|unique:demandes,objet',
            'description'=>'required',
            'user_id'=>'required'
        ]);
        // $demandes= new Demande($request->all());
        $demande = new Demande;
        $demande->objet = $request->objet;
        $demande->description  = $request->description;
        $demande->user_id=$request->user_id;
        // return json_encode(['objet'=>$demande->objet, 'description'=>$demande->description, 'user_id'=>$request->user_id]);
        if($demande->save()){
            $admins = User::where('role','=', 'admin')->get();
            foreach($admins as $admin){
                Mail::to($admin->email)->send(new SendNewDemandeMail($demande, $admin));
            }
        }
        else{
            return 'Ca ne passe pas';
        }
        return redirect()->route('demande.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(demande $demande)
    {
        return view('demandes.show',compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(demande $demande)
    {
        return view('demandes.edit',compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demande $demande)
    {
        $request->valide([
            'nom'=>'required|unique:demande,nom'.$demande->id,
            'description'=>'required'
        ]);
        $demande->updateOrFail($request->all());
        return redirect()->route('demande.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(demande $demande)
    {
        $demande->deleteOrFail();
        return redirect()->route('demande');
    }
}
