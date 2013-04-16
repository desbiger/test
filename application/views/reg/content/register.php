<?
$regions_array[] = 'Выбирите ваш регион';
foreach ($regions as $reg)
{
	$regions_array[$reg->rid] = $reg->name;
}
$years = 1931;
$month_array = array(
	'январь',
	'февраль',
	'март',
	'апрель',
	'май',
	'июнь',
	'июль',
	'август',
	'сентябрь',
	'октябрь',
	'ноябрь',
	'декабрь',
);
$days = 0;
while ($years < 2013)
{
	$years ++;
	$years_array[$years] = $years;
}
while ($days < 31)
{
	$days ++;
	$days_array[$days] = $days;
}
?>
<script type='text/javascript'>
	function jpost(id, type) {
		$.post(
				'/geo/city/'
				, {
					id: id,
					type: type
				}, function (date) {
					$('#cities').html(date);
				}
		)
	}
	function jget(url, name, object) {
		$.get(
				url,
				{
					s: name
				},
				function (date) {
					object.val(date)
				}
		)
	}
	$(document).ready(function () {
		$(':input[name=email]').focusout(function () {
//			if (value) {
			$.post(
					'/vali/email/',
					{
						s: $(':input[name=email]').val()
					},
					function (date) {
						$('#email_result').html(date);
					}
			)
//				jget('/vali/email/',value,$('#email_result'));
//			}
		})

		$("body").click(function () {
			$('.rivers_list').remove();
		});
		$('#region').change(function () {
					jpost(
							$('#region').val(),
							$(":radio[name=city_type]").filter(":checked").val()
					);
				}
		);
		$(":radio[name=city_type]").click(function () {
//			alert($(":radio[name=city_type]").filter(":checked").val());
			jpost(
					$('#region').val(),
					$(":radio[name=city_type]").filter(":checked").val()
			);
		});


		$('#river_input').keyup(function () {
			$.post(
					'/geo/river/'
					, {
						name: $('#river_input').val()

					}, function (date) {
						$('.submenu').html(date);
					}
			)
		});
		$(":radio[name=city_type]").filter(":checked").change(function () {
			$.post(
					'/geo/river/'
					, {
						name: $('#river_input').val(),
						type: $(":radio[name=city_type]").filter(":checked")
					}, function (date) {
						$('.submenu').html(date);
					}
			)
		});
	})
	;
	function SetRiverName(name) {
		$('#river_input').val(name);
		$('.submenu').html('');
	}
</script>
<h2>Регистрация пользователя</h2>
<div class="reg_form">
	<form onsubmit="return false;" method='post'>
		<table>
			<tr>
				<td colspan="2">
					<h3>Основные данные</h3>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<hr>
				</td>
			</tr>

			<tr>
				<td>Ваш Email</td>
				<td>
					<?=Form::input('email', $request['email'])?>
					<div style="display:inline " id="email_result"></div>
				</td>
			</tr>
			<tr>
				<td>Имя</td>
				<td><?=Form::input('name', $request['name'])?></td>
			</tr>
			<tr>
				<td>Фамилия</td>
				<td><?=Form::input('first_name', $request['first_name'])?></td>
			</tr>
			<tr>
				<td>Отчество</td>
				<td><?=Form::input('second_name', $request['second_name'])?></td>
			</tr>
			<tr>
				<td>Логин</td>
				<td><?=Form::input('login', $request['login'])?></td>
			</tr>
			<tr>
				<td>Пароль</td>
				<td><?=Form::password('pass')?></td>
			</tr>
			<tr>
				<td>Пароль еще раз</td>
				<td><?=Form::password('confirm_pass')?></td>
			</tr>
			<tr>
				<td colspan="2">
					<h3>Контактные данные</h3>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<hr>
				</td>
			</tr>
			<tr>
				<td>Область</td>
				<td><?=Form::select('oblast', $regions_array, $request['oblast'], array('id' => 'region'))?></td>
			</tr>
			<tr id='city_type'>
				<td>Тип населенного пункта</td>
				<td>

					<?=Form::radio('city_type', 'г', true)?>
					<label>Город</label>

					<?=Form::radio('city_type', 'пгт')?>
					<label>Поселок</label>

					<?=Form::radio('city_type', 'х')?>
					<label>Хутор</label>
					<?=Form::radio('city_type', 'ст-ца')?>
					<label>Станица</label>

					<?=Form::radio('city_type', 'д')?>
					<label>Деревня</label>
				</td>
			</tr>
			<tr id='cities'>
				<?if (strlen($cities) > 0): ?>
					<td>Населенный пункт</td>
					<td><?=$cities?></td>
				<? endif?>
			</tr>
			<tr>
				<td>Дата рождения</td>
				<td>
					<?=Form::select('day', $days_array, $request['day'])?>
					<?=Form::select('month', $month_array, $request['month'])?>
					<?=Form::select('year', $years_array, $request['year'])?>
				</td>
			</tr>
			<tr>
				<td>Стаж подводной охоты</td>
				<td><?=Form::input('stag', $request['stag'])?> лет</td>
			</tr>
			<tr>
				<td>Водем в которм чаще всего охотитесь</td>
				<td>
					<div class="submenu"></div>
					<?=Form::input('river', $request['river'], array('id' => 'river_input'))?>
				</td>
			</tr>
			<tr>
				<td>Ваше фото</td>
				<td><?=Form::file('photo')?></td>
			</tr>
			<tr>
				<td></td>
				<td>

					<?=Form::submit('', 'Зарегистрироваться')?></td>
			</tr>
		</table>
	</form>
</div>
