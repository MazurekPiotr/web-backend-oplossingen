<?php 
    $individueelArtikel = false;
    $artikels = array( array('titel' => 'Rara: waar begint het Belgisch wegdek?',
                             'datum' => '7/10/14',
                             'inhoud' => 'Op Twitter was de staat van het Belgische wegdek gisteren kop van Jut nadat een inspecteur van de Nederlandse wegpolitie een veelzeggende foto op het sociale netwerk had geplaatst. Daarop is te zien hoe het wegdek langs de A12 er erbarmelijk bijligt in België maar plots verandert in een mooi laagje asfalt wanneer de bestuurders de Nederlandse grens oversteken net voor Zandvliet.

                                Maar het gaat hier om optisch bedrog want eigenlijk ligt de A12 er hetzelfde bij als je nu in België of in Nederland rijdt. Het stukje dat te zien is op de foto is helemaal niet de autosnelweg maar een parallelle weg ernaast. Als je links doorrijdt kom je op de autosnelweg terecht, als je rechts afslaat, kom je uit op een parkeerterreintje waar de douane vroeger zat", vertelt Peter Bruyninckx van Wegen en Verkeer Antwerpen. 

                                Maar al gaat het niet om de A12, dat stuk weg ziet er natuurlijk niet fraai uit. We zijn dan ook op de hoogte van het probleem. Normaal gezien hadden we het stukje in 2014 willen herstellen, maar dat is niet meer gelukt. We hebben er immers voor gekozen om eerst stukken weg te herstellen die veel vaker gebruikt worden. Maar het staat sowieso op onze planning voor volgend jaar", besluit de woordvoerder.',
                                'afbeelding' => 'img/wegdek.jpg',
                                'afbeeldingBeschrijving' => 'verouderd wegdek op autosnelweg'),
                        array('titel' => 'Pensioenleeftijd stijgt naar 67 jaar in 2030',
                             'datum' => '7/10/14',
                             'inhoud' => 'De federale regeringsonderhandelaars, die al sinds gisterenmiddag samenzitten, hebben een akkoord bereikt over een verhoging van de pensioenleeftijd. Die stijgt tegen 2030 naar 67 jaar, zo is aan onze redactie bevestigd. "Dit is een moeilijke beslissing, maar ze is ook menselijk. Wij hebben lang moeten aandringen op overgangsmaatregelen", zegt een bron dichtbij de onderhandelingen.
                                 Als reden voor het optrekken van de wettelijke pensioenleeftijd wordt gewezen op de stijgende levensverwachting. Het akkoord omvat dat de wettelijke pensioenleeftijd vanaf 2025 naar 66 en vanaf 2030 naar 67 stijgt. Vervroegd pensioen zal pas mogelijk zijn vanaf 63. 
                                 Overgangsmaatregelen moeten de stijging compenseren. Wie 58 jaar is in 2016 kan twee jaar later op zijn 60ste met pensioen, wie 59 of ouder is een jaar later. 
                                 Overgangsmaatregelen
                                 Ook voor het pensioen van politie-agenten zouden "specifieke overgangsmaatregelen" gevonden zijn. Die hielden de afgelopen weken nog verschillende acties en betogingen tegen het arrest van het Grondwettelijk Hof waardoor zij ineens pas veel later op pensioen zouden kunnen gaan. De details daarover zijn nog niet bekend.
                                 Voorts komt er een uitbreiding van het tijdskrediet met 12 maanden, specifiek voor mensen die voor hun kinderen (tot acht jaar) willen zorgen of bijvoorbeeld voor palliatieve zorgen. Er komt ook een verruiming van het aanvullend pensioenen en het onbeperkt bijverdienen wordt versoepeld.
                                 Werk is afgerond
                                 Ook op andere thema\'s wordt vooruitgang geboekt. Het hoofdstuk Werk is net afgerond. De onderhandelaars beginnen nu aan het hoofdstuk Gezondheidszorg. Maggie De Block (Open Vld), die genoemd wordt als toekomstig minister van Volksgezondheid, is net aangekomen in de Wetstraat om zich bij de andere onderhandelaars van te voegen.   
                                 Later vandaag komt ook de fiscalisering van de welvaartsenveloppe weer op tafel. Dat wordt nu cash uitbetaald, maar kan eventueel ook via de belastingbrief. Volgens N-VA zou dat een flinke besparing opleveren. Maar CD&V ziet dat voorlopig niet zitten.',
                                 'afbeelding' => 'img/pensioen.jpg',
                                 'afbeeldingBeschrijving' => 'formateur Charles Michel'),
                        array('titel' => 'Filemaand goed ingezet met erg zware ochtendspits',
                             'datum' => '7/10/14',
                             'inhoud' => 'Oktober is de filemaand bij uitstek en werd ook dit jaar weer goed ingezet, gisteren en vandaag verliep de ochtendspits erg moeizaam. Verkeersexperts waarschuwen dat het nog een hele maand erg druk zal zijn op de weg. 
                             Vanochtend zorgden verschillende ongevallen voor lange files op de weg. Zo was de weg versperd aan het knooppunt St. Stevens Woluwe (E40-R0) door een ongeval op de aansluiting naar de Buitenring. Op de Binnenring was ter hoogte van Jette de weg tot 9.30 uur versperd.  Daarnaast was het op de A12 aanschuiven vanaf Willebroek tot Londerzeel. In de andere richting stond er een file ter hoogte van Aartselaar. Op de E19 en E17 was het erg druk richting Brussel. Ter hoogte van Ranst op de E313 zorgde een ongeval op de  rechterrijstrook voor chaos.
                             Voor deze ochtend werd 270 kilometer file voorspeld, gisteren was dat 240 kilometer. Terwijl we afgelopen vrijdag over \'slechts\' 130 kilometer. De oorzaak van het drukke verkeer is dat iedereen nu uit vakantie is teruggekomen, de hogescholen en universiteiten weer op volle toeren draaien. Ook het regenweer en de plots donkere ochtenden zorgen voor meer ongevallen.',
                             'afbeelding' => 'img/file.jpg',
                            'afbeeldingBeschrijving' => 'file op autosnelweg')
                        );
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $individueelArtikel = true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Opdracht get</title>
    </head>
    <body>
        <?php if(!$individueelArtikel): ?>
            <?php foreach ($artikels as $id => $value): ?> 
                <h2><?= $value['titel'] ?></h2>
                <img src="<?= $value['afbeelding'] ?>" alt="<?= $value['afbeeldingBeschrijving'] ?>">
                <p><?= substr($value['inhoud'], 0,50).'...' ?></p>
                <a href="<?="opdracht-get.php?id=". $id ?>">Lees meer</a>
            <?php endforeach ?>
        <?php elseif ($individueelArtikel): ?>
            <h2><?= $artikels[$id]['titel'] ?></h2>
            <img src="<?= $artikels[$id]['afbeelding'] ?>">
            <p><?= $artikels[$id]['inhoud'] ?></p>
        <?php else : ?>
            Dit artikel bestaat niet.
        <?php endif ?>

</html>