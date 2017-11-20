<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 7/11/2016
 * Time: 11:07 PM
 */
//solo funciona en linux, no funciona en apaches montados en windows !!!!


$DBUSER="contaconta";
$DBPASSWD="RadR8chad3AD";
$DATABASE="randys";

$filename = "backup-" . date("d-m-Y") . ".sql.gz";
$mime = "application/x-gzip";


header( "Content-Type: " . $mime );
header( 'Content-Disposition: attachment; filename="' . $filename . '"' );

$cmd = "mysqldump -u $DBUSER --password=$DBPASSWD $DATABASE | gzip --best";

passthru( $cmd );
exit(0);
?>