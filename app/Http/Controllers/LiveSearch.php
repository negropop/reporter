<?php

namespace App\Http\Controllers;
use \App\Models\User;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('live_search');
     
    }

    // $data = DB::table('reportes')
    // ->where('thief', 'like', '%'.$query.'%')
    // ->get();


    

    function action(Request $request)
    {
        
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('reportes')
         ->where('thief', 'like', '%'.$query.'%')
         ->orWhere('number', 'like', '%'.$query.'%')
         ->orWhere('facebook', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
      
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        
       }
       $output .= '
        <tr>
        <td>'.$row->thief.'</td>
        <td>'.$total_row.'</td>
        <td>
        <a class="btn btn-warning" href="thief/'.$row->id.'/show">Show Details</a>
        </td>
         
        </tr>
        ';
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
     
    }
    
}


