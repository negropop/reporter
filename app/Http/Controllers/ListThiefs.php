<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListThiefs extends Controller
{
    function index()
    {
     return view('live_search');
    }

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
         ->orWhere('email', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('reportes')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->thief.'</td>
         <td>'.$row->facebook.'</td>
         <td>'.$row->number.'</td>
         <td>
         <a href="/storage/'.$row->screen.'">  <img class="imglist" style="width: 79px;" src="/storage/'.$row->screen.'
         " >
         </a>
         </td>
        </tr>
        ';
       }
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
