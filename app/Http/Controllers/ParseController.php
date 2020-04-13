<?php
namespace App\Http\Controllers;
use DB;
class ParseController extends Controller
{
    public function parse()
    {
        //Doc file has been taken from public folder
        $myfile = fopen("data.docx", "r") or die("Unable to open file!");
        $data = fread($myfile,filesize("data.docx"));
        $dataArr =explode('.', $data);
        echo "<pre>";
        
       foreach($dataArr as $d)
        DB::table('parsed_data')->insert(['parsed_vale'=>$d]);
        fclose($myfile);
        echo "Data inserted successfully after parsing";
        
    }
}