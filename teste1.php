
<?php
    $date      = "04-04-2017";
    $startTime = "15:00";
    $endTime   = "17:00";
    $subject   = "teste";
    $desc      = "ta loco";

    $ical = "BEGIN:VCALENDAR
    VERSION:2.0
    PRODID:-//hacksw/handcal//NONSGML v1.0//EN
    BEGIN:VEVENT
    UID:" ."almir_oliveira@" . "hotmail.com
    DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z
    DTSTART:".$date."T".$startTime."00Z
    DTEND:".$date."T".$endTime."00Z
    SUMMARY:".$subject."
    DESCRIPTION:".$desc."
    END:VEVENT
    END:VCALENDAR";

    //set correct content-type-header
    header('Content-type: text/calendar; charset=utf-8');
    header('Content-Disposition: inline; filename=calendar.ics');
    echo $ical;
    exit;
?>

