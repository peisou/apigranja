<?php

namespace App\Http\Traits;
use Mail;
use CalendarioEvento;
trait HelperTrait{

    public function sendMail($view,$info,$fromEmail,$toEmail,$subject){
    	Mail::send($view,$info,function($msj) use ($fromEmail,$toEmail,$subject){
    		$msj->from($fromEmail);
    		$msj->to($toEmail);
    		$msj->subject($subject);
    	});
    }
    public function bloquearFecha($title,$start,$back){
    	 //Valores recibidos via ajax
        

        //Insertando evento a base de datos
        $evento=new CalendarioEvento;
        $evento->fechaIni=$start;
        //$evento->fechaFin=$end;
        $evento->todoeldia=true;
        $evento->color=$back;
        $evento->titulo=$title;

        $evento->save();
   }
    }
}