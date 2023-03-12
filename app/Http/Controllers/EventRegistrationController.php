<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;    
use App\Models\Event;
use App\Mail\EventNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;
use App\Mail\EventRegistration;
use App\Mail\ApprovedRegistration;
use App\Mail\DeniedRegistration;


class EventRegistrationController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //

    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEventRegistrations($id)
    {     
        
        
          /**Check if event exist */
         $event= DB::table('events')
          ->where('id', $id)
          ->get();
          
        /**Check if parent data is exist */
        if(!$event){
            return $this->error('', 'Record not found', 404);
        }

        $event_registrations = DB::table('event_registrations as er')
        ->select(
          'er.id', 
          'er.created_at',
          'er.status',
          'u.fullname',
          'u.role',
          'u.section',
          'u.id as user_id'
          )
        ->join('users as u', 'u.id', '=', 'er.user_id')
        ->orderBy('er.created_at', 'desc')
        ->where('er.event_id', '=', $id)
        ->get();
              
        return $this->success(["event_registrations" =>  $event_registrations], "", 200);

    }

    public function getUngisteredStudents($id)
    {     
        
        $event_registrations = DB::table('event_registrations as er')
        ->select(
          'u.id',
          'u.fullname',
          'er.status',
          )
        ->join('users as u', 'u.id', '=', 'er.user_id')
        ->orderBy('er.created_at', 'desc')
        ->where('er.event_id', '=', $id)
        ->get();
       
        $ids = array();
        foreach($event_registrations as $key=>$value) {
            array_push($ids ,  $value->id);
          }
              

          $students=DB::table('users')->select(
            'users.*'
          )
          ->where('users.role', '=', 'student')
          ->whereNotIn('users.id', $ids)
          ->get();

        return $this->success(["students" => $students], "", 200);

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
          ->where('id', '=', $request->event_id)
          ->get();
          
        /**Check if parent data is exist */
        if(!$event){
            return $this->error('', 'Record not found', 404);
        }
        
          /** Get user*/    
          $user = auth()->user();

           /**Check user already registered */
           $event_registration = DB::table('event_registrations')
           ->where('user_id', '=', $user->id)
           ->where('event_id', '=', $request->event_id)
           ->count();
    
         /**Check if parent data is exist */
         if($event_registration>0){
             return $this->error('', 'User already regsitered', 404);
         }
         
  
          /**Check if admin[ADD LATER] */
         
          /**Insert data */
          $insert_id =  DB::table('event_registrations')->insertGetId([
              'user_id' =>  $user->id,
              'event_id'=>$request->event_id,
              'created_at'=>now(),
          ]);
  
          /**Get last inserted data */
  
          if($insert_id!=0){
            $event_registration_data  = DB::table('event_registrations as er')
            ->select(
              'er.id', 
              'er.created_at',
              'er.status',
              'u.fullname',
              'u.role',
              'u.section'
              )
            ->join('users as u', 'u.id', '=', 'er.user_id')
            ->orderBy('er.created_at', 'desc')
            ->where('er.id', '=', $insert_id)
            ->get();

            Mail::to($user->email)
            ->send(new EventRegistration($user->fullname,$event[0]->title));

              return $this->success(["event_registration" =>  $event_registration_data[0]], "", 200);
          }
  
          return $this->error('', 'Record not found', 404);
    }

    public function registerStudents(Request $request)
    {
          /**Check if event exist */
          $event = DB::table('events')
          ->where('id', '=', $request->event_id)
          ->get();
          
        /**Check if parent data is exist */
        if(!$event){
            return $this->error('', 'Record not found', 404);
        }
        
           

           /**Check user already registered */
           $event_registration = DB::table('event_registrations')
           ->where('user_id', '=', $request->user_id)
           ->where('event_id', '=', $request->event_id)
           ->count();
    
         /**Check if parent data is exist */
         if($event_registration>0){
             return $this->error('', 'User already regsitered', 404);
         }
         
  
          /**Check if admin[ADD LATER] */
         
          /**Insert data */
          $insert_id =  DB::table('event_registrations')->insertGetId([
              'user_id' =>  $request->user_id,
              'event_id'=>$request->event_id,
              'created_at'=>now(),
          ]);
  
          /**Get last inserted data */
  
          if($insert_id!=0){
            $event_registration_data  = DB::table('event_registrations as er')
            ->select(
              'er.id', 
              'er.created_at',
              'er.status',
              'u.fullname',
              'u.role',
              'u.section'
              )
            ->join('users as u', 'u.id', '=', 'er.user_id')
            ->orderBy('er.created_at', 'desc')
            ->where('er.id', '=', $insert_id)
            ->get();

            $user  = DB::table('users')
            ->where('id', '=', $request->user_id)
            ->get();
              

            Mail::to($user[0]->email)
            ->send(new EventRegistration($user[0]->fullname,$event[0]->title));
              
            return $this->success(["event_registration" =>  $event_registration_data[0]], "", 200);
          }
  
          return $this->error('', 'Record not found', 404);
    }


      /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail()
    {
      Mail::to("duatin08@gmail.com")
      ->bcc(["mercado.jerrymih@clsu2.edu.ph","mercado.jerrymih1414@gmail.com","yamaguchixia1406@gmail.com","fjlopez259@gmail.com","lopez.fernando@clsu2.edu.ph"])
      ->send(new EventNotification("jocel"));
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
        $idHolder=$id;

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

            $event_registration = DB::table('event_registrations')->where('id', '=',$idHolder)->get();

            $registration = DB::table('event_registrations as er')
            ->select(
              'u.id as user_id',
              'u.fullname as fullname',
              'u.email as email',
              'er.status as status',
              'e.title as event_title',
              )
            ->join('users as u', 'u.id', '=', 'er.user_id')
            ->join('events as e', 'er.event_id', '=', 'e.id')
            ->where('er.id', '=', $idHolder)
            ->get();

            // return $this->success(["event_registration" =>  $registration], "", 200);


            if($registration[0]->status=="approve"){
              Mail::to($registration[0]->email)
              ->send(new ApprovedRegistration($registration[0]->fullname,$registration[0]->event_title));
            }else if($registration[0]->status=="denied"){
              Mail::to($registration[0]->email)
              ->send(new DeniedRegistration($registration[0]->fullname,$registration[0]->event_title));
            }
            
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
