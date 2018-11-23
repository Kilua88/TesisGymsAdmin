<?php

namespace App\Http\Controllers;


use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function dias() {
            $USER_ID_LOGIN = Auth::user()->id;
            $jasper = new JasperPHP; // instancio objeto
           

            $jasper->compile(base_path() .'/vendor/cossou/jasperphp/examples/cuotas_por_dia.jrxml')->execute();
            $jasper->process(
                base_path() . '/vendor/cossou/jasperphp/examples/cuotas_por_dia.jasper',
                public_path().'/app/'.$USER_ID_LOGIN.'/cuotas_por_dia',
                array('pdf'),
                array("USER_ID_LOGIN" => $USER_ID_LOGIN),
                array(
                    'driver' => 'postgres',
                'username' => 'postgres',
                'password'=> 'larenga',
                'host' => '127.0.0.1',
                'database' => 'prueba',
                'port' => '5432',) 
            )->execute();
            return redirect('app/'.$USER_ID_LOGIN.'/cuotas_por_dia.pdf');
    }

    public function semanas() {
        $USER_ID_LOGIN = Auth::user()->id;
            $jasper = new JasperPHP; // instancio objeto
        $jasper->compile(base_path() .'/vendor/cossou/jasperphp/examples/cuotas.jrxml')->execute();
        $jasper->process(
            base_path() . '/vendor/cossou/jasperphp/examples/cuotas.jasper',
            public_path().'/app/'.$USER_ID_LOGIN.'/cuotas_por_semana',
            array('pdf'),
            array("USER_ID_LOGIN" => $USER_ID_LOGIN),
            array(
                'driver' => 'postgres',
            'username' => 'postgres',
            'password'=> 'larenga',
            'host' => '127.0.0.1',
            'database' => 'prueba',
            'port' => '5432',) 
        )->execute();
        return redirect('app/'.$USER_ID_LOGIN.'/cuotas_por_semana.pdf');
    }

    public function meses() {
        $USER_ID_LOGIN = Auth::user()->id;
            $jasper = new JasperPHP; // instancio objeto
        $jasper->compile(base_path() .'/vendor/cossou/jasperphp/examples/cuotas_por_mes.jrxml')->execute();
        $jasper->process(
            base_path() . '/vendor/cossou/jasperphp/examples/cuotas_por_mes.jasper',
            public_path().'/app/'.$USER_ID_LOGIN.'/cuotas_por_mes',
            array('pdf'),
            array("USER_ID_LOGIN" => $USER_ID_LOGIN),
            array(
                'driver' => 'postgres',
                'username' => 'postgres',
                'password'=> 'larenga',
                'host' => '127.0.0.1',
                'database' => 'prueba',
                'port' => '5432',) 
        )->execute();
        return redirect('app/'.$USER_ID_LOGIN.'/cuotas_por_mes.pdf');
    }

    public function asistencias() {
        $USER_ID_LOGIN = Auth::user()->id;
            $jasper = new JasperPHP; // instancio objeto
        $jasper->compile(base_path() .'/vendor/cossou/jasperphp/examples/asistencia_hoy.jrxml')->execute();
        $jasper->process(
            base_path() . '/vendor/cossou/jasperphp/examples/asistencia_hoy.jasper',
            public_path().'/app/'.$USER_ID_LOGIN.'/asistencia_hoy',
            array('pdf'),
            array("USER_ID_LOGIN" => $USER_ID_LOGIN),
            array(
                'driver' => 'postgres',
            'username' => 'postgres',
            'password'=> 'larenga',
            'host' => '127.0.0.1',
            'database' => 'prueba',
            'port' => '5432',) 
        )->execute();
        return redirect('app/'.$USER_ID_LOGIN.'/asistencia_hoy.pdf');
    }
}
