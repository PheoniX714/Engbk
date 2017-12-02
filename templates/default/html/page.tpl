{if $page->name == 'Контакты'}
{include file='slider.tpl'}

<section class="contacts-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="path"><a href="./">Главная</a> / {$page->header|escape}</div>
			</div>
		</div>
	</div>
	<div class="page-text">
		{$page->body}
	</div>
	
	{literal}
	<script>
	  function initMap() {

	   var myLatlng = new google.maps.LatLng(50.000591,36.218923);

	   var mapOptions = {
		  zoom: 12,
		  center: myLatlng
		}

	   var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	   var pos1 = new google.maps.LatLng(50.000095,36.243312);
		var marker = new google.maps.Marker({
			  position: pos1,
			  map: map,
			  title: 'г. Харьков, ул. Пушкинская, 54'
		  });

	   var pos2 = new google.maps.LatLng(50.000577,36.218822);
		var marker = new google.maps.Marker({
			  position: pos2,
			  map: map,
			  title: 'г. Харьков, ул. Клочковская, 67'
		  });
	   var pos3 = new google.maps.LatLng(50.034596,36.223379);
		var marker = new google.maps.Marker({
			  position: pos3,
			  map: map,
			  title: 'г. Харьков, ул. 23 Августа, 32/20'
		  });

	   var pos4 = new google.maps.LatLng(50.009314,36.352306);
		var marker = new google.maps.Marker({
			  position: pos4,
			  map: map,
			  title: 'г. Харьков, ТЦ «Таврия», ул. Валентиновская, 38-Б'
		  });

	   var pos5 = new google.maps.LatLng(50.026820,36.330723);
		var marker = new google.maps.Marker({
			  position: pos5,
			  map: map,
			  title: 'г. Харьков, ТРЦ «Дафи», 2 эт., ул. Героев Труда, 9'
		  });

	   var pos6 = new google.maps.LatLng(49.964454,36.319445);
		var marker = new google.maps.Marker({
			  position: pos6,
			  map: map,
			  title: 'г. Харьков, ТЦ «Velta City», 1 эт., пр. Петра Григоренка, 2/146'
		  });

	   var pos7 = new google.maps.LatLng(49.995748,36.339374);
		var marker = new google.maps.Marker({
			  position: pos7,
			  map: map,
			  title: 'г. Харьков, ТРК «Украина», 2 уровень, пр. Тракторостроителей, 59/56'
		  });

	   var pos8 = new google.maps.LatLng(49.945137, 36.261771);
		var marker = new google.maps.Marker({
			  position: pos8,
			  map: map,
			  title: 'г. Харьков, ТЦ «Класс», 1 и 2 эт., пр. Героев Сталинграда, 136/8'
		  });

	   var pos9 = new google.maps.LatLng(49.966337,36.323414);
		var marker = new google.maps.Marker({
			  position: pos9,
			  map: map,
			  title: 'г. Харьков, «Дом кожи», ул. Рождественская, 24, 1 эт.'
		  });

	   var pos10 = new google.maps.LatLng(49.971989, 36.304655);
		var marker = new google.maps.Marker({
			  position: pos10,
			  map: map,
			  title: 'г. Харьков, «Дом кожи», ТОЦ «Сан Сити»,  1 эт., пр. Московский, 199-А.'
		  });


	   var myLatlng1 = new google.maps.LatLng(50.517626,30.597641);

	   var mapOptions1 = {
		  zoom: 10,
		  center: myLatlng1
		}

	   var map1 = new google.maps.Map(document.getElementById('map1'), mapOptions1);

		<!------------------------------------------------------------------------------->
	   var pos11 = new google.maps.LatLng(50.445071,30.444023);
		var marker = new google.maps.Marker({
			  position: pos11,
			  map: map1,
			title: 'г. Киев, ТЦ «Аркадия», 1 эт., ул. Борщаговская, 154'
		});

		<!------------------------------------------------------------------------------->
	   var pos12 = new google.maps.LatLng(50.484724,30.595038);
		var marker = new google.maps.Marker({
			  position: pos12,
			  map: map1,
			title: 'г. Киев, ТРЦ «Квадрат», 1 эт., бульвар Перова, 36'
		});

		<!------------------------------------------------------------------------------->
	   var pos13 = new google.maps.LatLng(50.428985, 30.356179);
		var marker = new google.maps.Marker({
			  position: pos13,
			  map: map1,
			title: 'г. Киев, ТРК «Променада Парк», 1 эт., ул. Большая окружная, 4'
		});

		<!------------------------------------------------------------------------------->
	   var pos14 = new google.maps.LatLng(50.500915,30.496803);
		var marker = new google.maps.Marker({
			  position: pos14,
			  map: map1,
			title: 'г. Киев, ТРЦ «Метрополис», 3 эт., ул. Малиновского, 12'
		});
	   

	// Создание экземпляра карты и его привязка к контейнеру с
	// заданным id ("map").

	   var myLatlng2 = new google.maps.LatLng(48.726925,37.596603);

	   var mapOptions2 = {
		  zoom: 12,
		  center: myLatlng2
		}

	   var map2 = new google.maps.Map(document.getElementById('map2'), mapOptions2);

	   var pos21 = new google.maps.LatLng(48.726925,37.596603);
	   var marker = new google.maps.Marker({
			  position: pos21,
			  map: map2,
			title: 'г. Краматорск, ТЦ «Аврора», 1 эт., ул. Парковая, 18'
		});


	// Создание экземпляра карты и его привязка к контейнеру с
	// заданным id ("map").

	   var myLatlng3 = new google.maps.LatLng(50.266235, 28.685401);

	   var mapOptions3 = {
		  zoom: 13,
		  center: myLatlng3
		}

	   var map3 = new google.maps.Map(document.getElementById('map3'), mapOptions3);

	   var pos31 = new google.maps.LatLng(50.266235, 28.685401);
	   var marker = new google.maps.Marker({
			  position: pos31,
			  map: map3,
			title: 'г. Житомир, ТРЦ «Глобал UA», 1 эт., ул. Киевская, 77'
		});

	  }
	
	</script>{/literal}
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBkGhw_qSZi3gx8bLNV8fkX8T4paxFn6U&callback=initMap"></script>
</section>
{else}

{include file='slider.tpl'}

<section class="page-content">
	<div class="container">
	
		<div class="row">
			<div class="col-lg-12">
				<div id="path"><a href="./">Главная</a> / {$page->header|escape}</div>
				
				<div class="page-text">
					{$page->body}
				</div>
			</div>
		</div>
	</div>
</section>
{/if}