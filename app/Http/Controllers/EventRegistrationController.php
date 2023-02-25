<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //

    }

    public function getEventRegistrations($id)
    {
          /**Check if event exist */
          $event = DB::table('events')
          ->where('id', '=', $id)
          ->get();
          
        /**Check if parent data is exist */
        if(!$event){
            return $this->error('', 'Record not found', 404);
        }


        $event_registrations = DB::table('event_registrations')->where('event_id', '=',$id)->get();
              
        return $this->success(["event_registrations" =>  $event_registrations], "", 200);

    }

    public function getUserEvent()
    {         
        /** Get user*/    
        $user = auth()->user();

        $event_registrations = DB::table('event_registrations')->where('user_id', '=',$user->id)->get();
              
        return $this->success(["user_events" =>  $event_registrations], "", 200);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          /**Check if event exist */
          $event = DB::table('events')
          ->where('id', '=', $id)
          ->get();
          
        /**Check if parent data is exist */
        if(!$event){
            return $this->error('', 'Record not found', 404);
        }
        
          /** Get user*/    
          $user = auth()->user();
  
          /**Check if admin[ADD LATER] */
         
  
          /**Insert data */
          $id =  DB::table('event_registrations')->insertGetId([
              'user_id' =>  $user->id,
              'event_id'=>$request->event_id,
              'created_at'=>now(),
          ]);
  
          /**Get last inserted data */
  
          if($id!=0){
              $event = DB::table('events')->where('id', '=',$id)->get();
              
              return $this->success(["event" =>  $event], "", 200);
          }
  
          return $this->error('', 'Record not found', 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required|string',
        ]);

        /**Check if admin[ADD LATER] */
       
        if($id!=0){
            
            /**Update data */
            $id =  DB::table('event_registrations')
            ->where('id', $id)
            ->update([
                    'status' => $request->status,
            ]);

            $event_registration = DB::table('event_registrations')->where('id', '=',$id)->get();
            
            return $this->success(["event_registration" =>  $event_registration[0]], "", 200);
        }

        return $this->error('', 'Record not found', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id!=0){
            
            /**Update data */
            $id =  DB::table('event_registrations')
            ->where('id', $id)
            ->delete();
                   
            return $this->success("", "Deleted successfully", 200);
        }

        return $this->error('', 'Record not found', 404);
    }
}
