<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;    
use App\Models\Event;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEventRequest;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**Check if event exist */
        $event = DB::table('events')
        ->get();

        return $this->success(["event_registrations" =>  $events], "", 200);

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
     * @param  \Illuminate\Http\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        /**Validate Request */
        $request->validated();
      
        /** Get user*/    
        $user = auth()->user();

        /**Check if admin[ADD LATER] */
       

        /**Insert data */
        $id =  DB::table('events')->insertGetId([
            'title' =>  $request->title,
            'description'=>$request->description,
            'posted_by'=>$user->id,
            'date_modified'=>now(),
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
        if($id!=0){
            $event = DB::table('events')->where('id', '=',$id)->get();
            
            return $this->success(["event" =>  $event], "", 200);
        }

        return $this->error('', 'Record not found', 404);
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
    public function update(Request $request, $id)
    {

    
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        // return $this->success(["event" =>  $data], "", 200);
    
        /**Check if admin[ADD LATER] */
       
        if($id!=0){
            
            /**Update data */
            $id =  DB::table('events')
            ->where('id', $id)
            ->update([
                    'title' => $request->title  ,
                    'description'=>$request->description,
                    'is_canceled'=>$request->is_canceled,
                    'date_modified'=>now(),
            ]);

            $event = DB::table('events')->where('id', '=',$id)->get();
            
            return $this->success(["event" =>  $event[0]], "", 200);
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
            $id =  DB::table('events')
            ->where('id', $id)
            ->delete();
                   
            return $this->success([], "Deleted successfully", 200);
        }

        return $this->error('', 'Record not found', 404);
    }
}
