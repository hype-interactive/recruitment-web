<?php

    if(! function_exists('timeElapsed')){
        function timeElapsed(DateTime $date)
            {
                $days_ago= " days ago";
                $weeks_ago =" weeks ago";
                $months_ago =" months ago";
                $end_date=date_create(date('Y-m-d'));
                $start_date=date_create($date);
                $diff=date_diff($start_date,$end_date);
                $diff= $diff->d;
            
                if ($diff < 1 ) {
            
                    return " today";
                    
                }elseif ($diff >1 && $diff <7 ) {
                    
                    return $diff.$days_ago;
                }elseif ($diff >7 && $diff< 30) {
                    $result=(int)($diff / 7);
                    return $result . $weeks_ago;
                }elseif ($diff > 31 ) {
                    $result =(int)($diff/ 30);
                    return $result . $months_ago;
                }else {
                    return "time error";
                }
            
                
            }
        }
    

?>
