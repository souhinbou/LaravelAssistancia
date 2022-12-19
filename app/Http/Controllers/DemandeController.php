<?php

namespace App\Http\Controllers;

//use App\Models\demande;

use App\Mail\MailReaction;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewDemandeMail;
use App\Models\Demande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;
use Symfony\Component\ErrorHandler\Debug;

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
        return view('superadmin.super',compact('demandes'));
        //return view('demandes.saisie');

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
            'auteur_id'=>'required'
        ]);
        // $demandes= new Demande($request->all());
        $demande = new Demande;
        $demande->objet = $request->objet;
        $demande->description  = $request->description;
        $demande->auteur_id=$request->auteur_id;
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
        //dd('hh');
        return view('admin.show',compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(demande $demande)
    {
        return view('mail.traiter',compact('demande'));
    }
    public function rejet(Demande $demande){
        return view('mail.rejeter',compact('demande'));
    }
    public function utilisteur(){
        return view('demandes.edit');
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
       //
    }

    public function rejeter(Request $request,Demande $demande){

        $demande->update(['status'=>'Rejetee', 'reponse'=>$request->reponse]);
        $user_demande=$demande->user;
        Mail::to($user_demande)->send( new MailReaction($demande,$user_demande));
        //return view('admin.list',compact('demande'));


    }
    public function traiter(Request $request,Demande $demande){
            $demande->update(['status'=>'Traitee', 'reponse'=>$request->reponse]);
            $user_demande=$demande->user;
            Mail::to($user_demande)->send( new MailReaction($demande,$user_demande));
            return view('admin.list',compact('demande'));
    }

    public function attente_encour(Request $request,Demande $demande){

        if(empty($demande->admin_id)){
           //dd('niania');
            Demande::findOrFail($request->id)->updateOrFail(['status'=>'En_cours','admin_id'=>Auth::user()->id]);
            //return view('admin.list',compact('demande'));
        }

    }
    public function saisie(){
        return view('demandes.saisie');
    }

}
