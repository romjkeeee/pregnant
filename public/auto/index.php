<?php

/* Библиотека PDF */
require_once 'dompdf/autoload.inc.php';
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;

/* Свойства "Диагностика ходовой части" */
$json = json_decode(file_get_contents('diag_hod_casti.json'), true);

/* Генерируем PDF */
if (isset($_POST['to_pdf'])) {
	
	$html = '<html><head><style>body { font-family: DejaVu Sans; }</style></head><body>';
	
	/* Параметры */
	foreach ($_POST['params'] as $section => $value) {
		
		if ($section == 'to_pdf') {
			continue;
		}
		
		/* Если не массив - выводим */
		if (!is_array($value)) {
			$html .= '<h3>'.$section.': <span>'.$value.'</span></h3>';
		}
		else {
			
			$html .= '<br /><h4>'.$section.'</h4><br />';
			
			foreach ($value as $sect => $data) {
				
				if (!is_array($data)) {
					$html .= '<h5>'.$sect .': <span>'.$data.'</span></h5>';
				}
				else {
					
					$html .= '<h6 style="text-decoration: underline;">'.$sect.'</h6>';
					
					foreach ($data as $k => $val) {
						
						if (!is_array($val)) {
							$html .= '<h6>'.$k.': <span>'.$val.'</span></h6>';
						}
						else {
							
							foreach ($val as $ky => $v) {
								
								if (!is_array($v)) {
									$html .= '<h6>'.$k.': '.$ky.': <span>'.$v.'</span></h6>';
								}
								else {
									
									foreach ($v as $kk => $vv) {
										$html .= '<h6>'.$k.' - '.$ky.': <span>'.$vv.'</span></h6>';
									}
									
								}
								
							}
							
						}
						
					}
					
				}
				
			}
			
		}
		
	}
	
	$html .= '</html>';
	
        $dompdf = new Dompdf();
        $dompdf->load_html($html);//body -> html content which needs to be converted as pdf..
        $dompdf->render();
        $dompdf->stream("sample.pdf"); //To popup pdf as download	
	
	//echo $html;

//exit;
	
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Технический отчёт</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
</head>
<body>
	<div class="container">
		<form action="index.php" method="POST">
			<div class="row pad">
				<div class="col-sm-12">
				<div class="alert alert-info">Тут будет шапка. Лого можно будет вставить, картинки авто, всё что угодно</div>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Марка авто, Модель</h3>
					<input type="text" name="params[Марка и модель авто]" placeholder="Например: Audi A6" class="form-control">
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Год выпуска авто</h3>
					<input type="text" name="params[Год выпуска]" placeholder="Например: 2016" class="form-control">
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Диагностику проводил</h3>
					<input type="text" name="params[Диагностику проводил]" placeholder="Фамилия, Имя, Отчество" class="form-control">
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Фотоотчёт</h3>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Проверка развал-схождения</h3>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<h4>Передний мост</h4>
						</div>
						<div class="col-sm-3">
							<p>Левая</p>
						</div>
						<div class="col-sm-3">
							<p>Правая</p>
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-6">
							<h6>Суммарное схождение</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Суммарное схождение][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Суммарное схождение][Правая]" class="form-control">
						</div>						
					</div>
					<div class="row im">
						<div class="col-sm-6">
							<h6>Полусхождение</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Полусхождение][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Полусхождение][Правая]" class="form-control">
						</div>						
					</div>
					<div class="row im">
						<div class="col-sm-6">
							<h6>Угол развала</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Угол развала][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Угол развала][Правая]" class="form-control">
						</div>						
					</div>	
					<div class="row im">
						<div class="col-sm-6">
							<h6>Кастер</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Кастер][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Передний мост][Кастер][Правая]" class="form-control">
						</div>						
					</div>					
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<h4>Задний мост</h4>
						</div>
						<div class="col-sm-3">
							<p>Левая</p>
						</div>
						<div class="col-sm-3">
							<p>Правая</p>
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-6">
							<h6>Суммарное схождение</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Суммарное схождение][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Суммарное схождение][Правая]" class="form-control">
						</div>						
					</div>
					<div class="row im">
						<div class="col-sm-6">
							<h6>Полусхождение</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Полусхождение][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Полусхождение][Правая]" class="form-control">
						</div>						
					</div>
					<div class="row im">
						<div class="col-sm-6">
							<h6>Угол развала</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Угол развала][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Угол развала][Правая]" class="form-control">
						</div>						
					</div>	
					<div class="row im">
						<div class="col-sm-6">
							<h6>Кастер</h6>
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Кастер][Левая]" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" name="params[Проверка развал-схождения][Задний мост][Кастер][Правая]" class="form-control">
						</div>						
					</div>					
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-3"><h4 class="lines">Состояние развала</h4></div>
				<div class="col-sm-8">
					<input type="hidden" name="params[Проверка развал-схождения][Состояние развала]" value="">
					<a href="javascript:void(0);" title="В норме" class="bc btn-green">в норме</a>
					<a href="javascript:void(0);" title="Необходима регулировка" class="bc btn-warn">необходима регулировка</a>
					<a href="javascript:void(0);" title="Регулировке не подлежит" class="bc btn-red">регулировке не подлежит</a>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-3"><h4 class="lines">Состояние схождения</h4></div>
				<div class="col-sm-8">
					<input type="hidden" name="params[Проверка развал-схождения][Состояние схождения]" value="">
					<a href="javascript:void(0);" title="В норме" class="bc btn-green">в норме</a>
					<a href="javascript:void(0);" title="Необходима регулировка" class="bc btn-warn">необходима регулировка</a>
					<a href="javascript:void(0);" title="Регулировке не подлежит" class="bc btn-red">регулировке не подлежит</a>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12"><h4>Резюме мастера</h4></div>
				<div class="col-sm-12">
					<textarea name="params[Проверка развал-схождения][Резюме мастера]" placeholder="Комментарии от мастера" class="form-control"></textarea>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Диагностика ходовой части</h3>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<h4>Передняя подвеска</h4>
						</div>
						<div class="col-sm-3 text-center">
							<p>Левая</p>
						</div>
						<div class="col-sm-3 text-center">
							<p>Правая</p>
						</div>
					</div>
					<?php

					foreach ($json['params_list'][0] as $p) {

						echo '<div class="row">'.PHP_EOL;
						echo '<div class="col-sm-6">'.$p.'</div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Передняя подвеска]['.$p.'][Левая][]"></div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Передняя подвеска]['.$p.'][Правая][]"></div>'.PHP_EOL;
						echo '</div>'.PHP_EOL;
										
					}

					?>
					<br />
					<div class="row">
						<div class="col-sm-6">
							<h4>Тормозная система передняя</h4>
						</div>
						<div class="col-sm-3 text-center">
							<p>Левая</p>
						</div>
						<div class="col-sm-3 text-center">
							<p>Правая</p>
						</div>
					</div>
					<?php

					foreach ($json['params_list'][1] as $p) {

						echo '<div class="row">'.PHP_EOL;
						echo '<div class="col-sm-6">'.$p.'</div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Тормозная система передняя]['.$p.'][Левая][]"></div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Тормозная система передняя]['.$p.'][Правая][]"></div>'.PHP_EOL;
						echo '</div>'.PHP_EOL;
										
					}

					?>
					<br />
					<div class="row">
						<div class="col-sm-6">
							<h4>Рулевое управление</h4>
						</div>
						<div class="col-sm-3 text-center">
							<p>Левая</p>
						</div>
						<div class="col-sm-3 text-center">
							<p>Правая</p>
						</div>
					</div>
					<?php

					foreach ($json['params_list'][2] as $p) {

						echo '<div class="row">'.PHP_EOL;
						echo '<div class="col-sm-6">'.$p.'</div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Рулевое управление]['.$p.'][Левая][]"></div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Рулевое управление]['.$p.'][Правая][]"></div>'.PHP_EOL;
						echo '</div>'.PHP_EOL;
										
					}

					?>					
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<h4>Задняя подвеска</h4>
						</div>
						<div class="col-sm-3 text-center">
							<p>Левая</p>
						</div>
						<div class="col-sm-3 text-center">
							<p>Правая</p>
						</div>
					</div>
					<?php

					foreach ($json['params_list'][3] as $p) {

						echo '<div class="row">'.PHP_EOL;
						echo '<div class="col-sm-6">'.$p.'</div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Задняя подвеска]['.$p.'][Левая][]"></div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Задняя подвеска]['.$p.'][Правая][]"></div>'.PHP_EOL;
						echo '</div>'.PHP_EOL;
										
					}

					?>
					<br />
					<div class="row">
						<div class="col-sm-6">
							<h4>Тормозная система задняя</h4>
						</div>
						<div class="col-sm-3 text-center">
							<p>Левая</p>
						</div>
						<div class="col-sm-3 text-center">
							<p>Правая</p>
						</div>
					</div>
					<?php

					foreach ($json['params_list'][4] as $p) {

						echo '<div class="row">'.PHP_EOL;
						echo '<div class="col-sm-6">'.$p.'</div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Тормозная система передняя]['.$p.'][Левая][]"></div>'.PHP_EOL;
						echo '<div class="col-sm-3 text-center"><input type="checkbox" value="Требует ремонта или замены" name="params[Диагностика ходовой части][Тормозная система передняя]['.$p.'][Правая][]"></div>'.PHP_EOL;
						echo '</div>'.PHP_EOL;
										
					}

					?>
					<br />
					<div class="row">
						<div class="col-sm-12">
							<h4>Прочие замечания</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<textarea name="params[Прочие замечания]" class="form-control"></textarea>
						</div>
					</div>
				</div>				
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Компьютерная диагностика</h3>
				</div>
				<div class="col-sm-6">
					<h4>Система</h4>
					<div class="row im">
						<div class="col-sm-12">
							<input type="text" name="params[Компьютерная диагностика][Система][]" class="form-control">
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-12">
							<input type="text" name="params[Компьютерная диагностика][Система][]" class="form-control">
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-12">
							<input type="text" name="params[Компьютерная диагностика][Система][]" class="form-control">
						</div>
					</div>					
				</div>
				<div class="col-sm-6">
					<h4>Выявленные уведомления о неполадках</h4>
					<div class="row im">
						<div class="col-sm-12">
							<input type="text" name="params[Компьютерная диагностика][Выявленные уведомления о неполадках][]" class="form-control">
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-12">
							<input type="text" name="params[Компьютерная диагностика][Выявленные уведомления о неполадках][]" class="form-control">
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-12">
							<input type="text" name="params[Компьютерная диагностика][Выявленные уведомления о неполадках][]" class="form-control">
						</div>
					</div>					
				</div>
				<div class="col-sm-12">
					<h4>Резюме мастера</h4>
					<textarea name="params[Компьютерная диагностика][Резюме мастера]" class="form-control"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h3>Тестовая поездка</h3>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Подвеска</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Подвеска]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Пробивание амортизаторов" class="bc btn-warn">пробивание амортизаторов</a>
					<a href="javascript:void(0);" title="Посторонние шумы" class="bc btn-red">посторонние шумы</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Разгон</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Разгон]" value="">
					<a href="javascript:void(0);" title="Равномерный" class="bc btn-green">равномерный</a>
					<a href="javascript:void(0);" title="С провалами" class="bc btn-warn">с провалами</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Переключение КПП</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Переключение КПП]" value="">
					<a href="javascript:void(0);" title="Плавное" class="bc btn-green">плавное</a>
					<a href="javascript:void(0);" title="Рывки" class="bc btn-warn">рывки</a>
					<a href="javascript:void(0);" title="Посторонние шумы" class="bc btn-red">посторонние шумы</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Выхлоп двигателя</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Выхлоп двигателя]" value="">
					<a href="javascript:void(0);" title="Прозрачный" class="bc btn-green">прозрачный</a>
					<a href="javascript:void(0);" title="Сизый дым" class="bc btn-warn">сизый дым</a>
					<a href="javascript:void(0);" title="Черный дым" class="bc btn-red">черный дым</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Температура двигателя во время езды</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Температура двигателя во время езды]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Повышенная" class="bc btn-warn">повышенная</a>
					<a href="javascript:void(0);" title="Пониженная" class="bc btn-red">пониженная</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Сторонние шумы в двигателе</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Сторонние шумы в двигателе]" value="">
					<a href="javascript:void(0);" title="Отсутствуют" class="bc btn-green">отсутствуют</a>
					<a href="javascript:void(0);" title="Присутствуют" class="bc btn-red">присутствуют</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Шум обшивки и оборудования салона</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Шум обшивки и оборудования салона]" value="">
					<a href="javascript:void(0);" title="Отсутствуют" class="bc btn-green">отсутствуют</a>
					<a href="javascript:void(0);" title="Присутствуют" class="bc btn-red">присутствуют</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Предупреждения на приборной панели</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Предупреждения на приборной панели]" value="">
					<a href="javascript:void(0);" title="Отсутствуют" class="bc btn-green">отсутствуют</a>
					<a href="javascript:void(0);" title="Присутствуют" class="bc btn-red">присутствуют</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Положение руля при езде по прямой</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Положение руля при езде по прямой]" value="">
					<a href="javascript:void(0);" title="Ровно" class="bc btn-green">ровно</a>
					<a href="javascript:void(0);" title="С отклонением" class="bc btn-red">с отклонением</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Нулевая точка руля</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Нулевая точка руля]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Тянет в сторону" class="bc btn-red">тянет в сторону</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Посторонние запахи в салоне</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Тестовая поездка][Посторонние запахи в салоне]" value="">
					<a href="javascript:void(0);" title="Отсутствуют" class="bc btn-green">отсутствуют</a>
					<a href="javascript:void(0);" title="Присутствуют" class="bc btn-red">присутствуют</a>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<br />
					<h4>Резюме тестовое поездки</h4>
					<textarea name="params[Тестовая поездка][Резюме]" class="form-control"></textarea>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<h3>Проверка внешних световых приборов</h3>
				</div>
				<div class="col-sm-4">
					<div class="row">
						<div class="col-sm-12">
							<h4>Передние световые приборы</h4>
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Ближний</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Ближний]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Дальний</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Дальний]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Поворот</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Поворот]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Габарит</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Габарит]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Противотуманка</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Противотуманка]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<br />
							<h4>Задние световые приборы</h4>
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Ближний</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Задние световые приборы][Ближний]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Дальний</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Задние световые приборы][Дальний]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Поворот</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Задние световые приборы][Поворот]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Габарит</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Задние световые приборы][Габарит]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Противотуманка</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Задние световые приборы][Противотуманка]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>					
				</div>
				<div class="col-sm-4">
					<div class="fl">&nbsp;</div>
					<div class="rl">&nbsp;</div>
				</div>
				<div class="col-sm-4">
					<div class="row">
						<div class="col-sm-12">
							<h4>Передние световые приборы</h4>
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Ближний</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Ближний]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Дальний</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Дальний]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Поворот</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Поворот]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Габарит</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Габарит]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Противотуманка</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Передние световые приборы][Противотуманка]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<br />
							<h4>Задние световые приборы</h4>
						</div>
					</div>
					<div class="row im">
						<div class="col-sm-5">
							<h4 class="lines">Номерной знак</h4>
						</div>
						<div class="col-sm-7">
							<input type="hidden" name="params[Проверка внешних световых приборов][Задние световые приборы][Номерной знак]" value="">
							<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
							<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>						
						</div>
					</div>			
				</div>				
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h3>Проверка салона и оборудования в нём</h3>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Замки дверей</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Замки дверей]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>
				</div>
			</div>			
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Обогреватель/кондиционер</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Обогреватель/кондиционер]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-red">не работает</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Стеклоподъемники</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Стеклоподъемники]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-warn">не работает</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Состояние сидений</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Состояние сидений]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Изношены" class="bc btn-warn">изношены</a>
					<a href="javascript:void(0);" title="Пропалы" class="bc btn-red">пропалы</a>
					<a href="javascript:void(0);" title="Потёртости" class="bc btn-warn">потёртости</a>
					<a href="javascript:void(0);" title="Загрязнения" class="bc btn-red">загрязнения</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Регулировка сидений</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Регулировка сидений]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-warn">не работает</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Зеркала</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Зеркала]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-warn">не работает</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Стеклоочиститель/омыватель стекла</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Стеклоочиститель / омыватель стекла]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-warn">не работает</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Предупреждения на приборной панели</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Предупреждения на приборной панели]" value="">
					<a href="javascript:void(0);" title="Нет" class="bc btn-green">нет</a>
					<a href="javascript:void(0);" title="Есть" class="bc btn-warn">есть</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Кнопки, рычаги, переключатели</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Кнопки, рычаги, переключатели]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-warn">не работает</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Руль</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Руль]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Изношен" class="bc btn-warn">изношен</a>
					<a href="javascript:void(0);" title="В чехле" class="bc btn-warn">в чехле</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Аудио/Видео</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Аудио / Видео]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-warn">не работает</a>
				</div>
			</div>		
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Другие системы</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Другие системы]" value="">
					<a href="javascript:void(0);" title="Работает" class="bc btn-green">работает</a>
					<a href="javascript:void(0);" title="Не работает" class="bc btn-warn">не работает</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Повреждения материала обивки салона, сидений и дверных карт</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Повреждения материала обивки салона, сидений и дверных карт]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Потёртости" class="bc btn-warn">потёртости</a>
					<a href="javascript:void(0);" title="Пропалы" class="bc btn-red">пропалы</a>
					<a href="javascript:void(0);" title="Трещины" class="bc btn-red">трещины</a>
					<a href="javascript:void(0);" title="Загрязнения" class="bc btn-red">загрязнения</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Посторонние запахи в салоне</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Проверка салона и оборудования в нём][Посторонние запахи в салоне]" value="">
					<a href="javascript:void(0);" title="Присутствуют" class="bc btn-green">присутствуют</a>
					<a href="javascript:void(0);" title="Отсутствуют" class="bc btn-warn">отсутствуют</a>
				</div>
			</div>
			<div class="row pad">
				<div class="col-sm-12">
					<br />
					<h4>Другие замечания</h4>
					<textarea name="params[Проверка салона и оборудования в нём][Другие замечания]" class="form-control"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h3>Осмотр двигателя</h3>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Работа двигателя</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Работа двигателя]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Вибрация" class="bc btn-warn">вибрация</a>
					<a href="javascript:void(0);" title="Шум" class="bc btn-red">шум</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines line_top">Охлаждающая жидкость</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Охлаждающая жидкость]" value="">
					<a href="javascript:void(0);" title="Прозрачная и чистая" class="bc btn-green">прозрачная и чистая</a>
					<a href="javascript:void(0);" title="Помутневшая" class="bc btn-red">помутневшая</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5 text-right"><h4 class="lines no">вкрапления масла</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Вкрапления масла в охлаждающей жидкости]" value="">
					<a href="javascript:void(0);" title="Отсутствуют" class="bc btn-green">отсутствуют</a>
					<a href="javascript:void(0);" title="Присутствуют" class="bc btn-red">присутствуют</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5 text-right"><h4 class="lines no">уровень антифриза</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Уровень антифриза в охлаждающей жидкости]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Понижен" class="bc btn-red">понижен</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines line_top">Герметичность двигателя</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Герметичность двигателя]" value="">
					<a href="javascript:void(0);" title="Прозрачная и чистая" class="bc btn-green">прозрачная и чистая</a>
					<a href="javascript:void(0);" title="Помутневшая" class="bc btn-red">помутневшая</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5 text-right"><h4 class="lines no">масла из сальников</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Масла из сальников двигателя]" value="">
					<a href="javascript:void(0);" title="Нет подтёков" class="bc btn-green">нет подтёков</a>
					<a href="javascript:void(0);" title="Есть подтёки" class="bc btn-red">есть подтёки</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5 text-right"><h4 class="lines no">масла соединительных прокладок</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Масла соединительных прокладок двигателя]" value="">
					<a href="javascript:void(0);" title="Нет подтёков" class="bc btn-green">нет подтёков</a>
					<a href="javascript:void(0);" title="Есть подтёки" class="bc btn-red">есть подтёки</a>
				</div>
			</div>		
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Маслозаливная горловина</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Маслозаливная горловина]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Картерные газы" class="bc btn-warn">картерные газы</a>
					<a href="javascript:void(0);" title="Эмульсия" class="bc btn-red">эмульсия</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Уровень масла в двигателе</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Уровень масла в двигателе]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Понижен" class="bc btn-warn">понижен</a>
					<a href="javascript:void(0);" title="Повышен" class="bc btn-red">повышен</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Старт мотора</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Старт мотора]" value="">
					<a href="javascript:void(0);" title="Норма" class="bc btn-green">норма</a>
					<a href="javascript:void(0);" title="Плохо заводится" class="bc btn-red">плохо заводится</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Выхлоп двигателя</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Выхлоп двигателя]" value="">
					<a href="javascript:void(0);" title="Прозрачный" class="bc btn-green">прозрачный</a>
					<a href="javascript:void(0);" title="Сизый дым" class="bc btn-warn">сизый дым</a>
					<a href="javascript:void(0);" title="Черный дым" class="bc btn-red">черный дым</a>
				</div>
			</div>			
			<div class="row im">
				<div class="col-sm-5"><h4 class="lines">Работа на холостом ходу</h4></div>
				<div class="col-sm-7">
					<input type="hidden" name="params[Осмотр двигателя][Работа на холостом ходу]" value="">
					<a href="javascript:void(0);" title="Равномерная" class="bc btn-green">равномерная</a>
					<a href="javascript:void(0);" title="С перебоями" class="bc btn-red">с перебоями</a>
				</div>
			</div>
			<div class="row im">
				<div class="col-sm-12 pady">
					<input type="submit" name="to_pdf" value="Экспорт в PDF" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="js/scripts.js"></script>
</body>
</html>