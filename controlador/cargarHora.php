<?php 

    include('../include/modulos.php');
    
     $codbrz=$_POST['brz'];
     $lugar=$_POST['lugar'];
     $salEnt=$_POST['es'];
     $codVeh=$_POST['placa'];

     


     if (!empty($codbrz)) {
        $consulta = pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
                            dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
                            ch.idcod as brz, hora_entrada as he, hora_salida as hs, dp.iddepa as depa
                            from familiares fm
                            inner join departamentos dp on dp.iddepa=fm.departamento
                            inner join torres tr on dp.torre=tr.idtor
                            inner join codigos_huesped ch on fm.idfami=ch.idfam and ch.estatus=1
                            inner join hora_real hr on hr.codbra = ch.idcod
                            where ch.codigo='$codbrz'");

        $resul= pg_fetch_array($consulta);
        
        $depa=$resul['depa'];
        $idfam=$resul['idfami'];
        $braz=$resul['brz'];

        $exist= pg_query("SELECT hora_entrada, hora_salida from hora_real where codbra=$braz");

        $data=pg_fetch_array($exist);
        $hora_e=$data['hora_entrada'];
        $hora_s=$data['hora_salida'];

       
        if ($salEnt==1) {
            
            //echo "entrada";
           if (!empty($hora_e)) {

                $horae=date('H:i:s');

                $insertPer=pg_query("INSERT INTO hora(
                             hora_entrada,hora_salida, departamentos, codbra, idfam, lugar)
                            VALUES ('$horae','00:00', $depa, $braz, $idfam, $lugar);");

               
                //se comento este procesos para mostrar loshuesped afuera
                //pg_query("UPDATE codigos_huesped set estatus=1 where idfam=$idfam" );

                $modiPer=pg_query("UPDATE hora_real
                                SET hora_entrada='$horae', hora_salida='00:00', lugar=$lugar
                                WHERE idfam=$idfam;");


            }else{

                $horae=date('H:i:s');


                $inserte=pg_query("INSERT INTO hora(
                             hora_entrada, hora_salida, departamentos, codbra, idfam, lugar)
                            VALUES ('$hora_e', '00:00', $depa, $braz, $idfam, $lugar);");

                $insertaree=pg_query("INSERT INTO hora_real(
                        hora_entrada, hora_salida, departamentos, codbra, idfam, lugar)
                        VALUES ('$hora_e','00:00', $depa, $braz, $idfam, $lugar);");
            }
        }else{
        


        
            if (!empty($hora_s)) {
                $horas=date('H:i:s');

                $inserts = pg_query("INSERT INTO hora(
                                  hora_salida, hora_entrada,  departamentos, codbra, idfam, lugar)
                                VALUES ('$horas','00:00', $depa, $braz, $idfam, $lugar);");

                //se comento este procesos para mostrar loshuesped afuera               
                //pg_query("UPDATE codigos_huesped set estatus=0 where idfam=$idfam" );

                $modis=pg_query("UPDATE hora_real
                                SET hora_salida='$horas', hora_entrada='00:00', lugar=$lugar
                                WHERE idfam=$idfam;");
                
            }else{
                $horas=date('H:i:s');


                $insertse = pg_query("INSERT INTO hora(
                                  hora_salida, hora_entrada, departamentos, codbra, idfam, lugar)
                                VALUES ('$horas', '00:00', $depa, $braz, $idfam, $lugar);");

                pg_query("UPDATE codigos_huesped set estatus=0 where idfam=$idfam" );

                $modise=pg_query("UPDATE hora_real
                                SET hora_salida='$horas', hora_entrada='00:00', lugar=$lugar
                                WHERE idfam=$idfam;");
            }
        }
    }

    if (!empty($codVeh)) {
        
        $consulVh=pg_query("SELECT  dp.iddepa as depa, vh.placa, vh.idcar
                            from departamentos dp 
                            left join vehiculo vh on vh.iddepa=dp.iddepa
                            where vh.placa = '$codVeh'");

        $resulvh= pg_fetch_array($consulVh);
        
        $depa=$resulvh['depa'];
        $idcar=$resulvh['idcar'];

        $existvh= pg_query("SELECT hora_entrada, hora_salida from hora_realVh where idcar=$idcar");

        $datavh=pg_fetch_array($existvh);
        $hora_evh=$datavh['hora_entrada'];
        $hora_svh=$datavh['hora_salida'];

        
        if ($salEnt==1) {
            
            
            if (!empty($hora_evh)) {

                $horaevh=date('H:i:s');

                $insertvh=pg_query("INSERT INTO horavh(
                             hora_entrada, departamentos, placa, idcar, lugar)
                            VALUES ('$horaevh',$depa,'$codVeh',$idcar, 1);");


                $modibh=pg_query("UPDATE hora_realvh
                                SET hora_entrada='$horaevh', hora_salida='00:00'
                                WHERE idcar=$idcar;");
            }else{

                $insert=pg_query("INSERT INTO horavh(
                             hora_entrada, departamentos, placa, idcar, lugar)
                            VALUES ('$hora_evh',$depa,'$codVeh',$idfam,1);");

                $insertar=pg_query("INSERT INTO hora_realvh(
                        hora_entrada, departamentos, placa, idfam, lugar)
                        VALUES ('$hora_evh',$depa,'$codVeh',$idcar, 1);");
            }
        }else{
        
            $horasvh=date('H:i:s');

        
            if (!empty($hora_svh)) {
                $insertvh = pg_query("INSERT INTO horavh(
                                  hora_salida,  departamentos, placa, idcar,lugar)
                                VALUES ('$horasvh',$depa,'$codVeh',$idcar,1);");

                

                $modivh=pg_query("UPDATE hora_realvh
                                SET hora_salida='$horasvh', hora_entrada='00:00'
                                WHERE idcar=$idcar;");
                
            }else{
                 $insertvh = pg_query("INSERT INTO horavh(
                                  hora_salida,  departamentos, placa, idcar,lugar)
                                VALUES ('$horasvh',$depa,'$codVeh',$idcar,1);");

                

                $modivh=pg_query("UPDATE hora_realvh
                                SET hora_salida='$horasvh', hora_entrada='00:00'
                                WHERE idcar=$idcar;");
            }
        }
    }
    


    

    header('Location: ../vista/inicioConsul.php?cod=1');
    

 ?>