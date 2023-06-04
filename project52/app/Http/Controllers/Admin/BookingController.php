<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = DB::select('select* from bookings');
 
        return view('admin.booking', ['datalist' => $datalist]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('bookings')->insert([
            'guest'=>$request->input('guest'),
            'room'=>$request->input('room'),
            'check_in'=>$request->input('check_in'),
            'check_out'=>$request->input('check_out')
        ]);
        return redirect()->route('admin_booking');

    }

    public function add()
    {
        $datalist = DB::select('select* from bookings');
 
        return view('admin.booking_add', ['datalist' => $datalist]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit( Booking $booking, $id)
   {
    $data=Booking::find($id);
        $datalist = DB::select('select* from bookings');
        return view('admin.booking_edit',['data'=>$data,'datalist'=>$datalist]);
    
   }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking,$id)
    {
        $data = Booking::find($id);

        $data->guest = $request->input('guest', $data->guest);
        $data->room = $request->input('room', $data->room);
        $data->check_in = $request->input('check_in', $data->check_in);
        $data->check_out = $request->input('check_out', $data->check_out);

        $data->save();

        return redirect()->route('admin_booking');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
    
        if ($booking) {
            $booking->delete();
        }
    
        return redirect()->route('admin_booking');
    }

}