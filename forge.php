<?php

require_once ('varie.php');
do_head ();

?>

<div class="center_frame">
	<div class="textual">
		<p>
			In virtù del semplice formato con cui le informazioni sui LUG italiani
			sono salvate e rese accessibili, è possibile implementare rapidamente
			nuove applicazioni web (ma non solo!) per la promozione, l'organizzazione
			e la connessione dei gruppi stessi.
		</p>
		<p>
			Qui di seguito alcuni dei progetti collaterali nati intorno a tali dati,
			e spunti per ulteriori creazioni.
		</p>
		<p>
			Se hai una nuova idea e vuoi condividerla con tutti gli altri su questo
			sito, oppure vuoi riportare un problema o una miglioria per uno dei
			progetti qui elencati, mandaci una segnalazione all'indirizzo mail
			<a href="lugmap@linux.it">lugmap@linux.it</a>.
		</p>

		<a name="widget-web" />

		<fieldset>
			<legend>Widget web coi LUG di una regione</legend>

			<div id="introTabel">
				<div class="generator">
					<p>
					Regione <select name="region">
						<?php
						foreach ($elenco_regioni as $simple => $name) {
						?>

						<option value="<?php echo $simple; ?>"><?php echo $name; ?></option>

						<?php
						}
						?>
					</select>
					</p>

					<div class="preview">
						<iframe id="lugmap" src="http://lugmap.it/forge/lug-o-matic/widget.php?region=abruzzo&amp;html=true" onLoad="calcSize();" width="200px" scrolling="no" frameborder="0"></iframe>
					</div>

					<br />

					<textarea class="code" cols="45" rows="15"><?php echo htmlentities (
					'<script type="text/javascript" src="http://lugmap.it/forge/lug-o-matic/widget.php?region=abruzzo"></script>
<img id="lugmap" src="http://lugmap.it/forge/lug-o-matic/placeholder.png" onload="renderLugMap();" /></div>'); ?>
					</textarea>
				</div>

				<div>
					<p>
						Usando il generatore qui accanto puoi ottenere il codice HTML di un semplice widget web da
						copiare ed incollare sul tuo sito, con l'elenco sempre automaticamente aggiornato dei Linux
						Users Groups della regione selezionata.
					</p>

					<p>
						Per tutti coloro che gestiscono delle pagine web, sia veterani del mondo Linux che semplici simpatizzanti,
						questo è un ottimo modo per fare pubblicità ai gruppi vicini di casa.
					</p>
				</div>

				<div class="clear_spacer"></div>
			</div>
		</fieldset>

		<a name="OPML" />

		<fieldset>
			<legend>Generatore di OPML dei feeds dei LUG</legend>

			<p>
				Il generatore <a href="http://www.opml.org/">OPML</a> della LugMap permette di ricostruire la lista dei feeds
				<a href="http://it.wikipedia.org/wiki/Really_simple_syndication">RSS</a> dei siti dei LUG indicizzati nella mappa.
				Si appoggi alla libreria <a href="http://simplepie.org/">SimplePie</a> per identificare e validare i feeds recuperati.
			</p>

			<p>
				Tale file OPML può poi essere importato nel proprio lettore RSS, se si vogliono leggere tutte le notizie riguardanti
				l'esteso e variegato mondo degli User Groups, oppure essere utilizzato come punto di partenza per nuove applicazioni
				che prevedono l'aggregazione di contenuti a tema prettamente "linuxofilo".
			</p>

			<p>
				Lo script è in PHP, e può essere lanciato dalla linea di comando con <i>php find_feeds.php</i>
			</p>

			<p>
				Viene eseguito una volta alla settimana su questo server, e la lista di feeds aggiornata e' reperibile
				<a href="http://lugmap.it/lugs.opml">qui</a>.
			</p>

			<p>
				<a href="http://github.com/Gelma/LugMap/blob/lugmap.it/forge/opml-generator/find_feeds.php">Scarica lo script qui!</a>
			</p>
		</fieldset>

		<a name="aggregator" />

		<fieldset>
			<legend>Aggregatore di feeds</legend>

			<p>
				L'aggregatore di feeds fa quello che ci si puo' aspettare che faccia: prende come parametro un file OPML (come
				quello generato dall'apposito script), pesca tutte le news che trovi nei vari feeds RSS, e li mette in un
				semplicissimo database <a href="http://www.sqlite.org/">SQLite</a>. Tali informazioni potranno poi essere
				utilizzate per la presentazione online (per mezzo di un possibile futuro
				"<a href="http://www.planetplanet.org/">planet</a> fatto in casa") o per scopi piu' articolati.
			</p>

			<p>
				Lo script è in PHP, e può essere lanciato dalla linea di comando con <i>php feeds-aggregator.php &lt;file OPML&gt;</i>.
				Va a popolare un database chiamato <i>notices.db</i>, se non viene trovato viene automaticamente generato.
			</p>

			<p>
				<a href="http://github.com/Gelma/LugMap/blob/lugmap.it/forge/opml-to-sql/feeds-aggregator.php">Scarica lo script qui!</a>
			</p>
		</fieldset>

		<a name="map-generator" />

		<fieldset>
			<legend>Generatore di mappa OpenStreetMap dei LUG</legend>

			<p>
				Sulla homepage di questo sito si trova una grossa mappa con i riferimenti geografici dei diversi LUG indicizzati in questa
				LugMap. Tale elemento web è realizzato con uno script <a href="http://openlayers.org/">OpenLayers</a> ed un file con le
				coordinate da marcare sulla cartina.
			</p>

			<p>
				Suddetto file viene generato eseguendo un apposito script PHP, il quale setaccia l'intero database su file dei LUG, per ognuno
				individua la città o il paese di riferimento, ed appoggiandosi al servizio <a href="http://wiki.openstreetmap.org/wiki/Nominatim">Nominatim</a>
				di <a href="http://openstreetmap.org/">OpenStreetMap</a> ne ricava le coordinate.
			</p>

			<p>
				Il file completo utilizzato in questo sito è sempre reperibile all'URL <i>http://lugmap.it/dati.txt</i>, ed è già pronto per essere
				passato come parametro ad un oggetto Javascript <a href="http://dev.openlayers.org/apidocs/files/OpenLayers/Layer/Text-js.html">OpenLayers.Layer.Text</a>.
				Chi vuole invece generarsi autonomamente il set di dati, può reperire lo script completo
				<a href="http://github.com/Gelma/LugMap/blob/lugmap.it/forge/map-generator/map-generator.php">qui</a>; attenzione: per tale
				operazione sono richieste anche le liste dei comuni italiani già formattate e scaricabili da
				<a href="https://github.com/Gelma/LugMap/tree/lugmap.it/forge/map-generator/liste_comuni">qua</a>.
			</p>
		</fieldset>

		<a name="ideas" />

		<fieldset>
			<legend>Altre Idee</legend>

			<p>
				Il summenzionato widget con le liste regionali di LUG andrebbe adattato sottoforma di moduli e
				plugins Wordpress, Drupal ed altri CMS comuni presso i simpatizzanti per essere ancora più
				facilmente utilizzato ed incluso nelle pagine web.
			</p>

			<p>
				Volendo si potrebbero combinare il widget web con la mappa OpenStreetMap, e fare un nuovo
				widget geografico che localizzi i LUG di una zona specifica. Di sicuro impatto per gli utenti
				occasionali che si possono trovare online.
			</p>

			<p>
				Sarebbe utile una sorta di LugBot, un semplice programmino da agganciare ad un hook sul
				repository git e che provveda a spedire una notifica mail alla
				<a href="http://lists.linux.it/listinfo/lug">lista LUG@ILS</a> quando viene aggiunto un nuovo
				gruppo, immetta una notifica in <a href="http://identi.ca">identi.ca</a> su un canale dedicato
				e cose del genere.
			</p>

			<p>
				Un altro possibile bot sarebbe quello che periodicamente allinei i contenuti del database con la
				<a href="http://it.wikipedia.org/wiki/Lista_dei_LUG_italiani">pagina Wikipedia</a> dedicata ai
				LUG italiani, sia in uscita (aggiornando le informazioni contenute sul base dati locale) che in
				entrata (verificando se qualcuno ha apportato modifiche a Wikipedia, ed includendole).
			</p>

			<p>
				Utilissimo sarebbe un qualche script che parsi la homepage di
				<a href="http://www.linuxday.it/">LinuxDay.it</a> ed individui riferimenti a LUG non ancora
				contemplati nella LugMap. Nel 2010 moltissimi nuovi gruppi sono stati identificati in questo
				modo, ma il controllo è stato effettuato a mano ed ha richiesto parecchio tempo ed impegno, se
				si potesse automatizzare ci si risparmierebbe un sacco di fatica.
			</p>
		</fieldset>
	</div>
</div>

<?php
do_foot ();
?>