<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for Language customisation admin tool
 *
 * @package    tool
 * @subpackage mdeditor
 * @copyright  2010 David Mudrak <david@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkin'] = 'Texte im lokalen Sprachpaket speichern';
$string['checkout'] = 'Lokales Sprachpaket bearbeiten';
$string['checkoutdone'] = 'Lokales Sprachpaket wurde geladen.';
$string['checkoutinprogress'] = 'Lokales Sprachpaket wird geladen...';
$string['cliexportfileexists'] = 'Datei für {$a->lang} existiert bereits und wird übersprungen. Wenn Sie die Datei überschreiben wollen, fügen Sie die Option --override=true hinzu.';
$string['cliexportheading'] = 'Beginn des Exports von Sprachdateien.';
$string['cliexportnofilefoundforlang'] = 'Es wurde keine Datei zum Exportieren gefunden. Export für diese Sprache wird übersprungen.';
$string['cliexportfilenotfoundforcomponent'] = 'Datei {$a->filepath} für Sprache {$a->lang} nicht gefunden. Diese Datei wird übersprungen.';
$string['cliexportstartexport'] = 'Sprache {$a} wird exportiert';
$string['cliexportzipdone'] = 'Zip erstellt: {$a}';
$string['cliexportzipfail'] = 'Konnte das zip {$a} nicht erstellen';
$string['clifiles'] = 'Dateien zum Importieren in {$a}';
$string['cliimporting'] = 'Sprachdateien zum Importieren (Modus {$a})';
$string['clinolog'] = 'Nichts zum Importieren in {$a}';
$string['climissinglang'] = 'Fehlende Sprache';
$string['climissingfiles'] = 'Fehlende gültige Dateien';
$string['climissingmode'] = 'Fehlender oder ungültiger Modus (gültig sind all, new oder update)';
$string['climissingsource'] = 'Fehlende Datei oder Verzeichnis';
$string['confirmcheckin'] = 'Sie möchten geänderte Texte im lokalen Sprachpaket speichern. Dieser Vorgang exportiert die angepassten Texte aus den Übersetzer in das Daten-Verzeichnis. Moodle wird ab sofort das geänderte Sprachpaket benutzen. Klicken Sie auf die Taste "Weiter", um die Texte zu speichern.';
$string['mdeditor:edit'] = 'Lokales Sprachpaket bearbeiten';
$string['mdeditor:export'] = 'Lokale Übersetzung exportieren';
$string['mdeditor:view'] = 'Lokales Sprachpaket anzeigen';
$string['export'] = 'Sprachanpassungen exportieren';
$string['exportfilter'] = 'Komponenten zum Exportieren auswählen';
$string['filter'] = 'Filtertexte';
$string['filtercomponent'] = 'Komponenten';
$string['filtercustomized'] = 'nur Anpassungen';
$string['filtermodified'] = 'Nur in dieser Sitzung geändert';
$string['filteronlyhelps'] = 'nur Hilfstexte';
$string['filtershowstrings'] = 'Texte anzeigen';
$string['filterstringid'] = 'Text-ID';
$string['filtersubstring'] = 'Textteil';
$string['headingcomponent'] = 'Komponente';
$string['headinglocal'] = 'Lokale Sprachanpassungen';
$string['headingstandard'] = 'Standardtext';
$string['headingstringid'] = 'Text';
$string['import'] = 'Sprachanpassungen importieren';
$string['import_mode'] = 'Import-Modus';
$string['import_new'] = 'Nur Texte ohne lokale Anpassung erstellen';
$string['import_update'] = 'Nur Texte mit lokaler Anpassung aktualisieren';
$string['import_all'] = 'Erstellen oder Aktualisieren aller Texte aus den Komponenten';
$string['importfile'] = 'Datei importieren';
$string['langpack'] = 'Sprachkomponente(n)';
$string['markinguptodate'] = 'Anpassung als aktuell markieren';
$string['markinguptodate_help'] = 'Die Anpassung des lokalen Sprachpakets könnte veraltet sein, weil entweder der englische Originaltext oder die offizielle Übersetzung geändert wurden. Soll die lokale Anpassung weiter gelten oder möchten Sie den Text bearbeiten?';
$string['markuptodate'] = 'Als aktuell markieren';
$string['modifiedno'] = 'eine geänderten Texte für das lokale Sprachpaket vorhanden';
$string['modifiednum'] = '{$a} Texte wurden verändert. Möchten Sie die Texte dauerhaft im lokalen Sprachpaket speichern?';
$string['nolocallang'] = 'Keine lokalen Texte gefunden';
$string['notice_ignorenew'] = 'Text {$a->component}/{$a->stringid} ignoriert, da er nicht angepasst ist.';
$string['notice_ignoreupdate'] = 'Text {$a->component}/{$a->stringid} ignoriert, da er bereits definiert ist.';
$string['notice_inexitentstring'] = 'Text {$a->component}/{$a->stringid} nicht gefunden.';
$string['notice_missingcomponent'] = 'Fehlende Komponente {$a->component}.';
$string['notice_success'] = 'Text {$a->component}/{$a->stringid} erfolgreich aktualisiert.';
$string['nostringsfound'] = 'Keine Texte gefunden - bitte ändern Sie die Filtereinstellungen';
$string['placeholder'] = 'Platzhalter';
$string['placeholder_help'] = 'Platzhalter sind spezielle Statements wie `{$a}` oder `{$a->something}` innerhalb eines Textes. Sie werden während der Ausgabe durch einen aktuellen Wert ersetzt.

Es ist wichtig, die Platzhalter ganz genauso wie im Originaltext zu schreiben. Platzhalter werden weder übersetzt noch in ihrer links-rechts Orientierung geändert.';
$string['placeholderwarning'] = 'Text enthält einen Platzhalter';
$string['pluginname'] = 'Modul-Beschreibungs-Editor';
$string['savecheckin'] = 'Texte im lokalen Sprachpaket speichern';
$string['savecontinue'] = 'Sichern und Texte weiter bearbeiten';
$string['privacy:metadata'] = 'Das Plugin \'Modul-Beschreibungs-Editor\' speichert keine personenbezogenen Daten.';
