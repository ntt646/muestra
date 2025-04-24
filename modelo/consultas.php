<?php 


include('../modelo/mod_conexion.php');
///////////////////////////////////////////////ADMINISTRADOR///////////////////////////////////////////////
//validacion de usuarios login
if (!empty($usuario) and !empty($passwords)) {
	# code...

$user = pg_query("SELECT usuario,contra,estatus,nombre,idrol from usuarios where usuario ='$usuario'  and contra = '$passwords' ;");
}

//reporde deparmaentos propietarios//////////////////////////////////////////////////////////

///se cambio la query para traer el conteo correcto
$rptPropietarios = pg_query("SELECT distinct dp.iddepa, dp.codigo, dp.nombre as propietario, 
						tr.nombre as torre, gr.nombre,
						dp.estatus,
						(SELECT count(ch.codigo) as brz
						from  codigos_huesped ch 
						where ch.iddepa=dp.iddepa and ch.estatus=1) as brz,
						(SELECT  count(fm.chequeo) as est
						from familiares fm 
						where fm.departamento=dp.iddepa and fm.chequeo=1) as est 
						from departamentos dp 
						inner join torres tr on tr.idtor = dp.torre
						inner join grupo gr on gr.idgr= dp.clasificacion
						
						group by dp.iddepa, tr.nombre, gr.nombre
						order by dp.iddepa asc");

$rptBrazalete = pg_query("SELECT codigo, fecha from codigos where estatus=1;");

$listaHuespe = pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo , fm.edad
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where fm.chequeo=1");

$total_personas = pg_query("SELECT count(*) as cuenta
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where fm.chequeo=1");


////////////////////////////////////////////////////////////////////////////////////////////


if (!empty($codigo)) {
	
$validarEstatus = pg_query("SELECT estatus from departamentos where iddepa=$codigo;");

}

if (!empty($id)) {
	$cargaFamilia = pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo , fm.edad, fm.grupo, fm.invitado
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where dp.iddepa=$id and fm.estatus=1");

	$cargaFamiliaDentro = pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo , fm.edad, fm.grupo, fm.invitado
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where dp.iddepa=$id and fm.chequeo=1");

	$consultaFecha= pg_query("SELECT fecha_fin from fechas where departamento=$id and estatus=1");

	$consulVehiC= pg_query("SELECT vh.idcar, vh.placa,vh.marca, vh.modelo, vh.color,vh.chequeo,vh.grupo
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							where dp.iddepa='$id' and vh.estatus=1");

	$consulBrazaId= pg_query("SELECT * from codigos_huesped where iddepa=$id");

	$consulTrabajadorF=pg_query("SELECT tr.idtrab,tr.nombres, tr.apellidos,
							tr.cedula,tr.departamento,tr.edad, ft.fecha_ingreso as fi, 
							ft.fecha_egreso as ff
							from trabajadores tr
							inner join departamentos dp on dp.iddepa=tr.departamento
							inner join fecha_trabajador ft on ft.cedula=tr.cedula
							where dp.iddepa='$id' and ft.estatus=1 and tr.estatus=1");
}

if (!empty($fam)) {
	$modFamilia = pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo , fm.edad, dp.iddepa
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where fm.idfami=$fam");
}

///////////////////////////////////////////////FIN ADMINISTRADOR//////////////////////////////////////////
///////////////////////////////////////////////METRO//////////////////////////////////////////////////

//listado de huespedes del metro
$rptCacmeca = pg_query("SELECT distinct dp.iddepa, dp.codigo, dp.nombre as propietario, tr.nombre as torre, gr.nombre,
						(SELECT count(ch.codigo) as brz
						from  codigos_huesped ch 
						where ch.iddepa=dp.iddepa and ch.estatus=1) as brz,
						(SELECT  count(fm.chequeo) as est
						from familiares fm 
						where fm.departamento=dp.iddepa and fm.chequeo=1) as est 
						from departamentos dp 
						inner join torres tr on tr.idtor = dp.torre
						inner join grupo gr on gr.idgr= dp.clasificacion
						where dp.clasificacion =2
						group by dp.iddepa, tr.nombre, gr.nombre
						order by dp.iddepa asc
						;");

$huespedCacmeca = pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo , fm.edad
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where fm.grupo=2 and fm.estatus=1");

if (!empty($vh)) {
	$modVeh = pg_query("SELECT vh.idcar, vh.placa,vh.marca, vh.modelo, vh.color,dp.iddepa
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							where vh.idcar='$vh'");
}

///////////////////////////////////////////////FIN METRO//////////////////////////////////////////////////////////

///////////////////////////////////////////////INVERMARIN/////////////////////////////////////////////////////////

//listado de huespedes de invermarin
$rptInvermarin = pg_query("SELECT distinct dp.iddepa, dp.codigo, dp.nombre as propietario,
						tr.nombre as torre, gr.nombre,
						(SELECT count(ch.codigo) as brz
						from  codigos_huesped ch 
						where ch.iddepa=dp.iddepa and ch.estatus=1) as brz,
						(SELECT  count(fm.chequeo) as est
						from familiares fm 
						where fm.departamento=dp.iddepa and fm.chequeo=1) as est,
						us.usuario,
						us.contra,
						dp.reserva
						from departamentos dp 
						inner join torres tr on tr.idtor = dp.torre
						inner join grupo gr on gr.idgr= dp.clasificacion
						left join usuarios us on us.usuario=dp.codigo
						where dp.clasificacion =1
						group by dp.iddepa, tr.nombre, gr.nombre, us.usuario, us.contra
						order by dp.iddepa asc;");



$huespedInvermarin = pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular, dp.codigo , fm.edad
			    	from familiares fm
					inner join departamentos dp on dp.iddepa=fm.departamento
					where fm.grupo=1 and fm.estatus=1");

///////////////////////////////////////////////FIN INVERMARIN////////////////////////////////////////////
///////////////////////////////////////////////INICIO PROPIETARIO////////////////////////////////////////
if (!empty($codDepar)) {
	$consulDepa= pg_query("SELECT dp.codigo, tr.nombre, dp.clasificacion, dp.estatus, dp.iddepa,
							fm.invitado, dp.espacios
							from departamentos dp
							inner join usuarios us on us.usuario=dp.codigo
							inner join torres tr on tr.idtor=dp.torre
							left join familiares fm on fm.departamento = dp.iddepa
							where dp.codigo='$codDepar'
							order by fm.invitado asc;");

	$consulDepaTotal= pg_query("SELECT fm.invitado
							from departamentos dp
							inner join usuarios us on us.usuario=dp.codigo
							inner join torres tr on tr.idtor=dp.torre
							left join familiares fm on fm.departamento = dp.iddepa
							where dp.codigo='$codDepar' and fm.invitado=2");

	$consulFami= pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado,fm.chequeo,fm.asiste
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join usuarios us on us.usuario=dp.codigo
							where dp.codigo='$codDepar' and fm.estatus=1");

	$consulFamicuent= pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado,fm.chequeo,fm.asiste
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join usuarios us on us.usuario=dp.codigo
							where dp.codigo='$codDepar' and fm.asiste=1");


	$consulVehi= pg_query("SELECT vh.placa,vh.marca, vh.modelo, vh.color,vh.idcar
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							inner join usuarios us on us.usuario=dp.codigo
							where dp.codigo='$codDepar' and vh.estatus=1");

	$consulFecha= pg_query("SELECT  fc.fecha_fin
							from departamentos dp
							inner join fechas fc on fc.departamento = dp.iddepa
							where dp.codigo='$codDepar' and fc.estatus=1");

	$consulBraza= pg_query("SELECT ch.codigo from codigos_huesped ch
							inner join departamentos dp on dp.iddepa= ch.iddepa
							where dp.codigo='$codDepar' and ch.estatus=1");

	$consulTrabajador=pg_query("SELECT tr.idtrab,tr.nombres, tr.apellidos,
							tr.cedula,tr.departamento,tr.edad , ft.fecha_ingreso as fi, 
							ft.fecha_egreso as ff
							from trabajadores tr
							inner join departamentos dp on dp.iddepa=tr.departamento
							inner join fecha_trabajador ft on ft.cedula=tr.cedula
							where dp.codigo='$codDepar' and tr.estatus=1 and ft.estatus=1");

}

///////////////////////////////////////////////FIN PROPIETARIO///////////////////////////////////////////
///////////////////////////////////////////////INICIO RECEPCION///////////////////////////////////////////
if (!empty($depa)) {

	$countds=pg_query("SELECT count(*) as cuenta from familiares where departamento=$depa and estatus=1 and asiste=1");
	$conteosds=pg_fetch_array($countds);
	$cantds=$conteosds['cuenta'];

	$conFech=pg_query("SELECT count(*) as cuenta from hora_real where departamentos=$depa and estatus=1");

	$conteoFc=pg_fetch_array($conFech);

	$canFech=$conteoFc['cuenta'];

	//echo $canFech;

	if ($canFech == $cantds) {
		$huesped=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
							ch.codigo as brz, hora_entrada as he, hora_salida as hs, dp.iddepa as depa,
							fm.chequeo
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join torres tr on dp.torre=tr.idtor
							left join codigos_huesped ch on fm.idfami=ch.idfam and ch.estatus=1
							left join hora_real hr on hr.idfam = fm.idfami
							where dp.iddepa='$depa' and fm.asiste=1 and hr.estatus=1");
	}else{
		$huesped=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
							ch.codigo as brz, hora_entrada as he, hora_salida as hs, dp.iddepa as depa,
							fm.chequeo
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join torres tr on dp.torre=tr.idtor
							left join codigos_huesped ch on fm.idfami=ch.idfam and ch.estatus=1
							left join hora_real hr on hr.idfam = fm.idfami and hr.estatus=1
							where dp.iddepa='$depa' and fm.asiste=1 --and hr.estatus=1");
	}
	

	$countd=pg_query("SELECT count(*) as cuenta from familiares where departamento=$depa and estatus=1 and chequeo=1");
	$conteosd=pg_fetch_array($countd);
	$cantd=$conteosd['cuenta'];

	$count=pg_query("SELECT count(*) as cuenta from codigos_huesped where iddepa=$depa and estatus=1");

	$conteos=pg_fetch_array($count);
	$cant=$conteos['cuenta'];

	if ($cant==$cantd) {
		$huespedR=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
							ch.codigo as brz, hora_entrada as he, hora_salida as hs, dp.iddepa as depa,
							fm.chequeo
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join torres tr on dp.torre=tr.idtor
							left join codigos_huesped ch on fm.idfami=ch.idfam
							left join hora_real hr on hr.idfam = fm.idfami
							where dp.iddepa='$depa' and fm.chequeo=1 and ch.estatus=1 and hr.estatus=1");
	}else{
		$huespedR=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
							ch.codigo as brz, hora_entrada as he, hora_salida as hs, dp.iddepa as depa,
							fm.chequeo
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join torres tr on dp.torre=tr.idtor
							left join codigos_huesped ch on fm.idfami=ch.idfam and ch.estatus=1
							left join hora_real hr on hr.idfam = fm.idfami
							where dp.iddepa='$depa' and fm.chequeo=1 and hr.estatus=1");
	}
	

	$huespedFecha=pg_query("SELECT fc.fecha_inicio as fi, fc.fecha_fin as ff
					    	from fechas fc
							inner join departamentos dp on dp.iddepa=fc.departamento
							where dp.iddepa='$depa' and fc.estatus=1");

	
	$consulVehiSe=pg_query("SELECT vh.placa,vh.marca, vh.modelo, vh.color, vh.idcar,vh.chequeo,hr.hora_entrada as he, hora_salida as hs,dp.codigo
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							left join hora_realvh hr on hr.departamentos=dp.iddepa and hr.idcar=vh.idcar
							where dp.iddepa='$depa' and vh.estatus=1");

	$trabajador=pg_query("SELECT tr.idtrab,tr.nombres, tr.apellidos,
							tr.cedula,tr.departamento,tr.edad,tr.chequeo ,ft.lugar,
							ft.hora_entrada as he, ft.hora_salida as hs, ft.fecha_ingreso as fi, 
							ft.fecha_egreso as ff
							from trabajadores tr
							inner join departamentos dp on dp.iddepa=tr.departamento
							inner join fecha_trabajador ft on ft.cedula=tr.cedula
							where dp.iddepa='$depa' and tr.estatus=1 and ft.estatus=1");
}

///////////////////////////////////////////////FIN RECEPCION///////////////////////////////////////////
///////////////////////////////////////////////INICIO CONSULTA///////////////////////////////////////////

if (!empty($brz)) {
	$brazalete=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
							ch.codigo as brz, hora_entrada as he, hora_salida as hs, dp.iddepa as depa
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join torres tr on dp.torre=tr.idtor
							left join codigos_huesped ch on fm.idfami=ch.idfam
							left join hora_real hr on hr.idfam = fm.idfami
							where ch.codigo='$brz'");

	$huesFechaBrz=pg_query("SELECT fc.fecha_inicio as fi, fc.fecha_fin as ff
					    	from fechas fc
							inner join departamentos dp on dp.iddepa=fc.departamento
							inner join familiares fm on dp.iddepa=fm.departamento
							left join codigos_huesped ch on fm.idfami=ch.idfam
							where ch.codigo='$brz'");
}

	$total_Huesped=pg_query("SELECT fm.idfami,fm.nombres, fm.apellidos, fm.cedula, dp.nombre as titular,
							dp.codigo , fm.edad, fm.grupo, fm.invitado, tr.nombre as torre,
							ch.codigo as brz, hora_entrada as he, hora_salida as hs, dp.iddepa as depa,
							ch.estatus, hr.lugar
					    	from familiares fm
							inner join departamentos dp on dp.iddepa=fm.departamento
							inner join torres tr on dp.torre=tr.idtor
							left join codigos_huesped ch on fm.idfami=ch.idfam and ch.estatus=1
							left join hora_real hr on hr.idfam = fm.idfami 
							where fm.chequeo=1 and fm.estatus=1  and hr.estatus=1");

//se agrego campo adicional observacion
	$totalVehiSe=pg_query("SELECT vh.placa,vh.marca, vh.modelo, vh.color, vh.idcar,vh.chequeo,hr.hora_entrada as he, hora_salida as hs, vh.observacion,dp.codigo
					    	from vehiculo vh
							inner join departamentos dp on dp.iddepa=vh.iddepa
							left join hora_realvh hr on hr.departamentos=dp.iddepa and hr.idcar = vh.idcar
							where vh.chequeo=1 and vh.estatus=1");

	$entrSal=pg_query("SELECT hr.hora_entrada as he, hr.hora_salida as hs, ch.codigo as brz,-- vh.placa,
						hr.lugar, fm.nombres, fm.apellidos, dp.codigo as depa,fm.cedula,hr.fecha
						from departamentos dp
						inner join familiares fm on fm.departamento = dp.iddepa
						inner join codigos_huesped ch on ch.idfam = fm.idfami
						--left join vehiculo vh on vh.iddepa = dp.iddepa
						inner join hora hr on hr.departamentos = dp.iddepa and hr.idfam=fm.idfami
						where fm.chequeo=1 and fm.asiste =1 and fm.estatus=1 and ch.estatus=1 and hr.estatus=1");

	$entrSalVe=pg_query("SELECT hr.hora_entrada as he, hr.hora_salida as hs, vh.placa,
						hr.lugar,  dp.codigo as depa
						from departamentos dp
						--inner join familiares fm on fm.departamento = dp.iddepa
						--left join codigos_huesped ch on ch.idfam = fm.idfami
						inner join vehiculo vh on vh.iddepa = dp.iddepa
						inner join horavh hr on hr.departamentos = dp.iddepa and hr.idcar=vh.idcar
						where vh.chequeo=1 and vh.estatus=1 --and fm.asiste =1");

	$trabajadorT=pg_query("SELECT tr.idtrab,tr.nombres, tr.apellidos,
							tr.cedula,dp.codigo as departamento,tr.edad,tr.chequeo ,ft.lugar,
							ft.hora_entrada as he, ft.hora_salida as hs
							from trabajadores tr
							inner join departamentos dp on dp.iddepa=tr.departamento
							inner join fecha_trabajador ft on ft.cedula=tr.cedula
							where tr.chequeo=1 and tr.estatus=1 and ft.estatus=1");

	$fechasDepa=pg_query("SELECT fc.fecha_inicio as fi, fc.fecha_fin as ff, dp.codigo as depa,
							dp.estatus, dp.iddepa
							from departamentos dp
							left join fechas fc on dp.iddepa=fc.departamento
							where fc.estatus=1");
	
///////////////////////////////////////////////FIN CONSULTA///////////////////////////////////////////

 ?>